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
        $arr = $req->only('chapter_name', 'ch_des', 'ch_price', 
        'course_id', 'pre_requisition', 'gain', 'teacher_id');
        
        $req->validate([
            'chapter_name' => 'required',
            'teacher_id'   => 'required|numeric',
            'ch_price'     => 'required|numeric',
            'course_id'    => 'required|numeric',
           ]);
        $img_name = null;
        extract($_FILES['ch_url']);
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['ch_url'] = $img_name;
            }
            
        }
        move_uploaded_file($tmp_name, 'images/Chapters/' . $img_name);

        Chapter::where('id', $req->chapter_id)
        ->update($arr);

        ChapterPrice::where('chapter_id', $req->chapter_id)
        ->delete();

        for ($i=0, $end = count($req->duration); $i < $end; $i++) { 
            ChapterPrice::create([
                'duration' => $req->duration[$i],
                'price' => $req->price[$i],
                'discount' => $req->discount[$i],
                'chapter_id' => $req->chapter_id,
            ]);
        }

        return redirect()->back();
    }
    
    public function ch_filter( Request $req ){
        if ( empty( $req->course_id ) && empty( $req->category_id ) ) {
            $chapters = Chapter::get(); 
        }
        elseif ( empty( $req->course_id ) ) {
            $chapters = Chapter::
            leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
            ->where('category_id', $req->category_id)
            ->get(); 
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
        $arr = $req->only('chapter_name', 'ch_des', 'ch_price', 'pre_requisition', 
        'gain', 'course_id', 'teacher_id');
        
        $req->validate([
            'chapter_name' => 'required',
            'teacher_id'   => 'required|numeric',
            'ch_price'     => 'required|numeric',
            'course_id'    => 'required|numeric',
           ]);
        $img_name = null;
        extract($_FILES['ch_url']);
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['ch_url'] = $img_name;
            }
            
        }
        move_uploaded_file($tmp_name, 'images/Chapters/' . $img_name);
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
