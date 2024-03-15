<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;

class V_LiveController extends Controller
{

    public function live_package(){
        
        $package = Package::
        where('module', 'Live')
        ->get();
        return view('Student.Exam.Exam_Package', compact('package'));
    }

}
