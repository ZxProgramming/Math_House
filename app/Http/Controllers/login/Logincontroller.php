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
        public function store(Request $request){
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

                                $credentials = $request->only('email','password');

                                
                        $authantecated = Auth::attempt($credentials);
                        
                        if($authantecated){
                                $user = User::where('email',$request->email)->first();
                                $token = $user->createToken("user")->plainTextToken;
                                $user->token =$token ;
                                if( $user->position == 'admin'){
                                          return redirect()->route('dashboard')->with(['success'=>'Loged In']);
         
         
                                }
                                elseif( $user->position == 'teacher'){
                                 return 'Welcome Teacher';
                                }
                                elseif( $user->position == 'student'){
                                 return redirect()->route('stu_dashboard');
                                }
                                return view();
                        }
                        if(!$authantecated){
                                return redirect()->route('login.index')->withErrors(['error'=>'The Email or Password Invalid']);
                        }

                           
        }
        
        public function destroy(){
                Auth::logout();
                return redirect()->route('login.index');

        } 

        public function sign_up(){
                return view('pages.authanticated.sign_up');
        }
        public function sign_up_add( Request $req ){
                 if ( $req->password != $req->conf_password ) {
                        session()->flash('faild','Confirm Password Wrong');
                        return redirect()->back();
                 }
                $arr = $req->only('email', 'name', 'phone', 'parent_phone');
                $arr['position'] = 'student';   
                $arr['password'] = bcrypt($req->password);
                $user = User::create($arr);
                
                $token = $user->createToken("user")->plainTextToken;
                 $user->token =$token;
                return redirect()->route('stu_dashboard');
        }
}