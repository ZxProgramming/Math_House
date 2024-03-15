
@php
    $page_name = 'Payment History';
@endphp
@section('title','Payment History')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')

<table class="table">
    <thead>
        <th>#</th>
        <th>Date</th> 
        <th>Service</th>
        <th>Payment Method</th>
        <th>Price</th> 
        <th>Rejected Reason</th> 
        <th>Statues</th>
        <th>Details</th>
    </thead>

    <tbody>
        @foreach( $payments as $item )
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->created_at}}
            </td>
            <td>
                {{$item->module}}
            </td>
            <td>
                {{isset($item->method->payment) ? $item->method->payment : 'Wallet' }}
            </td>
            <td>
                {{$item->price}}
            </td> 
            <td>
                {{$item->rejected_reason}}
            </td> 
            <td>
                {{$item->state}}
            </td>
            <td>
                <a href="{{route('payment_invoice', ['id'=> $item->id])}}" class="btn btn-primary">
                    Invoice
                </a>
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
