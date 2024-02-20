<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\PaymentRequest;
use App\Models\quizze;
use App\Models\QuizzeStuAns;
use App\Models\StudentQuizze;
use App\Models\StudentQuizzeMistake;
use App\Models\Question;
use App\Models\Mcq_ans;

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
        $payment_request = PaymentRequest::where('user_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->get();
        $course_id = $id;

        return view('Student.MyCourses.Chapters_Working', compact('payment_request', 'course_id'));
    }

    public function stu_lessons($id, $L_id, $idea_num)
    {
        $payment_request = PaymentRequest::where('user_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->get();
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

        return view('Student.MyCourses.Quizze', compact('quizze_id'));
    }

    public function api_quizze(Request $req)
    {
        $quizze = quizze::where('id', $req->quizze_id)
            ->first();
        $answers = [];
        foreach ($quizze->question as $quizze) {
            $answers[] = Mcq_ans::where('id',  $quizze->id)
                ->get();
        }




        return response()->json(['quizze' => $quizze, 'question' => $answers]);

        // return response()->json(5);
        // $id = $req->id;
        // $age = $req->age;
        // return response()->json("22221id");
    }

    public function quizze_ans(Request $req)
    {
        $quizze = quizze::where('id', $req->quizze_id)
            ->first();
        $deg = 0;
        $mistakes = [];
        foreach ($quizze->question as $question) {
            $answer = $req['ans' . $question->id];
            $arr = ['A', 'B', 'C', 'D'];
            if (in_array($answer, $arr)) {
                $mcq_ans = $question->mcq[0]->mcq_answers;
                if ($mcq_ans == $answer) {
                    $deg++;
                } else {
                    $mistakes[] = $question;
                }
            } else {
                $grid_ans = @$question->g_ans[0]->grid_ans;
                if ($grid_ans == $answer) {
                    $deg++;
                } else {
                    $mistakes[] = $question;
                }
            }
        }

        $right_question = $deg;
        $total_question = count($quizze->question);
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
                'time' => '$req->time',
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
}
