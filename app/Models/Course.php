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
        'user_id', 
    ];
 
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
