<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentMethod;

class PaymentController extends Controller
{
    
    public function payment(){
        $payments = PaymentMethod::all();

        return view('Admin.Payment.Payment', 
        compact('payments'));
    }

    public function payment_add( Request $req ){
        $img_name = null;
        $arr = $req->only('payment', 'statue');
        $req->validate([
            'payment' => 'required',
        ]);
        extract($_FILES['logo']);
        if ( !empty($name) ) {
            $img_name = now() . rand(1, 10000) . $name;
            $img_name = str_replace([':', '-', ' '], 'X', $img_name);
            $arr['logo'] = $img_name;
        }
        PaymentMethod::create($arr);
        move_uploaded_file($tmp_name, 'images/payment/' . $img_name);

        return redirect()->back();
    }

    public function del_payment( Request $req ){
        PaymentMethod::where('id', $req->id)
        ->delete();

        return redirect()->back();
    }

    public function payment_edit( Request $req ){
        $img_name = null;
        $arr = $req->only('payment');
        $req->validate([
            'payment' => 'required',
        ]);
        $arr['statue'] = isset($req->statue) ? 1 : 0;
        extract($_FILES['logo']);
        if ( !empty($name) ) {
            $img_name = now() . rand(1, 10000) . $name;
            $img_name = str_replace([':', '-', ' '], 'X', $img_name);
            $arr['logo'] = $img_name;
        }
        PaymentMethod::where('id', $req->id)
        ->update($arr);
        move_uploaded_file($tmp_name, 'images/payment/' . $img_name);

        return redirect()->back();
    }

}
