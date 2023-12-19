<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // This Start About Lessons 
            public function index(){
                return view('Admin.lessons.lesson');
            }
}
