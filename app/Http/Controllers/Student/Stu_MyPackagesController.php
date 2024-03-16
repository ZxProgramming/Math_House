<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentPackageOrder;
use App\Models\PaymentRequest;

class Stu_MyPackagesController extends Controller
{
    
    public function my_packages(){
        $exam = PaymentPackageOrder::
        leftJoin('payment_requests', 'payment_package_order.payment_request_id', '=', 'payment_requests.id')
        ->leftJoin('packages', 'payment_package_order.package_id', '=', 'packages.id')
        ->where('payment_package_order.state', 1)
        ->where('packages.module', 'Exam')
        ->where('user_id', auth()->user()->id)
        ->sum('payment_package_order.number');
        
        $questions = PaymentPackageOrder::
        leftJoin('payment_requests', 'payment_package_order.payment_request_id', '=', 'payment_requests.id')
        ->leftJoin('packages', 'payment_package_order.package_id', '=', 'packages.id')
        ->where('payment_package_order.state', 1)
        ->where('packages.module', 'Question')
        ->where('user_id', auth()->user()->id)
        ->sum('payment_package_order.number');
        
        $live = PaymentPackageOrder::
        leftJoin('payment_requests', 'payment_package_order.payment_request_id', '=', 'payment_requests.id')
        ->leftJoin('packages', 'payment_package_order.package_id', '=', 'packages.id')
        ->where('payment_package_order.state', 1)
        ->where('packages.module', 'Live')
        ->where('user_id', auth()->user()->id)
        ->sum('payment_package_order.number');
        
        return view('Student.Package.Package', compact('exam', 'questions', 'live'));
    }

}
