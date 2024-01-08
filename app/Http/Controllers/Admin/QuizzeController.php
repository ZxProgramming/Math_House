<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quizze;

class QuizzeController extends Controller
{
    public function quizze(){
        $quizzes = quizze::all();
        return view('Admin.courses.Quizze.Quizze', compact('quizzes'));
    }

    public function del_quizze($id){
        quizze::where('id', $id)
        ->delete();

        return redirect()->back();
    }
}
