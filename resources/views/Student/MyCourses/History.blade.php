
@php
    $page_name = 'Quizze History';
@endphp
@section('title','Quizze History')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')

<table class="table">
    <thead>
        <th>#</th>
        <th>Date</th>
        <th>Quizze Details</th>
        <th>Quize</th>
        <th>Score</th>
        <th>Question No.</th>
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
                {{count($item->quizze->question)}}
            </td>
            <td>
                Right: {{$item->r_questions}}
                <br />
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
                            <button type="button" class="my-2 btn ans_item_btn btn-primary wallet_btn" data-bs-toggle="modal" data-bs-target="#modalCentermodalCenter{{$item->id}}">
                                View Answer
                            </button>
                            <div class="modal q_ans_item show_wallet d-none" id="modalCenter{{$item->id}}" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Quizze</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            Are You Sure You Want to View Answer For this Question ?
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary close_qiuzze_btn" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <a href="{{route('quizze_ques_ans', ['id' => $item->id])}}" class="btn btn-primary">OK</a>
                                    </div>
                                </div>
                                </div>
                            </div>
            
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
    let mistakes_questions = document.querySelectorAll('.mistakes_questions');
    let mistake_btn = document.querySelectorAll('.mistake_btn');
    let ans_item_btn = document.querySelectorAll('.ans_item_btn');
    let q_ans_item = document.querySelectorAll('.q_ans_item');
    let close_qiuzze_btn = document.querySelectorAll('.close_qiuzze_btn');
    
    for (let i = 0, end = ans_item_btn.length; i < end; i++) {
        ans_item_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == ans_item_btn[j] ) {
                    q_ans_item[j].classList.toggle('d-none');
                }
            }
        })
    }
    for (let i = 0, end = close_qiuzze_btn.length; i < end; i++) {
        close_qiuzze_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == close_qiuzze_btn[j] ) {
                    q_ans_item[j].classList.toggle('d-none');
                }
            }
        })
    }
    for (let i = 0, end = mistake_btn.length; i < end; i++) {
        mistake_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == mistake_btn[j] ) {
                    mistakes_questions[j].classList.toggle('d-none');
                }
            }
        });
    }
</script>
@endsection

@include('Student.inc.footer')
