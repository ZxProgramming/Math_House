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
use App\Models\SessionGroup;
use App\Models\GroupDay;
use App\Models\SessionDay;

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
        
        $session = Session::create($arr);
        for ($i=0, $end = count($req->r_day); $i < $end; $i++) { 
            SessionDay::create([
                'session_id' => $session->id,
                'day' => $req->r_day[$i],
                'times' => $req->repeat_num
            ]);
        }
        
        return redirect()->back();
    }

    public function session_g(){
        $session_g = SessionGroup::all();
        $teachers = User::where('position', 'teacher')
        ->get();
        $students = User::where('position', 'student')
        ->get();
        return view('Admin.Live.Groups', 
        compact('session_g', 'teachers', 'students'));
    }

    public function g_session_add( Request $req ){
        $arr = $req->only('name', 'teacher_id', 'state');
        $session_g = SessionGroup::create($arr);
        for ($i=0, $end = count($req->day); $i < $end; $i++) {
            GroupDay::create([
                'day' => $req->day[$i],
                'from' => $req->from[$i],
                'to' => $req->to[$i],
                'group_id' => $session_g->id,
            ]);
        }

        return redirect()->back();
    }

    public function g_session_edit( Request $req ){ 
        $arr = $req->only('name', 'teacher_id');
        SessionGroup::where('id', $req->id)
        ->update($arr);
        GroupDay::where('group_id', $req->id)
        ->delete();

        for ($i=0, $end = count($req->day); $i < $end; $i++) { 
            GroupDay::create([
                'day' => $req->day[$i],
                'from' => $req->from[$i],
                'to' => $req->to[$i],
                'group_id' => $req->id
            ]);
        }
        
        return redirect()->back();
    }

    public function del_session_g( $id ){
        SessionGroup::where('id', $id)
        ->delete();

        return redirect()->back();
    }

}
