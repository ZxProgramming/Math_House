<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\quizze;
use App\Models\Question;

class QQuize extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'quizze_id', 
        'question_id', 
    ];
    public function quizze()
    {
        return $this->belongsTo(quizze::class, 'quizze_id');
    }
    public function question()
    {
        return $this->belongsTo(Question::class, 'ques_id');
    }
}
