<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\Demande;
use App\Models\Filiere;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Kay afficher la Page Home li fiha About w filiere rak fahm
    public function index(){
        $filieres = Filiere::all();
        $bacs = Bac::all();
        return view("welcome",compact("filieres","bacs"));
    }
    //Insertion f la table demandes dial les Pre Inscription
    public function store(Request $req){
        $req->validate([
            "name"=>"required",
            "email"=>"required",
            "age"=>"required",
            "filiere_id"=>"required",
            "bac_id"=>"required",
            "note_bac"=>"required",
        ]);
        Demande::create([
           "name"=>$req->input("fullName"),
           "email" =>$req->input("email"),
           "filiere_id"=>$req->input("filiere_id"),
           "bac_id"=>$req->input("bac_id"),
           "note_bac"=>$req->input("note_bac"),
           "age" =>$req->input("age"),
           //"message" =>$req->input()
        ]);
        return redirect("/") ;
    }

    // kay Afficher la page Login

    public function authentifier(){
        return view("pages.login");
    }
     // hadi kadir Déconnextion

    public function deconnect(Request $req){
         Auth::logout();
         session()->flush();
         return redirect("/authentifier") ;
    }

    //hadi kadir Décryptage dial lien l for w kat afficher la page dial Inscription

    public function create(Request $req){
        if (base64_decode($req->route("hashed1")) == "Anaidrisschrit5bonbon" && base64_decode($req->route("hashed2")) == "hamza_nadi" ) {

            $filiere = Filiere::find($req->route("id"));

            $groupe = $filiere->groupes()->inRandomOrder()->first();
            return view("pages.inscription",compact("filiere", "groupe"));
        }
        return view("pages.404");
    }

    //Insertion f la table Stagiaire

    public function storeEtudiant(Request $req){
       $formData =  $req->validate([
            "name"=>"required",
            "prenom"=>"required",
            "email"=>"required|unique:stagiaires",
            "password"=>"required",
            "phone_number"=>"required",
            "Cin"=>"required",
            "addresse"=>"required",
            "groupe_id"=>"required",
            "filiere_id"=>"required"
        ]);
        $formData["password"] = Hash::make($req->input("password")) ;
        Stagiaire::create($formData);
        return redirect("/authentifier");
    }

}

