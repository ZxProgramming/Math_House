
<x-default-layout> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
  $(document).ready(()=>{
    $(".details_btn").click(function(){
        var info_id = `#${$(this).parent().attr("id")}`;
        var details_id = `#${$(this).parent().next().attr("id")}`;
        
        
        $(info_id).addClass("d-none");
        $(details_id).removeClass("d-none");
        
      });
      $(".pricing_btn").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var priceing_id = `#${$(this).parent().next().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(priceing_id).removeClass("d-none");
      });

      $(".prev_info").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var info_id = `#${$(this).parent().prev().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(info_id).removeClass("d-none");
      });

      $(".prev_details").click(function(){
        var priceing_id = `#${$(this).parent().parent().attr("id")}`;
        var details_id = `#${$(this).parent().parent().prev().attr("id")}`;
       
        $(priceing_id).addClass("d-none");
        $(details_id).removeClass("d-none");
      });

  })
</script>
<script>
  $(document).ready(()=>{ 

    $(".add_new_Pricing").each((ele,val)=>{
        
        var poi_id = `#${$(val).attr("id")}`
        
        $(poi_id).click(()=>{
            console.log(poi_id)
          console.log(ele);
          var ele_count = ++ele;
          console.log(ele_count);
          console.log("ele_count");

            var sec_id = `#${$(poi_id).parent().parent().parent().find(".Prices").attr("id")}`;

                Prices = ` <div class="Price">
                  <hr />
                    <div class="section_idea my-2">
                        <span>Idea</span>
                        <input type="text" name="idea[]" class="form-control form-control-lg" placeholder="Idea">
                    </div>
                    <div class="section_idea my-2">
                        <span>Syllabus</span>
                        <input name="syllabus[]" class="form-control form-control-lg" placeholder="Syllabus">
                    </div>
                    <div class="section_idea my-2">
                      <span>Idea Order</span>
                      <input name="ideaOrder[]" class="form-control form-control-lg" placeholder="Idea Order">
                    </div>
                    <div class="section_idea my-2">
                      <span>Video Link</span>
                      <input name="videoLink[]" class="form-control form-control-lg" placeholder="Video Link">
                    </div>
                    <div class="section_idea my-2">
                      <span>Pdf</span>
                      <input type="file" name="Pdf[]" class="form-control form-control-lg">
                    </div>
                    <button type="button" class="col-md-12 btn btn-danger btn_remove_idea" id="btn${ele_count}">Remove</button>
                    </div>`;
                          
              $(sec_id).append(Prices);

              $(".btn_remove_idea").each((elebt,valbt) => {
                    var btnId =`#${$(valbt).attr("id")}`

                    $(btnId).click(()=>{
                        $(btnId).parent().remove();
                    })
                })
            });
            
    });

  })
