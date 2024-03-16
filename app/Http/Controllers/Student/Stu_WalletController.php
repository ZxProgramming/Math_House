<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wallet;
use App\Models\PaymentMethod;

class Stu_WalletController extends Controller
{
    
    public function index(){
        $wallets = Wallet::where('student_id', auth()->user()->id)
        ->get();
        $money = Wallet::where('student_id', auth()->user()->id)
        ->where('state', 'Approve')
        ->sum('wallet');
        $payment_methods = PaymentMethod::all();

        return view('Student.Wallet.Wallet', compact('wallets', 'money', 'payment_methods'));
    }

    public function add_wallet( Request $req ){
        $arr = [
        'student_id' => auth()->user()->id,
        'wallet' => $req->wallet,
        'date' => now(),
        'state' => 'Pendding',
        'payment_method_id' => $req->payment_method_id,
        ];

        if ( empty($req->wallet) ) {
            session()->flash('faild', 'You Must Enter a Wallet');
            return redirect()->back();
        }
        $img_name = null;
        $img = false;
        extract($_FILES['image']);
        foreach ( $name as $k => $item ) {
            if( !empty($item) ){
                $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                $extension = explode('.', $item);
                $extension = end($extension);
                $extension = strtolower($extension);
                if ( in_array($extension, $extension_arr) ) {
                    $img_name = rand(0, 1000) . now() . $item;
                    $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                    $arr['image'] = $img_name;
                    move_uploaded_file($tmp_name[$k], 'images/wallet/' . $img_name);
                    $img = true;
                }
            }
        }

        if ( $img) {
            Wallet::create($arr);
        } else { 
            session()->flash('faild', 'You Must Attach Image');
        }
        

        
        return redirect()->back();
    }

}
