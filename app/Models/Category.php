<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory , Sluggable;

    protected $fillable = [
        'name' ,
        'image' ,
        'description',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function series(): MorphToMany
    {
        return $this->morphedByMany(Series::class, 'categorizable');
    }

    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'categorizable');
    }
}
