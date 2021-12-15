<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'nomAssociation',
        'abrevation',
        'nom-res',
        'pays',
        'ville',
        'adresse',
        'tel',
        'email',
        'password'
    ];
    
}
