
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@extends('Student.inc.nav')

@section('page_content')

<table class="table">
    <thead>
        <th>#</th>
        <th>Date</th>
        <th>Quizze Details</th>
        <th>Quize</th>
        <th>Score</th>
        <th>Score Details</th>
        <th>Time</th>
        <th>Action</th>
    </thead>

    <tbody>
        @foreach( $history as $item )
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->date}}
            </td>
            <td>
                Course : {{$item->lesson->chapter->course->course_name}}
                <br />
                Chapter : {{$item->lesson->chapter->chapter_name}}
                <br />
                Lesson : {{$item->lesson->lesson_name}}
                <br />
            </td>
            <td>
                {{$item->quizze->title}}
            </td>
            <td>
                {{$item->score}}
            </td>
            <td>
                Right: {{$item->r_questions}}
                Wrong: {{count($item->quizze->question) - $item->r_questions}}
            </td>
            <td>
                {{$item->time}}
            </td>
            <td>
            <button class="btn btn-primary mistake_btn">
                View Mistakes
            </button>
            <div class="app-email d-none card my-3 mistakes_questions">
                <div class="border-0">
                    <div class="row g-0  p-3">
                        @foreach ( $item->questions as $item )
                            @if ( !empty($item->question) )
                            {{$item->question}}
                            @endif
                            @if ( !empty($item->q_url) )
                            <img style="width: 200px; height: 200px;"
                                src="{{ asset('images/questions/' . $item->q_url) }}" />
                            @endif
                            <button class="btn btn-primary ans_item_btn my-2">View Answer</button>
                            <div class="ans_item d-none">
                                <b> Answer :
                                @if ( $item->ans_type == 'MCQ' )
                                    {{$item->mcq[0]->mcq_answers}}
                                @else 
                                {{$item->g_ans[0]->grid_ans}}
                                @endif
                                </b>
                                <br />
                                @foreach ( $item->q_ans as $q_ans )
                                @if ( !empty($q_ans->ans_video) )
                                <iframe width="560" height="315" src="{{$q_ans->ans_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            
                                @endif
                                @endforeach
                              </div>
                            @foreach ( $item->q_ans as $q_ans)
                            <a href="{{asset('files/q_pdf/' . $q_ans->ans_pdf)}}" class="btn btn-success my-2" download>Download Pdf {{$loop->iteration}}</a>
                            @endforeach
            
                            <a href="{{route('question_parallel', ['id' => $item->id])}}" class="btn btn-info my-2" >Solve Parallel</a>
            
                            <hr />
                        @endforeach
                    </div>
                </div>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let mistakes_questions = document.querySelector('.mistakes_questions');
    let mistake_btn = document.querySelector('.mistake_btn');
    let ans_item_btn = document.querySelectorAll('.ans_item_btn');
    let ans_item = document.querySelectorAll('.ans_item');
    
    for (let i = 0, end = ans_item_btn.length; i < end; i++) {
        ans_item_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == ans_item_btn[j] ) {
                    ans_item[j].classList.toggle('d-none');
                }
            }
        })
    }
    mistake_btn.addEventListener('click', () => {
        mistakes_questions.classList.toggle('d-none');
    })
</script>
@endsection

@include('Student.inc.footer')
