<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;

class PackagesController extends Controller
{
    
    public function index(){
        $package = Package::all();
        return view('Admin.Packages.Packages', compact('package'));
    }

}
