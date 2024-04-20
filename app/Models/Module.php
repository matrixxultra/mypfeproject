<?php

namespace App\Models;

use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\Formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function formateurs(){
        return $this->belongsToMany(Formateur::class);
    }
    public function groupes(){
        return $this->belongsToMany(Groupe::class);
    }
}
