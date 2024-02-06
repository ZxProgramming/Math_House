<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Q_ans;
use App\Models\Mcq_ans;
use App\Models\Grid_ans;
use App\Models\ExamCodes;

class QuestionController extends Controller
{
    
    public function question(){
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();
        $questions = Question::all();
        $exams = ExamCodes::all();

        return view('Admin.courses.Questions.Questions', 
        compact('categories', 'courses', 'chapters', 'lessons', 'questions', 'exams'));
    }

    public function q_edit( $id, Request $req ){
        
        $arr = $req->only('question', 'lesson_id', 'year', 'month',
        'q_code', 'section', 'q_num', 'difficulty', 'ans_type');
        if ( isset($req->mcq_ans) && $req->mcq_answers != null ) {
            Mcq_ans::where('q_id', $id)
            ->delete();
            foreach ( $req->mcq_ans as $item ) {
                Mcq_ans::create([
                    'mcq_ans' => $item,
                    'mcq_answers' => $req->mcq_answers, 
                    'q_id' => $id,
                ]);
            }
        }
        
        if( isset($req->grid_ans) && $req->grid_ans[0] != null ){
            Grid_ans::where('q_id', $id)
            ->delete();
            foreach ($req->grid_ans as $key => $item) {
                Grid_ans::create([
                    'grid_ans' => $item,
                    'q_id' => $id,
                ]);
            }
        }
       
       extract($_FILES['q_url']);
       $img_name = null;
       if ( !empty($name) ) {
           $img_name = now() . rand(1, 10000) . $name;
           $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
           $arr['q_url'] = $img_name;
       }

       if ( !empty($req->ans_pdf) ) {
            $ans_pdf_file = $_FILES['ans_pdf'];
            $ans_video_file = $_FILES['ans_video'];
           for ($i=0, $end = count($req->ans_pdf); $i < $end; $i++) { 
               $pdf_name = now() . $ans_pdf_file['name'][$i];
               $v_name   = now() . $ans_video_file['name'][$i];
               $pdf_name = str_replace([':', ' ', '-'], 'X', $pdf_name);
               $v_name   = str_replace([':', ' ', '-'], 'X', $v_name);
               Q_ans::create([
                   'ans_pdf'   => $pdf_name,
                   'ans_video' => $v_name,
                   'Q_id'      => $id,
               ]);
               move_uploaded_file($ans_pdf_file['tmp_name'][$i], 'files/q_pdf/' . $pdf_name);
               move_uploaded_file($ans_video_file['tmp_name'][$i], 'files/q_video/' . $v_name);
           }
       }
       move_uploaded_file($tmp_name, 'images/questions/' . $img_name);
        Question::where('id', $id)
        ->update($arr);

        return redirect()->back();
    }

    public function del_q( $id ){
        Question::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function filter_question( Request $req ){
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all(); 
        $exams = ExamCodes::all();

        $data = Question::
        leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
        ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
        ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
        ->get();
        $questions = $data;
        if (isset($req->category_id)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->category_id == $req->category_id ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->course_id)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->course_id == $req->course_id ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->chapter_id)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->chapter_id == $req->chapter_id ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->lesson_id)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->lesson_id == $req->lesson_id ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->q_type)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->q_type == $req->q_type ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->section)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->section == $req->section ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->year)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->year == $req->year ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->month)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->month == $req->month ) {
                    $questions[] = $item;
                }
            }
        }
        if (isset($req->difficulty)) {
            $questions = [];
            foreach($data as $item){
                if ( $item->difficulty == $req->difficulty ) {
                    $questions[] = $item;
                }
            }
        }

        return view('Admin.courses.Questions.Questions', 
        compact('categories', 'courses', 'chapters', 'lessons', 'questions', 'exams'));
    }

    public function add_q( Request $req ){
        $arr = $req->only('lesson_id', 'q_code', 'q_type', 'q_num',
        'month', 'year', 'section', 'difficulty', 'question', 'ans_type');
        $question_statue = Question::
        where('year', $req->year)
        ->where('month', $req->month)
        ->where('section', $req->section)
        ->where('q_num', $req->q_num)
        ->first();

        extract($_FILES['q_url']);
        $img_name = null;
        if ( !empty($name) ) {
            $img_name = now() . rand(1, 10000) . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
            $arr['q_url'] = $img_name;
        }

        if ( !empty($question_statue) && $req->q_type == 'Trail' ) {
            session()->flash('faild','Question Is Not Trail');
            return redirect()->back();
        }
        if ( empty($question_statue) && $req->q_type == 'Parallel' ) {
            session()->flash('faild','Question Is Not Parallel');
            return redirect()->back();
        }
        move_uploaded_file($tmp_name, 'images/questions/' . $img_name);
        $question = Question::create($arr);
        if ( !empty($req->mcq_ans) && count($req->mcq_ans) > 0 ) {
            for ($i=0,$end = count($req->mcq_ans); $i < $end; $i++) { 
                Mcq_ans::create([
                    'mcq_ans' => $req->mcq_ans[$i],
                    'mcq_answers' => $req->mcq_answers,
                    'q_id' => $question->id,
                ]);
            }
        }
        else {
            for ($i=0,$end = count($req->grid_ans); $i < $end; $i++) { 
                Grid_ans::create([
                    'grid_ans' => $req->grid_ans[$i], 
                    'q_id' => $question->id,
                ]);
            }
        }

        $ans_pdf_file = $_FILES['ans_pdf'];
        $ans_video_file = $_FILES['ans_video'];
        if ( !empty($req->ans_pdf) ) {
            for ($i=0, $end = count($req->ans_pdf); $i < $end; $i++) { 
                $pdf_name = now() . $ans_pdf_file['name'][$i];
                $v_name   = now() . $ans_video_file['name'][$i];
                $pdf_name = str_replace([':', ' ', '-'], 'X', $pdf_name);
                $v_name   = str_replace([':', ' ', '-'], 'X', $v_name);
                Q_ans::create([
                    'ans_pdf'   => $pdf_name,
                    'ans_video' => $v_name,
                    'Q_id'      => $question->id,
                ]);
                move_uploaded_file($ans_pdf_file['tmp_name'][$i], 'files/q_answers/' . $pdf_name);
                move_uploaded_file($ans_video_file['tmp_name'][$i], 'files/q_answers/' . $v_name);
            }
        }

        return redirect()->back();
    }

    public function question_type( Request $req ){
        $question_statue = Question::
        where('year', $req->year)
        ->where('month', $req->month)
        ->where('section', $req->section)
        ->where('q_num', $req->q_num)
        ->first();
        if ( $req->q_type == 'Trail' && !empty($question_statue) ) {
            return 'Question is not Trial';
        }
        if ( $req->q_type == 'Parallel' && empty($question_statue) ) {
            return 'Question is not Parallel';
        }
        return 1;
    }
}
