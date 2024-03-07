<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wallet;

class Stu_WalletController extends Controller
{
    
    public function index(){
        $wallets = Wallet::where('student_id', auth()->user()->id)
        ->get();
        $money = Wallet::where('student_id', auth()->user()->id)
        ->where('state', 'Approve')
        ->sum('wallet');

        return view('Student.Wallet.Wallet', compact('wallets', 'money'));
    }

    public function add_wallet( Request $req ){
        $arr = [
        'student_id' => auth()->user()->id,
        'wallet' => $req->wallet,
        'date' => now(),
        'state' => 'Pendding'
        ];

        $img_name = null;
        extract($_FILES['image']); 
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
                move_uploaded_file($tmp_name, 'images/wallet/' . $img_name);
            }
        }

        Wallet::create($arr);

        
        return redirect()->back();
    }

}
