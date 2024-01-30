
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Live')
    @include('success')
    <style>
        
        .screen{
                position: fixed;
                height: 100vh;
                width: 100vw;
                top: 0;
                left: 0;
                background-color: #000000cc;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 111111;
            }
            .screen_popup{
                height: 380px;
                width: 300px;
                background-color: #fff;
                padding: 30px;
                position: relative;
            }
            .screen_popup img{
                width: 200px;
                height: 200px;
                border-radius: 50%;
                border: 1px solid #ccc;
            }
            .screen_text{
                font-weight: bold;
            }
            .close_btn{
                position: absolute;
                top: 20px;
                right: 20px;
                cursor: pointer;
            }
    </style>

@error('link')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('date')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror 
@error('from')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('to')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('lesson_id')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('type')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('access_dayes')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('price')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('teacher_id')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
@error('repeat')
    <div class="alert alert-danger">
    {{$message}}
    </div>
@enderror
    
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddmodalCenter">
                          Add Session
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('add_session')}}">
                          @csrf
                        <div class="modal fade" id="AddmodalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Add Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                            <div class="my-2 px-3">
                              <label>
                                Session Name
                              </label>
                              <input class='form-control' name="link" placeholder="Session Name" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Session Date
                            </label>
                            <input class='form-control' name="date" type="date" placeholder="Session Date" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                From
                            </label>
                            <input class='form-control' name="from" type="time" placeholder="Session From" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                To
                            </label>
                            <input class='form-control' name="to" type="time" placeholder="Session To" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Access Dayes
                            </label>
                            <input class='form-control' name="access_dayes" placeholder="Access Dayes" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Price
                            </label>
                            <input class='form-control' name="price" placeholder="Price" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Repeat
                            </label>
                            <select class="form-control s_repeat" name="repeat">
                                <option disabled>
                                    Select ...
                                </option>
                                <option value="Once">
                                    Once
                                </option>
                                <option value="Repeat">
                                    Repeat
                                </option>
                            </select> 
                            </div>

                            <div class="screen d-none">
                                <div class="screen_popup">
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <i class="ki-duotone close_btn ki-cross fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="screen_text">
                                        <div class="my-2">
                                        <label>
                                            Repeat
                                        </label>
                                        <div class="d-flex">
                                            <input type="number" class="form-control" name="repeat_num" />
                                            <label>
                                                Times
                                            </label>
                                        </div>
                                        </div>
                                        
                                        <div class="my-2">
                                        <label>
                                            Repeat every
                                        </label>
                                            <div>
                                                <input id="SaturDay" type="checkbox" name="r_day[]" value="SaturDay" />
                                                <label for="SaturDay">
                                                    SaturDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="SunDay" type="checkbox" name="r_day[]" value="SunDay" />
                                                <label for="SunDay">
                                                    SunDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="MonDay" type="checkbox" name="r_day[]" value="MonDay" />
                                                <label for="MonDay">
                                                    MonDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="TuesDay" type="checkbox" name="r_day[]" value="TuesDay" />
                                                <label for="TuesDay">
                                                    TuesDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="WednesDay" type="checkbox" name="r_day[]" value="WednesDay" />
                                                <label for="WednesDay">
                                                    WednesDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="ThursDay" type="checkbox" name="r_day[]" value="ThursDay" />
                                                <label for="ThursDay">
                                                    ThursDay
                                                </label>
                                            </div>
                                            <div>
                                                <input id="FriDay" type="checkbox" name="r_day[]" value="FriDay" />
                                                <label for="FriDay">
                                                    FriDay
                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-primary days_done_btn">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Category
                            </label>
                            <select class="form-control sel_cate1">
                                <option disabled selected>
                                    Select Category ...
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
                            <select class="form-control sel_course1">
                                <option disabled selected>
                                    Select Course ...
                                </option>
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Chapter
                            </label>
                            <select class="form-control sel_chapter1">
                                <option disabled selected>
                                    Select Chapter ...
                                </option>
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Lesson
                            </label>
                            <select name="lesson_id" class="form-control sel_lesson1">
                                <option disabled selected>
                                    Select Lesson ...
                                </option>
                            </select> 
                            </div>

                            <input type="hidden" class="cate" value="{{$categories}}" />
                            <input type="hidden" class="course" value="{{$courses}}" />
                            <input type="hidden" class="chapter" value="{{$chapters}}" />
                            <input type="hidden" class="lesson" value="{{$lessons}}" />

                            <script>
                                let sel_cate1 = document.querySelector('.sel_cate1');
                                let sel_course1 = document.querySelector('.sel_course1');
                                let sel_chapter1 = document.querySelector('.sel_chapter1');
                                let sel_lesson1 = document.querySelector('.sel_lesson1');
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
                                sel_cate1.addEventListener('change', () => {
                                    sel_course1.innerHTML = `
                                    <option disabled selected>
                                        Select Course ...
                                    </option>`;
                                    course.forEach(element => {
                                        if ( sel_cate1.value == element.category_id ) {
                                            sel_course1.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.course_name}
                                            </option>`;
                                        }
                                    });
                                });
                                sel_course1.addEventListener('change', () => {
                                    sel_chapter1.innerHTML = `
                                    <option disabled selected>
                                        Select Chapter ...
                                    </option>`;
                                    chapter.forEach(element => {
                                        if ( sel_course1.value == element.course_id ) {
                                            sel_chapter1.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.chapter_name}
                                            </option>`;
                                        }
                                    });
                                });
                                sel_chapter1.addEventListener('change', () => {
                                    sel_lesson1.innerHTML = `
                                    <option disabled selected>
                                        Select Lesson ...
                                    </option>`;
                                    lesson.forEach(element => {
                                        if ( sel_chapter1.value == element.chapter_id ) {
                                            sel_lesson1.innerHTML += `
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
                            <select name="type" class="form-control">
                                <option disabled>
                                    Select Type ...
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
                            <select name="teacher_id" class="form-control">
                                <option disabled>
                                    Select Teacher ...
                                </option>
                                @foreach( $teachers as $teacher )
                                <option value="{{$teacher->id}}">
                                    {{$teacher->name}}
                                </option>
                                @endforeach
                            </select> 
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
                        <form method="POST" action="{{route('session_edit')}}">
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
                                Access Dayes
                            </label>
                            <input class='form-control' value="{{$session->access_dayes}}" name="access_dayes" placeholder="Access Dayes" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Price
                            </label>
                            <input class='form-control' value="{{$session->price}}" name="price" placeholder="Price" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Repeat
                            </label>
                            <select class="form-control" name="repeat">
                                <option disabled>
                                    Select ...
                                </option>
                                <option value="{{$session->repeat}}" selected>
                                    {{$session->repeat}}
                                </option>
                                <option value="Once">
                                    Once
                                </option>
                                <option value="Repeat">
                                    Repeat
                                </option>
                            </select> 
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Category
                            </label>
                            <select class="form-control sel_cate">
                                <option disabled>
                                    Select Category ...
                                </option>
                                <option value="{{$session->lesson->chapter->course->category->id}}" selected>
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
                                <option value="{{$session->lesson->chapter->course->id}}" selected>
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
                                <option value="{{$session->lesson->chapter->id}}" selected>
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
                                <option value="{{$session->lesson->id}}" selected>
                                    {{$session->lesson->lesson_name}}
                                </option>
                            </select> 
                            </div>

                            <script>
                                let sel_cate = document.querySelector('.sel_cate');
                                let sel_course = document.querySelector('.sel_course');
                                let sel_chapter = document.querySelector('.sel_chapter');
                                let sel_lesson = document.querySelector('.sel_lesson');
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
                                    course.forEach(element => {
                                        if ( sel_cate.value == element.category_id ) {
                                            sel_course.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.course_name}
                                            </option>`;
                                        }
                                    });
                                    chapter.forEach(element => {
                                        if ( sel_course.value == element.course_id ) {
                                            sel_chapter.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.chapter_name}
                                            </option>`;
                                        }
                                    });
                                    lesson.forEach(element => {
                                        if ( sel_chapter.value == element.chapter_id ) {
                                            sel_lesson.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.lesson_name}
                                            </option>`;
                                        }
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
                            <select name="type" class="form-control">
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
                            <select name="teacher_id" class="form-control">
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
                                
                                <h5 class="modal-title" id="modalCenterTitle">Delete Session</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$session->link}} ?
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_session', ['id'=>$session->id])}}" class="btn btn-danger">Delete</a>
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
    let s_repeat = document.querySelector('.s_repeat');
    let screen = document.querySelector('.screen');
    let close_btn = document.querySelector('.close_btn');
    let days_done_btn = document.querySelector('.days_done_btn');
    
    s_repeat.addEventListener('change', ( e ) => {
        if ( s_repeat.value == 'Repeat' ) {
            screen.classList.remove('d-none');
        }
    });
    close_btn.addEventListener('click', () => {
        screen.classList.add('d-none');
    });
    days_done_btn.addEventListener('click', () => {
        screen.classList.add('d-none');
    });

</script>
</x-default-layout>