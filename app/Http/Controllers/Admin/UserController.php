<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function admins(){
        $admins = User::where('position', 'admin')
        ->get();
        $sup_admins = User::where('position', 'super_admin')
        ->get();

        return view('Admin.Users.Admin',
        compact('admins', 'sup_admins'));
    }
}
