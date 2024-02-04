<x-default-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(() => {
            $(".details_btn").click(function() {
                var info_id = `#${$(this).parent().attr("id")}`;
                var details_id = `#${$(this).parent().next().attr("id")}`;


                $(info_id).addClass("d-none");
                $(details_id).removeClass("d-none");

            });
            $(".pricing_btn").click(function() {
                var details_id = `#${$(this).parent().attr("id")}`;
                var priceing_id = `#${$(this).parent().next().attr("id")}`;

                $(details_id).addClass("d-none");
                $(priceing_id).removeClass("d-none");
            });

            $(".prev_info").click(function() {
                var details_id = `#${$(this).parent().attr("id")}`;
                var info_id = `#${$(this).parent().prev().attr("id")}`;

                $(details_id).addClass("d-none");
                $(info_id).removeClass("d-none");
            });

            $(".prev_details").click(function() {
                var priceing_id = `#${$(this).parent().parent().attr("id")}`;
                var details_id = `#${$(this).parent().parent().prev().attr("id")}`;

                $(priceing_id).addClass("d-none");
                $(details_id).removeClass("d-none");
            });

        })
    </script>
    {{-- add pricing --}}
    <script>
        $(document).ready(() => {

            $(".add_new_Pricing").each((ele, val) => {

                var poi_id = `#${$(val).attr("id")}`

                $(poi_id).click(() => {
                    console.log(poi_id)
                    console.log(ele);
                    var ele_count = ++ele;
                    console.log(ele_count);
                    console.log("ele_count");

                    var sec_id =
                        `#${$(poi_id).parent().parent().parent().find(".Prices").attr("id")}`;

                    Prices = ` <div class="Price">
                  <hr />
                    <div class="section_idea">
                        <span>Answer PDF</span>
                        <input type="file" name="ans_pdf[]" class="form-control form-control-lg form-control-solid">
                    </div>
                    <div class="section_syllabus">
                        <span>Answer Video</span>
                        <input type="file" name="ans_video[]" class="form-control form-control-lg form-control-solid">
                    </div>
                    <button type="button" class="col-md-12 btn btn-danger btn_remove_idea" id="btn${ele_count}">Remove</button>
                    </div>`;

                    $(sec_id).append(Prices);

                    $(".btn_remove_idea").each((elebt, valbt) => {
                        var btnId = `#${$(valbt).attr("id")}`

                        $(btnId).click(() => {
                            $(btnId).parent().remove();
                        })
                    })
                });

            });

        })
    </script>
    {{-- Answer Type --}}
    <script>
        $(document).ready(() => {
            $(".answer_val").each((ansVal, ansEle) => {
                var answerEle = `#${$(ansEle).attr("id")}`
                var answerCon = `#${$(ansEle).parent().parent().find(".answer_con").attr("id")}`;
                var answeres = `#${$(answerEle).parent().parent().find(".answeres").attr("id")}`;
                var addAnswer = `#${$(answerEle).parent().parent().find(".add_answer").attr("id")}`;

                $(addAnswer).click(() => {
                    var ans =
                        `<input type="number" class="form-control my-2" name="grid_ans[]" placeholder="Answer" />`;
                    $(answeres).append(ans)
                })

                $(answerEle).change(() => {

                    console.log(answerEle);
                    console.log(answerCon);
                    console.log(answeres);

                    $(answeres).html('');


                    if ($(answerEle).val() == 'MCQ') {
                        console.log("yes")
                        $(answerCon).addClass('d-none');
                        var answer = ` <div class="my-2">
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
                        $(answeres).append(answer);
                    } else if ($(answerEle).val() == 'Grid_in') {
                        $(answerCon).removeClass('d-none');
                        console.log("nooo")
                    }
                })
            })

        })
    </script>
    <script>
        $(document).ready(() => {
            $(".sel_cate").each((selVal, selEle) => {
                var sel_cate = `#${$(selEle).attr("id")}`;
                var sel_course = `#${$(sel_cate).parent().parent().find(".sel_course").attr("id")}`;
                var sel_chapter = `#${$(sel_cate).parent().parent().find(".sel_chapter").attr("id")}`;
                var sel_lesson = `#${$(sel_cate).parent().parent().find(".sel_lesson").attr("id")}`;
                var sel_year = `#${$(sel_cate).parent().parent().find(".sel_year").attr("id")}`;
                var sel_month = `#${$(sel_cate).parent().parent().find(".sel_month").attr("id")}`;
                var sel_qcode = `#${$(sel_cate).parent().parent().find(".sel_qcode").attr("id")}`;
                var sel_section = `#${$(sel_cate).parent().parent().find(".sel_section").attr("id")}`;

                console.log(sel_cate);
                console.log(sel_course);
                console.log(sel_chapter)
                console.log(sel_lesson)
                console.log(sel_year)
                console.log(sel_month)
                console.log(sel_qcode)
                console.log(sel_section)

                $(sel_cate).change((e) => {
                    console.log("ddddddd")
                    var course = `                            
                <option disabled selected>
                                Select Course
                            </option>`;
                    courses.forEach(ele => {
                        if (e.target.value == ele.category_id) {
                            sel_course2.innerHTML += `                            
                        <option value="${ele.id}">
                            ${ele.course_name}
                            </option>`;
                            console.log("ffffff")

                        }
                    });
                })


            })
        })
        /*  let sel_cate2 = document.querySelector('.sel_cate2');
            let sel_course2 = document.querySelector('.sel_course2');
            let sel_chapter2 = document.querySelector('.sel_chapter2');
            let sel_lesson2 = document.querySelector('.sel_lesson2');
          
            sel_cate2.addEventListener('change', ( e ) => {
                sel_course2.innerHTML = `                            
            <option disabled selected>
                Select Course
            </option>`;
                courses.forEach(element => {
                    if ( e.target.value == element.category_id ) {
                    sel_course2.innerHTML += `                            
                <option value="${element.id}">
                    ${element.course_name}
                </option>`;
                        
                    }
                });
            });
            sel_chapter2.addEventListener('change', ( e ) => {
                sel_lesson2.innerHTML = `                            
            <option disabled selected>
                Select Lesson
            </option>`;
                lessons.forEach(element => {
                    if ( e.target.value == element.chapter_id ) {
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
                        'q_type' : q_type.value,
                        '_token': "{{ csrf_token() }}"
                        };
                        
                    $.ajax({
                        url: "{{ route('question_type') }}",
                        type: 'POST',
                        data: obj,
                        success:function(data){
                            console.log(data);
                            if ( data != 1 ) {
                            screen.classList.remove('d-none');
                            screen_text.innerHTML = data;
                            }
                        }
                    })
                }
            }); */
    </script>
    @section('title', 'Questions')
    <form action="{{ route('filter_question') }}" method="POST">
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
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->cate_name }}
                            </option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <input type="hidden" class="categories" value="{{ $categories }}" />
                <input type="hidden" class="courses" value="{{ $courses }}" />
                <input type="hidden" class="chapters" value="{{ $chapters }}" />
                <input type="hidden" class="lessons" value="{{ $lessons }}" />
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
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_name }}
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
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">
                                {{ $chapter->chapter_name }}
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
                        @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">
                                {{ $lesson->lesson_name }}
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
                        @for ($i = 2000; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">
                                {{ $i }}
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
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">
                                {{ $i }}
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
                            @foreach ($categories as $category)
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
                            @foreach ($courses as $course)
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
                            @foreach ($chapters as $chapter)
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
                            @foreach ($lessons as $lesson)
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
                            @for ($i = 2000; $i <= date('Y'); $i++)
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
                            @for ($i = 1; $i <= 12; $i++)
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

    <table id="kt_profile_overview_table"
        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
        <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="max-w-200px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table"
                rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending"
                style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Question
            </th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">type</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">year
            </th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">month
            </th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">code
            </th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Section
            </th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">
                Question No.</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">
                Difficulty</th>
            <th class="max-w-200px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action
            </th>
        </thead>
        <tbody class="fs-6">
            @foreach ($questions as $question)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        <a href="#" class="er fs-6 px-8 py-4" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_question{{ $question->id }}">view</a>

                        <div class="modal fade" id="kt_modal_question{{ $question->id }}" tabindex="-1"
                            aria-hidden="true">
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
                                        <div class="btn btn-sm btn-icon btn-active-color-primary"
                                            data-bs-dismiss="modal">
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
                                        {{ $question->question }}
                                        <br />
                                        <br />
                                        @if (!empty($question->q_url))
                                            <img src="{{ asset('images/questions/' . $question->q_url) }}" />
                                        @endif
                                    </div>
                                    <!--begin::Modal body-->
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ $question->q_type }}
                    </td>
                    <td>
                        {{ $question->year }}
                    </td>
                    <td>
                        {{ $question->month }}
                    </td>
                    <td>
                        {{ $question->q_code }}
                    </td>
                    <td>
                        {{ $question->section }}
                    </td>
                    <td>
                        {{ $question->q_num }}
                    </td>
                    <td>
                        {{ $question->difficulty }}
                    </td>
                    <td>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_edit{{ $question->id }}">Edit</button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete{{ $question->id }}">
                                Delete
                            </button>

                            <form method="POST" action="{{ route('q_edit', ['id' => $question->id]) }}"
                                enctype="multipart/form-data" class="mx-auto w-100 mw-600px pt-15 pb-10"
                                novalidate="novalidate">
                                @csrf
                                <div class="modal fade" id="kt_modal_edit{{ $question->id }}" tabindex="-1"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content px-2">
                                            <input type="hidden" value="{{ $question->id }}" name="chapter_id" />

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Edit Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="info_section" id="info_section{{ $question->id }}">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label mb-3">Question</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <textarea name="question" class="form-control">{{ $question->question }}</textarea>
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
                                                    <select class="form-control answer_val"
                                                        id="ans_val{{ $question->id }}" name="ans_type">
                                                        <option value="{{ $question->ans_type }}" selected>
                                                            {{ $question->ans_type }}
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

                                                <div class="d-flex d-none answer_con"
                                                    id="add_ans{{ $question->id }}">
                                                    <input type="number" class="form-control" name="grid_ans[]"
                                                        placeholder="Answer" />
                                                    <button type="button" class="btn  btn-success mx-2 add_answer"
                                                        id="add_ans_btn{{ $question->id }}">Add</button>
                                                </div>

                                                <div class="mb-10 fv-row answeres" id="ans_div{{ $question->id }}">
                                                </div>

                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label mb-3">Difficulty</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-control" name="difficulty">
                                                        <option value="{{ $question->difficulty }}" selected>
                                                            {{ $question->difficulty }}
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

                                                <button type="button" class="btn btn-success details_btn"
                                                    id="details_btn{{ $lesson->id }}">
                                                    Next
                                                </button>
                                            </div>

                                            <div class="details_section d-none"
                                                id="details_section{{ $question->id }}">
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Category</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select class="form-control sel_cate"
                                                        id="sel_cate{{ $question->id }}" name="category_id">
                                                        <option selected>
                                                            {{ $question->lessons->chapter->course->category->cate_name }}
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->cate_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Course</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select class="form-control sel_course"
                                                        id="sel_course{{ $question->id }}" name="course_id">
                                                        <option selected>
                                                            {{ $question->lessons->chapter->course->course_name }}
                                                        </option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Chapter</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select class="form-control sel_chapter"
                                                        id="sel_chapter{{ $question->id }}" name="chapter_id">
                                                        <option selected>
                                                            {{ $question->lessons->chapter->chapter_name }}
                                                        </option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Lesson</label>
                                                    <!--begin::Input-->
                                                    <select class="form-control sel_lesson"
                                                        id="sel_lesson{{ $question->id }}" name="lesson_id">
                                                        <option value="{{ $question->lesson_id }}" selected>
                                                            {{ $question->lessons->lesson_name }}
                                                        </option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Year</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select class="form-control sel_year"
                                                        id="sel_year{{ $question->id }}" name="year">
                                                        <option value="{{ $question->year }}" selected>
                                                            {{ $question->year }}
                                                        </option>
                                                        @for ($i = 2000; $i <= date('Y'); $i++)
                                                            <option value="{{ $i }}">
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Month</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select class="form-control sel_month"
                                                        id="sel_month{{ $question->id }}" name="month">
                                                        <option value="{{ $question->month }}">{{ $question->month }}
                                                        </option>
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
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Code</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <select name="q_code" class="form-control sel_qcode"
                                                        id="sel_qcode{{ $question->id }}">
                                                        <option value="{{ $question->q_code }}" selected>
                                                            {{ $question->q_code }}</option>
                                                        @foreach ($exams as $exam)
                                                            <option value="{{ $exam->id }}">
                                                                {{ $exam->exam_code }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Section</label>
                                                    <!--begin::Input-->
                                                    <select class="form-control sel_section"
                                                        id="sel_section{{ $question->id }}" name="section">
                                                        <option value="{{ $question->section }}" selected>
                                                            {{ $question->section }}
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
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Question Num</label>
                                                    <!--End::Label-->

                                                    <!--begin::Input-->
                                                    <input type="number" min="0" max="80"
                                                        class="form-control q_num" id="q_num{{ $question->id }}"
                                                        name="q_num" value="{{ $question->q_num }}"
                                                        placeholde="Question Num" required />
                                                    <!--end::Input-->
                                                </div>
                                                <button type="button" class="btn btn-secondary prev_info">
                                                    Back
                                                </button>
                                                <button type="button" class="btn btn-success pricing_btn">
                                                    Next
                                                </button>
                                            </div>

                                            <div class="priceing_section d-none"
                                                id="priceing_section{{ $question->id }}">


                                                <div class="text-muted fw-semibold fs-2 d-flex align-lessons-center">
                                                    <div class="section_add_idea" style="margin-left:15px ">
                                                        <button id="add_new_Pricing{{ $question->id }}"
                                                            type="button"
                                                            class="my-3 btn_add btn btn-lg btn-primary d-inline-block add_new_Pricing">Add
                                                            New Answer</button>
                                                    </div>
                                                </div>


                                                <div class="mt-3 Prices" id="Prices{{ $question->id }}"></div>

                                                <div class="mt-3">
                                                    <span class='btn btn-secondary prev_details'>
                                                        Back
                                                    </span>
                                                </div>
                                            </div>
                            </form>

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
                        <div class="modal fade" id="modalDelete{{ $question->id }}" tabindex="-1"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modalCenterTitle">Delete Question</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class='p-3'>
                                        Are You Sure To Delete
                                        <span class='text-danger'>
                                            {{ $question->question }} ??
                                        </span>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <a href="{{ route('del_q', ['id' => $question->id]) }}"
                                            class="btn btn-danger">Delete</a>
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
        sel_cate.addEventListener('change', (e) => {
            sel_course.innerHTML = `                            
        <option disabled selected>
            Select Course
        </option>`;
            courses.forEach(element => {
                if (e.target.value == element.category_id) {
                    sel_course.innerHTML += `                            
            <option value="${element.id}">
                ${element.course_name}
            </option>`;

                }
            });
        });
        sel_course.addEventListener('change', (e) => {
            sel_chapter.innerHTML = `                            
        <option disabled selected>
            Select Chapter
        </option>`;
            chapters.forEach(element => {
                if (e.target.value == element.course_id) {
                    sel_chapter.innerHTML += `                            
            <option value="${element.id}">
                ${element.chapter_name}
            </option>`;

                }
            });
        });
        sel_chapter.addEventListener('change', (e) => {
            sel_lesson.innerHTML = `                            
        <option disabled selected>
            Select Lesson
        </option>`;
            lessons.forEach(element => {
                if (e.target.value == element.chapter_id) {
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
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
        <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
        </script>

    @endsection
</x-default-layout>
