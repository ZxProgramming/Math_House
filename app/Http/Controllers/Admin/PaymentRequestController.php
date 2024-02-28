<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentRequest;
use App\Models\PaymentOrder;

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
        PaymentOrder::where('payment_request_id', $id)
        ->update([
            'state' => 1,
            'date' => now(),
        ]);

        return redirect()->back();
    }

    public function rejected_payment( $id ){
        PaymentRequest::
        where('id', $id)
        ->update(['state' => 'Rejected']);

        return redirect()->back();
    }

}
