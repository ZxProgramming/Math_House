<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;

class CoursePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'price',
        'discount',
        'course_id',
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
