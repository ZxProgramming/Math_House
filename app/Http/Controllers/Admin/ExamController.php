<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ScoreSheet;
use App\Models\ScoreList;
use App\Models\Category;
use App\Models\Course;

class ExamController extends Controller
{
    public function index(){
        return view('Admin.courses.Exam.Exam');
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
