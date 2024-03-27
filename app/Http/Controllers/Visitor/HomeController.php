<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::all();
        return view('Visitor.Home.Home', compact('slider'));
    }
}
