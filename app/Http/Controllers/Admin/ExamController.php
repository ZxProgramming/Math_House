<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(){
        return view('Admin.courses.Exam.Exam');
    }
}
