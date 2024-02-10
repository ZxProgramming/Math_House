<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizzeStuAns extends Model
{
    use HasFactory;
    
    protected $table = 'quizze_stu_ans';
    
    protected $fillable = [
        'question_id',
        'quizze_id', 
        'stu_id', 
        'answer', 
    ];
}
