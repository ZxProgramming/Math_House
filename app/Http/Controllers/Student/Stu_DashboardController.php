<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Stu_DashboardController extends Controller
{
    
    public function index(){
        return view('Student.Dashboard.Dashboard');
    }
    
}
