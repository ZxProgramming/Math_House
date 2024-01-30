
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Add User')

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
    @error('organization')
    <div class="alert alert-danger">
    {{$message}}
    </div>
    @enderror
<a href="{{route('m_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    User List
</a> 
<a href="{{route('m_add_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    Add User 
</a>

<form class="px-3" action="{{route('affilate_add')}}" method="POST" enctype="multipart/form-data">
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
          <label>Organization</label>
          <input class='form-control' name="organization" placeholder="Organization" />
      </div>
      
      <div class="mt-3">
          <button class='btn btn-primary'>
              Submit
          </button>
      </div>
</form>
</x-default-layout>