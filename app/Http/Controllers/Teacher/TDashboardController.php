<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TDashboardController extends Controller
{
    
    public function index(){
        return view('Teacher.Dashboard.Dashboard');
    }
    
}
