<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Session;

class TLiveController extends Controller
{
    
    public function index(){
        $sessions = Session::where('teacher_id', auth()->user()->id)
        ->get();

        return view('Teacher.Live.Live', compact('sessions'));
    }

}
