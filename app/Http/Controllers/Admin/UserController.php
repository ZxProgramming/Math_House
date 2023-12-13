<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin_role;

class UserController extends Controller
{
    public function admins(){
        $admins = Admin_role::
        get();
        $sup_admins = Admin_role::
        get();

        return view('Admin.Users.Admin',
        compact('admins', 'sup_admins'));
    }
}
