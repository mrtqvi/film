<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Video extends Model
{
    protected $table = 'videosable';
    
    use HasFactory;

    protected $fillable = [
        'video' ,
        'videosable_type',
        'videosable_id',
        'quality'
    ];

    public function videosable()
    {
        return $this->morphTo();
    }

}
