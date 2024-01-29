<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\PaymentRequest;

class Stu_MyCourseController extends Controller
{
    public function index(){
        $payment_request = PaymentRequest::
        where('user_id', auth()->user()->id)
        ->where('state', 'Approve')
        ->get();
        $courses = [];
        foreach( $payment_request as $item ){
            foreach ($item->order as $value) {
                $courses[$value->course->course_name] = $value->course;
            }
        }
        return view('Student.MyCourses.MyCourses', compact('courses'));
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

    public function stu_chapters( $id ){
        $payment_request = PaymentRequest::
        where('user_id', auth()->user()->id)
        ->where('state', 'Approve')
        ->get();
        $course_id = $id;

        return view('Student.MyCourses.Chapters_Working', compact('payment_request', 'course_id'));
    }
}
