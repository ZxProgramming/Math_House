 

@section('title','Add Teacher')

@error('name')
  <div class="alert alert-danger">
  {{$message}}
  </div>
@enderror
@error('email')
  <div class="alert alert-danger">
  {{$message}}
  </div>
@enderror 
@error('phone')
  <div class="alert alert-danger">
  {{$message}}
  </div>
@enderror
@error('course_id')
  <div class="alert alert-danger">
  {{$message}}
  </div>
@enderror

<a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
data-bs-target="#kt_modal_create_question">Add Teacher</a>
<!--end::Action-->

<div class="modal fade" id="kt_modal_create_question" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content modal-rounded">
            <!--begin::Modal header-->
            <div class="modal-header py-7 d-flex justify-content-between">
                <!--begin::Modal title-->
                <h2>Add Teacher</h2>
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
               
                    <!--begin::Form-->
                    
                        <form class="px-3" action="{{route('add_teacher')}}" 
                        method="POST" enctype="multipart/form-data">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                @csrf
                                <div>
                                    {{--  Page One --}}
                                <div class='my-3'>
                                    <label>Name</label>
                                    <input class='form-control' name="name" placeholder="Name" />
                                </div>
                                <div class='my-3'>
                                    <label>E-mail</label>
                                    <input class='form-control' name="email" placeholder="E-mail" />
                                </div>
                                <div class='my-3'>
                                    <label>Phone</label>
                                    <input class='form-control' name="phone" placeholder="Phone" />
                                </div>
                                
                                <div class='my-3'>
                                    <label>Password</label>
                                    <input class='form-control' type="password" name="password" placeholder="Password" />
                                </div> 

                                <div class='my-3'>
                                    <label>Category</label>
                                    <select name="category_id" class="form-control sel_cate">
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
                                <input class="categories" value="{{$categories}}" type="hidden" />
                                <input class="courses" value="{{$courses}}" type="hidden" />
                                <div class='my-3'>
                                    <label>Course</label>
                                    <select name="course_id" class="form-control sel_course">
                                        <option disabled selected>
                                            Select Course
                                        </option>
                                    </select>
                                </div>

                                <input class="form-control" type="file" name="image" />

                                    {{--  End Page One --}}
                                </div>
    
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
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
                                <button class='btn btn-danger' type="reset">
                                    Clear
                                </button>
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
    let sel_cate = document.querySelector('.sel_cate');
    let sel_course = document.querySelector('.sel_course');
    let courses = document.querySelector('.courses');
    courses = courses.value;
    courses = JSON.parse(courses);
    
    sel_cate.addEventListener('change', () => {
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
    });
</script>