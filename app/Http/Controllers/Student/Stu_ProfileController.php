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
        $emails = [];
        if ( !empty($req->password) ) {
            $arr['password'] = bcrypt($req->password);
        }
        if ( !empty($req->parent_email) ) {
            $emails[] = $req->parent_email;
        }
        if ( !empty($req->parent_phone) ) {
            $arr['parent_phone'] = $req->parent_phone;
        }
        if ( !empty($req->extra_email) ) {
            $emails[] = $req->extra_email;
        }
        foreach ($emails as $email) {
            $title = "Verfication Email";
            $body = "Verify email " . auth()->user()->email . " Belongs to";
            Mail::To($email)->send(new MyEmail($title, $body));
        }
        User::where('id', auth()->user()->id)
        ->update($arr);
        return redirect()->back();
    }
}
