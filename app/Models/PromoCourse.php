<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PromoCode;
use App\Models\Course;

class PromoCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_id',
        'course_id',
    ];

    public function promo()
    {
        return $this->belongsTo(PromoCode::class, 'promo_id');
    }

    public function course()
    {
        return $this->belongsTo(PromoCode::class, 'course_id');
    }
}
