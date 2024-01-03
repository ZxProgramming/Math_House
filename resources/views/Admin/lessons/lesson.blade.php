
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>

    @section('title','Lesson')
       @include('success')

       <style>
        .ideas{
        width: 100%;
        display: flex; 
        flex-direction: column;
        align-items: center;
        justify-content:flex-start;
        row-gap: 1.2rem;
        }
        .idea{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        row-gap: 1rem;
        padding-bottom: 20px;
        border-bottom: 1px solid #dbdbdb;
        }
        .idea .section_idea{
            display: flex;
            align-items: center;
            justify-content: space-between;
            
        }
        .idea .section_idea > span{
            font-size: 1.2rem
        }
        .idea .section_idea > input{
            width: 80% !important;
        }
        .idea .section_syllabus{
            display: flex;
            align-items: center;
            justify-content: space-between;
            
        }
        .idea .section_syllabus > span{
            font-size: 1.2rem
        }
        .idea .section_syllabus > input{
            width: 80% !important;
        }
        .idea .section_pdf{
            display: flex;
            align-items: center;
        }
        .idea .section_pdf > span{
            font-size: 1.2rem;
            margin-right: 15px;
        }
        .idea .section_pdf > input{
            font-size: 1.1rem;
        }
        .idea .section_video_link{
            display: flex;
            align-items: center;
            justify-content: space-between;
            
        }
        .idea .section_video_link > span{
            font-size: 1.2rem
        }
        .idea .section_video_link > input{
            width: 80% !important;
        }
        .idea .section_add_idea{
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .idea .section_add_idea  > button{
            background: red !important;
        }
        .idea .section_add_idea  > button:hover:not(.btn-active){
            background: rgb(144, 18, 18) !important;
        }
    </style>

    <script>

    </script>
	<!--begin::Action-->
    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add Lesson</a>
    <!--end::Action-->


<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Lesson</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Chapter</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($lessons as $lesson)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$lesson->lesson_name}}
            </td>
            <td>
                {{$lesson->chapter->course->category->cate_name}}
            </td> 
            <td>
                {{$lesson->chapter->course->course_name}}
            </td>
            <td>
                {{$lesson->chapter->chapter_name}}
            </td>
            
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$lesson->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$lesson->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('lesson_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$lesson->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                            <div class="my-2 px-3">
                              <label>
                                Lesson Name
                              </label>
                              <input class='form-control' name="lesson_name" value="{{$lesson->lesson_name}}" placeholder="Lesson Name" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Lesson Description
                            </label>
                            <input class='form-control' name="lesson_des" value="{{$lesson->lesson_des}}" placeholder="Lesson Description" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Chapter
                            </label>
                            <select class="form-control" name="chapter_id">
                                <option value="{{$lesson->chapter->id}}">
                                    {{$lesson->chapter->chapter_name}}
                                </option>
                                @foreach($chapters as $chapter)
                                <option value="{{$chapter->id}}">
                                    {{$chapter->chapter_name}}
                                </option>
                                @endforeach
                            </select>   
                            </div>


                              <input type="hidden" value="{{$lesson->id}}" name="id" />
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
                        <div class="modal fade" id="modalDelete{{$lesson->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$lesson->lesson_name}} Lesson ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_lesson', ['id'=>$lesson->id])}}" class="btn btn-danger">Delete</a>
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

    <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Add Lesson</h2>
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
                <div class="modal-body m-5">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_campaign_stepper">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center py-2">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title"></h3>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">INFO</h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Details</h3>
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Ideas</h3>
                            </div>
                            <!--end::Step 4-->
                         </div>
                         <!--end::Nav-->
                         <!--begin::Form-->
                         <form class="mx-auto w-100 mw-600px pt-15 pb-10" method="POST" action="{{ route('addLesson') }}" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold d-flex align-items-center text-gray-900">Information About Lesson Details  
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Campaign name will be used as reference within your campaign reports">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span></h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Lesson Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="lesson_name" placeholder="" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    {{-- Start Selector category --}}
                                    <div class="row g-9 mb-8">
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">Category</label>
									<select class="form-select sel_cate form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Category" name="category_id">
										<option disable selected>Select Category...</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->cate_name}}</option>
                                        @endforeach
									</select>
								</div>
                                
                                <input type="hidden" class="categories" value="{{$categories}}" />
                                <input type="hidden" class="courses" value="{{$courses}}" />
                                <input type="hidden" class="chapters" value="{{$chapters}}" />
                                <script>
                                    let categories = document.querySelector('.categories');
                                    let courses = document.querySelector('.courses');
                                    let chapters = document.querySelector('.chapters');
                                    let sel_cate = document.querySelector('.sel_cate');
                                    let sel_course = document.querySelector('.sel_course');
                                    let sel_chapter = document.querySelector('.sel_chapter');
                                    courses = courses.value;
                                    courses = JSON.parse(courses);
                                    sel_cate.addEventListener('change', () => {
                                        sel_course.innerHTML=`<option disable selected>Select Course...</option>`;
                                        courses.forEach(element => {
                                            
                                        });
                                    });
                                </script>
								<!--end::Col-->
								<!--begin::Col-->
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">Courses</label>
									<select class="form-select sel_course form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Courses" name="course_id">
										<option disable selected>Select Course...</option>
                                        @foreach($courses as $course)
										<option value="{{$course->id}}">{{$course->course_name}}</option>
                                        @endforeach
									</select>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">Chapter</label>
									<select class="form-select sel_chapter form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Chapter" name="chapter_id">
										<option disable selected>Select Chapter...</option>
                                        @foreach($chapters as $chapter)
										<option value="{{$chapter->id}}">{{$chapter->chapter_name}}</option>
                                        @endforeach
									</select>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-12 fv-row">
									<label class="required fs-6 fw-semibold mb-2">Descrition</label>
									<textarea name="lesson_des" class="form-control" placeholder="Description"></textarea>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-md-12 fv-row">
									<label class="required fs-6 fw-semibold mb-2">Image</label>
									<Input name="lesson_url" class="form-control" type="file" />
								</div>
								<!--end::Col-->
								<!--begin::Col-->
							
								<!--end::Col-->
							    </div>
                                    {{-- Start Selector category --}}
                                    <!--end::Input group-->
                                 
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 1-->

                            <!--begin::Step 2-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bold text-gray-900">Details about Lesson</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                     
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                  
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Teacher</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Category" name="teacher_id">
                                                <option disabled selected>Select Teacher...</option>
                                                @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="d-flex flex-column mb-5 fv-row">

                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Pre requisition</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" rows="3" name="pre_requisition" placeholder="Pre requisition"></textarea>
                                        <!--end::Input-->
                                    </div>
                                
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">What you Gain</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" rows="3" name="gain" placeholder="What you Gain"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                           
                                    <!--end::Wrapper-->
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bold text-gray-900">Ideas</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-2 d-flex align-items-center">If you need add more idea, please check 
                                        <div class="section_add_idea" style="margin-left:15px ">
                                            <button id="add_idea" type="button" class="btn_add btn btn-lg btn-primary add_idea_btn d-inline-block">Add New Idea</button>
                                        </div>
                                    </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                   <div class="ideas_div">

                                    <div class="idea">
                                        <div class="section_idea">
                                            <span>Idea</span>
                                            <input name="idea[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Syllabus</span>
                                            <input name="syllabus[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Idea Order</span>
                                            <input name="idea_order[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_pdf">
                                            <span>Pdf</span>
                                            <input name="pdf[]" type="file" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_video_link">
                                            <span>Video Link</span>
                                            <input name="v_link[]" type="text" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <script>
                                        let add_idea_btn = document.querySelector('.add_idea_btn');
                                        let ideas_div = document.querySelector('.ideas_div');
                                        add_idea_btn.addEventListener('click', () => {
                                            ideas_div.innerHTML += `
                                    <div class="idea">
                                        <div class="section_idea">
                                            <span>Idea</span>
                                            <input name="idea[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Syllabus</span>
                                            <input name="syllabus[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_syllabus">
                                            <span>Idea Order</span>
                                            <input name="idea_order[]" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_pdf">
                                            <span>Pdf</span>
                                            <input name="pdf[]" type="file" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_video_link">
                                            <span>Video Link</span>
                                            <input name="v_link[]" type="text" class="form-control form-control-lg">
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
                                        })
                                    </script>
                                </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bold text-gray-900">Budget Estimates</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-4">If you need more info, please check 
                                        <a href="#" class="link-primary">Campaign Guidelines</a></div>
                                        <!--end::Description-->
                                        <button type="submit">Submit</button>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Campaign Duration 
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Choose how long you want your ad to run for">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span></label>
                                        <!--end::Label-->
                                        <!--begin::Duration option-->
                                        <div class="d-flex gap-9 mb-7">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-outline btn-outline-dashed btn-active-light-primary active" id="kt_modal_create_campaign_duration_all">Continuous duration
                                            <br />
                                            <span class="fs-7">Your ad will run continuously for a daily budget.</span></button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-outline btn-outline-dashed btn-active-light-primary btn-outline-default" id="kt_modal_create_campaign_duration_fixed">Fixed duration
                                            <br />
                                            <span class="fs-7">Your ad will run on the specified dates only.</span></button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Duration option-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid d-none" placeholder="Pick date & time" id="kt_modal_create_campaign_datepicker" />
                                        <!--end::Datepicker-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Daily Budget 
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Choose the budget allocated for each day. Higher budget will generate better results">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span></label>
                                        <!--end::Label-->
                                        <!--begin::Slider-->
                                        <div class="d-flex flex-column text-center">
                                            <div class="d-flex align-items-start justify-content-center mb-7">
                                                <span class="fw-bold fs-4 mt-1 me-2">$</span>
                                                <span class="fw-bold fs-3x" id="kt_modal_create_campaign_budget_label"></span>
                                                <span class="fw-bold fs-3x">.00</span>
                                            </div>
                                            <div id="kt_modal_create_campaign_budget_slider" class="noUi-sm"></div>
                                        </div>
                                        <!--end::Slider-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Step 4-->
                            <!--begin::Step 5-->
                            <div data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-12 text-center">
                                        <!--begin::Title-->
                                        <h1 class="fw-bold text-gray-900">Campaign Created!</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="fw-semibold text-muted fs-4">You will receive an email with with the summary of your newly created campaign!</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center pb-20">
                                        <button id="kt_modal_create_campaign_create_new" type="button" class="btn btn-lg btn-light me-3" data-kt-element="complete-start">Create New Campaign</button>
                                        <a href="" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="Coming Soon">View Campaign</a>
                                    </div>
                                    <!--end::Actions-->
                                    <!--begin::Illustration-->
                                    <div class="text-center px-4">
                                        <img src="assets/media/illustrations/sketchy-1/9.png" alt="" class="mww-100 mh-350px" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                            </div>
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
										<button type="submit" class="btn btn-lg btn-primary">
											Done
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
        <!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/global/lessonSc.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="../../assets/js/widgets.bundle.js"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/lessonSc.js') }}"></script>

       </script>
       @endsection      
</x-default-layout>






