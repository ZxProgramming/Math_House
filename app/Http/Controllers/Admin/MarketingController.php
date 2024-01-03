<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commission;

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

}
