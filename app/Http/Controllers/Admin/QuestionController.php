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
}
