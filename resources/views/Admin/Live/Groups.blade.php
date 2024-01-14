
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Groups')
    @include('success')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalCenter">
  Add New Group
</button>

<!-- Modal -->
<form method="POST" action="{{route('g_session_edit')}}">
@csrf
<div class="modal fade" id="addModalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="modalCenterTitle">Edit Session</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>  
      <div class="px-2">
      
      <div class="my-2">
        <label>
          Group Name
        </label>
        <input class="form-control" name="name" placeholder="Group Name" />
      </div>
      <div class="s_days">
      <div class="my-2 d-flex align-items-center s_days_item">
        <label class="mx-2">
          Days
        </label>
        <select name="day[]" class="form-control">
          <option selected disabled>Select Day</option>
          <option value="Sat">
            Sat
          </option>
          <option value="Sun">
            Sun
          </option>
          <option value="Mon">
            Mon
          </option>
          <option value="Tues">
            Tues
          </option>
          <option value="Wed">
            Wed
          </option>
          <option value="Thurs">
            Thurs
          </option>
          <option value="Fri">
            Fri
          </option>
        </select> 
        <label class="mx-2">
          From
        </label>
        <input type="time" class="form-control" name="from[]" placeholder="From" />
        <label class="mx-2">
          To
        </label>
        <input type="time" class="form-control" name="to[]" placeholder="To" />
      
      </div>

</div>
      <div class="add_day">
        <i style="color:#00ff00; font-size:20px;cursor: pointer;" class="fa fa-plus"></i>
      </div>
</div>

<div class="my-2">
  
<select name="teacher_id" class="form-control">
  <option selected disabled>Select Teacher...</option>
  @foreach( $teachers as $teacher )
  <option value="{{$teacher->id}}">
    {{$teacher->name}}
  </option>
  @endforeach
</select>
</div>

<div class="my-2">
  
<select name="teacher_id" class="form-control">
  <option selected disabled>Select Student...</option>
  @foreach( $students as $student )
  <option value="{{$student->id}}">
    {{$student->name}}
  </option>
  @endforeach
</select>
</div>
<script>
        let add_day = document.querySelector('.add_day');
        let remove_day = document.querySelectorAll('.remove_day');
        let s_days = document.querySelector('.s_days');
        let s_days_item = document.querySelector('.s_days_item');
        add_day.addEventListener('click', () => {
          s_days.innerHTML += s_days_item.outerHTML;
        });
        for (let i = 0, end = remove_day.length; i < end; i++) {
          remove_day[i].addEventListener('click', ( e ) => {
              e.target.parentElement.parentElement.remove();
          });
        }
      </script>

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

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Group Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Students</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Dayes</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">From</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">To</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Teacher</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($session_g as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{count($item->student)}}
            </td> 
            <td>
              @foreach($item->days as $element)
                {{$element->day}}
                <br />
              @endforeach
            </td>
            <td>
              @foreach($item->days as $element)
                {{$element->from}}
                <br />
              @endforeach
            </td>
            <td>
              @foreach($item->days as $element)
                {{$element->to}}
                <br />
              @endforeach 
            </td>
            <td>
                {{$item->teacher->name}}
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
                        <form method="POST" action="{{route('g_session_edit')}}">
                        @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>  
                             <div class="px-2">
                              
                              <div class="my-2">
                                <label>
                                  Group Name
                                </label>
                                <input class="form-control" name="name" value="{{$item->name}}" placeholder="Group Name" />
                              </div>
                              <div class="s_e_days">
                              @foreach($item->days as $element)
                              <div class="my-2 d-flex align-items-center s_e_days_item">
                                <label class="mx-2">
                                  Days
                                </label>
                                <select name="day[]" class="form-control">
                                  <option value="{{$element->day}}">
                                    {{$element->day}}
                                  </option>
                                  <option value="Sat">
                                    Sat
                                  </option>
                                  <option value="Sun">
                                    Sun
                                  </option>
                                  <option value="Mon">
                                    Mon
                                  </option>
                                  <option value="Tues">
                                    Tues
                                  </option>
                                  <option value="Wed">
                                    Wed
                                  </option>
                                  <option value="Thurs">
                                    Thurs
                                  </option>
                                  <option value="Fri">
                                    Fri
                                  </option>
                                </select> 
                                <label class="mx-2">
                                  From
                                </label>
                                <input type="time" class="form-control" value="{{$element->from}}" name="from[]" placeholder="From" />
                                <label class="mx-2">
                                  To
                                </label>
                                <input type="time" class="form-control" value="{{$element->to}}" name="to[]" placeholder="To" />
                              
                                <div class="remove_e_day">
                                <i style="color:#ff0000; font-size:20px; cursor: pointer;" class="fa fa-minus mx-2"></i>
                                </div>
                              </div>
                              @endforeach

</div>
                              <div class="add_e_day">
                                <i style="color:#00ff00; font-size:20px;cursor: pointer;" class="fa fa-plus"></i>
                              </div>
</div>
 
                            <div class="my-2">
                              
                            <select name="teacher_id" class="form-control">
                              <option value="{{$item->teacher->id}}">
                                {{$item->teacher->name}}
                              </option>
                              @foreach( $teachers as $teacher )
                              <option value="{{$teacher->id}}">
                                {{$teacher->name}}
                              </option>
                              @endforeach
                            </select>
                            </div>
<script>
                                let add_e_day = document.querySelectorAll('.add_e_day');
                                let remove_e_day = document.querySelectorAll('.remove_e_day');
                                let s_e_days = document.querySelectorAll('.s_e_days');
                                let s_e_days_item = document.querySelectorAll('.s_e_days_item');
                                for (let i = 0, end = add_e_day.length; i < end; i++) {
                                  add_e_day[i].addEventListener('click', ( e ) => {
                                    for (let j = 0; j < end; j++) {
                                      if ( e.target == add_e_day[j] || e.target.parentElement == add_e_day[j] ) {
                                        console.log(s_e_days);
                                        s_e_days[j].innerHTML += s_e_days_item[j].outerHTML;
                                      }
                                    }
                                  });
                                }
                                for (let i = 0, end = remove_e_day.length; i < end; i++) {
                                  remove_e_day[i].addEventListener('click', ( e ) => {
                                      e.target.parentElement.parentElement.remove();
                                  });
                                }
                              </script>

                              <input type="hidden" value="{{$item->id}}" name="id" />
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
                                
                                <h5 class="modal-title" id="modalCenterTitle">Delete Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$item->name}} ?
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_session_g', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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