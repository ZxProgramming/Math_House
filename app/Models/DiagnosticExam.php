<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\Question;
use App\Models\ScoreSheet;

class DiagnosticExam extends Model
{
    use HasFactory;

    protected $table = 'diagnostic_exams';

    protected $fillable = [
        'title',
        'description',
        'time',
        'score',
        'pass_score',
        'score_id',
        'course_id',
        'state',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function question(){
        return $this->belongsToMany(Question::class, 'dia_questions');
    }

    public function dia_score(){
        return $this->belongsTo(ScoreSheet::class, 'score_id');
    }

}
