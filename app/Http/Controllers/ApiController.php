<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Marketing;
use App\Models\Chapter;
use App\Models\Lesson;

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

    public function logout( Request $request ){
        $user = $request->user();
             $request->user() ;
        if ( empty($user) ) {
            return response()->json(['faild' => 'You are not Login'], 403);
        }
        if ( $user->tokens()->delete() ) {
            return response()->json(['success' => 'Logout Success'], 200);
        }
    }

    public function api_stu_my_courses( Request $req ){
        $courses = Marketing::where('student_id', auth()->user()->id)
        ->where('course_id', '!=', null)
        ->orderBy('course_id')
        ->with('course')
        ->get();

        for ($i=0, $end = count($courses); $i < $end; $i++) { 
            $courses[$i]['storage'] = 'https://login.mathshouse.net/'. 
            public_path() . '/images/courses/' . $courses[$i]['course']['course_url'];
        }
        
        return response()->json([
            'courses' => $courses,
        ], 200);
    }

    public function api_stu_my_chapter( Request $req ){
        $chapters = Chapter::all();
        
        return response()->json([
            'chapters' => $chapters,
        ], 200);
    }

    public function api_stu_lesson( Request $req ){
        $lessons = Lesson::all();

        return response()->json([
            'lessons' => $lessons
        ], 200);
    }

}
