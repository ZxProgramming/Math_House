<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Mcq_ans;
use App\Models\Q_ans;
use App\Models\Grid_ans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lesson_id', 
        'question',
        'q_code',  
        'q_type',  
        'month',   
        'year',  
        'section',  
        'difficulty',  
        'q_url',
        'q_num',
        'ans_type',
        'state',
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function mcq(){
        return $this->hasMany(Mcq_ans::class, 'q_id');
    }

    public function q_ans(){
        return $this->hasMany(Q_ans::class, 'Q_id');
    }

    public function g_ans(){
        return $this->hasMany(Grid_ans::class, 'q_id');
    }
}
