<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sign_upEmail;

use App\Models\User;
use App\Models\ConfirmSign;
use App\Models\Country;
use App\Models\City;

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
                        if ($user->state == 'hidden') {
                                return redirect()->route('login.index')->withErrors(['error'=>'The Email Is Not Enable']);
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
        

        public function market_login(Request $request){
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
                                return redirect()->back();

                        }
                        if ($user->state == 'hidden') {
                                return redirect()->back();
                        }
                        if(!password_verify($request->input('password'),$user->password)){
                                return redirect()->back();

                        }
			Auth::loginUsingId($user->id);

                                $credentials = $request->only('email','password');

                                
                        $authantecated = Auth::attempt($credentials);
                        
                        if($authantecated){
                                $user = User::where('email',$request->email)->first();
                                $token = $user->createToken("user")->plainTextToken;
                                $user->token =$token ;
                                if( $user->position == 'admin'){
                                        return redirect()->route('course_payment');
                                }
                                elseif( $user->position == 'teacher'){
                                        return redirect()->route('course_payment');
                                }
                                elseif( $user->position == 'student'){
                                        return redirect()->route('course_payment');
                                }
                                return view();
                        }
                        if(!$authantecated){
                                return redirect()->back();
                        }

                           
        }
        
        public function destroy(){
                Auth::logout();
                return redirect()->route('login.index');

        } 

        public function sign_up(){
               $countries = Country::all();
                $cities = City::all();
                return view('pages.authanticated.sign_up', 
                compact('countries', 'cities'));
        }

        public function sign_up_add( Request $req ){

                        $req->validate([
                                'f_name'=>'required',
                                'l_name'=>'required',
                                'name'=>'required',
                                'phone'=>'required',
                        ]);
                        
                 if ( $req->password != $req->conf_password ) {
                        session()->flash('faild','Confirm Password Wrong');
                        return redirect()->back();
                 }
                 
                $arr = $req->only('f_name', 'l_name', 'email', 'name', 'phone', 'city_id', 'grade');
                $arr['position'] = 'student';
                $arr['state'] = 'hidden';
                $arr['password'] = bcrypt($req->password);
                $code = rand(0, 10000);

                         $email = $arr['email'];
                        $check = User::where('email',$email);

                        if($check){
                                
                                return redirect()->back()->withErrors(['email'=>'This Email Already Exist']) ; 
                        }
                $user = ConfirmSign::create([
                        'code' => $code,
                        'email' => $req->email,
                ]); 
                Mail::To($req->email)->send(new Sign_upEmail($req->email, $code));
                $user = User::create($arr);
                
                $token = $user->createToken("user")->plainTextToken;
                 $user->token =$token;
                return redirect()->route('stu_dashboard');
        }

        public function signup_confirm( Request $req ){
                $user = ConfirmSign::where('code', $req->code)
                ->where('email', $req->email)
                ->first();

                if ( !empty($user) ) {
                        User::where('email', $req->email)
                        ->update([
                                'state' => 'Show'
                        ]);

                }
              ;
                // return redirect()->back();
        }

        public function profile_confirm(Request $req){
                if ( $req->type == 'extra' ) {
                        User::where('id', $req->user_id)
                        ->update([
                                'extra_email' => $req->email
                        ]);
                }
                if ( $req->type == 'parent' ) {
                        User::where('id', $req->user_id)
                        ->update([
                                'parent_email' => $req->email
                        ]);
                }

                return redirect()->route('stu_dashboard');
        }

}