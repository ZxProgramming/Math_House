<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'course_id', 
        'category_id',
    ];
}
