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
}
