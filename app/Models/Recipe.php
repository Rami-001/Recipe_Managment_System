<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe_manager';
    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'instructions',
    ];
}
