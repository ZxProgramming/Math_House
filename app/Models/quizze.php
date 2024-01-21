<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\QQuize;
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
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function question()
    {
        return $this->hasMany(QQuize::class, 'quizze_id');
    }
}
