<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CoursePrice;

class Course extends Model
{
    use HasFactory;  

    protected $fillable = [
        'course_name', 
        'teacher_id', 
        'category_id', 
        'course_price', 
        'course_des', 
        'course_url', 
        'pre_requisition',
        'gain',
        'duration',
        'discount',
        'user_id', 
    ];
 
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
    public function prices(){
        return $this->hasMany(CoursePrice::class, 'course_id');
    }
}
