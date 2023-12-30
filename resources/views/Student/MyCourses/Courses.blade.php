
@php
  function fun_admin(){
    return 'student';
  }
@endphp
<x-default-layout> 

<div style="display: flex;flex-wrap: wrap;">
    @foreach($courses as $course)
    <a href="" class="d-flex align-items-center justify-content-center m-2" 
    style="height:250px; font-size:24px; width: 250px; background-color: #e7e7e7; border:1px solid #eee">
    {{$course->course->course_name}}
    </a>
    @endforeach
</div>

</x-default-layout>