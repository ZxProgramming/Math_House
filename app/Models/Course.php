<?php

namespace App\Models;

use app\Models\User;
use app\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;  

    protected $fillable = [
        'course_name', 
        'teacher_id', 
        'cate_id', 
        'course_price', 
        'course_des', 
        'course_url', 
    ];
 
    public function teacher()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'cate_id');
    }
}
