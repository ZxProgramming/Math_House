
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.Users.teacher_header')
    @section('title','Add Teacher')

    @error('name')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('email')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror 
    @error('phone')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('course_id')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
<form class="px-3" action="{{route('add_teacher')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='my-3'>
        <label>Name</label>
        <input class='form-control' name="name" placeholder="Name" />
    </div>
    <div class='my-3'>
        <label>E-mail</label>
        <input class='form-control' name="email" placeholder="E-mail" />
    </div>
    <div class='my-3'>
        <label>Phone</label>
        <input class='form-control' name="phone" placeholder="Phone" />
    </div>
    
    <div class='my-3'>
        <label>Password</label>
        <input class='form-control' type="password" name="password" placeholder="Password" />
    </div> 

    <div class='my-3'>
        <label>Category</label>
        <select name="category_id" class="form-control sel_cate">
            <option disabled selected>
                Select Category
            </option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">
                {{$category->cate_name}}
            </option>
            @endforeach
        </select>
    </div>
    <input class="categories" value="{{$categories}}" type="hidden" />
    <input class="courses" value="{{$courses}}" type="hidden" />
    <div class='my-3'>
        <label>Course</label>
        <select name="course_id" class="form-control sel_course">
            <option disabled selected>
                Select Course
            </option>
        </select>
    </div>

    <input class="form-control" type="file" name="image" />

    <div class="mt-3">
        <button class='btn btn-primary'>
            Submit
        </button>
        <button class='btn btn-danger' type="reset">
            Clear
        </button>
    </div>
</form>

<script>
        let sel_cate = document.querySelector('.sel_cate');
        let sel_course = document.querySelector('.sel_course');
        let courses = document.querySelector('.courses');
        courses = courses.value;
        courses = JSON.parse(courses);
        
        sel_cate.addEventListener('change', () => {
            sel_course.innerHTML = `
            <option disabled selected>
                Select Course
            </option>`;
            courses.forEach(element => {
                if ( sel_cate.value == element.category_id ) {
                    sel_course.innerHTML += `
                    <option value="${element.id}">
                        ${element.course_name}
                    </option>`;
                }
            });
        });
    </script>
</x-default-layout>