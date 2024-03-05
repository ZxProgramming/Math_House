<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ScoreSheet;
use App\Models\ScoreList;
use App\Models\Category;
use App\Models\Course;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamCodes;

class ExamController extends Controller
{
    public function index(){
        $questions = Question::
        select('*', 'questions.id as question_id')
        ->leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
        ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
        ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->get();
        $exams = Exam::all();
        $categories = Category::all();
        $courses = Course::all();
        $scores = ScoreSheet::all();
        $codes = ExamCodes::all();

        return view('Admin.courses.Exam.Exam', 
        compact('questions', 'exams', 'categories', 'courses', 'scores', 'codes'));
    }

    public function add_exam( Request $req ){
        $questions = json_decode($req->ques_id);
        $arr = $req->only('title', 'description', 'score', 'pass_score', 
        'year', 'month', 'code_id', 'course_id', 'score_id', 'state');
        $arr['time'] = $req->time_h . 'Hours ' . $req->time_m . ' M';
        $dia_exam = Exam::create($arr);
        foreach ($questions as $ques) {
            $exam = Exam::findorfail($dia_exam->id);
            $exam->question()->syncWithoutDetaching($ques->id);
        }

        return redirect()->back();
    }

    public function score_sheet(){
        $score_sheet = ScoreSheet::all();
        $categories = Category::all();
        $courses = Course::all();

        return view('Admin.courses.score_sheet.Score_Sheet', 
        compact('score_sheet', 'categories', 'courses'));
    }

    public function addScore( Request $req ){
        
       $score_sheet = ScoreSheet::create(
        $req->only('name', 'course_id', 'score')
       );

       for ($i=0, $end = count($req->question_num); $i < $end; $i++) { 
            ScoreList::create([
                'score_id' => $score_sheet->id,
                'question_num' => $req->question_num[$i],
                'score' => $req->score_list[$i]
            ]);
       }

       return redirect()->back();
    }

    public function scoreDelete( $id ){
        ScoreSheet::where('id', $id )
        ->delete();

        return redirect()->back();
    }

}
