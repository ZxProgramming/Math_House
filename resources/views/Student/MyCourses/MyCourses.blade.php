
@php
  function fun_admin(){
    return 'student';
  }
@endphp
<x-default-layout>
<a href="{{route('stu_courses')}}">
    <div class="card-body text-center mb-2" style="border:1px solid #ddd;">
        <!--begin::Food img-->
        <img src="{{asset('images/inc/1.jfif')}}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
        <!--end::Food img-->
        <!--begin::Info-->
        <div class="mb-2">
            <!--begin::Title-->
            <div class="text-center">
                <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">Courses</span>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
</a> 

<a href="{{route('stu_chapters')}}">
    <div class="card-body text-center" style="border:1px solid #ddd;">
        <!--begin::Food img-->
        <img src="{{asset('images/inc/2.png')}}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
        <!--end::Food img-->
        <!--begin::Info-->
        <div class="mb-2">
            <!--begin::Title-->
            <div class="text-center">
                <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">Chapters</span>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
</a>
</x-default-layout>