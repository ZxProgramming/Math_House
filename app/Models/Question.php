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
        'teacher_id', 
        'lesson_id', 
        'question', 
        'q_price', 
        'q_url',  
    ];

    public function teachers()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'lesson_id');
    }
}
