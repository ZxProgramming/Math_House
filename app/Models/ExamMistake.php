<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMistake extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_exam_id',
        'question_id',
    ];
}