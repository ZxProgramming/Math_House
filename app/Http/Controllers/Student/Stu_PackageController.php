<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\PaymentRequest;
use App\Models\PaymentPackageOrder;

use Illuminate\Support\Facades\Cache;

class Stu_PackageController extends Controller
{
    
    public function package_checkout($id){
        $package = Package::where('id', $id)
        ->first();
        $payment_methods = PaymentMethod::all();
        Cache::store('file')->put('package', $package, 10000);
        return view('Student.PackageCheckout.Checkout' ,compact('package', 'payment_methods'));
    }

    public function payment_package( $id, Request $req ){
        $arr = $req->only('payment_method_id');
        $package = Package::where('id', $id)
        ->first();
        $arr['price'] = $package->price;
        $arr['module'] = 'Package';
        $arr['user_id'] = auth()->user()->id;
        $img_state = true;

        extract($_FILES['image']);
        $img_name = null;
        for ($i=0, $end = count($name); $i < $end; $i++) { 
            if ( !empty($name[$i]) ) {
                    $img_state = false;
                    $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
                    $extention = explode('.', $name[$i]);
                    $extention = end($extention);
                    $extention = strtolower($extention);
                    if ( in_array($extention, $extention_arr)) {
                        $img_name = now() . rand(1, 10000) . $name[$i];
                        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                        $arr['image'] = $img_name;
                    }

                move_uploaded_file($tmp_name[$i], 'images/payment_reset/' . $img_name);
            }
        }
        if ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            return redirect()->back();
        
        }
        $p_request = PaymentRequest::create($arr);
        $price = $package->price;
        $p_method = $p_request->method->payment;
        $package_data = Cache::get('package');
        PaymentPackageOrder::create([
            'payment_request_id' => $p_request->id,
            'package_id' => $package_data->id,
            'date' => now(),
        ]);
        return view('Student.Order.Order', compact('package', 'price', 'p_method'));
    }
}
