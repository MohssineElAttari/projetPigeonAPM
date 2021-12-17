<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  
class AssociationGroup extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'logo',
            'nom_asso',
            'type',
            'prenom_res',
            'nom_res',
            'abreviation',
            'tel',
            'fix',
            'adresse',
            'pays',
            'ville',
            'page',
            'email',
            'password',
            'user_id'
    ];
}
