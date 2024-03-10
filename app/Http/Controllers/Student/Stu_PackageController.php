<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\PaymentRequest;
use App\Models\PaymentPackageOrder;
use App\Models\Wallet;
use App\Models\User;

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
        $package = Package::where('id', $id)
        ->first();
        $price = $package->price;
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
        
        if ( $req->payment_method_id == 'Wallet' ) {
            $wallet = Wallet::
            where('student_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->sum('wallet'); 

            if ( $wallet < $price ) {
                session()->flash('faild', 'You Wallet Is not Enough'); 
                return redirect()->back();
            }
            $arr['state'] = 'Approve'; 
        }
        elseif ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            return redirect()->back();
        
        }
        else{ 
            $arr['payment_method_id'] = $req->payment_method_id;
        }
        $p_request = PaymentRequest::create($arr);
        $p_method = isset($p_request->method->payment) ? $p_request->method->payment : 'Wallet';
        $package_data = Cache::get('package');
        if ( $req->payment_method_id == 'Wallet' ) {
            if ( $package->module == 'Exam' ) {
                $user_acc = User::where('id', auth()->user()->id)
                ->first();

                User::where('id', auth()->user()->id)
                ->update([
                    'exam_number' => $package->number + $user_acc->exam_number
                ]);
            }
            elseif ( $package->module == 'Question' ) {
                $user_acc = User::where('id', auth()->user()->id)
                ->first();

                User::where('id', auth()->user()->id)
                ->update([
                    'q_number' => $package->number + $user_acc->q_number
                ]);
            }
            elseif ( $package->module == 'Live' ) {
                $user_acc = User::where('id', auth()->user()->id)
                ->first();

                User::where('id', auth()->user()->id)
                ->update([
                    'live_number' => $package->number + $user_acc->live_number
                ]);
            }
            Wallet::create([
                'student_id' => auth()->user()->id,
                'wallet' => -$price,
                'state' => 'Approve',
                'date' => now(),
                'payment_request_id' => $p_request->id,
            ]);
        }
        PaymentPackageOrder::create([
            'payment_request_id' => $p_request->id,
            'package_id' => $package_data->id,
            'date' => now(),
        ]);
        return view('Student.Order.Order', compact('package', 'price', 'p_method'));
    }
}
