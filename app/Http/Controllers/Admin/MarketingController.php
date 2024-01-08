<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commission;
use App\Models\Affilate;
use App\Models\Payout;
use App\Models\PaymentMethod;

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

    public function payout_r(){
        $payouts = Payout::where('statue', 'pendding')
        ->get();
        $payments = PaymentMethod::all();

        return view('Admin.Marketing.Payout', compact('payouts', 'payments'));
    }

    public function filter_payment( Request $req ){
        if ( !empty($req->date_from) && !empty($req->date_from) ) {
            $arr = Payout::where('statue', 'pendding')
            ->where('date', '>=', $req->date_from )
            ->where('date', '<=', $req->date_to )
            ->get();
        }
        elseif ( !empty($req->date_from) ) {
            $arr = Payout::where('statue', 'pendding')
            ->where('date', '>=', $req->date_from ) 
            ->get();
        }
        elseif ( !empty($req->date_to) ) {
            $arr = Payout::where('statue', 'pendding') 
            ->where('date', '<=', $req->date_to )
            ->get();
        }
        else{           
            $arr = Payout::where('statue', 'pendding')
            ->get();
        }
        $payouts = [];
        foreach ($arr as $item) {
            if ( $item->payment_method == $req->payment_id ) {
                $payouts[] = $item;
            }
        }
        $payouts = empty($req->payment_id) ? $arr : $payouts;
        $payments = PaymentMethod::all();

        return view('Admin.Marketing.Payout', compact('payouts', 'payments'));
    }

    public function reject_payout( $id ){
        $payouts = Payout::where('id', $id)
        ->update([
            'statue' => 'rejected'
        ]);

        return redirect()->back();
    }

    public function accept_payout( $id ){
        $payouts = Payout::where('id', $id)
        ->update([
            'statue' => 'approve'
        ]);

        return redirect()->back();
    }

}
