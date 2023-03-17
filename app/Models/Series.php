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

    public function teaser()
    {
        return $this->belongsTo(Teaser::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
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
}
