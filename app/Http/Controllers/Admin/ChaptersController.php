<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;

class ChaptersController extends Controller
{
    
    public function chapter(){
        $chapters = Chapter::get();
        $categories = Category::get();
        $courses = Course::get();
        $teachers = User::get();

        return view('Admin.courses.Chapters.Chapters', 
        compact('chapters', 'courses', 'categories', 'teachers'));
    }

    public function chapter_edit( Request $req ){
        $arr = $req->only('chapter_name', 'ch_des', 'ch_price', 'course_id');
        Chapter::where('id', $req->chapter_id)
        ->update($arr);

        return redirect()->back();
    }
    
    public function ch_filter( Request $req ){
        $chapters = Chapter::
        where('course_id', $req->course_id)
        ->get();
        $courses = Course::get();

        return view('Admin.courses.Chapters.Chapters', 
        compact('chapters', 'courses'));
    }

    public function del_chapter($id){
        Chapter::
        where('id', $id)
        ->delete();

        return redirect()->back();
    }

}
