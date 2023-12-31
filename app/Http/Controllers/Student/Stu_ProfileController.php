<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\MyEmail;

class Stu_ProfileController extends Controller
{
    public function index(){
        $user = User::where('id', auth()->user()->id)
        ->first();
        return view('Student.Profile.Profile', compact('user'));
    }

    public function stu_edit_profile( Request $req ){
        $img_name = null;
        extract($_FILES['image']);
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
        if ( !empty($req->parent_email) ) {
            $email = $req->parent_email;
            $type = "parent";
            $user_id = auth()->user()->id;
            Mail::To($email)->send(new MyEmail($email, $type, $user_id));
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
