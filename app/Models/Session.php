<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Lesson;

class Session extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date', 
        'link', 
        'from', 
        'to', 
        'lesson_id', 
        'teacher_id', 
        'type', 
    ];
 
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
 
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
