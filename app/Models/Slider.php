<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'image' ,
        'series_id' ,
        'description' ,
        'url' ,
        'status',
    ];

    public function scopePublished($query)
    {
        $query->where('status' , 1);
    }


    // accessor
    public function setUrlAttribute($url)
    {
        str_contains($url, request()->root()) ?
            $this->attributes['url'] = str_replace(request()->root(), '', $url) : $this->attributes['url'] = $url;
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
