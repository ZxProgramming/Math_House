<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamCodes;

class CourseSettingController extends Controller
{
    public function course_setting(){
        $exam_codes = ExamCodes::all();
        return view('Admin.courses.Settings.ExamCode',
        compact('exam_codes'));
    }

    public function code_exam_add( Request $req ){
        $req->validate([
            'exam_code' => 'required',
        ]);
        ExamCodes::create($req->only('exam_code'));
        return redirect()->back();
    }

}
