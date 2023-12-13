<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'teacher_id',
        'cate_name',
        'cate_price',
        'cate_des',
        'cate_url',
    ];

    public function teacher()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
}
