<x-default-layout>
@include('Admin.Users.header')

<form class="px-3" method="POST" action="">
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
    
    <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="Marketing" name="roles[]" checked='checked'>
        <label class="form-check-label">Marketing</label>
    </div>
    
    <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="Questions" name="roles[]" checked='checked'>
        <label class="form-check-label">Questions</label>
    </div>
    
    <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="Teacher" name="roles[]" checked='checked'>
        <label class="form-check-label">Teacher</label>
    </div>
    
    <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="Student" name="roles[]" checked='checked'>
        <label class="form-check-label">Student</label>
    </div>
    
    <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
        <input class="form-check-input" type="checkbox" value="Lesson" name="roles[]" checked='checked'>
        <label class="form-check-label">Lesson</label>
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