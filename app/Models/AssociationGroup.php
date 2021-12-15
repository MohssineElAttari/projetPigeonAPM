<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationGroup extends Model
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
            'active',
            'email',
            'password'
    ];
}
