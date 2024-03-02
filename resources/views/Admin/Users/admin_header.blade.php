
@include('Admin.Users.AddAdmin')
<div class="d-flex">
<a href="{{route('role_admins_list')}}" class="btn btn-primary w-150px mx-3 h-45px">
    Role Admin List
</a>
<a href="{{route('admins_list')}}" class="btn btn-primary w-150px mx-3 h-45px">
    Admin List
</a>
<a href="#" class="btn btn-primary w-150px mx-3 h-45px" data-bs-toggle="modal"
data-bs-target="#kt_modal_create_question">
    Add Admin
</a>
</div>