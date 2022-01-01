<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concour extends Model
{
    // protected $table = "concours";
    use HasFactory;
    protected $fillable = [
        'designation',
        'type',
        'etap',
        'pourcentage',
        'latitude',
        'longitude',
        'association_groups_id',
    ];
    /**
     * Get the post that owns the comment.
     */
    public function associationGroup()
    {
        return $this->belongsTo(AssociationGroup::class, 'foreign_key', 'owner_key');
    }
}
