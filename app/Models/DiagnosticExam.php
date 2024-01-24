<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\DiaQuestion;

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
        'course_id',
        'state',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function question(){
        return $this->hasMany(DiaQuestion::class, 'daiExam_id');
    }

}
