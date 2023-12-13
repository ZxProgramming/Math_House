<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_name', 
        'course_id', 
        'teacher_id', 
        'ch_price', 
        'ch_des', 
        'ch_url', 
    ];

    public function teacher()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
    public function course()
    {
        return $this->hasMany(Course::class, 'course_id');
    }
}
