<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;

class CoursesController extends Controller
{
    public function categories(){
        $categories = Category::all();
        return view('Visitor.Courses.Categories', compact('categories'));
    }

    public function courses($id){
        $courses = Course::where('category_id', $id)
        ->get();

        return view('Visitor.Courses.Courses', compact('courses'));
    }

    public function course($id){
        $chapters = Chapter::where('course_id', $id)
        ->get();

        return $chapters;
    }
    
}
