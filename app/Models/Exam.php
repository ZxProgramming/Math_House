<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exam';
    
    protected $fillable = [
        'title',
        'time',
        'score',
        'pass_score',
        'year',
        'month',
        'code_id',
        'course_id',
    ];
}
