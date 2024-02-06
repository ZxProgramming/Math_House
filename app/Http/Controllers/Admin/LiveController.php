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
use App\Models\PrivateRequest;
use App\Models\CancelSession;
use App\Models\SessionStudent;

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
        $users = User::
        where('position', 'student')
        ->get();
        $groups = SessionGroup::get();

        return view('Admin.Live.Live', 
        compact('sessions', 'groups', 'users', 'categories', 
        'courses', 'chapters', 'lessons', 'teachers'));
    }

    public function session_edit( $id, Request $req ){
        $arr = $req->only('link', 'name', 'date', 'from', 'to', 'lesson_id', 
        'type', 'access_dayes', 'price', 'teacher_id', 'repeat', 'group_id', 'material_link');
        $req->validate([
            'link' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'lesson_id' => 'required',
            'type' => 'required',
            'teacher_id' => 'required',
            'repeat' => 'required',
        ]);
        $sessions = Session::
        where('id', $id)
        ->update($arr);
        if ( !empty($req->user_id) ) {
            SessionStudent::where('session_id', $id)
            ->delete();

            for ($i=0, $end = count($req->user_id); $i < $end; $i++) { 
                SessionStudent::create([
                    'session_id' => $id,
                    'user_id' => $req->user_id[$i],
                ]);
            }
        }
        
        return redirect()->back();
    }

    public function del_session( $id ){
        Session::
        where('id', $id)
        ->delete();
        
        return redirect()->back();
    }

    public function add_session( Request $req ){
         
        $arr = $req->only('link', 'date', 'from', 'to', 'lesson_id', 'name', 'material_link',
        'type', 'teacher_id', 'price', 'access_dayes', 'repeat', 'group_id');
        
        $req->validate([
            'link' => 'required',
            'name' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'lesson_id' => 'required',
            'type' => 'required',
            'teacher_id' => 'required',
            'repeat' => 'required',
        ]);
        $session = Session::create($arr);
        if ( !empty($req->user_id) ) {
            for ($i=0, $end = count($req->user_id); $i < $end; $i++) { 
                SessionStudent::create([
                    'session_id' => $session->id,
                    'user_id' => $req->user_id[$i],
                ]);
            }
        }
        if ( !empty($req->r_day) ) {
            for ($i=0, $end = count($req->r_day); $i < $end; $i++) { 
                SessionDay::create([
                    'session_id' => $session->id,
                    'day' => $req->r_day[$i],
                    'times' => $req->repeat_num
                ]);
            }
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
        $req->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ]);
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
        $arr['state'] = isset($req->state) ? 1 : 0;
        $req->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ]);
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

    public function cancelation(){
        $cancelations = CancelSession::
        orderByDesc('id')
        ->where('statue', '!=', 'Approve')
        ->get();

        return view('Admin.Live.Cancelation', compact('cancelations'));
    }

    public function approve_cancelation( $id ){
        CancelSession::
        where('id', $id)
        ->update([
            'statue' => 'Approve'
        ]);

        return redirect()->back();
    }

    public function reject_cancelation( $id ){
        CancelSession::
        where('id', $id)
        ->update([
            'statue' => 'Rejected'
        ]);

        return redirect()->back();
    }

    public function private_request( ){
        $private_r = PrivateRequest::
        orderByDesc('id')
        ->get();
        
        return view('Admin.Live.PrivateRequest', compact('private_r'));
    }

    public function private_session_approve( $id ){
        PrivateRequest::
        where('id', $id)
        ->update([
            'status' => 'Confirm',
        ]);

        return redirect()->route('sessions');
    }

    public function private_request_rejected( Request $req ){
        PrivateRequest::
        where('id', $req->id)
        ->update([
            'status' => 'Rejected',
            'rejected_reason' => $req->reject_reason,
        ]);

        return redirect()->back();
    }

}
