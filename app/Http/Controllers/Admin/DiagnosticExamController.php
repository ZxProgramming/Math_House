<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\quizze;
use App\Models\Category;
use App\Models\Course;
use App\Models\DiagnosticExam;
use App\Models\DiaQuestion;

class DiagnosticExamController extends Controller
{
    public function index(){
        $questions = Question::
        select('*', 'questions.id as question_id')
        ->leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
        ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
        ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->get();;
        $exams = DiagnosticExam::all();
        $categories = Category::all();
        $courses = Course::all();

        return view('Admin.courses.Dia Exam.DiagnosticExam', 
        compact('questions', 'exams', 'categories', 'courses'));
    }

    public function dia_exam_data( Request $req ){

        $quizzes = Question::
        select('*', 'questions.id as question_id')
        ->leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
        ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
        ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->where('courses.id', $req->course_id)
        ->get();

        return $quizzes;
    }

    public function del_dia_exam( $id ){
        DiagnosticExam::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function exam_add_q( Request $req ){
        return $req->all();
    }

    public function exam_del_q( Request $req ){
        DiaQuestion::where('id', $req->id)
        ->delete();

        return $req->all();
    }

    public function add_diaexam( Request $req ){ 
        $questions = json_decode($req->ques_id);
       $arr = $req->only('title', 'description', 'score', 'pass_score', 'course_id');
       $arr['time'] = $req->time_h . 'Hours ' . $req->time_m . ' M';
       $dia_exam = DiagnosticExam::create($arr);
       foreach ($questions as $ques) {
        DiaQuestion::create([
            'daiExam_id' => $dia_exam->id,
            'ques_id' => $ques->id,
        ]);
       }

       return redirect()->back();
    }

}
