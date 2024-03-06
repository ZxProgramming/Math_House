
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')

<table class="table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Date</th> 
        <th>Score</th> 
        <th>View Mistakes</th>
    </thead>

    <tbody>
        @foreach( $exam_history as $item )
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->exams->title}}
            </td>
            <td>
                {{$item->date}}
            </td>
            <td>
                {{$item->score}}
            </td> 
            <td>
            <button class="btn btn-primary mistake_btn">
                View Mistakes
            </button>
            <div class="app-email d-none card my-3 mistakes_questions">
                <div class="border-0">
                    <div class="row g-0  p-3">
                        @foreach ( $item->exams->question as $item )
                            @if ( !empty($item->question) )
                                {{$item->question}}
                            @endif
                            @if ( !empty($item->q_url) )
                            <img style="width: 200px; height: 200px;"
                                src="{{ asset('images/questions/' . $item->q_url) }}" />
                            @endif
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
