<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;

class CoursesController extends Controller
{
    
    public function courses(){
        $courses = Course::all();
        $categories = Category::all();
        return view('Admin.courses.Courses.Course', compact('courses', 'categories'));
    }

    public function course_edit( Request $req ){
        Course::where('id', $req->course_id)
        ->update($req->only('course_name', 'course_des', 'course_price', 'category_id', 'duration'));

        return redirect()->back();
    } 

    public function del_course($id){
        Course::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function add_courses(){
        $categories = Category::all();
        $teachers = User::where('position', 'teacher')
        ->get();
        return view('Admin.courses.Courses.AddCourse', 
        compact('categories', 'teachers'));
    }

    public function course_add( Request $req ){
        $arr = $req->only('course_name', 'category_id', 'course_des', 'teacher_id', 
        'pre_requisition', 'gain', 'duration', 'course_price', 'discount');

        extract($_FILES['course_url']);
        $img_name = null;
        if ( !empty($name) ) {
            $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
            $extention = explode('.', $name);
            $extention = end($extention);
            $extention = strtolower($extention);
            if ( in_array($extention, $extention_arr)) {
                $img_name = now() . rand(1, 10000) . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['course_url'] = $img_name;
            }
        }

        move_uploaded_file($tmp_name, 'images/courses/' . $img_name);
        Course::create($arr);
        return redirect()->back();
    }

    public function course_filter( Request $req ){
        if ( $req->category_id == "all" ) {
            $courses = Course::all();
        }
        else{
            $courses = Course::
            where('category_id', $req->category_id)
            ->get();
        }
        $categories = Category::all();
        return view('Admin.courses.Courses.Course', compact('courses', 'categories'));
    }

}
