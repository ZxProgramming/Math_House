
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')

<div>
    <b> Answer :
    @if ( $question->ans_type == 'MCQ' )
        {{$question->mcq[0]->mcq_answers}}
    @else
        {{$question->g_ans[0]->grid_ans}}
    @endif
    </b>
    <br />
    @foreach ( $question->q_ans as $q_ans )
    @if ( !empty($q_ans->ans_video) )
    <iframe width="560" height="315" src="{{$q_ans->ans_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    @endif
    @endforeach
  </div>
@foreach ( $question->q_ans as $q_ans)
<a href="{{asset('files/q_pdf/' . $q_ans->ans_pdf)}}" class="btn btn-success my-2" download>Download Pdf {{$loop->iteration}}</a>
@endforeach

@endsection

@include('Student.inc.footer')
