<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Question;

class QuestionTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'q_id',
        'time',
    ]; 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function exam()
    {
        return $this->belongsTo(Question::class, 'q_id');
    }
}
