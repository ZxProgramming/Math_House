<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentRequest;

class Stu_PaymentController extends Controller
{
    
    public function stu_payment_history(){
        $payments = PaymentRequest::
        where('user_id', auth()->user()->id)
        ->orderByDesc('id')
        ->get();

        return view('Student.Payment.History', compact('payments'));
    }

    public function payment_invoice( $id ){
        $payment = PaymentRequest::where('id', $id)
        ->first();

        return view('Student.Payment.Invoice', compact('payment'));
    }

}
