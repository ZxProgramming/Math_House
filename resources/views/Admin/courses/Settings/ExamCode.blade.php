
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Exam Code')
    @error('exam_code')
    <div class="alert alert-danger">
    {{$message}}
    </div>
    @enderror
<div class="my-2">
    <select class="form-control">
        <option disabled selected>
            Exams Codes
        </option>
        @foreach($exam_codes as $item)
        <option value="{{$item->id}}">
            {{$item->exam_code}}
        </option>
        @endforeach
    </select>
</div>

<form class="my-2" action="{{route('code_exam_add')}}" method="POST">
    @csrf
    <label class="py-2">Enter Exam Code</label>
    <div class="d-flex">
        <input name="exam_code" class="form-control" placeholder="Enter Exam Code" />
        <button class="btn btn-primary mx-2">
            Add
        </button>
    </div>
</form>
</x-default-layout>