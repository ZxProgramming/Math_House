<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quizze;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\QQuize;

class QuizzeController extends Controller
{
    public function quizze(){
        $questions = Question::all();
        $quizzes = quizze::all();
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();

        return view('Admin.courses.Quizze.Quizze', 
        compact('quizzes', 'questions', 'categories', 'courses', 'chapters', 'lessons'));
    }

    public function quize_del_q( Request $req ){
        QQuize::where('id', $req->id)
        ->delete();

        return $req->all();
    }

    public function quize_add_q( Request $req ){
        QQuize::create([
            'quizze_id' => $req->quizze_id,
            'ques_id' => $req->ques_id,
        ]);

        return $req->all();
    }

    public function quize_data( Request $req ){
        $quizzes = Question::where('lesson_id', $req->lesson)
        ->get();

        return $quizzes;
    }

    public function add_quizze( Request $req ){
        $ques_id = json_encode($req->ques_id);
        $ques_id = json_decode($req->ques_id); 
        
        $arr = $req->only('title', 'description', 'score', 'pass_score', 'state', 'lesson_id');
        $arr['time'] = $req->time_h . 'hours' . $req->time_m . 'M';
        $quizze = quizze::create($arr);
        for ( $i=0, $end = count($ques_id); $i < $end; $i++ ) { 
            QQuize::create([
                'quizze_id' => $quizze->id,
                'ques_id' => $ques_id[$i]->id,
            ]);
        }

        return redirect()->back();
    }

    public function edit_quizze( $id, Request $req ){
        return $req->all();
        $ques_id = json_encode($req->ques_id);
        $ques_id = json_decode($req->ques_id); 
        
        $arr = $req->only('title', 'description', 'time', 'score', 'pass_score', 'state', 'lesson_id');
        quizze::where('id', $id)
        ->update($arr);
        QQuize::where('quizze_id', $id)
        ->delete();
        for ( $i=0, $end = count($ques_id); $i < $end; $i++ ) { 
            QQuize::create([
                'quizze_id' => $id,
                'ques_id' => $ques_id[$i]->id,
            ]);
        }

        return redirect()->back();
    }

    public function del_quizze($id){
        quizze::where('id', $id)
        ->delete();

        return redirect()->back();
    }

}
