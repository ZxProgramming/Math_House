<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson; 
use App\Models\Question;

class quizze extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'time', 
        'score',
        'pass_score',
        'description',
        'lesson_id',
        'state',
        'quizze_order',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function question()
    {
        return $this->belongsToMany(Question::class, 'q_quizes');
    }
}
