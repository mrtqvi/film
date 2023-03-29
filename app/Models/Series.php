<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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


    protected $with = [
        'categories' ,
        'actors',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'    =>  'fa_title'
            ]
        ];
    }

    public function show()
    {
        return route('series.show' , $this->slug);
    }

    public function scopePublished($query)
    {
        $query->where('status' , 1);
    }

    public function teaser()
    {
        return $this->belongsTo(Teaser::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function actors(): MorphToMany
    {
        return $this->morphToMany(Actor::class, 'actorable');
    }

    public function factors(): MorphMany
    {
        return $this->morphMany(Factor::class, 'factorizable');
    }

    public function getFactor($key)
    {
        $factor = $this->factors->where('key' , $key)->first();

        return $factor ? $factor->value : '';
    }

    public function privatePath()
    {
        return route('admin.series.edit' , $this->id);
    }

    public function sliders()
    {
        return $this->hasOne(Slider::class);
    }

    public function user()
    {
       return $this->belongsToMany(User::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class , 'series_user' );
    }

}
