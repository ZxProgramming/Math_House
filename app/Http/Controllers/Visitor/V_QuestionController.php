<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\User;
use App\Models\Package;
use App\Models\UserPackage;
use App\Models\PaymentPackageOrder;
use App\Models\QuestionTime;

use Carbon\Carbon;

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
            $payments = PaymentPackageOrder::
            where('state', 1)
            ->with('pay_req')
            ->with('package')
            ->get();
            $user = User::where('id', auth()->user()->id)
            ->first();

            foreach ( $payments as $item ) { 
                $newTime = Carbon::now()->subDays($item->package->number);
                $question = Question::where('id', $id)
                ->first();

                if ( $item->package->module == 'Question' && 
                $item->pay_req->user_id == auth()->user()->id &&
                $item->date > $newTime &&
                $user->q_number > 0
                 ) 
                 {  

                    User::where('id', auth()->user()->id)
                    ->update([
                        'q_number' => $user->q_number - 1
                    ]);
                     return view('Visitor.Question.Show_Question', compact('question')); 
                }
            } 
            $package = Package::
            where('module', 'Question')
            ->get();
            return view('Student.Exam.Exam_Package', compact('package'));
             
            
        }
    }

    public function q_sol( Request $req ){ 

        $ans = false;
        $question = [];
        if ( isset($req->q_answers[0]) ) {
            $solve = json_decode($req->q_answers[0]);
           // {"q_id":18,"mcq_id":"1","answer":"A"}
           $question = Question::where('id', $solve->q_id)
           ->first();
           $stu_solve = $question->mcq[0]->mcq_answers;
           if ( $stu_solve == $solve->answer ) {
                $ans = true;
           }
        }
        else {
            // "q_grid_answers":["{\"q_id\":1}"],"q_grid_ans":["1"]}
            $q_id = json_decode($req->q_grid_answers[0]);
            $question = Question::where('id', $q_id->q_id)
            ->first();
            $solve = $question->g_ans;

            foreach ($solve as $item) {
                if ( $item->grid_ans == $req->q_grid_ans[0] ) {
                    $ans = true;
                }
            }
          
            
        } 
             
        return view('Visitor.Question.Grade', compact('ans', 'question'));
    }
}
