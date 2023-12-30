<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;

class Stu_MyCourseController extends Controller
{
    public function index(){
        return view('Student.MyCourses.MyCourses');
    }
    
    public function courses(){
        $courses = Marketing::where('student_id', auth()->user()->id)
        ->where('course_id', '!=', null)
        ->orderBy('course_id')
        ->get();
        return view('Student.MyCourses.Courses', compact('courses'));
    }
    
    public function chapters(){
        $chapters = Marketing::where('student_id', auth()->user()->id)
        ->where('chapter_id', '!=', null)
        ->orderBy('chapter_id')
        ->get();
        return view('Student.MyCourses.Chapters', compact('chapters'));
    }
}
