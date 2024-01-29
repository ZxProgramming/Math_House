
<x-default-layout> 
    @section('title','Questions')
 
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
            <form action="{{route('filter_question')}}" method="POST">
                @csrf
                <div class="modal-body scroll-y m-5">
                    <div class="d-flex">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Category Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="category_id" class="form-control">
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
                        <select name="course_id" class="form-control sel_course">
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
                        <select name="chapter_id" class="form-control sel_chapter">
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
                        <select name="lesson_id" class="form-control sel_lesson">
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
                        <select name="q_type" class="form-control">
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
                        <select name="section" class="form-control">
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
                        <select name="year" class="form-control">
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
                        <select name="month" class="form-control">
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
                        <select name="difficulty" class="form-control">
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
            </form>
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
    <a href="#" class="er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_question{{$question->id}}">view</a>
    
    <div class="modal fade" id="kt_modal_question{{$question->id}}" tabindex="-1" aria-hidden="true">
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
                  {{$question->question}}
                  <br />
                  <br />
                  @if( !empty($question->q_url) )
                  <img src="{{asset('images/questions/' . $question->q_url)}}" />
                  @endif
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
    </div>
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
    <button type="button" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_edit{{$question->id}}">Edit</button>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$question->id}}">
        Delete
    </button>
    
    <div class="modal fade" id="kt_modal_edit{{$question->id}}" tabindex="-1" aria-hidden="true">
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
                        <form action="{{route('q_edit', ['id' => $question->id])}}" method="POST" enctype="multipart/form-data" class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
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
                                    <textarea name="question" class="form-control">{{$question->question}}</textarea>
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
                                            <option selected value="{{$question->ans_type}}">
                                                {{$question->ans_type}}
                                            </option>
                                            <option disabled>
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
                                    @if( $question->ans_type == 'MCQ' )
                                    <div class="my-2">
                                        <input name="mcq_answers" value="A" id="mcq_a" type="radio" />
                                        <label for="mcq_a">
                                            A
                                        </label>
                                        <input class="form-control" name="mcq_ans[]" placeholder="Answer A" />
                                        </div>
                                        <div class="my-2">
                                        <input name="mcq_answers" value="B" id="mcq_b" type="radio" />
                                        <label for="mcq_b">
                                            B
                                        </label>
                                        <input class="form-control" name="mcq_ans[]" placeholder="Answer B" />
                                        </div>
                                        <div class="my-2">
                                        <input name="mcq_answers" value="C" id="mcq_c" type="radio" />
                                        <label for="mcq_c">
                                            C
                                        </label>
                                        <input class="form-control" name="mcq_ans[]" placeholder="Answer C" />
                                        </div>
                                        <div class="my-2">
                                        <input name="mcq_answers" value="D" id="mcq_d" type="radio" />
                                        <label for="mcq_d">
                                            D
                                        </label>
                                        <input class="form-control" name="mcq_ans[]" placeholder="Answer D" />
                                    </div>
                                    @else
                                        <input type="number" class="form-control" name="grid_ans[]" placeholder="Answer" />
                                        <button type="button" class="btn btn-success mx-2">Add</button>
                                    @endif
                                    <div class="mb-10 fv-row">
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Difficulty</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control" name="difficulty">
                                            <option value="{{$question->difficulty}}" selected>
                                            {{$question->difficulty}}
                                            </option>
                                            <option disabled>
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
                                        <select class="form-control" name="course_id">
                                            <option disabled selected>
                                                Select Course
                                            </option>
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
                                        <select class="form-control" name="chapter_id">
                                            <option disabled selected>
                                                Select Chapter
                                            </option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Lesson</label>
                                        <!--begin::Input-->
                                        <select class="form-control" name="lesson_id">
                                            <option value="{{$question->lesson_id}}" selected>
                                            {{$question->lessons->lesson_name}}
                                            </option>
                                            <option disabled>
                                                Select Lesson
                                            </option>
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
                                            <option value="{{$question->year}}" selected>
                                                {{$question->year}}
                                            </option>
                                            <option disabled>
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
                                        <select class="form-control" name="month">
                                            <option value="{{$question->month}}">{{$question->month}}</div>
                                            <option value="Jan">Jan</div>
                                            <option value="Fab">Fab</div>
                                            <option value="Mar">Mar</div>
                                            <option value="April">April</div>
                                            <option value="May">May</div>
                                            <option value="June">June</div>
                                            <option value="July">July</div>
                                            <option value="Aug">Aug</div>
                                            <option value="Sept">Sept</div>
                                            <option value="Oct">Oct</div>
                                            <option value="Nov">Nov</div>
                                            <option value="Dec">Dec</div>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Code</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select name="q_code" class="form-control">
                                            <option value="{{$question->q_code}}" selected>{{$question->q_code}}</option>
                                            <option disabled>Select Exam Code</option>
                                            @foreach($exams as $exam)
                                            <option value="{{$exam->id}}">{{$exam->exam_code}}</option>
                                            @endforeach 
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Section</label>
                                        <!--begin::Input-->
                                        <select class="form-control" name="section">
                                            <option value="{{$question->section}}" selected>
                                                {{$question->section}}
                                            </option>
                                            <option disabled>
                                                Select Section
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
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Question Num</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <input value="{{$question->q_num}}" type="number" min="0" max="80" class="form-control" name="q_num" placeholde="Question Num" required />
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
                                    <div class="idea">
                                    <hr />
                                        <div class="section_idea">
                                            <span>Answer PDF</span>
                                            <input type="file" name="ans_pdf[]" class="form-control form-control-lg form-control-solid">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Answer Video</span>
                                            <input type="file" name="ans_video[]" class="form-control form-control-lg form-control-solid">
                                        </div>
                                        <button type="button" class="btn btn-danger btn_remove_idea">Remove</button>
                                    </div>`;
                                let btn_remove_idea = document.querySelectorAll('.btn_remove_idea');
                                for (let i = 0, end = btn_remove_idea.length; i < end; i++) {
                                    btn_remove_idea[i].addEventListener('click', ( e ) => {
                                        for (let j = 0; j < end; j++) {
                                            if ( e.target == btn_remove_idea[j] ) {
                                                btn_remove_idea[j].parentElement.remove()
                                            }
                                        }
                                    });
                                }
                                });
                            </script>
                            <!--end::Step 5-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-10">
                                <!--begin::Wrapper-->
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
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