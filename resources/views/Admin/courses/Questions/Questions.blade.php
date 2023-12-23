<x-default-layout> 
    @php
     $admin = 'admin';
    @endphp
 
	<!--begin::Action-->
    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Questions Filter</a>
    <!--end::Action-->
    
    <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Questions Filter</h2>
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
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <div class="d-flex">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Category Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control sel_cate">
                            <option disabled selected>
                                Select Category
                            </option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->cate_name}}
                            </option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group--> 
                    <input type="hidden" class="categories" value="{{$categories}}" />
                    <input type="hidden" class="courses" value="{{$courses}}" />
                    <input type="hidden" class="chapters" value="{{$chapters}}" />
                    <input type="hidden" class="lessons" value="{{$lessons}}" />
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Course Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control sel_course">
                            <option disabled selected>
                                Select Course
                            </option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">
                                {{$course->course_name}}
                            </option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group--> 
                    
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Chapter Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control sel_chapter">
                            <option disabled selected>
                                Select Chapter
                            </option>
                            @foreach($chapters as $chapter)
                            <option value="{{$chapter->id}}">
                                {{$chapter->chapter_name}}
                            </option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group--> 
                    
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Lesson Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control sel_lesson">
                            <option disabled selected>
                                Select Lesson
                            </option>
                            @foreach($lessons as $lesson)
                            <option value="{{$lesson->id}}">
                                {{$lesson->lesson_name}}
                            </option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    </div> 
                    <div class="d-flex">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Type</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
                            <option disabled selected>
                                Select Type
                            </option>
                            <option value="Trail">
                                Trail
                            </option>
                            <option value="Parallel">
                                Parallel
                            </option>
                            <option value="Extra">
                                Extra
                            </option>
                        </select>
                    </div>
                        <!--end::Input-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Section</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
                            <option disabled selected>
                                Select Section
                            </option>
                            <option value="Blank">
                                Blank
                            </option>
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Year</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
                            <option disabled selected>
                                Select Year
                            </option>
                            @for($i = 2000; $i <= date('Y'); $i++)
                            <option value="{{$i}}">
                                {{$i}}
                            </option>
                            @endfor
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Month</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
                            <option disabled selected>
                                Select Month
                            </option>
                            @for($i = 1; $i <= 12; $i++)
                            <option value="{{$i}}">
                                {{$i}}
                            </option>
                            @endfor
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    </div>

                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Difficulty</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
                            <option disabled selected>
                                Select Difficulty
                            </option>
                            <option value="A">
                                A
                            </option> 
                            <option value="B">
                                B
                            </option> 
                            <option value="C">
                                C
                            </option> 
                            <option value="D">
                                D
                            </option>
                            <option value="E">
                                E
                            </option>
                        </select>  
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <button class="btn btn-primary">
                        Filter
                    </button>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>
                
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Question</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">type</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">year</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">month</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">code</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Section</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Question No.</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Difficulty</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($questions as $question)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$question->question}}
            </td>
            <td>
                {{$question->q_type}}
            </td>
            <td>
                {{$question->year}}
            </td>
            <td>
                {{$question->month}}
            </td>
            <td>
                {{$question->q_code}}
            </td>
            <td>
                {{$question->section}}
            </td>
            <td>
                {{$question->q_num}}
            </td>
            <td>
                {{$question->difficulty}}
            </td>
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$question->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$question->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('q_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$question->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                            <div class="my-2 px-3">
                              <label>
                                Question
                              </label>
                              <input class='form-control' name="question" value="{{$question->question}}" placeholder="Question" />
                            </div>

                            <div class="my-2 px-3">
                              <label>
                                Type
                              </label>
                            
                              <select class="form-control" name="q_type">
                                <option value="{{$question->q_type}}">{{$question->q_type}}</option>
                                <option value="Trail">Trail</option> 
                                <option value="Parallel">Parallel</option> 
                                <option value="Extra">Extra</option>
                            </select>  
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Year
                            </label>
                            <input class='form-control' name="year" value="{{$question->year}}" placeholder="Year" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Month
                            </label>
                            <input class='form-control' name="month" value="{{$question->month}}" placeholder="Month" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Code
                            </label>
                            <input class='form-control' name="q_code" value="{{$question->q_code}}" placeholder="Code" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Section
                            </label> 
                        
                            <select class="form-control" name="section">
                                <option value="{{$question->section}}">{{$question->section}}</option>
                                <option value="Blank">Blank</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>     
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Question No.
                            </label>
                            <input class='form-control' name="q_num" value="{{$question->q_num}}" placeholder="Question No." />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Difficulty
                            </label>
                            <select class="form-control" name="difficulty">
                                <option value="{{$question->difficulty}}">{{$question->difficulty}}</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select> 
                            </div>


                              <input type="hidden" value="{{$question->id}}" name="id" />
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
                        <div class="modal fade" id="modalDelete{{$question->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$question->question}} ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_q', ['id'=>$question->id])}}" class="btn btn-danger">Delete</a>
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
    
  @include('Admin.courses.Questions.AddQuestion')

<script>
                    let sel_cate = document.querySelector('.sel_cate');
                    let sel_course = document.querySelector('.sel_course');
                    let sel_chapter = document.querySelector('.sel_chapter');
                    let sel_lesson = document.querySelector('.sel_lesson');
                    let categories = document.querySelector('.categories');
                    let courses = document.querySelector('.courses');
                    let chapters = document.querySelector('.chapters');
                    let lessons = document.querySelector('.lessons');
                    courses = courses.value;
                    courses = JSON.parse(courses);
                    chapters = chapters.value;
                    chapters = JSON.parse(chapters);
                    lessons = lessons.value;
                    lessons = JSON.parse(lessons);
                    sel_cate.addEventListener('change', ( e ) => {
                        sel_course.innerHTML = `                            
                        <option disabled selected>
                            Select Course
                        </option>`;
                        courses.forEach(element => {
                            if ( e.target.value == element.category_id ) {
                            sel_course.innerHTML += `                            
                            <option value="${element.id}">
                                ${element.course_name}
                            </option>`;
                                
                            }
                        });
                    });
                    sel_course.addEventListener('change', ( e ) => {
                        sel_chapter.innerHTML = `                            
                        <option disabled selected>
                            Select Chapter
                        </option>`;
                        chapters.forEach(element => {
                            if ( e.target.value == element.course_id ) {
                            sel_chapter.innerHTML += `                            
                            <option value="${element.id}">
                                ${element.chapter_name}
                            </option>`;
                                
                            }
                        });
                    });
                    sel_chapter.addEventListener('change', ( e ) => {
                        sel_lesson.innerHTML = `                            
                        <option disabled selected>
                            Select Lesson
                        </option>`;
                        lessons.forEach(element => {
                            if ( e.target.value == element.chapter_id ) {
                            sel_lesson.innerHTML += `                            
                            <option value="${element.id}">
                                ${element.lesson_name}
                            </option>`;
                                
                            }
                        });
                    });
                </script>
       @section('script')
       <script>
        <!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/create-campaign.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
       </script>
       @endsection 
</x-default-layout>