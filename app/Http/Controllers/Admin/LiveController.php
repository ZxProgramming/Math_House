<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;

class LiveController extends Controller
{
    
    public function index(){
        $sessions = Session::
        orderByDesc('id')
        ->get();
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();
        $teachers = User::
        where('position', 'teacher')
        ->get();

        return view('Admin.Live.Live', 
        compact('sessions', 'categories', 'courses', 'chapters', 'lessons', 'teachers'));
    }

    public function session_edit( Request $req ){
        $arr = $req->only('link', 'date', 'from', 'to', 'lesson_id', 
        'type', 'access_dayes', 'price', 'teacher_id', 'repeat');
        $sessions = Session::
        where('id', $req->id)
        ->update($arr);
        
        return redirect()->back();
    }

    public function del_session( $id ){
        Session::
        where('id', $id)
        ->delete();
        
        return redirect()->back();
    }

    public function add_session( Request $req ){
        $arr = $req->only('link', 'date', 'from', 'to', 'lesson_id', 
        'type', 'teacher_id', 'price', 'access_dayes', 'repeat');
        
        Session::create($arr);
        
        return redirect()->back();
    }

    public function session_g(){
        return view('Admin.Live.Groups');
    }

}
