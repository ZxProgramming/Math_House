<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;

class LessonController extends Controller
{
    // This Start About Lessons 
            public function index(){
                $categories = Category::all();
                $courses = Course::all();
                $chapters = Chapter::all();
                return view('Admin.lessons.lesson',compact('categories','courses','chapters'));

            }
            public function addLesson(request $request){
            dd( $request);
            }
}
