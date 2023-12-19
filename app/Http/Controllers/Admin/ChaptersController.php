<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chapter;
use App\Models\Course;

class ChaptersController extends Controller
{
    
    public function chapter(){
        $chapters = Chapter::get();
        $courses = Course::get();

        return view('Admin.courses.Chapters.Chapters'
        , compact('chapters', 'courses'));
    }
}
