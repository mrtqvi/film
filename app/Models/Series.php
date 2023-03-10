<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory , Sluggable;

    protected $fillable = [
        'fa_title' , 
        'en_title',
        'description',
        'poster',
        'wallpaper',
        'imdb',
        'year_construction',
        'ages',
        'country',
        'director',
        'teaser_id',
        'producer',
    ];

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source'    =>  'fa_title'
            ]
        ];  
    } 

    public function teaser()
    {
        return $this->belongsTo(Teaser::class);
    }
}
