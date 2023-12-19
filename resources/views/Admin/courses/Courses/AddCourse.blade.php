<x-default-layout>
@include('Admin.Users.teacher_header')

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

</x-default-layout>