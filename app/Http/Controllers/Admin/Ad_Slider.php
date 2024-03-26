<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

class Ad_Slider extends Controller
{
    
    public function index(){
        $imgs = Slider::all();
        
        return view('Admin.Slider.Slider', compact('imgs'));
    }

    public function update_slider( Request $req ){
        extract($_FILES['slider_img']);
        $img_name = null;
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                Slider::where('id', $req->id)
                ->update([
                    'slider_img' => $img_name
                ]);
            }
        }
        
        move_uploaded_file($tmp_name, 'images/Slider/' . $img_name);

        return redirect()->back();
    }

    public function add_img_slider( Request $req ){
        extract($_FILES['slider_img']);
        $img_name = null;
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                Slider::create([
                    'slider_img' => $img_name
                ]);
            }
        }
        
        move_uploaded_file($tmp_name, 'images/Slider/' . $img_name);

        return redirect()->back();
    }



}
