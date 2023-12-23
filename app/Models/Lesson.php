<?php

namespace App\Models;

use app\Models\User;
use app\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_name', 
        'teacher_id', 
        'chapter_id', 
        'lesson_des', 
        'lesson_url', 
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}
