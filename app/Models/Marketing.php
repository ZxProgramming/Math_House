<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'chapter_id',
        'affilate_id',
        'student_id',
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'cate_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
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
        return $this->belongsTo(User::class, 'affilate_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
