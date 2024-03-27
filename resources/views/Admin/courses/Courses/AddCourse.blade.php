
    @section('title','Add Course')

@error('course_name')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('teacher_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('course_price')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('category_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror



<!--end::Action-->

<div class="modal fade" id="kt_modal_create_question" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-fullscreen p-9">
    <!--begin::Modal content-->
    <div class="modal-content modal-rounded">
        <!--begin::Modal header-->
        <div class="modal-header py-7 d-flex justify-content-between">
            <!--begin::Modal title-->
            <h2>Add Question</h2>
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
                
                    <form class="px-3" action="{{route('course_add')}}" 
                    method="POST" enctype="multipart/form-data">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            @csrf
                            <div>
                                {{--  Page One --}}
                                <div class='my-3'>
                                    <label>Course Name</label>
                                    <input class='form-control' name="course_name" placeholder="Course Name" />
                                </div>
                                <div class='my-3'>
                                    <label>Category</label>
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
                                </div> 
                                <div class='my-3'>
                                    <label>Description</label>
                                    <textarea class='form-control' name="course_des" placeholder="Description" ></textarea>
                                </div>
                                
                                <div class='my-3'>
                                    <label>Image</label>
                                    <input class='form-control' type="file" name="course_url" placeholder="Image" />
                                </div>
                                {{--  End Page One --}}
                            </div>

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">

                            {{-- Page Two --}}

                            <div class='my-3'>
                                <label>Teachers</label>
                                <select name="teacher_id" class="form-control">
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">
                                        {{$teacher->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='my-3'>
                                <label>Pre requisition</label>
                                <textarea class='form-control' name="pre_requisition" placeholder="Pre requisition" ></textarea>
                            </div>
                            <div class='my-3'>
                                <label>What you gain</label>
                                <textarea class='form-control' name="gain" placeholder="What you gain" ></textarea>
                            </div>
                            {{-- End Page Two --}}
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 5-->
                    <div data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            {{-- Page Three --}}
                            <div class="pricing_data">
                                <div class="section_idea my-3 d-flex align-items-center">
                                    <span>Duration</span>
                                    <input type="number" name="duration[]" class="form-control mx-2 form-control-lg" placeholder="Duration" />
                                    <span>Dayes</span>
                                </div>

                                <div class='my-3'>
                                    <label>Price</label>
                                    <input class='form-control' name="price[]" placeholder="Price" />
                                </div>
                                <div class='my-3'>
                                    <label>Discount</label>
                                    <input class='form-control' name="discount[]" placeholder="Discount" />
                                </div>
                                <hr />
                            </div>
                            <div class="mt-3">
                                <button type="button" class='btn btn-success pricing_button'>
                                    Add New Pricing
                                </button>
                            </div>
                            {{-- End Page Three --}}
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    
                    <!--end::Step 5-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-stack pt-10">
                        <!--begin::Wrapper-->
                        <div class="me-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3"
                                data-kt-stepper-action="previous">
                                <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Back</button>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        <div>
                            <button class="btn btn-lg btn-primary">
                                Submit
                            </button>
                            <button type="button" class="btn btn-lg btn-primary continue_btn"
                                data-kt-stepper-action="next">Continue
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
        <!--begin::Javascript
        -->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="assets/plugins/global/lessonSc.js"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/lessonSc.js') }}"></script>


    </script>
    <!--
                       The "super-build" of CKEditor&nbsp;5 served via CDN contains a large set of plugins and multiple editor types.
                       See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
                   -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
    <!--
                       Uncomment to load the Spanish translation
                       <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/translations/es.js"></script>
                   -->
   

<script>
    let pricing_data = document.querySelector('.pricing_data');
    let pricing_button = document.querySelector('.pricing_button');
    let data_add = pricing_data.innerHTML;
    pricing_button.addEventListener('click', () => {
        pricing_data.innerHTML += data_add;
    })
</script>
<script>
    let info_section = document.querySelector('.info_section');
    let details_section = document.querySelector('.details_section');
    let priceing_section = document.querySelector('.priceing_section');
    let details_btn = document.querySelector('.details_btn');
    let pricing_btn = document.querySelector('.pricing_btn');
    details_btn.addEventListener('click', () => {
    info_section.classList.add('d-none');
    details_section.classList.remove('d-none');
    });
    pricing_btn.addEventListener('click', () => {
    details_section.classList.add('d-none');
    priceing_section.classList.remove('d-none');
    });
</script>

@endsection