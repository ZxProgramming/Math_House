<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Logincontroller extends Controller
{
    //
        public function index(){
                return view('pages.authanticated.login');                
                            
        }
        public function store(request $request){
                $request->validate([
                'email'=> 'required|email',
                'password'=> 'required'
                ],[
                'email.required'=> 'Email or Password Invalid',
                'email.email'=> 'Email or Password Invalid',
                'password.required'=> 'Email or Password Invalid',
                ]);

                                $user = User::where('email',$request->input('email'))->first();
                                    
                                        if(!$user){
                                return redirect()->route('login.index')->withErrors(['error'=>'The Email or Password Invalid']);

                                        }
                                        if(!password_verify($request->input('password'),$user->password)){
                                return redirect()->route('login.index')->withErrors(['error'=>'The  Password Invalid']);

                                        }
			Auth::loginUsingId($user->id);

                                $credetional = $request->only('email','password');

                                
                        $authantecated = Auth::attempt($credetional);
                        if(!$authantecated){
                                return redirect()->route('login.index')->withErrors(['error'=>'The Email or Password Invalid']);
                        }
                       if( $user->position == 'admin'){
                                 return redirect()->route('dashboard')->with(['success'=>'Loged In']);


                       }elseif( $user->position == 'teacher'){
                        return 'Welcome Teacher';
                       }

                           
        }
        
        public function destroy(){
                        Auth::logout();
                return redirect()->route('login.index');

        } 
}