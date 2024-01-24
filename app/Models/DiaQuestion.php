<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Question;

class DiaQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'daiExam_id',
        'ques_id',
    ];
 

    public function question()
    {
        return $this->belongsTo(Question::class, 'ques_id');
    }
}
