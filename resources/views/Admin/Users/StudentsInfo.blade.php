<x-default-layout>
@include('Admin.Users.stu_header')

<div class='my-3'>
  <form class='d-flex' action="{{route('admin_filter')}}" method='POST'>
    @csrf
    <select name='admin_role' class='form-control mx-2'>
      <option disabled>
        Select Role
      </option>
      <option value='Marketing'>Marketing</option>
      <option value='Questions'>Questions</option>
      <option value='Teacher'>Teacher</option>
      <option value='Student'>Student</option>
      <option value='Lesson'>Lesson</option>
    </select>

    <button class='btn btn-primary'>
      Search
    </button>
  </form>
</div>
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Phone</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Email</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Parent Phone</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Parent Email</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $students as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->name}}
            </td>
            <td class="sorting_1">
                {{$item->phone}}
            </td>
            <td class="sorting_1">
                {{$item->email}}
            </td> 
            <td class="sorting_1">
                {{$item->parent_phone}}
            </td> 
            <td class="sorting_1">
                {{$item->parent_email}}
            </td>
        </tr>
        @endforeach
    
    </tbody>
</table>


</x-default-layout>