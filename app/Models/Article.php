<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // On autorise l'insertion du titre, du contenu et de l'image
    protected $fillable = ['title', 'content', 'image'];
}
