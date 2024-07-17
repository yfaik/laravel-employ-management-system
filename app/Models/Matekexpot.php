<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matekexpot extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference', 'article', 'photo_path','color', 'price',
    ];
}

