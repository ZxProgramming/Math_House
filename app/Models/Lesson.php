<?php

namespace App\Models;

use App\Models\User;
use App\Models\Chapter;
use App\Models\IdeaLesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_name', 
        'teacher_id', 
        'chapter_id', 
        'lesson_des', 
        'lesson_url',
        'pre_requisition',
        'gain',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
    public function quizze()
    {
        return $this->hasMany(quizze::class);
    }
    public function ideas()
    {
        return $this->hasMany(IdeaLesson::class, 'lesson_id');
    }
}
