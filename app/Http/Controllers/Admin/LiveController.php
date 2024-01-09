<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;

class LiveController extends Controller
{
    
    public function index(){
        $sessions = Session::
        orderByDesc('id')
        ->get();
        $categories = Category::all();
        $courses = Course::all();
        $chapters = Chapter::all();
        $lessons = Lesson::all();
        $teachers = User::
        where('position', 'teacher')
        ->get();

        return view('Admin.Live.Live', 
        compact('sessions', 'categories', 'courses', 'chapters', 'lessons', 'teachers'));
    }

}
