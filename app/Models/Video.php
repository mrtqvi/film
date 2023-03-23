<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'video' ,
        'videosable_type',
        'videosable_id',
    ];

    public function episodes(): MorphToMany
    {
        return $this->morphedByMany(Episode::class, 'videosable');
    }

    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'videosable');
    }

}
