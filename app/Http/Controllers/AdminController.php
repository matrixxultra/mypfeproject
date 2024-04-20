<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Absence;
use App\Models\Demande;
use App\Models\Filiere;
use App\Models\Formateur;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CongratsNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //Dashboard dial Admin
    public function index(){
        $filieres = Filiere::all();
        $modules = Module::all();
        $formateurs = Formateur::all();
        $admins = Admin::all();
        $demandes = Demande::all()->where("status","=","en_cours")->where('age','<',30);
        return view("admin.index", compact("filieres" , "modules" ,"formateurs","admins","demandes"));

    }
    //le Profile dial Admin
    public function monprofile(){
        $id = Auth::guard('admin')->id();
        $admin = Admin::findOrFail($id);
        return view("admin.profile" , compact("admin"));
    }
    // kat afficher les Filiere m3a les groupe li kaynin
    public function showfilieres(){
        $filieres = Filiere::all();
        return view("admin.filieres" , compact("filieres"));
    }
    //
    public function showstagiaires(Request $req){
      $groupe = Groupe::find($req->id);
      return view("admin.groupe" , compact("groupe"));
    }

    //kay afficher les formateurs li kaynin
    public function showformateurs(){
        $formateurs = Formateur::all();
        return view("admin.formateur" , compact("formateurs"));
      }
      //kay afficher les Admins li m3ak f site
      public function showadmins(){
        $admins = Admin::all();
        return view("admin.administrateurs" , compact("admins"));
      }
     //kay affciher les Groupe w les Modules li kay9raw
      public function showgroupes(){
        $groupes = Groupe::orderBy("name")->get();
        return view("admin.modules" , compact("groupes"));
      }
       //kay afficher Page bach t editer chi groupe wt affecter li les Modules
      public function showmodules(Request $req){
        $groupe = Groupe::findOrFail($req->route('id'));
        $modules = Module::all();
        return view("admin.groupemodule" , compact("groupe","modules"));
      }

      //kat editer les les Modules l chi groupe

      public function editmodules(Request $req){
        $groupe = Groupe::findOrFail($req->route('id'));
        $groupe->modules()->sync($req->modules);
        return redirect()->back();


      }
       //kat affciher la page ila baghi t affecter les modules lchi formateur w les Groupe f d9a w7da

      public function edit($id){
        $formateur = Formateur::find($id);
        $groupes= Groupe::all();
        $modules = Module::all();
        return view("admin.edit", compact("formateur" , "groupes" , "modules"));
      }
      // dakchi li glt mn fo9 hadi
      public function update(Request $req){
        $formateur = Formateur::find($req->id);
       // $formateur->update($req->all(""))

        $formateur->modules()->sync($req->modules);
        $formateur->groupes()->sync($req->groupes);

    //     $groupes = DB::table("groupes")->whereIn("id",$req->groupes)->get();
    //     $modules = DB::table("modules")->whereIn("id",$req->modules)->get();

    //    $formateur->modules()->attach($modules);

        return redirect()->back();

      }
        // kay afficher les listes dial les filiere li kaynin dial dok les demandes de preinscription
      public function listes(){
        $filieres = Filiere::all();
        return view("admin.listes" , compact("filieres"));
      }

      // hadi method mgdra hhhh katakhod l id dial lfiliere w katrtbhom 3la 7sab la note w ykon l age < 30 w tatsefthom email bach yt9ydo
      //w katmodifier bla base de donné kaywliw admis w ka télécharga la liste PDF hhhhh

    public function showliste(Request $req){
        $id = $req->id;

      $filterData = Demande::orderBy("note_bac","DESC")->where("age","<",30)->where("filiere_id","=",$req->id)->where("bac_id","=","1")->get();
       foreach($filterData as $fd){
        $fd->status = "admis";
        $fd->save();
       }
      $data = [
        "id"=>$id,
        "filterData"=>$filterData
      ];

      foreach($filterData as $f){
        Notification::send($f,new CongratsNotification($f->filiere_id));
      }
       //return "sent";
      $pdf = Pdf::loadView('pdfs.liste', $data);
       return $pdf->download('listeAdmis.pdf');
    //return view("pdfs.liste",compact("filterData","id"));
    }
    public function states(){
        $stagiairesByFiliere = Stagiaire::select('filieres.name as filiere', DB::raw('count(*) as total'))
        ->join('filieres', 'stagiaires.filiere_id', '=', 'filieres.id')
        ->groupBy('stagiaires.filiere_id', 'filieres.name')
        ->get();

    //dd($stagiairesByFiliere);
        return view("admin.graphs" , compact("stagiairesByFiliere"));
    }
    // bach t gérer les Absence
    public function absences(){
        $absence = Absence::all();
        return view("admin.absences",compact("absence"));
    }
    //bach t valider manuellement
    public function valider(Request $req){
        $demande = Demande::findOrFail($req->route("id"));
        $demande->status = "admis";
        $demande->save();
        Notification::send($demande,new CongratsNotification($demande->filiere_id));
        return redirect()->back();
    }
}
