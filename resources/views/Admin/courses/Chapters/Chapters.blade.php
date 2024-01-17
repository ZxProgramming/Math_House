
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
  <x-default-layout>
  @include('Admin.courses.Chapters.AddChapter')
    @section('title','Chapters')

    <button type="button" class='btn btn-primary mx-3' data-bs-toggle="modal" data-bs-target="#filter_modal">
      Filter
    </button>

    <div class="modal fade" id="filter_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Filter Lesson</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <form action="{{route('ch_filter')}}" method="POST">
                <div class="p-5 d-flex">
                        @csrf
                        <select class="form-control sel_category mx-2">
                            <option disabled selected>
                                Select Category ...
                            </option>
                            @foreach( $categories as $category )
                                <option value="{{$category->id}}">
                                    {{$category->cate_name}}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="course_id" class="form-control sel_course_items mx-2">
                            <option disabled selected>
                                Select Course ...
                            </option>
                        </select>
                        
                        <input type="hidden" value="{{$courses}}" class="course" />
                        <script>
                          let sel_category = document.querySelector('.sel_category');
                          let sel_course_items = document.querySelector('.sel_course_items');
                          let course = document.querySelector('.course');
                          course = course.value;
                          course = JSON.parse(course);

                          sel_category.addEventListener('change', () => {
                            sel_course_items.innerHTML = `
                            <option disabled selected>
                                Select Course ...
                            </option>`;
                            course.forEach(element => { 
                              if (sel_category.value == element.category_id) {
                              sel_course_items.innerHTML += `
                              <option value="${element.id}">
                                  ${element.course_name}
                              </option>`;
                              }
                            });
                          })
                        </script>
                        <button class="btn btn-primary mx-2">
                            Submit
                        </button>
                </div>
            </form>
            </div>
        </div>
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