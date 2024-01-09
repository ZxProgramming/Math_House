
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Live')
    @include('success')

    
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session Date</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">From</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">To</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Lesson</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Type</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Teacher</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($sessions as $session)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$session->date}}
            </td>
            <td>
                {{$session->link}}
            </td> 
            <td>
                {{$session->from}}
            </td>
            <td>
                {{$session->to}}
            </td>
            <td>
                {{$session->lesson->chapter->course->category->cate_name}}
            </td>
            <td>
                {{$session->lesson->chapter->course->course_name}}
            </td>
            <td>
                {{$session->lesson->lesson_name}}
            </td>
            <td>
                {{$session->type}}
            </td>
            <td>
                {{$session->teacher->name}}
            </td>
            
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$session->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$session->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('lesson_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$session->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                            <div class="my-2 px-3">
                              <label>
                                Session Name
                              </label>
                              <input class='form-control' name="link" value="{{$session->link}}" placeholder="Session Name" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Session Date
                            </label>
                            <input class='form-control' name="date" type="date" value="{{$session->date}}" placeholder="Session Date" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                From
                            </label>
                            <input class='form-control' name="from" type="time" value="{{$session->from}}" placeholder="Session From" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                To
                            </label>
                            <input class='form-control' name="to" type="time" value="{{$session->to}}" placeholder="Session To" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Category
                            </label>
                            <select class="form-control sel_cate">
                                <option disabled>
                                    Select Category ...
                                </option>
                                <option selected>
                                    {{$session->lesson->chapter->course->category->cate_name}}
                                </option>
                                @foreach( $categories as $category )
                                <option value="{{$category->id}}">
                                    {{$category->cate_name}}
                                </option>
                                @endforeach
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Course
                            </label>
                            <select class="form-control sel_course">
                                <option disabled>
                                    Select Course ...
                                </option>
                                <option selected>
                                    {{$session->lesson->chapter->course->course_name}}
                                </option>
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Chapter
                            </label>
                            <select class="form-control sel_chapter">
                                <option disabled>
                                    Select Chapter ...
                                </option>
                                <option selected>
                                    {{$session->lesson->chapter->chapter_name}}
                                </option>
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Lesson
                            </label>
                            <select name="lesson_id" class="form-control sel_lesson">
                                <option disabled selected>
                                    Select Lesson ...
                                </option>
                                <option selected>
                                    {{$session->lesson->lesson_name}}
                                </option>
                            </select> 
                            </div>

                            <input type="hidden" class="cate" value="{{$categories}}" />
                            <input type="hidden" class="course" value="{{$courses}}" />
                            <input type="hidden" class="chapter" value="{{$chapters}}" />
                            <input type="hidden" class="lesson" value="{{$lessons}}" />

                            <script>
                                let sel_cate = document.querySelector('.sel_cate');
                                let sel_course = document.querySelector('.sel_course');
                                let sel_chapter = document.querySelector('.sel_chapter');
                                let sel_lesson = document.querySelector('.sel_lesson');
                                let cate = document.querySelector('.cate');
                                let course = document.querySelector('.course');
                                let chapter = document.querySelector('.chapter');
                                let lesson = document.querySelector('.lesson');
                                course = course.value;
                                course = JSON.parse(course);
                                chapter = chapter.value;
                                chapter = JSON.parse(chapter);
                                lesson = lesson.value;
                                lesson = JSON.parse(lesson);
                                sel_cate.addEventListener('change', () => {
                                    sel_course.innerHTML = `
                                    <option disabled selected>
                                        Select Course ...
                                    </option>`;
                                    course.forEach(element => {
                                        if ( sel_cate.value == element.category_id ) {
                                            sel_course.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.course_name}
                                            </option>`;
                                        }
                                    });
                                });
                                sel_course.addEventListener('change', () => {
                                    sel_chapter.innerHTML = `
                                    <option disabled selected>
                                        Select Chapter ...
                                    </option>`;
                                    chapter.forEach(element => {
                                        if ( sel_course.value == element.course_id ) {
                                            sel_chapter.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.chapter_name}
                                            </option>`;
                                        }
                                    });
                                });
                                sel_chapter.addEventListener('change', () => {
                                    sel_lesson.innerHTML = `
                                    <option disabled selected>
                                        Select Lesson ...
                                    </option>`;
                                    lesson.forEach(element => {
                                        if ( sel_chapter.value == element.chapter_id ) {
                                            sel_lesson.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.lesson_name}
                                            </option>`;
                                        }
                                    });
                                });
                            </script>

                            <div class="my-2 px-3">
                            <label>
                                Type
                            </label>
                            <select name="type" class="form-control sel_lesson">
                                <option disabled>
                                    Select Type ...
                                </option>
                                <option value="{{$session->type}}" selected>
                                    {{$session->type}}
                                </option>
                                <option value="session">
                                    session
                                </option>
                                <option value="private">
                                    private
                                </option>
                                <option value="group">
                                    group
                                </option>
                            </select> 
                            </div>


                            <div class="my-2 px-3">
                            <label>
                                Teachers
                            </label>
                            <select name="teacher_id" class="form-control sel_lesson">
                                <option disabled>
                                    Select Teacher ...
                                </option>
                                <option value="{{$session->teacher_id }}" selected>
                                    {{$session->teacher->name}}
                                </option>
                                @foreach( $teachers as $teacher )
                                <option value="{{$teacher->id}}">
                                    {{$teacher->name}}
                                </option>
                                @endforeach
                            </select> 
                            </div>

                              <input type="hidden" value="{{$session->id}}" name="id" />
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
                        <div class="modal fade" id="modalDelete{{$session->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$session->session_name}} session ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_lesson', ['id'=>$session->id])}}" class="btn btn-danger">Delete</a>
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