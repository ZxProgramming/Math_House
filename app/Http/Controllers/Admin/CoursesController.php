<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;

class CoursesController extends Controller
{
    
    public function courses(){
        $courses = Course::all();
        $categories = Category::all();
        return view('Admin.courses.Courses.Course', compact('courses', 'categories'));
    }

    public function course_edit( Request $req ){
        Course::where('id', $req->course_id)
        ->update($req->only('course_name', 'course_des', 'course_price', 'category_id'));

        return redirect()->back();
    } 

    public function del_course($id){
        Course::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function add_courses(){
        $categories = Category::all();
        return view('Admin.courses.Courses.AddCourse', compact('categories'));
    }

}
