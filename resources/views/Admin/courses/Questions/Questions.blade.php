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
                        <select class="form-control">
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
                    <div class="mb-10 fv-row w-300px mx-2"> 
                        <!--begin::Label-->
                        <label class="required form-label mb-3">Course Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control">
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
                        <select class="form-control">
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
                        <select class="form-control">
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