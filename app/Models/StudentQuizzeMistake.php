<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuizzeMistake extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'question_id', 
        'student_quizze_id', 
    ];
}
