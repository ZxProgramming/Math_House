
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.Users.admin_header')
    @section('title','Role Admin')

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Role</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $admins as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->name}}
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
                        <form method="POST" action="{{route('role_admin_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              @if(in_array('Marketing', $arr_roles))
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Marketing" name="roles[]" checked='checked'>
                                <label class="form-check-label">Marketing</label>
                              </div>
                              @else
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Marketing" name="roles[]">
                                <label class="form-check-label">Marketing</label>
                              </div>
                              @endif
                              @if(in_array('Questions', $arr_roles))
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Questions" name="roles[]" checked='checked'>
                                <label class="form-check-label">Questions</label>
                              </div>
                              @else
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Questions" name="roles[]">
                                <label class="form-check-label">Questions</label>
                              </div>
                              @endif 
                              @if(in_array('Teacher', $arr_roles))
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Teacher" name="roles[]" checked='checked'>
                                <label class="form-check-label">Teacher</label>
                              </div>
                              @else
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Teacher" name="roles[]">
                                <label class="form-check-label">Teacher</label>
                              </div>
                              @endif  
                              @if(in_array('Student', $arr_roles))
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Student" name="roles[]" checked='checked'>
                                <label class="form-check-label">Student</label>
                              </div>
                              @else
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Student" name="roles[]">
                                <label class="form-check-label">Student</label>
                              </div>
                              @endif 
                              @if(in_array('Lesson', $arr_roles))
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Lesson" name="roles[]" checked='checked'>
                                <label class="form-check-label">Lesson</label>
                              </div>
                              @else
                              <div class="m-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="Lesson" name="roles[]">
                                <label class="form-check-label">Lesson</label>
                              </div>
                              @endif
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
                                Are You Sure To Delete Roles of
                                <span class='text-danger'>
                                  {{$item->name}} ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('role_del_admin', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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