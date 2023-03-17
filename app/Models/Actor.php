<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'image'
    ];

    public function series(): MorphToMany
    {
        return $this->morphedByMany(Series::class, 'actorable');
    }

    public function movies(): MorphToMany
    {
        return $this->morphedByMany(Movie::class, 'actorable');
    }
}
