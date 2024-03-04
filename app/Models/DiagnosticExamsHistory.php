<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DiagnosticExam;

class DiagnosticExamsHistory extends Model
{
    use HasFactory;

    protected $table = 'diagnostic_exams_history';

    protected $fillable = [
        'user_id',
        'diagnostic_exams_id',
        'score',
        'time',
        'r_questions',
    ];

    public function exams(){ 
        return $this->belongsTo(DiagnosticExam::class, 'diagnostic_exams_id');
    }
}
