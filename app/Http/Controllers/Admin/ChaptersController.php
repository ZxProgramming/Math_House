<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\ChapterPrice;

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
        if ( empty( $req->course_id ) ) {
            $chapters = Chapter::get(); 
        }
        else{
            $chapters = Chapter::
            where('course_id', $req->course_id)
            ->get(); 
        }
        $categories = Category::get();
        $courses = Course::get();
        $teachers = User::get();

        return view('Admin.courses.Chapters.Chapters', 
        compact('chapters', 'courses', 'categories', 'teachers'));
    }

    public function del_chapter($id){
        Chapter::
        where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function add_chapter( Request $req ){
        $arr = $req->only('chapter_name', 'ch_des', 'ch_url', 'pre_requisition', 
        'gain', 'course_id', 'teacher_id');
        $data = Chapter::create($arr);
        for ($i=0, $end = count($req->duration); $i < $end; $i++) { 
            ChapterPrice::create([
                'duration' => $req->duration[$i],
                'price' => $req->price[$i],
                'discount' => $req->discount[$i],
                'chapter_id' => $data->id,
            ]);
        }
        
        return redirect()->back();
    }

}
