<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class Admin extends Model implements Authenticatable
{
    use HasFactory,Notifiable;
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

}
