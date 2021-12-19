<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asso_member extends Model
{
    use HasFactory;

    protected $fillable = [
        'association_groups_id',
        'membre_id',
        'date_inscription',
    ];
}
