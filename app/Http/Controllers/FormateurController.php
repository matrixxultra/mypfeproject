<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Groupe;
use App\Models\Absence;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormateurController extends Controller
{
    public function index(){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        return view("formateur.index" , compact("formateur"));
    }

    public function mesmodules(){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        $modules = $formateur->modules()->with("groupes")->get();
        return view("formateur.modules", compact("modules"));

    }

    public function mesgroupes($id){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        $groupe = Groupe::find($id);
        return view("formateur.groupes",compact("formateur","groupe"));
    }

    public function show(){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        return view("formateur.notes",compact("formateur"));
    }

    public function absence(){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        return view("formateur.absence",compact("formateur"));
    }

    public function createAbs(Request $req){
        //return $req->id;
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        $groupe = Groupe::find($req->id);
        return view("formateur.absenceform",compact("formateur" , "groupe"));
    }

    public function storeAbs(Request $req){
      
        $data = $req->all();
        $data["formateur_id"] = Auth::guard("formateur")->user()->id;
        $data["status"] = "Non_Justifié";
        Absence::create($data);
       return redirect()->back();
    }

    public function grades($id){
        $formateur =  Formateur::find(Auth::guard("formateur")->user()->id);
        $groupe = Groupe::find($id);
        return view("formateur.noteform",compact("formateur" , "groupe"));
    }

    public function storeNotes(Request $req){
        $data = $req->all();
        $data["formateur_id"] = Auth::guard("formateur")->user()->id;
        $data["EFR"] = 100;
        Note::create($data);
        return redirect()->back();
     }
}
