<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'fa_title' , 
        'en_title',
        'description',
        'poster',
        'teaser_video',
        'wallpaper',
        'imdb',
        'imdb',
        'year_construction',
        'ages',
        'country',
        'director',
        'producer',
    ];
}
