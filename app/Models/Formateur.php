<?php

namespace App\Models;

use App\Models\Groupe;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Formateur extends Model implements Authenticatable
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
        "adresse"
    ];

    public function modules(){
        return $this->belongsToMany(Module::class);
    }
    public function groupes(){
        return $this->belongsToMany(Groupe::class);
    }

}
