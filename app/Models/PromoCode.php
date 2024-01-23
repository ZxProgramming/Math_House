<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PromoCourse;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starts',
        'ends',
        'num_usage',
    ];

    public function course()
    {
        return $this->hasMany(PromoCourse::class, 'promo_id');
    }
}
