<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'creator',
        'thumb',
        'category_id',
        'times',
        'serving',
        'ingredients',
        'direction',
        'isSaved',
    ];
}
