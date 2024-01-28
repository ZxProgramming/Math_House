<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentRequest;

class PaymentRequestController extends Controller
{

    public function payment_request(){
        $payment = PaymentRequest::
        where('state', '!=', 'Pendding')
        ->orderByDesc('id')
        ->get();
        
        return view('Admin.Payment_Request.Payment_Request', compact('payment'));
    }

    public function pendding_payment(){
        $payment = PaymentRequest::
        where('state', 'Pendding')
        ->orderByDesc('id')
        ->get();
        
        return view('Admin.Payment_Request.Payment_Request', compact('payment'));
    }

    public function approve_payment( $id ){
        PaymentRequest::
        where('id', $id)
        ->update(['state' => 'Approve']);

        return redirect()->back();
    }

    public function rejected_payment( $id ){
        PaymentRequest::
        where('id', $id)
        ->update(['state' => 'Rejected']);

        return redirect()->back();
    }

}
