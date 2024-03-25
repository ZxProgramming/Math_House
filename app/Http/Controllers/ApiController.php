<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiController extends Controller
{
    public function login( Request $req ){
        
        $credentials = $req->only('email', 'password');
        if ( Auth::attempt($credentials) ) {
            $user = User::where('email', $req->email)->first();
            $token = $user->createToken("personal access tokens")->plainTextToken;
            $user->token = $token;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }
    }
}
