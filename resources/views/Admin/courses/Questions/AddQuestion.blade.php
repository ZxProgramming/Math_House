 
    @php
     $admin = 'admin';
    @endphp
 
	<!--begin::Action-->
    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_question">Add Question</a>
    <!--end::Action-->
    
    <div class="modal fade" id="kt_modal_create_question" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Question</h2>
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
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center py-2">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Info</h3>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Details</h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Answer</h3>
                            </div>
                            <!--end::Step 3--> 
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <form action="{{route('add_q')}}" method="POST" enctype="multipart/form-data" class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    @csrf
                                <div>
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Question</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea id="ckeditor" name="question" class="form-control"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Question Image</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="q_url" type="file" class="form-control" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Answer Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control" name="ans_type">
                                            <option disabled selected>
                                                Select Answer Type
                                            </option>
                                            <option value="MCQ">
                                                MCQ
                                            </option>
                                            <option value="Grid_in">
                                                Grid in
                                            </option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Difficulty</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control" name="difficulty">
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
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Question Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control" name="q_type">
                                            <option disabled selected>
                                                Select Question Type
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
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Category</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select class="form-control sel_cate2" name="category_id">
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
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Course</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select class="form-control sel_course2" name="course_id">
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
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Chapter</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select class="form-control sel_chapter2" name="chapter_id">
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
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Lesson</label>
                                        <!--begin::Input-->
                                        <select class="form-control sel_lesson2" name="lesson_id">
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
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Year</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select class="form-control" name="year">
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
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Month</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <input class="form-control" name="month" type="month" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Code</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <input class="form-control" name="q_code" placeholde="Code" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Question Num</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <input class="form-control" name="q_num" placeholde="Question Num" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Section</label>
                                        <!--begin::Input-->
                                        <select class="form-control" name="section">
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
                                    <!--end::Input group-->
                                    
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 5-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bold text-gray-900">Answers</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-2 d-flex align-items-center"> 
                                        <div class="section_add_idea" style="margin-left:15px ">
                                            <button id="add_new_idea" type="button" class="my-3 btn_add btn btn-lg btn-primary d-inline-block">Add New Answer</button>
                                        </div>
                                    </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                   <div class="ideas" id="ideas">

                                    <div class="idea">
                                        <div class="section_idea">
                                            <span>Answer PDF</span>
                                            <input type="file" name="ans_pdf[]" class="form-control form-control-lg form-control-solid">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Answer Video</span>
                                            <input type="file" name="ans_video[]" class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                                    <script>
                                        let add_new_idea = document.querySelector('#add_new_idea');
                                        let ideas = document.querySelector('.ideas');
                                        add_new_idea.addEventListener('click', () => {
                                            ideas.innerHTML += `
                                            <hr />
                                            <div class="idea">
                                                <div class="section_idea">
                                                    <span>Answer PDF</span>
                                                    <input type="file" name="ans_pdf[]" class="form-control form-control-lg form-control-solid">
                                                </div>
                                                <div class="section_syllabus">
                                                    <span>Answer Video</span>
                                                    <input type="file" name="ans_video[]" class="form-control form-control-lg form-control-solid">
                                                </div>
                                            </div>`;
                                        })
                                    </script>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous" data-kt-stepper-state="hide-on-last-step">
                                    <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Back</button>
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Wrapper-->
                                <div>
                                    <button class="btn btn-lg btn-primary" >
                                        Submit 
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i></button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>
       @section('script')
<script>
let sel_cate2 = document.querySelector('.sel_cate2');
let sel_course2 = document.querySelector('.sel_course2');
let sel_chapter2 = document.querySelector('.sel_chapter2');
let sel_lesson2 = document.querySelector('.sel_lesson2');
sel_cate2.addEventListener('change', ( e ) => {
    sel_course2.innerHTML = `                            
    <option disabled selected>
        Select Course
    </option>`;
    courses.forEach(element => {
        if ( e.target.value == element.category_id ) {
        sel_course2.innerHTML += `                            
        <option value="${element.id}">
            ${element.course_name}
        </option>`;
            
        }
    });
});
sel_course2.addEventListener('change', ( e ) => {
    sel_chapter2.innerHTML = `                            
    <option disabled selected>
        Select Chapter
    </option>`;
    chapters.forEach(element => {
        if ( e.target.value == element.course_id ) {
        sel_chapter2.innerHTML += `                            
        <option value="${element.id}">
            ${element.chapter_name}
        </option>`;
            
        }
    });
});
sel_chapter2.addEventListener('change', ( e ) => {
    sel_lesson2.innerHTML = `                            
    <option disabled selected>
        Select Lesson
    </option>`;
    lessons.forEach(element => {
        if ( e.target.value == element.chapter_id ) {
        sel_lesson2.innerHTML += `                            
        <option value="${element.id}">
            ${element.lesson_name}
        </option>`;
            
        }
    });
});
</script>

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
		<script src="assets/plugins/global/lessonSc.js"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/lessonSc.js') }}"></script>

		<script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace("ckeditor");
        </script>
       </script>
       @endsection 