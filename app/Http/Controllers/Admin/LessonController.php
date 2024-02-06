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
        $arr = $req->only('lesson_name', 'lesson_des', 'chapter_id', 'teacher_id', 
        'pre_requisition', 'gain', 'chapter_id');
        $req->validate([
            'lesson_name'=>'required',
            'chapter_id'=>'required|numeric', 
            'idea_order'=>'required|numeric',
            ]);
        $img_name = null;
        extract($_FILES['lesson_url']);
        if( !empty($name) ){
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
            $arr['lesson_url'] = $img_name;   
        }
        move_uploaded_file($tmp_name, 'images/lesson/' . $img_name);
        
        Lesson::where('id', $req->lesson_id)
        ->update($arr);
        IdeaLesson::where('lesson_id', $req->lesson_id)
        ->delete();
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
                'lesson_id' => $req->lesson_id
            ]);
            move_uploaded_file($tmp_name[$i], 'files/lessons_pdf/' . $pdf_name);
        }

        return redirect()->back();
    }

    public function del_lesson($id){
        Lesson::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function filter_lesson( Request $req ){
        $categories = Category::all();
        $courses    = Course::all();
        $chapters   = Chapter::all();
        if( empty($req->chapter_id) ){
            $lessons = Lesson::get();
        }
        else{ 
            $lessons = Lesson::
            where('chapter_id', $req->chapter_id)
            ->get();
        }
        $teachers   = User::all();
        return view('Admin.lessons.lesson',compact('categories','courses','chapters', 'lessons', 'teachers'));

    }

    public function addLesson(request $req){
        $data = $req->only('lesson_name', 'chapter_id', 'teacher_id', 'lesson_des',
        'pre_requisition', 'gain');
        $req->validate([
            'lesson_name'=>'required',
            'chapter_id'=>'required|numeric', 
            'idea_order'=>'required|numeric',
            ]);
        $img_name = null;
        extract($_FILES['lesson_url']);
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $data['lesson_url'] = $img_name;
            }
            
        }
        move_uploaded_file($tmp_name, 'images/lesson/' . $img_name);

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
                'lesson_id' => $arr->id,
            ]);
            move_uploaded_file($tmp_name[$i], 'files/lessons_pdf/' . $pdf_name);
        }
        return redirect()->back();
    }
}

