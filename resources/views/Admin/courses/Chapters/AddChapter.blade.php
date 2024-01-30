 
        
	<!--begin::Action-->
    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add Chapter</a>
    <!--end::Action-->
    
    <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Create Chapter</h2>
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
                                <h3 class="stepper-title">Pricing</h3>
                            </div>
                            <!--end::Step 3--> 
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <form method="POST" action="{{route('add_chapter')}}" class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form" enctype="multipart/form-data">
                            
                            <!--begin::Step 1-->
                            <div class="current" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    @csrf
                                <div>
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row"> 
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Chapter Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control" name="chapter_name" placeholder="Chapter Name" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Category</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control sel_cate" name="category_id">
                                            <option disabled selected>
                                                Select Category
                                            </option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->cate_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" class="categories" value="{{$categories}}" />
                                        <input type="hidden" class="courses" value="{{$courses}}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Course</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control sel_course" name="course_id">
                                            <option disabled selected>
                                                Select Course
                                            </option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Description</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control" name="ch_des" placeholder="Description"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class='my-3'>
                                        <label>Price</label>
                                        <input class='form-control' name="ch_price" placeholder="Chapter Price" />
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label mb-3">Image</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control" type="file" name="ch_url" placeholder="Image" />
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
                                        <label class="fs-6 fw-semibold mb-2">Teacher</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <select class="form-control" name="teacher_id">
                                            <option disabled selected>
                                                Select Teacher
                                            </option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">
                                                {{$teacher->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">Pre requisition</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <textarea class="form-control" name="pre_requisition" placeholder="Pre requisition"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold mb-2">What you gain</label>
                                        <!--End::Label-->
                                            
                                        <!--begin::Input-->
                                        <textarea class="form-control" name="gain" placeholder="What you gain"></textarea>
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
                                        <h1 class="fw-bold text-gray-900">Pricing</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-2 d-flex align-items-center"> 
                                        <div class="section_add_idea" style="margin-left:15px ">
                                            <button id="add_new_idea" type="button" class="my-3 btn_add btn btn-lg btn-primary d-inline-block">Add New Pricing</button>
                                        </div>
                                    </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                   <div class="ideas" id="ideas">

                                    <div class="idea">
                                        <div class="section_idea my-2 d-flex align-items-center">
                                            <span>Duration</span>
                                            <input type="number" name="duration[]" class="form-control mx-2 form-control-lg">
                                            <span>Dayes</span>
                                        </div>
                                        <div class="section_idea my-2">
                                            <span>Price</span>
                                            <input name="price[]" class="form-control form-control-lg">
                                        </div>
                                        <div class="section_idea my-2">
                                            <span>Discount</span>
                                            <input name="discount[]" class="form-control form-control-lg">
                                        </div>
                                    </div>

                                    
                            
                            
                            </div>
                                </div>
                            </div>
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
                                    <button type="button" class="btn btn-lg btn-primary continue_btn" data-kt-stepper-action="next">Continue 
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
<script>
    let add_new_idea = document.querySelector('#add_new_idea');
    let ideas = document.querySelector('.ideas');
    add_new_idea.addEventListener('click', () => {
        ideas.innerHTML += `
        <div class="idea">
        <hr />
            <div class="section_idea my-2 d-flex align-items-center">
                <span>Duration</span>
                <input type="number" name="duration[]" class="form-control mx-2 form-control-lg">
                <span>Dayes</span>
            </div>
            <div class="section_idea my-2">
                <span>Price</span>
                <input name="price[]" class="form-control form-control-lg">
            </div>
            <div class="section_idea my-2">
                <span>Discount</span>
                <input name="discount[]" class="form-control form-control-lg">
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
        let sel_cate = document.querySelector('.sel_cate');
        let sel_course = document.querySelector('.sel_course');
        let categories = document.querySelector('.categories');
        let courses = document.querySelector('.courses');
        courses = courses.value;
        courses = JSON.parse(courses);
        sel_cate.addEventListener('change', ()=>{
            sel_course.innerHTML = `
            <option disabled selected>
                Select Course
            </option>`;
            courses.forEach(element => {
                if ( sel_cate.value == element.category_id ) {
                    sel_course.innerHTML += `
                    <option value="${element.id}">
                        ${element.course_name}
                    </option>`;
                }
            });
        })
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