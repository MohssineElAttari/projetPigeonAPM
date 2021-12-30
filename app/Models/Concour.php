<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concour extends Model
{
    use HasFactory;

    /**
 * Get the post that owns the comment.
 */
public function associationGroup()
{
    return $this->belongsTo(AssociationGroup::class, 'foreign_key', 'owner_key');
}
}
