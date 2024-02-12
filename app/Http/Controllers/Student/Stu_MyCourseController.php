<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\PaymentRequest;
use App\Models\quizze;
use App\Models\QuizzeStuAns;

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

    public function stu_lessons ( $id, $L_id, $idea_num ){
        $payment_request = PaymentRequest::
        where('user_id', auth()->user()->id)
        ->where('state', 'Approve')
        ->get();
        $chapter_id = $id;
        return view('Student.MyCourses.Lessons', compact('payment_request', 'chapter_id', 'L_id', 'idea_num'));
    }

    public function stu_quizze( $id ){
        $quizze = quizze::where('id', $id)
        ->first();

        return view('Student.MyCourses.Quizze', compact('quizze'));
    }

    public function quizze_ans( Request $req ){
        $quizze = quizze::where('id', $req->quizze_id)
        ->first();
        $deg = 0;
        foreach ($quizze->question as $question) {
            $answer = $req['ans' . $question->id];
            $arr = ['A', 'B', 'C', 'D'];
            if ( in_array($answer, $arr) ) {
                $mcq_ans = $question->mcq[0]->mcq_answers;
                if ( $mcq_ans == $answer ) {
                    $deg++;
                }
            }
            else {
                $grid_ans = @$question->g_ans[0]->grid_ans;
                if ( $grid_ans == $answer ) {
                    $deg++;
                }
            }
        }

        $deg =  $deg / count($quizze->question) * 100;
        $deg = $deg . '%';

        return view('Student.MyCourses.Grade', compact('deg'));
    }
}
