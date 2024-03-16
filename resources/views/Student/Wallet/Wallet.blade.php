
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content') 

@include('success')

<h3 class="text-center text-success my-3">
    Total Wallet: ${{$money}}
</h3>

<div class="text-center">
    <button type="button" class="btn btn-primary wallet_btn" data-bs-toggle="modal" data-bs-target="#modalCenter">
        Wallet Recharge
    </button>
</div>

<form action="{{route('add_wallet')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal show_wallet fade show d-none" id="modalCenter" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Add to Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Wallet</label>
                <input type="number" name='wallet' min="1" id="nameWithTitle" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                    @foreach( $payment_methods as $item )
                    <div class="custom-control custom-checkbox">
                        <input type="radio" name="payment_method_id" value="{{$item->id}}" class="custom-control-input payment_method_radio" id="customCheck80{{$item->id}}" checked />
                        <label class="custom-control-label" for="customCheck80{{$item->id}}">{{$item->payment}}
                            <img style="height:50px; width:70px;" src="{{asset('images/payment/' . $item->logo)}}" class="pr15" />
                        </label>
                        
                    </div>
                    <div class="bt_details">
                        <p>
                            {{$item->description}}
                        </p>
                    </div>

                    <input type="file" id="reset_img" name="image[]" class="form-control d-none" />	
                    <label class="upload_img d-none" style="cursor: pointer;" for="reset_img">
                        <h3>
                            Upload Reseipt
                        </h3>
                    </label>
                    @endforeach
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

<div class="text-center my-2">
<button class="btn btn-primary history_btn">
    History
    <i class="fa fa-arrow-down arrow_icon"></i>
</button>
</div>

<table class="table show_history d-none">
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
    let history_btn = document.querySelector('.history_btn');
    let show_history = document.querySelector('.show_history');
    let arrow_icon = document.querySelector('.arrow_icon');

    let wallet_btn = document.querySelector('.wallet_btn');
    let show_wallet = document.querySelector('.show_wallet');
    let btn_close = document.querySelector('.btn-close');
    let close_wallet_btn = document.querySelector('.close_wallet_btn');

    history_btn.addEventListener('click', () => {
        show_history.classList.toggle('d-none');
        arrow_icon.classList.toggle('fa-arrow-down');
        arrow_icon.classList.toggle('fa-arrow-up');
    })

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
<script>
                    
    let payment_method_radio = document.querySelectorAll('.payment_method_radio');
    let upload_img = document.querySelectorAll('.upload_img');
    upload_img[upload_img.length - 1].classList.remove('d-none');
    for (let i = 0, end = payment_method_radio.length; i < end; i++) {
        payment_method_radio[i].addEventListener('change', ( e ) => {
                for (let j = 0; j < end; j++) {
                    if ( e.target == payment_method_radio[j] ) {
                        upload_img[j].classList.remove('d-none');
                    }
                    else{
                        upload_img[j].classList.add('d-none');
                    }
            }
        })
    }
</script>

@endsection

@include('Student.inc.footer')
