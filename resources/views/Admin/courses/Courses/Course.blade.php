
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.courses.Courses.course_header')

<div class='my-3'>
  <form class='d-flex' action="{{route('course_filter')}}" method='POST'>
    @csrf
    <select name='category_id' class='form-control mx-2'>
      <option selected value="all">
        Select Category
      </option>
      @foreach( $categories as $category )
        <option value='{{$category->id}}'>
            {{$category->cate_name}}
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('course_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content px-2">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="my-2">
                                <label>
                                    Course Name
                                </label>
                                <input name="course_name" class="form-control" value="{{$item->course_name}}" placeholder="Course Name"/>
                            </div>
                            <div class="my-2">
                                <label>
                                    Course Description
                                </label>
                                <input name="course_des" class="form-control" value="{{$item->course_des}}" placeholder="Course Description"/>
                            </div>
                            <div class="my-2">
                                <label>
                                    Course Price
                                </label>
                                <input name="course_price" class="form-control" value="{{$item->course_price}}" placeholder="Course Price"/>
                            </div>
                            <div class="my-2">
                                <label>
                                    Category
                                </label>
                                <select name="category_id" class="form-control">
                                    <option value="{{$item->category->id}}">
                                        {{$item->category->cate_name}}
                                    </option>
                                    @foreach( $categories as $cate )
                                    <option value="{{$cate->id}}">
                                        {{$cate->cate_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                              <input type="hidden" value="{{$item->id}}" name="course_id" />
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
</x-default-layout>