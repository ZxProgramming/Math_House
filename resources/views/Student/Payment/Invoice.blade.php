
@php
    $page_name = 'Payment Invoice';
@endphp
@section('title','Payment Invoice')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')
<div class="col-xl-9 col-md-8 col-12 mb-md-0 my-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex align-items-center svg-illustration mb-3 gap-2">
              <img style="height: 80px; width: 80px;" src="{{asset('assets/media/logos/Maths_house.png')}}" />
              <span class="app-brand-text h3 mb-0 fw-bold">Math House</span>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <span class="me-1">Date Issues:</span>
              <span class="fw-semibold">{{$payment->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
            <h6 class="pb-2">Reciept:</h6>
            <img style="height: 150px; width: 150px;" src="{{asset('images/payment_reset/' . $payment->image)}}" />
           
          </div>
          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
            <h6 class="pb-2">Service</h6>
            {{$payment->module}}
          </div>
        </div>
      </div>
      <div class="table-responsive px-4">
        <h6 class="pb-2">Payment Method</h6>
        {{isset($payment->method->payment) ? $payment->method->payment : 'Wallet'}}
         
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <span class="fw-semibold">Total:</span>
            <span>${{$payment->price}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@include('Student.inc.footer')