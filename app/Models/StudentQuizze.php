<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Lesson; 
use App\Models\quizze; 
use App\Models\User; 
use App\Models\Question; 

class StudentQuizze extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date', 
        'lesson_id', 
        'student_id', 
        'quizze_id', 
        'score', 
        'time', 
        'r_questions', 
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    public function quizze()
    {
        return $this->belongsTo(quizze::class, 'quizze_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'student_quizze_mistakes');
    }
}
