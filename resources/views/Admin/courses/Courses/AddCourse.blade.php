
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.courses.Courses.course_header')
    @section('title','Add Course')

<form class="px-3" action="{{route('course_add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="info_section">
        <div class='my-3'>
            <label>Course Name</label>
            <input class='form-control' name="course_name" placeholder="Course Name" />
        </div>
        <div class='my-3'>
            <label>Category</label>
            <select name="category_id" class="form-control">
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
        <div class='my-3'>
            <label>Description</label>
            <textarea class='form-control' name="course_des" placeholder="Description" ></textarea>
        </div>
        
        <div class='my-3'>
            <label>Image</label>
            <input class='form-control' type="file" name="course_url" placeholder="Image" />
        </div>
        <button type="button" class="btn btn-success details_btn">
            Next
        </button>
    </div>

    <div class="details_section d-none">
        <div class='my-3'>
            <label>Teachers</label>
            <select name="teacher_id" class="form-control">
                @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">
                    {{$teacher->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class='my-3'>
            <label>Pre requisition</label>
            <textarea class='form-control' name="pre_requisition" placeholder="Pre requisition" ></textarea>
        </div>
        <div class='my-3'>
            <label>What you gain</label>
            <textarea class='form-control' name="gain" placeholder="What you gain" ></textarea>
        </div>
        <button type="button" class="btn btn-success pricing_btn">
            Next
        </button>
    </div>

    <div class="priceing_section d-none">
        <div class='my-3'>
            <label>Duration</label>
            <input class='form-control' name="duration" placeholder="Duration" />
        </div>
        <div class='my-3'>
            <label>Price</label>
            <input class='form-control' name="course_price" placeholder="Price" />
        </div>
        <div class='my-3'>
            <label>Discount</label>
            <input class='form-control' name="discount" placeholder="Discount" />
        </div>
        <div class="mt-3">
            <button class='btn btn-primary'>
                Submit
            </button>
        </div>
    </div>
</form>

<script>
    let info_section = document.querySelector('.info_section');
    let details_section = document.querySelector('.details_section');
    let priceing_section = document.querySelector('.priceing_section');
    let details_btn = document.querySelector('.details_btn');
    let pricing_btn = document.querySelector('.pricing_btn');
    details_btn.addEventListener('click', () => {
        info_section.classList.add('d-none');
        details_section.classList.remove('d-none');
    });
    pricing_btn.addEventListener('click', () => {
        details_section.classList.add('d-none');
        priceing_section.classList.remove('d-none');
    });
</script>
</x-default-layout>