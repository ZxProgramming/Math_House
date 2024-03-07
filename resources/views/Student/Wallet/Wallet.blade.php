
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content') 

<h3 class="text-center text-success my-3">
    Total Wallet: ${{$money}}
</h3>

<div class="text-center">
    <button type="button" class="btn btn-primary wallet_btn" data-bs-toggle="modal" data-bs-target="#modalCenter">
        Add to Wallet
    </button>
</div>

<form action="{{route('add_wallet')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal show_wallet fade show d-none" id="modalCenter" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Add Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Wallet</label>
                <input type="number" name='wallet' min="1" id="nameWithTitle" class="form-control" placeholder="Enter Number">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">
                    Upload Image
                </label>
                <input type="file" name="image" id="emailWithTitle" class="form-control" />
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary close_wallet_btn" data-bs-dismiss="modal">
                Close
            </button>
            <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <th>#</th>
        <th>Wallet</th> 
        <th>Date</th>
        <th>State</th> 
    </thead>

    <tbody>
        @foreach( $wallets as $item )
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->wallet}}
            </td>
            <td>
                {{$item->date}}
            </td>
            <td>
                {{$item->state}}
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let wallet_btn = document.querySelector('.wallet_btn');
    let show_wallet = document.querySelector('.show_wallet');
    let btn_close = document.querySelector('.btn-close');
    let close_wallet_btn = document.querySelector('.close_wallet_btn');

    wallet_btn.addEventListener('click', () => {
        show_wallet.classList.remove('d-none');
    })
    btn_close.addEventListener('click', () => {
        show_wallet.classList.add('d-none');
    })
    close_wallet_btn.addEventListener('click', () => {
        show_wallet.classList.add('d-none');
    })
</script>

@endsection

@include('Student.inc.footer')
