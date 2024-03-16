<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Exam;

class ExamHistory extends Model
{
    use HasFactory;

    protected $table = 'exam_history';
    
    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
        'time',
        'r_questions',
        'date',
    ];

    public function exams(){ 
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
