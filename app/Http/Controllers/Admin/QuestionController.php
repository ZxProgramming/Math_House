<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Question;

class QuestionController extends Controller
{
    
    public function question(){
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();
        $questions = Question::all();

        return view('Admin.courses.Questions.Questions', 
        compact('categories', 'courses', 'chapters', 'lessons', 'questions'));
    }

    public function q_edit( Request $req ){
        $arr = $req->only('question', 'q_type', 'year', 'month', 'q_code', 'section', 'q_num', 'difficulty');
        Question::where('id', $req->id)
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
        compact('categories', 'courses', 'chapters', 'lessons', 'questions'));
    }
}
