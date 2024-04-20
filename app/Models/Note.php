<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Formateur;
use App\Models\Stagiaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        "stagiaire_id",
        "formateur_id",
        "module_id",
        "controle_1",
        "controle_2",
        "controle_3",
        "EFM",
        "EFR",
    ];
    public function stagiaire(){
        return $this->belongsTo(Stagiaire::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
    public function formateur(){
        return $this->belongsTo(Formateur::class);
    }
}
