
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Users')

<a href="{{route('m_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    User List
</a> 
<a href="{{route('m_add_users')}}" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-150px h-35px">
    Add User 
</a>

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Phone</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Organization</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Total earned</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Wallet</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $users as $item )
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->organization}}</td>
            <td>{{$item->wallet}}</td>
        </tr>
        @endforeach
    
    </tbody>
</table>
</x-default-layout>