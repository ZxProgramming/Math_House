
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @error('name')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('starts')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('ends')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('num_usage')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('discount')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @error('code')
      <div class="alert alert-danger">
      {{$message}}
      </div>
    @enderror
    @section('title','Promo Code')

                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddmodalCenter">
    Add New Promo Code
</button>

<!-- Modal -->
<form method="POST" action="{{route('add_promo')}}">
    @csrf
<div class="modal fade" id="AddmodalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        
        <h5 class="modal-title" id="modalCenterTitle">Add New Promo Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> 
        
    <div class="my-2 px-3">
        <label>
        Name
        </label>
        <input class='form-control' name="name" placeholder="Promo Name" />
    </div>

    <div class="my-2 px-3">
        <label>
            Code
        </label>
        <input class='form-control' name="code" placeholder="Code" />
    </div>

    <div class="my-2 px-3">
        <label>
            Discount
        </label>
        <input class='form-control' name="discount" placeholder="Discount" />
    </div>

    <div class="my-2 px-3">
        <label>
            Starts
        </label>
        <input class='form-control' name="starts" type="date" placeholder="Starts" />
    </div>

    <div class="my-2 px-3">
        <label>
            Ends
        </label>
        <input class='form-control' name="ends" type="date" placeholder="Ends" />
    </div>

    <!-- _________________________ -->
    <div class="col-md-12 mb-4 mb-md-0 my-2 px-3" data-select2-id="46">
        <label for="select2Danger" class="form-label">Danger</label>
        <div class="select2-danger" data-select2-id="45">
            <div class="position-relative" data-select2-id="44">
                <select name="courses[]" id="select2Danger" class="select2 form-select select2-hidden-accessible" multiple="" data-select2-id="select2Danger" tabindex="-1" aria-hidden="true">
                    @foreach( $courses as $course )
                    <option value="{{$course->id}}" data-select2-id="{{$course->id}}">
                        {{$course->course_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- _________________________ -->

    <div class="my-2 px-3">
        <label>
            Number of Usage
        </label>
        <input class='form-control' name="num_usage" placeholder="Number of Usage" />
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

    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Starts</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Ends</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Courses</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Users</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Usage</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $promo as $item )
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->starts}}</td>
            <td>{{$item->ends}}</td>
            <td>
                @foreach( $item->course as $element )
                {{$element->course->course_name}}
                <br />
                @endforeach
            </td>
            <td>
                {{count($item->users)}}
            </td>
            <td>
                {{$item->num_usage}}
            </td>
            <td>
                <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit{{$item->id}}">
                    Edit
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Reject{{$item->id}}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="Reject{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                        <h5 class="modal-title" id="modalCenterTitle">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        
                        <div class='p-3'>
                        Are You Sure Delete 
                        <span class='text-danger'>
                        {{$item->name}}
                        </span> ??
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <a href="{{route('del_promo', ['id' => $item->id])}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="Edit{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <form method="POST" action="{{route('edit_promo', ['id'=>$item->id])}}">
                        @csrf
                        <div class="modal-header">
                        
                        <h5 class="modal-title" id="modalCenterTitle">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        
                        <div class='p-3'>
                            <label>
                                Name
                            </label>
                            <input class="form-control" name="name" value="{{$item->name}}" />
                        </div>
                        <div class='p-3'>
                            <label>
                                Code
                            </label>
                            <input class="form-control" name="code" value="{{$item->code}}" />
                        </div>
                        <div class='p-3'>
                            <label>
                                Discount
                            </label>
                            <input class="form-control" name="discount" value="{{$item->discount}}" />
                        </div>
                        <div class='p-3'>
                            <label>
                                Starts
                            </label>
                            <input class="form-control" name="starts" type="date" value="{{$item->starts}}" />
                        </div>
                        <div class='p-3'>
                            <label>
                                Ends
                            </label>
                            <input class="form-control" name="ends" type="date" value="{{$item->ends}}" />
                        </div> 
                        <!-- _________________________ -->
                        <div class="col-md-12 p-3" data-select2-id="63">
                          <label for="select2Dark" class="form-label">Dark</label>
                          <div class="select2-dark" data-select2-id="62">
                            <div class="position-relative" data-select2-id="61">
                                <select name="courses[]" id="select2Dark" class="select2 form-select select2-hidden-accessible" multiple="" data-select2-id="select2Dark{{$item->id}}" tabindex="-1" aria-hidden="true">
                                @foreach( $item->course as $course )
                                <option value="{{$course->course->id}}" selected="" data-select2-id="2{{$course->course->id}}">{{$course->course->course_name}}</option>
                                @endforeach
                                @foreach( $courses as $course )
                                <option value="{{$course->id}}" data-select2-id="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
</di>
                          </div>
                        </div>
                        <!-- _________________________ -->
                        <div class='p-3'>
                            <label>
                                No. of Usage
                            </label>
                            <input type="number" class="form-control" name="num_usage" value="{{$item->num_usage}}" />
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
</form>
                    </div>
                </div>
                </div>

            </td>
        </tr>
        @endforeach
    
    </tbody>
</table>

    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>

    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
    <script src="{{asset('assets/js/forms-tagify.js')}}"></script>
    <script src="{{asset('assets/js/forms-typeahead.js')}}"></script>

</x-default-layout>