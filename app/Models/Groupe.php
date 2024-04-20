<?php

namespace App\Models;
use App\Models\Module;
use App\Models\Filiere;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory;
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function stagiaires(){
        return $this->hasMany(Stagiaire::class);
     }

     public function formateurs(){
        return $this->belongsToMany(Formateur::class);
    }
    public function modules(){
        return $this->belongsToMany(Module::class);
    }
}
