<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Formateur;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        "stagiaire_id",
        "formateur_id",
        "module_id",
        "la_date",
        "matin1",
        "matin2",
        "soir1",
        "soir2",
        "status"
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
