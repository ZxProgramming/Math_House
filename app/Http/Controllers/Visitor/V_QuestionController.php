<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class V_QuestionController extends Controller
{
    public function v_question(){
        return view('Visitor.Question.Question');
    }
}
