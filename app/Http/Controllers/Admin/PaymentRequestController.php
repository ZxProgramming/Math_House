<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentRequest;
use App\Models\PaymentOrder;
use App\Models\PaymentPackageOrder;
use App\Models\User;

class PaymentRequestController extends Controller
{

    public function payment_request(){
        $payment = PaymentRequest::
        where('state', '!=', 'Pendding')
        ->orderByDesc('id')
        ->get();
        
        return view('Admin.Payment_Request.Payment_Request', compact('payment'));
    }

    public function filter_payment_req( Request $req ){
        
        $payment = PaymentRequest::
        where('state', '!=', 'Pendding')
        ->where('payment_method_id', '!=', null)
        ->orderByDesc('id')
        ->get();
        $data = $payment;
        if ( !empty($req->from) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->created_at >= $req->from ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }
        if ( !empty($req->to) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->created_at <= $req->to ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }
        if ( !empty($req->state) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->state == $req->state ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }

        return view('Admin.Payment_Request.Payment_Request', compact('payment'));
    }

    public function filter_pendding_payment( Request $req ){
        
        $payment = PaymentRequest::
        where('state', 'Pendding')
        ->where('payment_method_id', '!=', null)
        ->orderByDesc('id')
        ->get();
        $data = $payment;
        if ( !empty($req->from) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->created_at >= $req->from ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }
        if ( !empty($req->to) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->created_at <= $req->to ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }
        if ( !empty($req->state) ) {
            $data = [];
            foreach ( $payment as $item ) {
                if ( $item->state == $req->state ) {
                    $data[] = $item;
                }
            }
            $payment = $data;
        }

        return view('Admin.Payment_Request.Pendding_Payment', compact('payment'));
    }

    public function pendding_payment(){
        $payment = PaymentRequest::
        where('state', 'Pendding')
        ->where('payment_method_id', '!=', null)
        ->orderByDesc('id')
        ->get();
        
        return view('Admin.Payment_Request.Pendding_Payment', compact('payment'));
    }

    public function approve_payment( $id ){
        PaymentRequest::
        where('id', $id)
        ->update(['state' => 'Approve']);
        
        $payment = PaymentRequest::
        where('id', $id)
        ->first();
        if ( $payment->module == 'Chapters' ) {
            PaymentOrder::where('payment_request_id', $id)
            ->update([
                'state' => 1,
                'date' => now(),
            ]);
        } else {
            PaymentPackageOrder::where('payment_request_id', $id)
            ->update([
                'state' => 1,
                'date' => now(),
            ]);
            
            $payment_package_order = PaymentPackageOrder::where('payment_request_id', $id)
            ->with('package')
            ->first();
            
            $number = $payment_package_order->package->number;
             
            if ( $payment_package_order->package->module == 'Exam' ) { 
                $old_number = User::where('id', $payment->user_id )
                ->first();
                $old_number = $old_number->exam_number;    
                User::where('id', $payment->user_id )
                ->update([
                    'exam_number' => $number + $old_number
                ]);
            }
            elseif( $payment_package_order->package->module == 'Question' ) {     
                $old_number = User::where('id', $payment->user_id )
                ->first();
                $old_number = $old_number->q_number;    
                User::where('id', $payment->user_id )
                ->update([
                    'q_number' => $number + $old_number
                ]);
            }
            elseif( $payment_package_order->package->module == 'Live' ) {     
                $old_number = User::where('id', $payment->user_id )
                ->first();
                $old_number = $old_number->live_number;    
                User::where('id', $payment->user_id )
                ->update([
                    'live_number' => $number + $old_number
                ]);
            }

        }
        

        return redirect()->back();
    }

    public function rejected_payment( $id ){
        PaymentRequest::
        where('id', $id)
        ->update(['state' => 'Rejected']);

        return redirect()->back();
    }

}
