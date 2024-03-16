
    @section('title','Add Student')


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
                    
                    <form class="px-3" method="POST" 
                    action="{{route('student_add')}}">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                @csrf
                                <div>
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
                                        <label>Parent E-mail</label>
                                        <input class='form-control' name="parent_email" placeholder="Parent E-mail" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Parent Phone</label>
                                        <input class='form-control' name="parent_phone" placeholder="Parent Phone" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Password</label>
                                        <input class='form-control' type="password" name="password" placeholder="Password" />
                                    </div> 
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

