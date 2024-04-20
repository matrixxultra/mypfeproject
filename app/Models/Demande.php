<?php

namespace App\Models;

use App\Models\Bac;
use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class Demande extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        "name",
        "email",
        "age",
        "filiere_id",
        "bac_id",
        "note_bac",
        "status"
    ];
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
    public function bac(){
        return $this->belongsTo(Bac::class);
    }
}
