<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id' ,
        'user_id',
    ];

    public function series()
    {
        return $this->belongsToMany(Series::class , 'series_user');
    }

}
