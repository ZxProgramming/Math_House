<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logincontroller extends Controller
{
    //
        public function index(){
                return view('pages.authanticated.login');                
        }
}