<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ChapterPrice;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_name', 
        'teacher_id', 
        'course_id', 
        'pre_requisition', 
        'gain',  
        'ch_des', 
        'ch_url',
        'ch_price',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function price()
    {
        return $this->hasMany(ChapterPrice::class);
    }
}
