
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@section('title','Package')
    
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Module</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Number</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Price</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Duration</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $package as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->module}}
            </td>
            <td>
                {{$item->number}}
            </td>
            <td>
                {{$item->price}}
            </td>
            <td>
                {{$item->duration}}
            </td>
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" id="{{$item->id}}" class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                          Edit
                        </button>
                        <button type="button"id="{{$item->id}}"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('course_edit')}}" enctype="multipart/form-data">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content px-2">
                              <input type="hidden" value="{{$item->id}}" name="course_id" />
                              
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>


                                <div class="info_section" id="info_section{{$item->id}}">
                                    <div class='my-3'>
                                        <label>Package Name</label>
                                        <input class='form-control' value="{{$item->name}}" name="name" placeholder="Package Name" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Module</label>
                                        <input class='form-control' name="module" value="{{$item->module}}" placeholder="Module" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Number</label>
                                        <input class='form-control' name="number" value="{{$item->number}}" placeholder="Number" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Price</label>
                                        <input class='form-control' name="price" value="{{$item->price}}" placeholder="Price" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Duration</label>
                                        <input class='form-control' name="duration" value="{{$item->duration}}" placeholder="Duration" />
                                    </div>
                                    
                                </div>

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
                                
                                <h5 class="modal-title" id="modalCenterTitle">Delete Package</h5>
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
                                <a href="{{route('del_course', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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