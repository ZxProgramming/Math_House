<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exam;
use App\Models\ExamCodes;
use App\Models\Course;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;

class V_ExamController extends Controller
{
    
    public function v_exams(){
        $exam_code = ExamCodes::all();
        $courses = Course::all();
        $categories = Category::all();

        return view('Visitor.Exam.Exam', compact('exam_code', 'courses', 'categories'));
    }

    public function filter_exam( Request $req ){
        // "year":"2024","month":"1","code_id":"1","course_id":"2"
        $exams = Exam::all();
        $exam_items = $exams;
        if ( !empty($req->year) ) {
            $exam_items = [];
            foreach ($exams as $item) {
                if ( $item->year == $req->year ) {
                    $exam_items[] = $item;
                }
            }
            $exams = $exam_items;
        }
        if ( !empty($req->month) ) {
            $exam_items = [];
            foreach ($exams as $item) {
                if ( $item->month == $req->month ) {
                    $exam_items[] = $item;
                }
            }
            $exams = $exam_items;
        }
        if ( !empty($req->code_id) ) {
            $exam_items = [];
            foreach ($exams as $item) {
                if ( $item->code_id == $req->code_id ) {
                    $exam_items[] = $item;
                }
            }
            $exams = $exam_items;
        }
        if ( !empty($req->course_id) ) {
            $exam_items = [];
            foreach ($exams as $item) {
                if ( $item->course_id == $req->course_id ) {
                    $exam_items[] = $item;
                }
            }
            $exams = $exam_items;
        }
        $exam_code = ExamCodes::all();
        $courses = Course::all();
        $categories = Category::all();

        return view('Visitor.Exam.Filter_Exams', 
        compact('exam_items', 'exam_code', 'courses', 'categories'));
    }

    public function exam_page( $id ){
        

        if ( empty(auth()->user()) ) {
            if ( !session()->has('previous_page') ) {
                session(['previous_page' => url()->current()]);
            }
            return redirect()->route('login.index');
        }
        else{
            session()->forget('previous_page');
            $user_package = UserPackage::
            select('*', 'user_packages.created_at AS package_date')
            ->leftJoin('users', 'user_packages.user_id', '=', 'users.id')
            ->leftJoin('packages', 'user_packages.package_id', '=', 'packages.id')
            ->where('user_packages.user_id', auth()->user()->id)
            ->where('module', 'Exam')
            ->where('exam_number', '>', 0)
            ->get();
            $duration = false;
            for ($i=0, $end = count($user_package); $i < $end; $i++) { 
                $toDate = Carbon::parse(now());
                $fromDate = Carbon::parse($user_package[$i]->package_date);
                $days = $toDate->diffInDays($fromDate);
                
               if ( $days <= $user_package[$i]->duration ) {
                $duration = true;
               }
            }
            
            if ( empty($user_package) || !$duration ) {
                $package = Package::
                where('module', 'Exam')
                ->get();
                return view('Student.Exam.Exam_Package', compact('package'));
            }
            else{
                User::with('package')
                ->where('id', auth()->user()->id)
                ->update([
                    'exam_number' => $user_package[0]->exam_number - 1
                ]);
                return $user_package;
            }
        }
    }

}