</script>
    @section('title','Questions')
    <form action="{{route('filter_question')}}" method="POST">
                @csrf
                <div class="modal-body scroll-y m-5">
                    <div class="d-flex">
                    <!--begin::Input group-->
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="mb-5 fv-row w-300px mx-2"> 
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
                    <div class="d-flex" style="align-items: flex-end;justify-content: space-between">

                        <div class="mb-2 fv-row w-300px mx-2"> 
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
                     <button class="btn btn-primary">
                        Filter
                    </button>
                        </div>
                    <!--end::Input group-->

                   
                </div>
    </form>
 
	<!--begin::Action-->
    {{-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Questions Filter</a> --}}
    <!--end::Action-->
    
    {{-- <div class="modal fade" id="kt_modal_create_campaign" tabindex="-1" aria-hidden="true">
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
    </div> --}}
                
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="max-w-200px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Question</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">type</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">year</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">month</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">code</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Section</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Question No.</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Difficulty</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
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
        
                     <form method="POST"  action="{{route('q_edit', ['id' => $question->id])}}" class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate">
                              @csrf
                              <div class="modal fade" id="kt_modal_edit{{$question->id}}"  tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content px-2">
                                    <input type="hidden" value="{{$question->id}}" name="chapter_id" />

                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modalCenterTitle">Edit Question</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                        <div class="info_section" id="info_section{{$question->id}}">
                                             <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label mb-3">Question</label>
                                                    <!--end::Label-->
            
                                                <!--begin::Input-->
                                                <textarea id="editor" name="question" class="form-control">{{$question->question}}</textarea>
                                                <!--end::Input-->
        
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label mb-3">Question Image</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input name="q_url" type="file" class="form-control" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label mb-3">Answer Type</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-control ans_type" id="ans_type{{$question->id}}" name="ans_type">
                                                    <option value="{{$question->ans_type}}" selected>
                                                        {{$question->ans_type}}
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
                                                <input type="number" class="form-control" name="grid_ans[]" placeholder="Answer" />
                                                <button type="button" class="btn add_ans_btn btn-success mx-2">Add</button>
                                            </div>
                                            <div class="mb-10 fv-row ans_div">
                                            </div> 
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label mb-3">Difficulty</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-control" name="difficulty">
                                                    <option value="{{$question->difficulty}}" selected>
                                                        {{$question->difficulty}}
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
                                                    <option value="{{$question->q_type}}" selected>
                                                        {{$question->q_type}}
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
                                            <button type="button" class="btn btn-success details_btn my-3" id="details_btn{{$lesson->id}}">
                                                Next
                                            </button>
                                        </div>

                                        <div class="details_section d-none" id="details_section{{$question->id}}">
                                            <div class='my-3'>
                                                <label>Teacher</label>
                                                <select name="teacher_id" class="form-control">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">
                                                        {{$category->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class='my-3'>
                                                <label>Pre requisition</label>
                                                <textarea class='form-control' name="pre_requisition" placeholder="Pre requisition" >{{$question->pre_requisition}}</textarea>
                                            </div>
                                            <div class='my-3'>
                                                <label>What you gain</label>
                                                <textarea class='form-control' name="gain" placeholder="What you gain" >{{$question->gain}}</textarea>
                                            </div>
                                            <button type="button" class="btn btn-secondary prev_info my-3">
                                                Back
                                            </button>
                                            <button type="button" class="btn btn-success pricing_btn my-3">
                                                Next
                                            </button>
                                        </div>

                                        <div class="priceing_section d-none" id="priceing_section{{$question->id}}">
                                        
                                        
                                            <div class="text-muted fw-semibold fs-2 d-flex align-lessons-center"> 
                                                <div class="section_add_idea" style="margin-left:15px ">
                                                    <button id="add_new_Pricing{{$question->id}}" type="button" class="my-3 btn_add btn btn-lg btn-primary d-inline-block add_new_Pricing">Add New Pricing</button>
                                                </div>
                                            </div> 
                                            
                                            
                                            <div class='my-3'>
                                                    <label>Idea</label>
                                                    <input class='form-control' name="Idea" placeholder="Idea" />
                                                </div>
                                                <div class='my-3'>
                                                    <label>Syllabus</label>
                                                    <input class='form-control' name="Syllabus" placeholder="Syllabus" />
                                                </div>
                                                <div class='my-3'>
                                                    <label>Idea Order</label>
                                                    <input class='form-control' name="Idea Order" placeholder="Idea Order" />
                                                </div>
                                                <div class='my-3'>
                                                    <label>Video Link</label>
                                                    <input class='form-control' name="Idea Order" placeholder="Video Link" />
                                                </div>
                                                <div class='my-3'>
                                                    <label>Pdf</label>
                                                    <input type="file" class='form-control' name="Idea Order" />
                                                </div>

                                                <div class="mt-3 Prices" id="Prices{{$question->id}}"></div>

                                                <div class="my-3">
                                                    <span class='btn btn-secondary prev_details'>
                                                        Back
                                                    </span>
                                                    <button class='btn btn-primary'>
                                                        Submit
                                                    </button>
                                                </div>
                                        </div> 

                                </div>
                              </div>
                            </div>
                        </form>

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