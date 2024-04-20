<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Admin;
use App\Models\Groupe;
use App\Models\Note;
use App\Models\Stagiaire;
use App\Notifications\ProblemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function index(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        $modules = $stagiaire->groupe->modules->count();
       // $formateurs = $stagiaire->groupe->formateurs->count();
        $modules = $stagiaire->groupe->modules->count();
        //$groupe = Groupe::find($s)
        return view("student.index",compact("stagiaire","modules"));
    }
    public function monprofile(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        return view("student.profile",compact("stagiaire"));
    }
    public function grades(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        return view("student.notes",compact("stagiaire"));

    }
    public function absents(){
       $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
       return view("student.absence",compact("stagiaire"));
    }
    public function mymodules(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        $modules = $stagiaire->groupe->modules;
        return view("student.modules",compact("stagiaire" , "modules"));
    }
    public function monclass(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        return view("student.class",compact("stagiaire"));
    }
    public function boundaries(){
        return view("student.boundaries");
    }

    public function envoyerBound(Request $req){
        $admins = Admin::all();
        Notification::send($admins,new ProblemNotification($req->message));
        return "sent";

    }

    public function telecharger(){
        $stagiaire = Stagiaire::find(Auth::guard('stagiaire')->user()->id);
        $data = [
            "name"=>$stagiaire->name,
            "prenom"=>$stagiaire->prenom,
            "notes"=>$stagiaire->notes
        ];
       // $lol = ["1", "2","3"];

        $pdf = Pdf::loadView('pdfs.notes', $data);
        return $pdf->download('mesNotes.pdf');

    }
    public function reclamer($id){
        $email = Note::findOrFail($id)->formateur->email;
        return view("student.reclamer",compact("email"));
    }
    public function envoyerRec(Request $req){
        $stagiaire = Auth::guard("stagiaire")->user()->email;
        Mail::to($req->email)->to(new SendMail($stagiaire,$req->message)) ;
        return "Envoyer avec Success";
    }



}
