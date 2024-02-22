
@php
    $page_name = 'Package';
@endphp
@section('title','Packages')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')
        
<div class="row g-4">
    @foreach ( $package as $item )
    <a href="{{route('package_checkout', ['id' => $item->id])}}">
        <div class="col-xl-4 col-lg-6 col-md-6 py-3">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h5 class="fw-normal">Price {{$item->price}}$</h5>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                <h4 class="mb-1">{{$item->name}}</h4>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><small>Duration {{$item->duration}}days</small></a>
                </div>
                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
            </div>
            </div>
        </div>
        </div>
    </a>
    @endforeach
  </div>
@endsection

@include('Student.inc.footer')