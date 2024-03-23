<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\User;
use App\Models\SmallPackage;

class PackagesController extends Controller
{
    
    public function index(){
        $package = Package::all();
        return view('Admin.Packages.Packages', compact('package'));
    }

    public function del_package( $id ){
        Package::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function edit_package( $id, Request $req ){
        $req->validate([
            'name'  => 'required',
            'module' => 'required',
            'number' => 'required|numeric',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);
        $arr = $req->only('name', 'module', 'number', 'price', 'duration');
        Package::where('id', $id)
        ->update( $arr );

        return redirect()->back();
    }

    public function add_package( Request $req ){
        $req->validate([
            'name'  => 'required',
            'module' => 'required',
            'number' => 'required|numeric',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);
        $arr = $req->only('name', 'module', 'number', 'price', 'duration');
        Package::create($arr);

        return redirect()->back();
    }

    public function add_stu_package(){
        $users = User::where('position', 'student')
        ->get();
        
        return view('Admin.Packages.Add_Package', compact('users'));
    }

    public function stu_package_add( Request $req ){
        $arr = $req->only('user_id', 'module', 'number');
        SmallPackage::create($arr);
        
        return redirect()->back();
    }

}
