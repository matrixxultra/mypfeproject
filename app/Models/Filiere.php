<?php

namespace App\Models;

use App\Models\Groupe;
use App\Models\Module;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;
    public function groupes(){
     return $this->hasMany(Groupe::class);
    }
    public function stagiaires(){
        return $this->hasMany(Stagiaire::class);
     }
     public function modules(){
        return $this->hasMany(Module::class);
     }
}
