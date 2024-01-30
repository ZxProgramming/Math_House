
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.courses.Courses.course_header')
    @section('title','Course')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@error('course_name')
<div class="alert alert-danger">
  {{$message}}
  </div>
@enderror
@error('teacher_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('course_price')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('category_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror


<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Course Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Chpters</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $courses as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->course_name}}
            </td>
            <td>
            @foreach($item->chapter as $element)
                {{$element->chapter_name}}
                <br />
            @endforeach
            </td>
            <td data-order="2023-10-25T00:00:00+03:00">
                {{$item->category->cate_name}}
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
                                        <label>Course Name</label>
                                        <input class='form-control' value="{{$item->course_name}}" name="course_name" placeholder="Course Name" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Course Price</label>
                                        <input class='form-control' name="course_price" value="{{$item->course_price}}" placeholder="Course Price" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="{{$item->category->id}}" selected>
                                                {{$item->category->cate_name}}
                                            </option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->cate_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class='my-3'>
                                        <label>Description</label>
                                        <textarea class='form-control' name="course_des" placeholder="Description" >{{$item->course_des}}</textarea>
                                    </div>
                                    
                                    <div class='my-3'>
                                        <label>Image</label>
                                        <input class='form-control' type="file" name="course_url" placeholder="Image" />
                                    </div>
                                    <button type="button" class="btn btn-success details_btn" id="details_btn{{$item->id}}">
                                        Next
                                    </button>
                                </div>

                                <div class="details_section d-none" id="details_section{{$item->id}}">
                                    <div class='my-3'>
                                        <label>Teachers</label>
                                        <select name="teacher_id" class="form-control">
                                            <option value="{{$item->teacher->id}}">
                                                {{$item->teacher->name}}
                                            </option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">
                                                {{$teacher->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class='my-3'>
                                        <label>Pre requisition</label>
                                        <textarea class='form-control' name="pre_requisition" placeholder="Pre requisition" >{{$item->pre_requisition}}</textarea>
                                    </div>
                                    <div class='my-3'>
                                        <label>What you gain</label>
                                        <textarea class='form-control' name="gain" placeholder="What you gain" >{{$item->gain}}</textarea>
                                    </div>
                                    <button type="button" class="btn btn-secondary prev_info">
                                        Back
                                    </button>
                                    <button type="button" class="btn btn-success pricing_btn">
                                        Next
                                    </button>
                                </div>

                                <div class="priceing_section d-none" id="priceing_section{{$item->id}}">
                                  @foreach ( $item->prices as $price )
                                    <div class='my-3'>
                                        <label>Duration</label>
                                        <input value="{{$price->duration}}" class='form-control' name="duration[]" placeholder="Duration" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Price</label>
                                        <input value="{{$price->price}}" class='form-control' name="price[]" placeholder="Price" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Discount</label>
                                        <input value="{{$price->discount}}" class='form-control' name="discount[]" placeholder="Discount" />
                                    </div>
                                    <hr />
                                    @endforeach
                                    <div class="mt-3">
                                        <span class='btn btn-secondary prev_details'>
                                            Back
                                        </span>
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
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$item->course_name}} Course ??
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


<script>
  $(document).ready(()=>{
    $(".details_btn").click(function(){
        var info_id = `#${$(this).parent().attr("id")}`;
        var details_id = `#${$(this).parent().next().attr("id")}`;
        
        
        $(info_id).addClass("d-none");
        $(details_id).removeClass("d-none");
        
      });
      $(".pricing_btn").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var priceing_id = `#${$(this).parent().next().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(priceing_id).removeClass("d-none");
      })

      $(".prev_info").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var info_id = `#${$(this).parent().prev().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(info_id).removeClass("d-none");
      })

      $(".prev_details").click(function(){
        var priceing_id = `#${$(this).parent().parent().attr("id")}`;
        var details_id = `#${$(this).parent().parent().prev().attr("id")}`;
       
        $(priceing_id).addClass("d-none");
        $(details_id).removeClass("d-none");
      })



  })
</script>
</x-default-layout>