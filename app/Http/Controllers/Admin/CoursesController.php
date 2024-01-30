<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Category;
use App\Models\User;

class CoursesController extends Controller
{
    protected $requestCourse = ['course_name', 'teacher_id', 'course_des', 'category_id', 'gain', 'pre_requisition', 'course_price'
    ];
    public function courses(){
        $courses = Course::all();
        $categories = Category::all();
        $teachers = User::where('position', 'teacher')
        ->get();
        return view('Admin.courses.Courses.Course', compact('courses', 'teachers', 'categories'));
    }

    public function course_edit( Request $req ){
        $arr = $req->only($this->requestCourse);

        $req->validate([
         'course_name'  => 'required',
         'teacher_id'   => 'required|numeric',
         'course_price' => 'required|numeric',
         'category_id'  => 'required|numeric',
        ]);
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

        Course::where('id', $req->course_id)
        ->update($arr);
        CoursePrice::where('course_id', $req->course_id)
        ->delete();
        for ($i=0, $end = count($req->duration); $i < $end; $i++) { 
        CoursePrice::
        create(['course_id' => $req->course_id, 
        'duration' => $req->duration[$i],
        'price' => $req->price[$i],
        'discount' => $req->discount[$i]]);
        }

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
        'pre_requisition', 'gain', 'course_price');

        $req->validate([
            'course_name'  => 'required',
            'teacher_id'   => 'required|numeric',
            'course_price' => 'required|numeric',
            'category_id'  => 'required|numeric',
           ]);
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
        $course_data = Course::create($arr);
        
        for ($i=0, $end = count($req->duration); $i < $end; $i++) { 
            CoursePrice::
            create(['course_id' => $course_data->id, 
            'duration' => $req->duration[$i],
            'price' => $req->price[$i],
            'discount' => $req->discount[$i]]);
            }
        return redirect()->back();
    }

    public function course_filter( Request $req ){
        if ( $req->category_id == "all" || empty($req->category_id) ) {
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
