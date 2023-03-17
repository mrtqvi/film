<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Factor extends Model
{
    use HasFactory;

    protected $fillable = [
        'key' , 
        'value' ,
        'factorizable_id',
        'factorizable_type'
    ];

    public function factorizable(): MorphTo
    {
        return $this->morphTo();
    }

    const VALID_KEYS = [
        'فیلم‌نامه‌نویس',
        'مدیر فیلمبرداری',
        'تدوین گر',
        'آهنگساز',
        'طراحی ترکیب صدا',
        'مدیر صدابرداری',
        'طراح لباس',
        'مدیر تولید',
        'طراح جلوه های ویژه',
        'عکاس',
        'نویسنده'
    ];
}
