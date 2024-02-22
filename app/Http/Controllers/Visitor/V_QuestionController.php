<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\User;
use App\Models\Package;

class V_QuestionController extends Controller
{
    public function v_question(){
        return view('Visitor.Question.Question');
    }

    public function v_filter_question( Request $req ){
        $question = Question::all();
        $q_items = $question;
        if ( !empty($req->year) ) {
            $q_items = [];
            foreach ($question as $item) {
                if ( $item->year == $req->year ) {
                    $q_items[] = $item;
                }
            }
            $question = $q_items;
        }
        if ( !empty($req->month) ) {
            $q_items = [];
            foreach ($question as $item) {
                if ( $item->month == $req->month ) {
                    $q_items[] = $item;
                }
            }
            $question = $q_items;
        }
        if ( !empty($req->section) ) {
            $q_items = [];
            foreach ($question as $item) {
                if ( $item->section == $req->section ) {
                    $q_items[] = $item;
                }
            }
            $question = $q_items;
        }
        if ( !empty($req->q_code) ) {
            $q_items = [];
            foreach ($question as $item) {
                if ( $item->q_code == $req->q_code ) {
                    $q_items[] = $item;
                }
            }
            $question = $q_items;
        }
        if ( !empty($req->q_num) ) {
            $q_items = [];
            foreach ($question as $item) {
                if ( $item->q_num == $req->q_num ) {
                    $q_items[] = $item;
                }
            }
            $question = $q_items;
        }

        return view('Visitor.Question.Filter_Question', 
        compact('q_items'));
    }

    public function q_page( $id ){
        

        if ( empty(auth()->user()) ) {
            if ( !session()->has('previous_page') ) {
                session(['previous_page' => url()->current()]);
            }
            return redirect()->route('login.index');
        }
        else{
            session()->forget('previous_page');
            $user_package = User::with('package')
            ->where('id', auth()->user()->id)
            ->where('q_number', '>', 0)
            ->first();
            
            if ( !isset($user_package->package) || count($user_package->package) == 0 ) {
                $package = Package::
                where('module', 'Question')
                ->get();
                return view('Student.Exam.Exam_Package', compact('package'));
            }
            else{
                User::with('package')
                ->where('id', auth()->user()->id)
                ->update([
                    'q_number' => $user_package->q_number - 1
                ]);
                return $user_package;
            }
        }
    }
}
