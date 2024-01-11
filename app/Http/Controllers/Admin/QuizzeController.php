<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quizze;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;

class QuizzeController extends Controller
{
    public function quizze(){
        $quizzes = quizze::all();
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();

        return view('Admin.courses.Quizze.Quizze', 
        compact('quizzes', 'categories', 'courses', 'chapters', 'lessons'));
    }

    public function del_quizze($id){
        quizze::where('id', $id)
        ->delete();

        return redirect()->back();
    }
}
