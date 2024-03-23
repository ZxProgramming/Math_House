@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Add Student Package')

    <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; border-radius: 10px; padding: 30px;" >
        <form action="{{route('stu_package_add')}}" method="POST">
            @csrf
            <select name="user_id" class="form-control my-2">
                <option selected disabled>
                    Select Student ...
                </option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
            
            <select name="module" class="form-control my-2">
                <option selected disabled>
                    Select Package ...
                </option>
                <option value="Exam">
                    Exam
                </option>
                <option value="Question">
                    Question
                </option>
                <option value="Live">
                    Live
                </option>
            </select>

            <input type="number" name="number" class="form-control my-2" placeholder="The Number of Package" />

            <div class="d-flex my-2">
                <button class="btn btn-primary mr-2">
                    Submit
                </button>
                <button type="reset" class="btn btn-danger mx-2">
                    Clear
                </button>
            </div>
        </form>
    </div>
    
</x-default-layout>