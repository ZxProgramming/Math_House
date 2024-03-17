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
            'question_id' => $req->question_id,
        ]);

        return $req->all();
    }

    public function quize_data( Request $req ){
        $quizzes = Question::where('lesson_id', $req->lesson)
        ->get();

        return $quizzes;
    }

    public function add_quizze( Request $req ){
        $ques_id = json_decode($req->ques_id); 
        
        $arr = $req->only('title', 'description', 'score', 'pass_score', 'state', 'lesson_id', 'quizze_order');
        $arr['time'] = $req->time_h . 'hours' . $req->time_m . 'M';
        $quizze = quizze::create($arr);
        for ( $i=0, $end = count($ques_id); $i < $end; $i++ ) { 
            QQuize::create([
                'quizze_id' => $quizze->id,
                'question_id' => $ques_id[$i]->id,
            ]);
        }

        return redirect()->back();
    }

    public function edit_quizze( Request $req ){
        $quizze_data = $req->data[0][0];
        $state = $quizze_data['state'] == 1 ? 1 : 0;
        $quizze = quizze::where('id', $quizze_data['quizzeID'])
        ->update([
            'title' => $quizze_data['title'] ,
            'description' => $quizze_data['description'] ,
            'time' => $quizze_data['time'] ,
            'score' => $quizze_data['score'] ,
            'pass_score' => $quizze_data['pass_score'] ,
            'quizze_order' => $quizze_data['quizze_order'] ,
            'state' => $state ,
        ]); 

        QQuize::
        where('quizze_id', $quizze_data['quizzeID'])
        ->delete();
        
        for ( $i= 1, $end = count($req->data); $i < $end; $i++ ) { 
            QQuize::create([
                'quizze_id' => $quizze_data['quizzeID'],
                'question_id' => $req->data[$i]['question_ID'],
            ]);
        }
        
        return $quizze_data;
    }

    public function del_quizze($id){
        quizze::where('id', $id)
        ->delete();

        return redirect()->back();
    }

}
