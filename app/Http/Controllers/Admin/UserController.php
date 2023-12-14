<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin_role;

class UserController extends Controller
{
    public function role_admins(){
        $admins = User::where('position', 'admin')
        ->get();

        return view('Admin.Users.RoleAdmin',
        compact('admins'));
    }

    public function role_del_admin($id){
        Admin_role::where('user_id', $id)
        ->delete();

        return redirect()->back();
    }

    public function role_admin_edit( Request $req ){
        Admin_role::where('user_id', $req->user_id)
        ->delete();
        foreach ( $req->roles as $item ) {
            Admin_role::create([
                'user_id' => $req->user_id,
                'admin_role' => $item,
            ]);
        }
        return redirect()->back();
    }

    public function admins(){
        $sup_admins = User::where('position', 'super_admin')
        ->get();
        $admins = User::where('position', 'admin')
        ->get();

        return view('Admin.Users.Admins', compact('sup_admins', 'admins'));
    }

    public function del_admin( $id ){
        User::where('id', $id)
        ->where('position', '!=', 'super_admin')
        ->delete();

        return redirect()->back();
    }

    public function admin_edit( Request $req ){
        User::where('id', $req->user_id)
        ->where('position', '!=', 'super_admin')
        ->update($req->only('name', 'email', 'phone'));

        return redirect()->back();
    }
}
