<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Groupe;
use App\Models\Absence;
use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Stagiaire extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $fillable = [
        "name",
        "prenom",
        "email",
        "password",
        "phone_number",
        "Cin",
        "addresse",
        "groupe_id",
        "filiere_id"
    ];
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }
    public function absences(){
        return $this->hasMany(Absence::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }

}
