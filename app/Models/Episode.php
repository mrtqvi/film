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

    protected $with = [
        'videosable'
    ];


    public function comments()
    {
        return $this->morphMany('App\Models\Comment' , 'commentable');
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function videosable()
    {
        return $this->morphMany(Video::class , 'videosable');
    }

    public function isUploaded($quality)
    {
        return $this->videosable->where('quality' , $quality)->first() ? true : false;
    }
}
