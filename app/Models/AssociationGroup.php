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
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }
    public function concour()
    {
        return $this->hasMany(Concour::class, 'foreign_key', 'local_key');
    }
    // public function members()
    // {
    //     return $this->hasMany(Membre::class);
    // }
    public function users()
    {
        return $this->belongsToMany(Membre::class)->using(Asso_member::class);
    }
    public function membres()
    {
        return $this->belongsToMany(Membre::class, 'asso_members','association_groups_id','membre_id');
    }
}
