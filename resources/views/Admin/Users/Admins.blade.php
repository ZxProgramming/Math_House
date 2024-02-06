
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.Users.admin_header')
    @section('title','Admins')

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
 @include('success')
 
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
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Roles</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Actions</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $sup_admins as $item )
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
            <td data-order="2023-10-25T00:00:00+03:00">
                @php
                $roles = DB::table('admin_roles')
                ->where('user_id', $item->id)
                ->get();
                $arr_roles = [];
                @endphp
                @foreach( $roles as $element )
                {{$element->admin_role}}
                @php
                $arr_roles[] = $element->admin_role;
                @endphp
                <br />
                @endforeach
            </td>
            <td> 
                Super Admin
            </td>
        </tr>
        @endforeach
        @foreach( $admins as $item )
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
            <td data-order="2023-10-25T00:00:00+03:00">
                @php
                $roles = DB::table('admin_roles')
                ->where('user_id', $item->id)
                ->get();
                $arr_roles = [];
                @endphp
                @foreach( $roles as $element )
                {{$element->admin_role}}
                @php
                $arr_roles[] = $element->admin_role;
                @endphp
                <br />
                @endforeach
            </td>
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('admin_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                            <div class="my-2 px-3">
                              <label>
                                Name
                              </label>
                              <input class='form-control' name="name" value="{{$item->name}}" placeholder="Name" />
                            </div>

                            <div class="my-2 px-3">
                              <label>
                                E-mail
                              </label>
                              <input class='form-control' name="email" value="{{$item->email}}" placeholder="E-mail" />
                            </div>

                            <div class="my-2 px-3">
                              <label>
                                Phone
                              </label>
                              <input class='form-control' name="phone" value="{{$item->phone}}" placeholder="Phone" />
                            </div>

                              <input type="hidden" value="{{$item->id}}" name="user_id" />
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$item->name}} ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_admin', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            </td>
        </tr>
        @endforeach
    
    </tbody>
</table>




</x-default-layout>