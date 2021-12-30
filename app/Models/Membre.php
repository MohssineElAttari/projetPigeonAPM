<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{

    use HasFactory;
    protected $fillable = [
        'prenom_francais',
        'prenom_arabe',
        'nom_francais',
        'nom_arabe',
        'longitude',
        'latitude',
        'email',
        'tel'
    ];
    public function associationGroup()
    {
        return $this->belongsToMany(AssociationGroup::class, 'asso_members','association_groups_id','membre_id');
    }
}
