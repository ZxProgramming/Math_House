<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Question;

class QuestionHistory extends Model
{
    use HasFactory;

    protected $table = 'question_history';
    
    protected $fillable = [
        'user_id', 
        'question_id', 
        'answer', 
        'time',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
