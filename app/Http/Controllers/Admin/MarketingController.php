<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Commission;
use App\Models\Affilate;
use App\Models\Payout;
use App\Models\PaymentMethod;
use App\Models\PromoCode;
use App\Models\PromoCourse;
use App\Models\Course;

class MarketingController extends Controller
{
    public function commission(){
        $commission = Commission::all();
        return view('Admin.Marketing.Commissions', compact('commission'));
    }

    public function edit_commission( Request $req ){
        $arr = $req->only('precentage', '');
        if ( isset($req->state) && !empty($req->state) ) {
            $arr['state'] = 1;
        }
        else{
            $arr['state'] = 0;
        }
        Commission::where('id', $req->id)
        ->update( $arr );

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
        $req->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'organization' => 'required',
        ]);
        Affilate::create($arr);

        return redirect()->back();
    }

    public function payout_r(){
        $payouts = Payout::where('statue', 'pendding')
        ->get();
        $payments = PaymentMethod::all();

        return view('Admin.Marketing.Payout', compact('payouts', 'payments'));
    }

    public function add_promo( Request $req ){
        $arr = $req->only('name', 'starts', 'ends', 'num_usage', 'discount', 'code');
        $req->validate([
            'name'  => 'required',
            'starts' => 'required|email',
            'ends' => 'required',
            'num_usage' => 'required|numeric',
            'discount' => 'required|numeric',
            'code' => 'required',
        ]);
        $promo = PromoCode::create($arr);
        foreach ($req->courses as $course) {
            PromoCourse::create([
                'promo_id' => $promo->id,
                'course_id' => $course
            ]);
        }

        return redirect()->back();
    }

    public function promo_code(){
        $promo = PromoCode::all();
        $courses = Course::all();

        return view('Admin.Marketing.Promo_Code', compact('promo', 'courses'));
    }

    public function edit_promo( $id, Request $req ){
        $arr = $req->only('name', 'starts', 'ends', 'num_usage', 'discount', 'code');
        $req->validate([
            'name'  => 'required',
            'starts' => 'required|email',
            'ends' => 'required',
            'num_usage' => 'required|numeric',
            'discount' => 'required|numeric',
            'code' => 'required',
        ]);
        PromoCode::where('id', $id)
        ->update($arr);
        PromoCourse::where('promo_id', $id)
        ->delete();

        foreach ($req->courses as $course) {
            PromoCourse::create([
                'promo_id' => $id,
                'course_id' => $course
            ]);
        }

        return redirect()->back();
    }

    public function del_promo( $id, Request $req ){
        $arr = $req->only('name', 'starts', 'ends', 'num_usage');
        PromoCode::where('id', $id)
        ->delete();

        return redirect()->back();
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

    public function reject_payout( $id, Request $req ){
        $payouts = Payout::where('id', $id)
        ->update([
            'statue' => 'rejected',
            'rejected_reason' => $req->rejected_reason,
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
