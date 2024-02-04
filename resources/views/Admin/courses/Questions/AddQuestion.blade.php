 @php
     function fun_admin()
     {
         return 'admin';
     }
 @endphp

 <style>
     #container {
         width: 1000px;
         margin: 20px auto;
     }

     .ck-editor__editable[role="textbox"] {
         /* editing area */
         min-height: 200px;
     }

     .ck-content .image {
         /* block images */
         max-width: 80%;
         margin: 20px auto;
     }

     .screen {
         position: fixed;
         height: 100vh;
         width: 100vw;
         top: 0;
         left: 0;
         background-color: #000000cc;
         display: flex;
         align-items: center;
         justify-content: center;
         z-index: 111111;
     }

     .screen_popup {
         height: 300px;
         width: 300px;
         background-color: #fff;
         padding: 30px;
         position: relative;
     }

     .screen_popup img {
         width: 200px;
         height: 200px;
         border-radius: 50%;
         border: 1px solid #ccc;
     }

     .screen_text {
         color: red;
         font-weight: bold;
     }

     .close_btn {
         position: absolute;
         top: 20px;
         right: 20px;
         cursor: pointer;
     }
 </style>


 <div class="screen d-none">
     <div class="screen_popup">
         <img src="{{ asset('images/inc/1.jpg') }}" />
         <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
             <i class="ki-duotone close_btn ki-cross fs-1">
                 <span class="path1"></span>
                 <span class="path2"></span>
             </i>
         </div>
         <div class="screen_text"></div>
     </div>
 </div>

 <!--begin::Action-->
 @include('success')
 <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
     data-bs-target="#kt_modal_create_question">Add Question</a>
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
                     <form action="{{ route('add_q') }}" method="POST" enctype="multipart/form-data"
                         class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate"
                         id="kt_modal_create_campaign_stepper_form">
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
                                         <textarea id="editor" name="question" class="form-control"></textarea>
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
                                         <select class="form-control ans_type" name="ans_type">
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

                                     <div class="d-flex add_ans d-none">
                                         <input type="number" class="form-control" name="grid_ans[]"
                                             placeholder="Answer" />
                                         <button type="button" class="btn add_ans_btn btn-success mx-2">Add</button>
                                     </div>
                                     <div class="mb-10 fv-row ans_div">
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
                                         <select class="form-control q_type" name="q_type">
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
                                         @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">
                                                 {{ $category->cate_name }}
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
                                     <select class="form-control year" name="year">
                                         <option disabled selected>
                                             Select Year
                                         </option>
                                         @for ($i = 2000; $i <= date('Y'); $i++)
                                             <option value="{{ $i }}">
                                                 {{ $i }}
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
                                     <select class="form-control month" name="month">
                                         <option value="Jan">Jan</option>
                                         <option value="Fab">Fab</option>
                                         <option value="Mar">Mar</option>
                                         <option value="April">April</option>
                                         <option value="May">May</option>
                                         <option value="June">June</option>
                                         <option value="July">July</option>
                                         <option value="Aug">Aug</option>
                                         <option value="Sept">Sept</option>
                                         <option value="Oct">Oct</option>
                                         <option value="Nov">Nov</option>
                                         <option value="Dec">Dec</option>
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
                                         <option disabled selected>Select Exam Code</option>
                                         @foreach ($exams as $exam)
                                             <option value="{{ $exam->id }}">{{ $exam->exam_code }}</option>
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
                                     <select class="form-control section" name="section">
                                         <option disabled selected>
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
                                     <input type="number" min="0" max="80" class="form-control q_num"
                                         name="q_num" placeholde="Question Num" required />
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
                                             <button id="add_new_idea" type="button"
                                                 class="my-3 btn_add btn btn-lg btn-primary d-inline-block">Add New
                                                 Answer</button>
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
                                             <input type="file" name="ans_pdf[]"
                                                 class="form-control form-control-lg form-control-solid">
                                         </div>
                                         <div class="section_syllabus">
                                             <span>Answer Video</span>
                                             <input type="file" name="ans_video[]"
                                                 class="form-control form-control-lg form-control-solid">
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
                                     btn_remove_idea[i].addEventListener('click', (e) => {
                                         for (let j = 0; j < end; j++) {
                                             if (e.target == btn_remove_idea[j]) {
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
         // This sample still does not showcase all CKEditor&nbsp;5 features (!)
         // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
         CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
             // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
             toolbar: {
                 items: [
                     'exportPDF', 'exportWord', '|',
                     'findAndReplace', 'selectAll', '|',
                     'heading', '|',
                     'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                     'removeFormat', '|',
                     'bulletedList', 'numberedList', 'todoList', '|',
                     'outdent', 'indent', '|',
                     'undo', 'redo',
                     '-',
                     'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                     'alignment', '|',
                     'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                     '|',
                     'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                     'textPartLanguage', '|',
                     'sourceEditing'
                 ],
                 shouldNotGroupWhenFull: true
             },
             // Changing the language of the interface requires loading the language file using the <script> tag.
             // language: 'es',
             list: {
                 properties: {
                     styles: true,
                     startIndex: true,
                     reversed: true
                 }
             },
             // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
             heading: {
                 options: [{
                         model: 'paragraph',
                         title: 'Paragraph',
                         class: 'ck-heading_paragraph'
                     },
                     {
                         model: 'heading1',
                         view: 'h1',
                         title: 'Heading 1',
                         class: 'ck-heading_heading1'
                     },
                     {
                         model: 'heading2',
                         view: 'h2',
                         title: 'Heading 2',
                         class: 'ck-heading_heading2'
                     },
                     {
                         model: 'heading3',
                         view: 'h3',
                         title: 'Heading 3',
                         class: 'ck-heading_heading3'
                     },
                     {
                         model: 'heading4',
                         view: 'h4',
                         title: 'Heading 4',
                         class: 'ck-heading_heading4'
                     },
                     {
                         model: 'heading5',
                         view: 'h5',
                         title: 'Heading 5',
                         class: 'ck-heading_heading5'
                     },
                     {
                         model: 'heading6',
                         view: 'h6',
                         title: 'Heading 6',
                         class: 'ck-heading_heading6'
                     }
                 ]
             },
             // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
             placeholder: 'Welcome to CKEditor 5!',
             // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
             fontFamily: {
                 options: [
                     'default',
                     'Arial, Helvetica, sans-serif',
                     'Courier New, Courier, monospace',
                     'Georgia, serif',
                     'Lucida Sans Unicode, Lucida Grande, sans-serif',
                     'Tahoma, Geneva, sans-serif',
                     'Times New Roman, Times, serif',
                     'Trebuchet MS, Helvetica, sans-serif',
                     'Verdana, Geneva, sans-serif'
                 ],
                 supportAllValues: true
             },
             // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
             fontSize: {
                 options: [10, 12, 14, 'default', 18, 20, 22],
                 supportAllValues: true
             },
             // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
             // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
             htmlSupport: {
                 allow: [{
                     name: /.*/,
                     attributes: true,
                     classes: true,
                     styles: true
                 }]
             },
             // Be careful with enabling previews
             // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
             htmlEmbed: {
                 showPreviews: true
             },
             // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
             link: {
                 decorators: {
                     addTargetToExternalLinks: true,
                     defaultProtocol: 'https://',
                     toggleDownloadable: {
                         mode: 'manual',
                         label: 'Downloadable',
                         attributes: {
                             download: 'file'
                         }
                     }
                 }
             },
             // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
             mention: {
                 feeds: [{
                     marker: '@',
                     feed: [
                         '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                         '@chocolate', '@cookie', '@cotton', '@cream',
                         '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                         '@gummi', '@ice', '@jelly-o',
                         '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                         '@sesame', '@snaps', '@soufflé',
                         '@sugar', '@sweet', '@topping', '@wafer'
                     ],
                     minimumCharacters: 1
                 }]
             },
             // The "super-build" contains more premium features that require additional configuration, disable them below.
             // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
             removePlugins: [
                 // These two are commercial, but you can try them out without registering to a trial.
                 // 'ExportPdf',
                 // 'ExportWord',
                 'AIAssistant',
                 'CKBox',
                 'CKFinder',
                 'EasyImage',
                 // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                 // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                 // Storing images as Base64 is usually a very bad idea.
                 // Replace it on production website with other solutions:
                 // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                 // 'Base64UploadAdapter',
                 'RealTimeCollaborativeComments',
                 'RealTimeCollaborativeTrackChanges',
                 'RealTimeCollaborativeRevisionHistory',
                 'PresenceList',
                 'Comments',
                 'TrackChanges',
                 'TrackChangesData',
                 'RevisionHistory',
                 'Pagination',
                 'WProofreader',
                 // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                 // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                 'MathType',
                 // The following features are part of the Productivity Pack and require additional license.
                 'SlashCommand',
                 'Template',
                 'DocumentOutline',
                 'FormatPainter',
                 'TableOfContents',
                 'PasteFromOfficeEnhanced'
             ]
         });
     </script>
     <script>
         let ans_type = document.querySelector('.ans_type');
         let ans_div = document.querySelector('.ans_div');
         let add_ans = document.querySelector('.add_ans');
         let add_ans_btn = document.querySelector('.add_ans_btn');
         add_ans_btn.addEventListener('click', () => {
             ans_div.innerHTML +=
                 `<input type="number" class="form-control my-2" name="grid_ans[]" placeholder="Answer" />`;
         });
         ans_type.addEventListener('change', () => {
             ans_div.innerHTML = ``;
             if (ans_type.value == 'MCQ') {
                 add_ans.classList.add('d-none');
                 ans_div.innerHTML =
                     `<div class="my-2">
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
            </div>`;
             } else if (ans_type.value == 'Grid_in') {
                 add_ans.classList.remove('d-none');
             }
         })

         let sel_cate2 = document.querySelector('.sel_cate2');
         let sel_course2 = document.querySelector('.sel_course2');
         let sel_chapter2 = document.querySelector('.sel_chapter2');
         let sel_lesson2 = document.querySelector('.sel_lesson2');
         sel_cate2.addEventListener('change', (e) => {
             sel_course2.innerHTML = `                            
        <option disabled selected>
            Select Course
        </option>`;
             courses.forEach(element => {
                 if (e.target.value == element.category_id) {
                     sel_course2.innerHTML += `                            
            <option value="${element.id}">
                ${element.course_name}
            </option>`;

                 }
             });
         });
         sel_course2.addEventListener('change', (e) => {
             sel_chapter2.innerHTML = `                            
        <option disabled selected>
            Select Chapter
        </option>`;
             chapters.forEach(element => {
                 if (e.target.value == element.course_id) {
                     sel_chapter2.innerHTML += `                            
            <option value="${element.id}">
                ${element.chapter_name}
            </option>`;

                 }
             });
         });
         sel_chapter2.addEventListener('change', (e) => {
             sel_lesson2.innerHTML = `                            
        <option disabled selected>
            Select Lesson
        </option>`;
             lessons.forEach(element => {
                 if (e.target.value == element.chapter_id) {
                     sel_lesson2.innerHTML += `                            
            <option value="${element.id}">
                ${element.lesson_name}
            </option>`;

                 }
             });
         });

         let continue_btn = document.querySelector('.continue_btn');
         let q_num = document.querySelector('.q_num');
         let year = document.querySelector('.year');
         let month = document.querySelector('.month');
         let section = document.querySelector('.section');
         let q_type = document.querySelector('.q_type');
         let close_btn = document.querySelector('.close_btn');
         let screen = document.querySelector('.screen');
         let screen_text = document.querySelector('.screen_text');

         close_btn.addEventListener('click', () => {
             screen.classList.add('d-none');
         });

         continue_btn.addEventListener('click', () => {
             if ($('.q_num').val() != "") {
                 let obj = {
                     'year': year.value,
                     'month': month.value,
                     'section': section.value,
                     'q_num': q_num.value,
                     'q_type': q_type.value,
                     '_token': "{{ csrf_token() }}"
                 };

                 $.ajax({
                     url: "{{ route('question_type') }}",
                     type: 'POST',
                     data: obj,
                     success: function(data) {
                         console.log(data);
                         if (data != 1) {
                             screen.classList.remove('d-none');
                             screen_text.innerHTML = data;
                         }
                     }
                 })
             }
         });
     </script>
 @endsection
