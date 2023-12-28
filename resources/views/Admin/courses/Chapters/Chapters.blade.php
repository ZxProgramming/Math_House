
@php
  $admin = 'admin';
@endphp
  <x-default-layout>
  @include('Admin.courses.Chapters.AddChapter')

<div class='my-3'>  
  <form class='d-flex' action="{{route('ch_filter')}}" method='POST'>
    @csrf
    <select name='course_id' class='form-control mx-2'>
      <option selected value="all">
        Select Course
      </option>
      @foreach( $courses as $course )
        <option value='{{$course->id}}'>
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
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Chapter Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Lessons</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Actions</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $chapters as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->chapter_name}}
            </td>
            <td>
            @foreach($item->lessons as $element)
                {{$element->lesson_name}}
                <br />
            @endforeach
            </td>
            <td data-order="2023-10-25T00:00:00+03:00">
                {{$item->course->category->cate_name}}
            </td>
            <td data-order="2023-10-25T00:00:00+03:00">
                {{$item->course->course_name}}
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
                        <form method="POST" action="{{route('chapter_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content px-2">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Chapter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="my-2">
                                <label>
                                    Chapter Name
                                </label>
                                <input name="chapter_name" class="form-control" value="{{$item->chapter_name}}" placeholder="Course Name"/>
                            </div>
                            <div class="my-2">
                                <label>
                                    Chapter Description
                                </label>
                                <input name="ch_des" class="form-control" value="{{$item->ch_des}}" placeholder="Course Description"/>
                            </div>
                            <div class="my-2">
                                <label>
                                    Chapter Price
                                </label>
                                <input name="ch_price" class="form-control" value="{{$item->ch_price}}" placeholder="Course Price"/>
                            </div>

                            <div class="my-2">
                                <label>
                                    Course
                                </label>
                                <select name="course_id" class="form-control">
                                    <option value="{{$item->course_id}}">
                                        {{$item->course->course_name}}
                                    </option>
                                    @foreach( $courses as $course )
                                    <option value="{{$course->id}}">
                                        {{$course->course_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                              <input type="hidden" value="{{$item->id}}" name="chapter_id" />
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
                                  {{$item->chapter_name}} Chapter ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_chapter', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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