

@php
    $page_name = 'Grade';
@endphp
@section('title', 'Lessons')
@include('Student.inc.header')
@extends('Student.inc.nav')

@section('page_content') 
 

<div class="d-flex justify-content-center align-items-center"
     style="height: 300px; font-size: 65px; font-weight: bold">
    {{$deg}}
</div>
@endsection

@include('Student.inc.footer')
