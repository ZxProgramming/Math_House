<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\SessionStudent;
use App\Models\PaymentPackageOrder;
use App\Models\User;
use App\Models\IdeaLesson;
use App\Models\SmallPackage;

use Carbon\Carbon;

class Stu_LiveController extends Controller
{

    public function stu_mysessions(){

        $sessions = SessionStudent::
        where('user_id', auth()->user()->id)
        ->get();
        
        return view('Student.Live.Live', compact('sessions'));
    }

    public function use_live( $id ){
        $session = Session::where('id', $id)
        ->first();

        $package = PaymentPackageOrder::
        where('number', '>', 0)
        ->with('package_live')
        ->get();

        $small_package = SmallPackage::where('user_id', auth()->user()->id)
        ->where('module', 'Live')
        ->where('number', '>', 0)
        ->first();

        if ( !empty($small_package) ) {
            SmallPackage::where('user_id', auth()->user()->id)
            ->where('module', 'Live')
            ->where('number', '>', 0)
            ->update([
                'number' => $small_package->number - 1
            ]);
            // Return Exam
            $user = User::findorfail(auth()->user()->id);
            $user->session_attendance()->syncWithoutDetaching($session->id);

            return redirect($session->link);
        }
        
        foreach ( $package as $item ) {
            if ( $item->package_live != null ) {
                $newTime = Carbon::now()->subDays($item->package_live->duration); 
                if ( $item->date >= $newTime ) {
                    PaymentPackageOrder::
                    where('id', $item->id )
                    ->update([
                        'number' => $item->number - 1
                    ]);
                    $user = User::findorfail(auth()->user()->id);
                    $user->session_attendance()->syncWithoutDetaching($session->id);

                    return redirect($session->link);
                }
            }
        }

        session()->flash('faild', 'Your package Expired');
        return redirect()->back();
    }

    public function stu_myLiveCourse(){
        $user = User::where('id', auth()->user()->id)
        ->first();
        $sessions = $user->session_attendance; 

        return view('Student.Live.MyLiveCourses', compact('sessions'));
    }

    public function stu_live_chapters(){
        $user = User::where('id', auth()->user()->id)
        ->first();
        $sessions = $user->session_attendance; 

        return view('Student.Live.MyLiveChapters', compact('sessions'));
    }

    public function stu_myLiveLesson(){
        $user = User::where('id', auth()->user()->id)
        ->first();
        $sessions = $user->session_attendance; 

        return view('Student.Live.MyLiveLessons', compact('sessions'));
    }

    public function stu_live_lesson( $idea ){
        $user = User::where('id', auth()->user()->id)
        ->first();
        $sessions = $user->session_attendance; 
        $idea = IdeaLesson::where('id', $idea)
        ->first();

        return view('Student.Live.Idea', compact('sessions', 'idea'));
    }

}
