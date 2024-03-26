<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\quizze;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\DiagnosticExam;
use App\Models\DiaQuestion;
use App\Models\ScoreSheet;

class DiagnosticExamController extends Controller
{
    public function index(){
        $questions = Question::
        select('*', 'questions.id as question_id')
        ->leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
        ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
        ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->get();
        $exams = DiagnosticExam::all();
        $categories = Category::all();
        $courses = Course::all();
        $scores = ScoreSheet::all();

        return view('Admin.courses.Dia Exam.DiagnosticExam', 
        compact('questions', 'exams', 'categories', 'courses', 'scores'));
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
       $arr = $req->only('title', 'description', 'score', 'pass_score', 'course_id', 'score_id', 'state');
       $arr['time'] = $req->time_h . 'Hours ' . $req->time_m . ' M';
       $dia_exam = DiagnosticExam::create($arr);
       foreach ($questions as $ques) {
        DiaQuestion::create([
            'diagnostic_exam_id' => $dia_exam->id,
            'question_id' => $ques->id,
        ]);
       }

       return redirect()->back();
    }

    public function edit_dia_exam( $id, Request $req){
        $questions = json_decode($req->ques_id);
       $arr = $req->only('title', 'description', 'score', 'pass_score', 'course_id', 'score_id');
       $arr['state'] = isset($req->state) ? 1 : 0;
       $arr['time'] = $req->time_h . 'Hours ' . $req->time_m . ' M';
       $dia_exam = DiagnosticExam::
       where('id', $id)
       ->update($arr);
       

       return redirect()->back();
    }

    public function edit_q_dia_exam( Request $req ){
        DiagnosticExam::where('id', $req->data[0][0]['diagnostic_ID'])
        ->update([
            'title' => $req->data[0][0]['title'],
            'description' => $req->data[0][0]['description'],
            'time' => $req->data[0][0]['time'],
            'score' => $req->data[0][0]['score'],
            'pass_score' => $req->data[0][0]['pass_score'],
            'score_id' => $req->data[0][0]['scoreId'],
            'state' => $req->data[0][0]['state'],
        ]);
        DiaQuestion::where('diagnostic_exam_id', $req->data[0][0]['diagnostic_ID'])
        ->delete();
        for ($i=1, $end = count($req->data); $i < $end; $i++) { 
            DiaQuestion::create([
                'diagnostic_exam_id' => $req->data[0][0]['diagnostic_ID'],
                'question_id' => $req->data[$i]['question_ID']
            ]);
        }
        return $req->all();
    }


}
