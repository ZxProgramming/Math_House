<?php

namespace App\Models;

use app\Models\User;
use app\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lesson_id', 
        'question',
        'q_code',  
        'q_type',  
        'month',   
        'year',  
        'section',  
        'difficulty',  
        'q_url',
        'q_num',
        'ans_type',
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
