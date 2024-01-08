<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commission;
use App\Models\Affilate;

class MarketingController extends Controller
{
    public function commission(){
        $commission = Commission::all();
        return view('Admin.Marketing.Commissions', compact('commission'));
    }

    public function edit_commission( Request $req ){
        Commission::where('id', $req->id)
        ->update($req->only('precentage', 'state'));

        return redirect()->back();
    }

    public function users(){
        $users = Affilate::all();

        return view('Admin.Marketing.Users', compact('users'));
    }

    public function m_add_users(){
        return view('Admin.Marketing.Add_User');
    }

    public function affilate_add( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'organization');
        Affilate::create($arr);

        return redirect()->back();
    }

}
