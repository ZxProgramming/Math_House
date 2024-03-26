
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    <style>
        .img_box{
            height: 300px;
            padding: 20px;
            position: relative;
        }
        .img_box img{
            width: 100%;
            height: 100%;
        }
        .img_cover{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            transition: all ease-in-out .3s;
            font-size: 27px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            color: transparent;
            cursor: pointer;
        }
        .img_cover:hover{
            background-color: #00000066;
            display: flex;
            color: aliceblue;
            justify-content: center;
            align-items: center;
        }
    </style>

    @include('success')
    @section('title','Slider')

    <form method="POST" style="width: 100%" class="col-4" action="{{route('add_img_slider')}}" enctype="multipart/form-data">
        @csrf
        <div class="text-center d-flex align-items-center justify-content-center">
            <input type="file" style="width: calc(100% - 200px)" name="slider_img" class="form-control" id="slider_image" />
            <button class="btn btn-primary mx-2">
                <i class="fa fa-plus"></i>
                Add Image
            </button>
        </div>
    </form>

    <div class="row">
        @foreach ( $imgs as $img )
        <form method="POST" class="col-4" action="{{route('update_slider')}}" enctype="multipart/form-data">
            @csrf
            <div class="  text-center" href="">
                <label for="image{{$img->id}}" class="img_box">
                    <img src="{{asset('images/Slider/' . $img->slider_img)}}" />
                    <div class="img_cover">Update</div>
                </label>
                <input type="hidden" name="id" value="{{$img->id}}" />
                <input type="file" name="slider_img" class="d-none" id="image{{$img->id}}">
                <button class="btn btn-primary">
                    Update
                </button>
            </div>
        </form>
        @endforeach
    </div>

</x-default-layout>