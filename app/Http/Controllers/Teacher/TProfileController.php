<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class TProfileController extends Controller
{
    
    public function index(){
        return view('Teacher.Profile.Profile');
    }

    public function t_edit_profile( Request $req ){
        $img_name = null;
        extract($_FILES['image']);
        $user = User::where('id', '!=', auth()->user()->id)
        ->where('email', $req->email)
        ->first();
        if ( !empty($user) ) {
            session()->flash('faild', 'Email Is Exist Please Change It');
            return redirect()->back();
        }
        $arr = $req->only('name', 'email', 'phone', 'nick_name');
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
           
        }
        $emails = [];
        
        if ( !empty($req->password) ) {
            $arr['password'] = bcrypt($req->password);
        }
        if ( !empty($req->parent_phone) ) {
            $arr['parent_phone'] = $req->parent_phone;
        }
        if ( !empty($req->extra_email) ) {
            $email = $req->extra_email;
            $type = "extra";
            $user_id = auth()->user()->id;
            Mail::To($email)->send(new MyEmail($email, $type, $user_id));
        } 
        move_uploaded_file($tmp_name, 'images/users/' . $img_name);
        User::where('id', auth()->user()->id)
        ->update($arr);
        return redirect()->back();
    }

}
