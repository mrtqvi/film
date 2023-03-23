<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 
        'description' ,
        'image' , 
        'season' , 
        'series_id'
    ];


    public function comments()
    {
        return $this->morphMany('App\Models\Comment' , 'commentable');
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function videos(): MorphToMany
    {
        return $this->morphToMany(Video::class, 'videosable');
    }
}
