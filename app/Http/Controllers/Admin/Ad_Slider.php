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
        // extt
    }

}
