<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsagePromo extends Model
{
    use HasFactory;

    protected $table = 'usage_promo';
    
    protected $fillable = [
        'user_id',
        'promo_id',
        'promo'
    ];
}
