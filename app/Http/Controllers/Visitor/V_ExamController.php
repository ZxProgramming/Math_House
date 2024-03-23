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
use App\Models\Question;
use App\Models\UserPackage;
use App\Models\PaymentPackageOrder;
use App\Models\ScoreList;
use App\Models\ExamHistory;
use App\Models\ExamMistake;
use App\Models\SmallPackage;

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
            $payments = PaymentPackageOrder::
            where('state', 1)
            ->with('pay_req')
            ->with('package')
            ->get();
            $user = User::where('id', auth()->user()->id)
            ->first();

            $small_package = SmallPackage::where('user_id', auth()->user()->id)
            ->where('module', 'Exam')
            ->where('number', '>', 0)
            ->first();

            if ( !empty($small_package) ) { SmallPackage::where('user_id', auth()->user()->id)
                ->where('module', 'Exam')
                ->where('number', '>', 0)
                ->update([
                    'number' => $small_package->number - 1
                ]);
                // Return Exam
                $exam = Exam::where('id', $id)
                ->first();
                
                return view('Visitor.Exam.Exam_Question', compact('exam'));
            }

            foreach ( $payments as $item ) { 
                $newTime = Carbon::now()->subDays($item->package->number); 

                if ( $item->package->module == 'Exam' && 
                $item->pay_req->user_id == auth()->user()->id &&
                $item->date > $newTime &&
                $item->number > 0
                 ) 
                 {  

                    PaymentPackageOrder::where('id', $item->id)
                    ->update([
                        'number' => $item->number - 1
                    ]);

                    // Return Exam
                    $exam = Exam::where('id', $id)
                    ->first();
                    
                    return view('Visitor.Exam.Exam_Question', compact('exam'));
                }
            } 

            $package = Package::
            where('module', 'Exam')
            ->get();
            return view('Student.Exam.Exam_Package', compact('package'));
             
            
        }
    }

    public function e_package(){
        
        $package = Package::
        where('module', 'Exam')
        ->get();
        return view('Student.Exam.Exam_Package', compact('package'));
    }


    public function exam_ans( $id, Request $req )
    {
        $exam = Exam::where('id', $id)
        ->first();
        $deg = 0;
        $mistakes = [];
        $total_question = 0;
        if ( isset($req->q_answers) ) {
            foreach ( $req->q_answers as $item ) {
                $total_question++;
                $mcq_item = json_decode($item);
                $question = Question::where('id', $mcq_item->q_id)
                ->first();

                $stu_solve = $question->mcq[0]->mcq_answers;
                $arr = ['A', 'B', 'C', 'D']; 
                if ( isset($mcq_item->answer) && $stu_solve == $mcq_item->answer ) {
                    $deg++;
                } else {
                    $mistakes[] = $question;
                }
            }
        }

       // "":["{\"q_id\":20}","{\"q_id\":1}"],"q_grid_ans":["1","1"]}
        if ( isset($req->q_grid_answers) ) {
            for ( $i = 0, $end = count($req->q_grid_answers); $i < $end; $i++ ) {
                $total_question++;
                $grid_item = json_decode($req->q_grid_answers[$i]);
                $question = Question::where('id', $grid_item->q_id)
                ->first();
                $grid_ans = @$question->g_ans[0]->grid_ans;
                $answer = $req->q_grid_ans[$i];
                if ($grid_ans == $answer) {
                    $deg++;
                } else {
                    $mistakes[] = $question;
                }
            }
        }

        $right_question = $deg;
        $score = ScoreList::
        where('score_id', $exam->score_id)
        ->where('question_num', $right_question)
        ->first();
        $score = $right_question == 0 ? 0 : $score->score;
        $grade = $exam->pass_score < $score ? true : false;
        $deg =  $deg / $total_question * 100;

        // $stu_q = DiagnosticExamsHistory::where('user_id', auth()->user()->id)
        //     ->where('diagnostic_exams_id', $req->quizze_id)
        //     ->first();

        if (empty($stu_q)) {
            $stu_exam = ExamHistory::create([
                'date' => now(),
                'user_id' => auth()->user()->id,
                'diagnostic_exams_id' => $exam->id,
                'score' => $score,
                'time' => $req->timer, 
                'r_questions' => $right_question,
                'exam_id' => $exam->id,
            ]);

            foreach ($mistakes as $item) {
                ExamMistake::create([
                    'student_exam_id' => $exam->id,
                    'question_id' => $item->id
                ]);
            }
        }

        return view('Visitor.Exam.Grade', compact('deg', 'grade', 'score', 'exam', 'right_question', 'total_question', 'mistakes'));
    }
    
    public function exam_history(){
        
    }

}
