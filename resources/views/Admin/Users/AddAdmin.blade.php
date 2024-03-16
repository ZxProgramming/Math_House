 @error('name')
     <div class="alert alert-danger">
         {{ $message }}
     </div>
 @enderror
 @error('email')
     <div class="alert alert-danger">
         {{ $message }}
     </div>
 @enderror
 @error('phone')
     <div class="alert alert-danger">
         {{ $message }}
     </div>
 @enderror
 @include('success')

 <div class="modal fade" id="kt_modal_create_question" tabindex="-1" aria-hidden="true">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-fullscreen p-9">
         <!--begin::Modal content-->
         <div class="modal-content modal-rounded">
             <!--begin::Modal header-->
             <div class="modal-header py-7 d-flex justify-content-between">
                 <!--begin::Modal title-->
                 <h2>Add Admin</h2>
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

                     <form class="px-3" method="POST" action="{{ route('add_admin') }}">
                         @csrf
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

                         <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                             <input class="form-check-input" type="checkbox" value="Marketing" name="roles[]"
                                 checked='checked'>
                             <label class="form-check-label">Marketing</label>
                         </div>

                         <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                             <input class="form-check-input" type="checkbox" value="Questions" name="roles[]"
                                 checked='checked'>
                             <label class="form-check-label">Questions</label>
                         </div>

                         <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                             <input class="form-check-input" type="checkbox" value="Teacher" name="roles[]"
                                 checked='checked'>
                             <label class="form-check-label">Teacher</label>
                         </div>

                         <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                             <input class="form-check-input" type="checkbox" value="Student" name="roles[]"
                                 checked='checked'>
                             <label class="form-check-label">Student</label>
                         </div>

                         <div class="my-3 form-check form-switch form-switch-sm form-check-custom form-check-solid">
                             <input class="form-check-input" type="checkbox" value="Lesson" name="roles[]"
                                 checked='checked'>
                             <label class="form-check-label">Lesson</label>
                         </div>

                         <div class="mt-3">
                             <button class='btn btn-primary'>
                                 Submit
                             </button>
                             <button class='btn btn-danger' type="reset">
                                 Clear
                             </button>
                         </div>
                     </form>
                     {{--  End Page One --}}
                 </div>

             </div>
             <!--end::Wrapper-->
         </div>
         <!--end::Step 1-->
         </form>
         <!--end::Form-->
     </div>
     <!--end::Stepper-->
 </div>
 <!--begin::Modal body-->
 </div>
 </div>
 </div>
