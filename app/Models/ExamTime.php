<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Exam;

class ExamTime extends Model
{
    use HasFactory;

    protected $table = 'exam_time';

    protected $fillable = [
        'user_id',
        'exam_id',
        'time',
    ]; 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
