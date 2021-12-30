<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Asso_member extends Pivot
{
    use HasFactory;
    public $incrementing = true;

    protected $fillable = [
        'association_groups_id',
        'membre_id',
        'date_inscription',
    ];
}
