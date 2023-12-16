<x-default-layout>
@include('Admin.Users.stu_header')

<form class="px-3" method="POST" action="{{route('student_add')}}">
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
        <label>Parent E-mail</label>
        <input class='form-control' name="parent_email" placeholder="Parent E-mail" />
    </div>
    <div class='my-3'>
        <label>Parent Phone</label>
        <input class='form-control' name="parent_phone" placeholder="Parent Phone" />
    </div>
    <div class='my-3'>
        <label>Password</label>
        <input class='form-control' type="password" name="password" placeholder="Password" />
    </div> 

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