
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.Users.teacher_header')
    @section('title','Teachers')

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
<div class='my-3'>
  <form class='d-flex' action="{{route('teacher_filter')}}" method='POST'>
    @csrf
    <select name='t_course' class='form-control mx-2'>
      <option disabled selected>
        Select Course
      </option>
      @foreach($courses as $course)
      <option value="{{$course->id}}">
        {{$course->course_name}}
      </option>
      @endforeach
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
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Image</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
        </tr>
    </thead>
    <tbody class="fs-6">
        @foreach( $teachers as $item )
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
                {{$item->cate_name}}
            </td>
            <td class="sorting_1">
                {{$item->course_name}}
            </td>
            <td>
              <img src="{{asset('/images/users/' . $item->image)}}" style="height: 120px;width:120px;border-raduis:50%;" />
            </td>
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->u_id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->u_id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('teacher_edit')}}" enctype="multipart/form-data">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->u_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Teacher</h5>
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

                            <div class="my-2 px-3">
                              <label>
                                Image
                              </label>
                              <input class='form-control' name="image" type="file" />
                            </div>

                              <input type="hidden" value="{{$item->u_id}}" name="user_id" />
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
                        <div class="modal fade" id="modalDelete{{$item->u_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
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
                                <a href="{{route('del_teacher', ['id'=>$item->u_id])}}" class="btn btn-danger">Delete</a>
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

<script>
  let show_history = document.querySelectorAll('.show_history');
  let history = document.querySelectorAll('.history');
  for (let i = 0, end = show_history.length; i < end; i++) {
    show_history[i].addEventListener('click', (e)=> {
      for (let j = 0; j < end; j++) {
        if(e.target == show_history[j]){
          history[j].classList.toggle('d-none');
        }
      }
    })
  } 
  let show_wallet = document.querySelectorAll('.show_wallet');
  let wallet_h = document.querySelectorAll('.wallet_h');
  for (let i = 0, end = show_wallet.length; i < end; i++) {
    show_wallet[i].addEventListener('click', (e) => {
      for (let j = 0; j < end; j++) {
        if ( e.target == show_wallet[j] ) {
          wallet_h[j].classList.toggle('d-none')
        }
      }
    })
  }
</script>


</x-default-layout>