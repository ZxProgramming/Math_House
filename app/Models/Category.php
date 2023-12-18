<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'user_id',
        'cate_name',
        'cate_des',
        'image',
        'cate_name',
        'teacher_id', 
        'cate_des',
        'cate_url',
        'user_id', 
    ];

    public function teacher()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
}
