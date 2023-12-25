<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;

class LessonController extends Controller
{
// This Start About Lessons 
    public function index(){
        $categories = Category::all();
        $courses    = Course::all();
        $chapters   = Chapter::all();
        $lessons    = Lesson::all();
        $teachers   = User::all();
        return view('Admin.lessons.lesson',compact('categories','courses','chapters', 'lessons', 'teachers'));

    }

    public function lesson_edit( Request $req ){
        $arr = $req->only('lesson_name', 'lesson_des', 'chapter_id');
        Lesson::where('id', $req->id)
        ->update($arr);

        return redirect()->back();
    }

    public function del_lesson($id){
        Lesson::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function addLesson(request $request){
    dd( $request);
    }
}

