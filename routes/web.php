<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , "index"]);

Route::get('/authentifier', [HomeController::class , "authentifier"]);
Route::post("/check" , [HomeController::class , "check"])->middleware("check"); // Verifier le Guards

// Ajouter Pre Inscription

Route::post("/store" , [HomeController::class , "store"]);


Route::post("/Deconnect", [HomeController::class , "deconnect"]); //LogOut

//Notification For Admis et Insertion dans La table Stagiaire

Route::get("/{random}/{id}/{hashed1}/{hashed2}" ,[HomeController::class , "create"]);
Route::post("/etudiant/store" ,[HomeController::class , "storeEtudiant"]);

//Espace Administrateur



Route::middleware("isAdmin")->group(function(){

    Route::get("/admins" , [AdminController::class , "index"]);
    Route::put("/admins/valider/{id}",[AdminController::class , "valider"]);
    Route::get("/admins/profile" , [AdminController::class , "monprofile"]);
    Route::get("/admins/listes" , [AdminController::class , "listes"]);
    Route::get("/admins/listes/{id}" , [AdminController::class , "showliste"]);
    Route::get("/admins/telecharger" , [AdminController::class , "telecharger"]);
    Route::get("/admins/filieres" , [AdminController::class , "showfilieres"]);
    Route::get("/admins/formateurs" , [AdminController::class , "showformateurs"]);
    Route::get("/admins/administrateurs" , [AdminController::class , "showadmins"]);
    Route::get("/admins/filieres/groupe/{id}" , [AdminController::class , "showstagiaires"]);
    Route::get("/admins/formateur/{id}" , [AdminController::class , "edit"]);
    Route::put("/admins/formateur/{id}/update" , [AdminController::class , "update"]);
    Route::get("/admins/modules" , [AdminController::class,"showgroupes"]);
    Route::get("/admins/modules/{id}" , [AdminController::class,"showmodules"]);
    Route::put("/admins/modules/{id}/update" , [AdminController::class,"editmodules"]);
    Route::get("/admins/graphs",[AdminController::class ,"states"]);
    Route::get("/admins/absences",[AdminController::class ,"absences"]);


});


//Espace Formateur


Route::middleware(["isFormateur"])->group(function(){

    Route::get("/formateurs" , [FormateurController::class , "index"]);
    Route::get("/formateur/profile" , [FormateurController::class , "monprofile"]);
    Route::get("/formateur/modules" , [FormateurController::class , "mesmodules"]);
    Route::get("/formateur/groupe/{id}" , [FormateurController::class , "mesgroupes"])->middleware("verifier");
    Route::get("/formateur/absences" , [FormateurController::class , "absence"]);
    Route::get("/formateur/absence/{id}" ,[FormateurController::class , "createAbs"])->middleware("verifier");
    Route::post("/formateur/absence/store" , [FormateurController::class , "storeAbs"]);
    Route::get("/formateur/notes" , [FormateurController::class , "show"]);
    Route::get("/formateur/notes/{id}" , [FormateurController::class , "grades"])->middleware("verifier");
    Route::post("/formateur/notes/store" , [FormateurController::class , "storeNotes"]);

});

//Espace Stagiaire

Route::middleware("isStagiaire")->group(function(){

    Route::get("/students" , [StudentController::class , "index"]);
    Route::get("/students/modules" , [StudentController::class , "mymodules"]);
    Route::get("/students/groupe" , [StudentController::class , "monclass"]);
    Route::get("/students/monprofile" , [StudentController::class , "monprofile"]);
    Route::get("/students/examen" , [StudentController::class , "plan_exam"]);
    Route::get("/students/difficulte" , [StudentController::class , "boundaries"]);
    Route::post("/students/difficulte" , [StudentController::class , "envoyerBound"]);
    Route::get("/students/absences" , [StudentController::class , "absents"]);
    Route::get("/students/notes" , [StudentController::class , "grades"]);
    Route::get("/students/notes/download" , [StudentController::class , "telecharger"]);
    Route::get("/students/réclamer/{id}",[StudentController::class , "reclamer"]);
    Route::post("/students/réclamer/",[StudentController::class , "envoyerRec"]);

});

//FallbackControlller

Route::fallback(FallbackController::class);
