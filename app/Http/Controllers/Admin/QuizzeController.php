<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public function quizze(){
        return view('Admin.courses.Quizze.Quizze');
    }
}
