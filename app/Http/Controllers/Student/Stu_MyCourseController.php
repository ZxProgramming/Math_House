<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\PaymentRequest;
use App\Models\PaymentOrder;
use App\Models\quizze;
use App\Models\QuizzeStuAns;
use App\Models\StudentQuizze;
use App\Models\StudentQuizzeMistake;
use App\Models\Question;
use App\Models\Mcq_ans;
use App\Models\Chapter;

use Carbon\Carbon;

class Stu_MyCourseController extends Controller
{
    public function index()
    {
        $payment_request = PaymentRequest::where('user_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->get();
        $courses = [];
        foreach ($payment_request as $item) {
            foreach ($item->order as $value) {
                $courses[$value->course->course_name] = $value->course;
            }
        }
        return view('Student.MyCourses.MyCourses', compact('courses'));
    }

    public function courses()
    {
        $courses = Marketing::where('student_id', auth()->user()->id)
            ->where('course_id', '!=', null)
            ->orderBy('course_id')
            ->get();
        return view('Student.MyCourses.Courses', compact('courses'));
    }

    public function chapters()
    {
        $chapters = Marketing::where('student_id', auth()->user()->id)
            ->where('chapter_id', '!=', null)
            ->orderBy('chapter_id')
            ->get();
        return view('Student.MyCourses.Chapters', compact('chapters'));
    }

    public function stu_chapters($id)
    {
        // New Code
        $payment_order = PaymentOrder::where('state', 1)
        ->with('chapter')
        ->with('pay_req')
        ->get();

        $chapters = [];
        foreach ($payment_order as $item) {
            $newTime = Carbon::now()->subDays($item->duration);
            if ( $newTime > $item->date && $item->pay_req->user_id == auth()->user()->id ) {
                $chapters[] = $item;
            }
        }
        $course_id = $id;

        return view('Student.MyCourses.Chapters_Working', compact('chapters', 'course_id'));
    }

    public function stu_lessons($id, $L_id, $idea_num)
    {
        $payment_order = PaymentOrder::where('state', 1)
        ->with('chapter')
        ->with('pay_req')
        ->get();

        $chapters = [];
        $chapter_state = false;
        foreach ($payment_order as $item) {
            $newTime = Carbon::now()->subDays($item->duration);
            if ( $newTime > $item->date && $item->pay_req->user_id == auth()->user()->id && $item->chapter_id == $id ) {
                $chapter_state = true;
            }
        }
        $course_id = $id;
        $payment_request = [];
        if ($chapter_state) {
            $payment_request = PaymentRequest::where('user_id', auth()->user()->id)
                ->where('state', 'Approve')
                ->get();
        }
        $chapter_id = $id;  
        return view('Student.MyCourses.Lessons', compact('payment_request', 'chapter_id', 'L_id', 'idea_num'));

    }

    public function stu_quizze($quizze_id)
    {
        $quizze = quizze::where('id', $quizze_id)
            ->first();

        $stu_quizze = StudentQuizze::where('student_id', auth()->user()->id)
            ->with('quizze')
            ->get();

        foreach ($stu_quizze as $item) {
            if ($item->quizze->quizze_order < $quizze->quizze_order) {
                session()->flash('faild', 'You Must Pass Last Quizze First');
                return redirect()->back();
            }
        }
        
        return view('Student.MyCourses.Quizze', compact('quizze'));
    }


    public function quizze_ans(Request $req)
    {
        $quizze_id = json_decode($req->quizze)->id;
        $quizze = quizze::where('id', $quizze_id)
        ->first();
        return $req->all();
        $deg = 0;
        $mistakes = [];
        $total_question = 0;
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

       // "":["{\"q_id\":20}","{\"q_id\":1}"],"q_grid_ans":["1","1"]}
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

        $right_question = $deg;
        $deg =  $deg / $total_question * 100;
        $score = ($quizze->score / $total_question) * $right_question;

        $stu_q = StudentQuizze::where('student_id', auth()->user()->id)
            ->where('quizze_id', $req->quizze_id)
            ->first();

        if (empty($stu_q)) {
            $stu_quizze = StudentQuizze::create([
                'date' => now(),
                'lesson_id' => $quizze->lesson_id,
                'quizze_id' => $quizze->id,
                'student_id' => auth()->user()->id,
                'score' => $score,
                'time' => $req->timer,
                'r_questions' => $right_question,
            ]);

            foreach ($mistakes as $item) {
                StudentQuizzeMistake::create([
                    'student_quizze_id' => $stu_quizze->id,
                    'question_id' => $item->id
                ]);
            }
        }

        return view('Student.MyCourses.Grade', compact('deg', 'quizze', 'right_question', 'total_question', 'mistakes'));
    }

    public function question_parallel($id)
    {
        $question = Question::where('id', $id)
            ->first();
        $q_parallel = Question::where('month', $question->month)
            ->where('year', $question->year)
            ->where('section', $question->section)
            ->where('q_num', $question->q_num)
            ->where('id', '!=', $id)
            ->get();

        return view('Student.MyCourses.Parallel_Question', compact('q_parallel'));
    }

    public function solve_parallel($id, Request $req)
    {
        $question = Question::where('id', $id)
            ->first();
        $grade = false;
        if ($question->ans_type == 'MCQ') {
            if ($question->mcq[0]->mcq_answers == $req['ans' . $question->id]) {
                $grade = true;
            }
        } else {
            if ($question->g_ans[0]->grid_ans == $req['ans' . $question->id]) {
                $grade = true;
            }
        }
        return view('Student.MyCourses.Solve_Parallel', compact('grade', 'question'));
    }

    public function quizze_history()
    {
        $history = StudentQuizze::where('student_id', auth()->user()->id)
            ->get();

        return view('Student.MyCourses.History', compact('history'));
    }

    public function buy_chapter( $id ){
        
        $chapters = Chapter::where('id', $id)
        ->first(); 
        $prices = $chapters->price;
        $min = $prices[0]->price;
        foreach ($prices as $key => $price) {
            if ( $min > $price->price ) {
                $min = $price->price;
            }
        }
        $chapters_price = $min;
        
        Cache::store('file')->put('marketing', $chapters, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = [$chapters];
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

    public function dia_buy_chapters( Request $req ){
        $ids = json_decode($req->ids);
        $chapters = Chapter::whereIn('id', $ids)
        ->get();
        $chapters_price = 0;
        
        foreach ($chapters as $key => $chapter) {
            $prices = $chapter->price;
            $min = $prices[0]->price;
            foreach ($prices as $key => $price) {
                if ( $min > $price->price ) {
                    $min = $price->price;
                }
            }
            $chapters_price+= $min;
        }
        
        Cache::store('file')->put('marketing', $chapters, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = $chapters;
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

}
