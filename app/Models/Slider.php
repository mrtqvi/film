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
        'description' ,
        'url' ,
        'status',
    ];


    // accessor
    public function setUrlAttribute($url)
    {
        str_contains($url, request()->root()) ?
            $this->attributes['url'] = str_replace(request()->root(), '', $url) : $this->attributes['url'] = $url;
    }
}
