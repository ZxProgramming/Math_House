<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\Question;
use App\Models\ScoreSheet;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exam';
    
    protected $fillable = [
        'title',
        'description',
        'time',
        'score',
        'pass_score',
        'year',
        'month',
        'code_id',
        'course_id',
        'score_id',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function question(){
        return $this->belongsToMany(Question::class, 'exam_questions');
    }

    public function exam_score(){
        return $this->belongsTo(ScoreSheet::class, 'score_id');
    }

}
