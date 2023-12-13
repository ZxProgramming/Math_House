<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cate_id',
        'course_id',
        'chapter_id',
        'lesson_id',
        'question_id',
        'affilate_id',
        'student_id',
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'cate_id');
    }
    public function course()
    {
        return $this->hasMany(Course::class, 'course_id');
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'chapter_id');
    }
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'lesson_id');
    }
    public function question()
    {
        return $this->hasMany(Question::class, 'question_id');
    }
    public function affilate()
    {
        return $this->hasMany(User::class, 'affilate_id');
    }
    public function student()
    {
        return $this->hasMany(User::class, 'student_id');
    }
}
