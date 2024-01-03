<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\IdeaLesson;
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

    public function addLesson(request $req){
        $data = $req->only('lesson_name', 'chapter_id', 'teacher_id', 'lesson_des',
        'lesson_url', 'pre_requisition', 'gain');
        $arr = Lesson::create($data);
        for ($i=0, $end = count($req->idea); $i < $end; $i++) { 
            extract($_FILES['pdf']);
            $pdf_name = now() . $name[$i];
            $pdf_name = str_replace([':', '-', ' '], 'V', $pdf_name);
            IdeaLesson::create([
                'idea' => $req->idea[$i],
                'syllabus' => $req->syllabus[$i],
                'idea_order' => $req->idea_order[$i],
                'v_link' => $req->v_link[$i],
                'pdf' => $pdf_name,
                'pdf' => $pdf_name,
            ]);
            move_uploaded_file($tmp_name[$i], 'files/lessons_pdf/' . $pdf_name);
        }
        return redirect()->back();
    }
}

