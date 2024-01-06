
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>

<a href="{{route('m_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    User List
</a> 
<a href="{{route('m_add_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    Add User 
</a>

</x-default-layout>