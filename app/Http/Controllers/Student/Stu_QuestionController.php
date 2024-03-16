<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\QuestionHistory;

class Stu_QuestionController extends Controller
{
    public function question_history(){
        $q_history = QuestionHistory::where('user_id', auth()->user()->id)
        ->get();
        return view('Student.Question_History.Question_History', compact('q_history'));
    }
}
