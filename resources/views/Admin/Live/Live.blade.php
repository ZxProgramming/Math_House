@php
    function fun_admin()
    {
        return 'admin';
    }
@endphp
<x-default-layout>
    @section('title', 'Live')
    @include('success')
    <style>
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
            z-index: 999999999;
        }

        .screen_popup {
            height: 450px;
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
            font-weight: bold;
        }

        .close_btn {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }
    </style>

    @error('link')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('date')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('from')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('to')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('lesson_id')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('type')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('access_dayes')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('price')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('teacher_id')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    @error('repeat')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <button id="btn_print" class=" btn btn-success">
        <i class="fa-solid fa-print mr-2"></i>
        Print
    </button>

    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
        data-bs-target="#kt_modal_create_question">Add Session</a>
    <!--end::Action-->

    <div class="modal fade" id="kt_modal_create_question" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Create Session</h2>
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
                                <h3 class="stepper-title">Academic</h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                                <h3 class="stepper-title">Data</h3>
                            </div>
                            <!--end::Step 3-->
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <form action="{{ route('add_session') }}" method="POST" enctype="multipart/form-data"
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
                                            <label>
                                                Session Name
                                            </label>
                                            <input class='form-control' name="name" placeholder="Session Name" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <label>
                                                Session Date
                                            </label>
                                            <input class='form-control' name="date" type="date"
                                                placeholder="Session Date" />
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label>
                                                From
                                            </label>
                                            <input class='form-control' name="from" type="time"
                                                placeholder="Session From" />
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label>
                                                To
                                            </label>
                                            <input class='form-control' name="to" type="time"
                                                placeholder="Session To" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label>
                                                Teacher
                                            </label>
                                            <select class="form-control" name="teacher_id">
                                                <option disabled selected>
                                                    Select Teacher ...
                                                </option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">
                                                        {{ $teacher->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label>
                                                Type
                                            </label>
                                            <select class="form-control" name="type">
                                                <option disabled selected>
                                                    Select Type ...
                                                </option>
                                                <option value="group">
                                                    group
                                                </option>
                                                <option value="private">
                                                    private
                                                </option>
                                                <option value="session">
                                                    session
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label>
                                                Group
                                            </label>
                                            <select class="form-control" name="group_id">
                                                <option disabled selected>
                                                    Select Group ...
                                                </option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">
                                                        {{ $group->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row"> 
                                        <label>
                                            Users
                                        </label>
                                        <div class="select2-danger" data-select2-id="33">
                                            <div class="position-relative" data-select2-id="443">
                                                <select id="select2Danger" name="user_id[]" class="select2 form-select select2-hidden-accessible" multiple="" data-select2-id="select2Danger" tabindex="-1" aria-hidden="true">
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}" data-select2-id="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        </div>



                                        <div class="mb-10 fv-row">
                                            <label>
                                                Repeat
                                            </label>
                                            <select class="form-control s_repeat" name="repeat">
                                                <option disabled selected>
                                                    Select ...
                                                </option>
                                                <option value="Once">
                                                    Once
                                                </option>
                                                <option value="Repeat">
                                                    Repeat
                                                </option>
                                            </select>
                                        </div>

                                        <div class="screen d-none">
                                            <div class="screen_popup">
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="ki-duotone close_btn ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="screen_text">
                                                    <div class="my-2">
                                                        <label>
                                                            Repeat
                                                        </label>
                                                        <div class="d-flex">
                                                            <input type="number" class="form-control"
                                                                name="repeat_num" />
                                                            <label>
                                                                Times
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="my-2">
                                                        <label>
                                                            Repeat every
                                                        </label>
                                                        <div>
                                                            <input id="SaturDay" type="checkbox" name="r_day[]"
                                                                value="SaturDay" />
                                                            <label for="SaturDay">
                                                                SaturDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="SunDay" type="checkbox" name="r_day[]"
                                                                value="SunDay" />
                                                            <label for="SunDay">
                                                                SunDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="MonDay" type="checkbox" name="r_day[]"
                                                                value="MonDay" />
                                                            <label for="MonDay">
                                                                MonDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="TuesDay" type="checkbox" name="r_day[]"
                                                                value="TuesDay" />
                                                            <label for="TuesDay">
                                                                TuesDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="WednesDay" type="checkbox" name="r_day[]"
                                                                value="WednesDay" />
                                                            <label for="WednesDay">
                                                                WednesDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="ThursDay" type="checkbox" name="r_day[]"
                                                                value="ThursDay" />
                                                            <label for="ThursDay">
                                                                ThursDay
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <input id="FriDay" type="checkbox" name="r_day[]"
                                                                value="FriDay" />
                                                            <label for="FriDay">
                                                                FriDay
                                                            </label>
                                                        </div>
                                                        <div class="mb-10 fv-row">
                                                            <label>
                                                                Price
                                                            </label>
                                                            <input class='form-control' name="price"
                                                                placeholder="Price" />
                                                        </div>
                                                        <button type="button" class="btn btn-primary btn_repeat">
                                                            Submit
                                                        </button>
                                                        <!--end::Input group-->
                                                    </div>

                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
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
                                    <div class="mb-10 fv-row">
                                        <label>
                                            Category
                                        </label>
                                        <select class="form-control sel_cate1">
                                            <option disabled selected>
                                                Select Category ...
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->cate_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label>
                                            Course
                                        </label>
                                        <select class="form-control sel_course1">
                                            <option disabled selected>
                                                Select Course ...
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label>
                                            Chapter
                                        </label>
                                        <select class="form-control sel_chapter1">
                                            <option disabled selected>
                                                Select Chapter ...
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label>
                                            Lesson
                                        </label>
                                        <select name="lesson_id" class="form-control sel_lesson1">
                                            <option disabled selected>
                                                Select Lesson ...
                                            </option>
                                        </select>
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
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="ideas" id="ideas">

                                        <div class="idea">
                                            <div class="section_idea">
                                                <span>Session Link</span>
                                                <input name="link"
                                                    class="form-control form-control-lg form-control-solid">
                                            </div>
                                            <div class="section_syllabus">
                                                <span>Material Link</span>
                                                <input name="material_link"
                                                    class="form-control form-control-lg form-control-solid">
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




    <input type="hidden" class="cate" value="{{ $categories }}" />
    <input type="hidden" class="course" value="{{ $courses }}" />
    <input type="hidden" class="chapter" value="{{ $chapters }}" />
    <input type="hidden" class="lesson" value="{{ $lessons }}" />

    <script>
        let sel_cate1 = document.querySelector('.sel_cate1');
        let sel_course1 = document.querySelector('.sel_course1');
        let sel_chapter1 = document.querySelector('.sel_chapter1');
        let sel_lesson1 = document.querySelector('.sel_lesson1');
        let cate = document.querySelector('.cate');
        let course = document.querySelector('.course');
        let chapter = document.querySelector('.chapter');
        let lesson = document.querySelector('.lesson');
        course = course.value;
        course = JSON.parse(course);
        chapter = chapter.value;
        chapter = JSON.parse(chapter);
        lesson = lesson.value;
        lesson = JSON.parse(lesson);
        sel_cate1.addEventListener('change', () => {
            sel_course1.innerHTML = `
                                    <option disabled selected>
                                        Select Course ...
                                    </option>`;
            course.forEach(element => {
                if (sel_cate1.value == element.category_id) {
                    sel_course1.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.course_name}
                                            </option>`;
                }
            });
        });
        sel_course1.addEventListener('change', () => {
            sel_chapter1.innerHTML = `
                                    <option disabled selected>
                                        Select Chapter ...
                                    </option>`;
            chapter.forEach(element => {
                if (sel_course1.value == element.course_id) {
                    sel_chapter1.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.chapter_name}
                                            </option>`;
                }
            });
        });
        sel_chapter1.addEventListener('change', () => {
            sel_lesson1.innerHTML = `
                                    <option disabled selected>
                                        Select Lesson ...
                                    </option>`;
            lesson.forEach(element => {
                if (sel_chapter1.value == element.chapter_id) {
                    sel_lesson1.innerHTML += `
                                            <option value="${element.id}">
                                                ${element.lesson_name}
                                            </option>`;
                }
            });
        });
    </script>


    <table id="kt_profile_overview_table"
        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
        <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table"
                rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending"
                style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session
                Date</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session
                Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">From
            </th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">To</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">
                Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course
            </th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Lesson
            </th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Type
            </th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Teacher
            </th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1"
                colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action
            </th>
        </thead>
        <tbody class="fs-6">
            @foreach ($sessions as $session)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $session->date }}
                    </td>
                    <td>
                        {{ $session->name }}
                    </td>
                    <td>
                        {{ $session->from }}
                    </td>
                    <td>
                        {{ $session->to }}
                    </td>
                    <td>
                        {{ $session->lesson->chapter->course->category->cate_name }}
                    </td>
                    <td>
                        {{ $session->lesson->chapter->course->course_name }}
                    </td>
                    <td>
                        {{ $session->lesson->lesson_name }}
                    </td>
                    <td>
                        {{ $session->type }}
                    </td>
                    <td>
                        {{ $session->teacher->name }}
                    </td>

                    <td>
                        <div class="mt-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalCenter{{ $session->id }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete{{ $session->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <form method="POST" action="{{ route('session_edit', ['id' => $session->id]) }}">
                                @csrf
                                <div class="modal fade" id="modalCenter{{ $session->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-fullscreen p-9">
                                        <!--begin::Modal content-->
                                        <div class="modal-content modal-rounded">
                                            <!--begin::Modal header-->
                                            <div class="modal-header py-7 d-flex justify-content-between">
                                                <!--begin::Modal title-->
                                                <h2>Edit Session</h2>
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
                                                <!--begin::Stepper-->
                                                <div class="stepper stepper-links d-flex flex-column"
                                                    id="kt_modal_create_campaign_stepper">
                                                    <!--begin::Nav-->
                                                    <div class="stepper-nav justify-content-center py-2">
                                                        <!--begin::Step 1-->
                                                        <div class="stepper-item me-5 me-md-15 current"
                                                            data-kt-stepper-element="nav">
                                                            <h3 class="stepper-title">Info</h3>
                                                        </div>
                                                        <!--end::Step 1-->
                                                        <!--begin::Step 2-->
                                                        <div class="stepper-item me-5 me-md-15"
                                                            data-kt-stepper-element="nav">
                                                            <h3 class="stepper-title">Academic</h3>
                                                        </div>
                                                        <!--end::Step 2-->
                                                        <!--begin::Step 3-->
                                                        <div class="stepper-item me-5 me-md-15"
                                                            data-kt-stepper-element="nav">
                                                            <h3 class="stepper-title">Data</h3>
                                                        </div>
                                                        <!--end::Step 3-->
                                                    </div>
                                                    <!--end::Nav-->
                                                        <!--begin::Step 1-->
                                                        <div class="current" data-kt-stepper-element="content">
                                                            <!--begin::Wrapper-->
                                                            <div class="w-100">
                                                                <div>
                                                                    <!--begin::Input group-->
                                                                    <div class="mb-10 fv-row">
                                                                        <!--begin::Label-->
                                                                        <label>
                                                                            Session Name
                                                                        </label>
                                                                        <input class='form-control' name="name"
                                                                         value="{{$session->name}}" placeholder="Session Name" />
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Session Date
                                                                        </label>
                                                                        <input class='form-control' name="date"
                                                                            type="date" value="{{$session->date}}"
                                                                            placeholder="Session Date" />
                                                                    </div>

                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            From
                                                                        </label>
                                                                        <input class='form-control' name="from"
                                                                            type="time" value="{{$session->from}}"
                                                                            placeholder="Session From" />
                                                                    </div>

                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            To
                                                                        </label>
                                                                        <input class='form-control' name="to"
                                                                        value="{{$session->to}}" type="time" placeholder="Session To" />
                                                                    </div>
                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Teacher
                                                                        </label>
                                                                        <select class="form-control"
                                                                            name="teacher_id">
                                                                            <option value="{{$session->teacher->name}}" selected>
                                                                                {{$session->teacher->name}}
                                                                            </option>
                                                                            @foreach ($teachers as $teacher)
                                                                                <option value="{{ $teacher->id }}">
                                                                                    {{ $teacher->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Type
                                                                        </label>
                                                                        <select class="form-control" name="type">
                                                                            <option value="{{$session->type}}" selected>
                                                                                {{$session->type}}
                                                                            </option>
                                                                            <option value="group">
                                                                                group
                                                                            </option>
                                                                            <option value="private">
                                                                                private
                                                                            </option>
                                                                            <option value="session">
                                                                                session
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Group
                                                                        </label>
                                                                        <select class="form-control" name="group_id">
                                                                            <option value="{{$session->group_id}}" selected>
                                                                                {{@$session->group->name}}
                                                                            </option>
                                                                            @foreach ($groups as $group)
                                                                                <option value="{{ $group->id }}">
                                                                                    {{ $group->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Users
                                                                        </label>
                                                                        <div class="select2-danger" data-select2-id="33">
                                                                            <div class="position-relative" data-select2-id="443">
                                                                                <select id="select2Danger" name="user_id[]" class="select2 form-select select2-hidden-accessible" multiple="" data-select2-id="select2Danger{{$session->id}}" tabindex="-1" aria-hidden="true">
                                                                                    @foreach ( $session->users as $user )
                                                                                        <option value="{{$user->id}}" selected data-select2-id="{{$user->id}}">{{$user->name}}</option>
                                                                                    @endforeach
                                                                                    @foreach ($users as $user)
                                                                                        <option value="{{$user->id}}" data-select2-id="{{$user->id}}">{{$user->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="mb-10 fv-row">
                                                                        <label>
                                                                            Repeat
                                                                        </label>
                                                                        <select class="form-control s_repeat"
                                                                            name="repeat">
                                                                            <option value="{{$session->repeat}}" selected>
                                                                                {{$session->repeat}}
                                                                            </option>
                                                                            <option value="Once">
                                                                                Once
                                                                            </option>
                                                                            <option value="Repeat">
                                                                                Repeat
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="screen d-none">
                                                                        <div class="screen_popup">
                                                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                                                data-bs-dismiss="modal">
                                                                                <i
                                                                                    class="ki-duotone close_btn ki-cross fs-1">
                                                                                    <span class="path1"></span>
                                                                                    <span class="path2"></span>
                                                                                </i>
                                                                            </div>
                                                                            <div class="screen_text">
                                                                                <div class="my-2">
                                                                                    <label>
                                                                                        Repeat
                                                                                    </label>
                                                                                    <div class="d-flex">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="repeat_num" />
                                                                                        <label>
                                                                                            Times
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="my-2">
                                                                                    <label>
                                                                                        Repeat every
                                                                                    </label>
                                                                                    <div>
                                                                                        <input id="SaturDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="SaturDay" />
                                                                                        <label for="SaturDay">
                                                                                            SaturDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="SunDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="SunDay" />
                                                                                        <label for="SunDay">
                                                                                            SunDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="MonDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="MonDay" />
                                                                                        <label for="MonDay">
                                                                                            MonDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="TuesDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="TuesDay" />
                                                                                        <label for="TuesDay">
                                                                                            TuesDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="WednesDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="WednesDay" />
                                                                                        <label for="WednesDay">
                                                                                            WednesDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="ThursDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="ThursDay" />
                                                                                        <label for="ThursDay">
                                                                                            ThursDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input id="FriDay"
                                                                                            type="checkbox"
                                                                                            name="r_day[]"
                                                                                            value="FriDay" />
                                                                                        <label for="FriDay">
                                                                                            FriDay
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="mb-10 fv-row">
                                                                                        <label>
                                                                                            Price
                                                                                        </label>
                                                                                        <input class='form-control'
                                                                                            name="price"
                                                                                            placeholder="Price" />
                                                                                    </div>
                                                                                    <button type="button"
                                                                                        class="btn btn-primary btn_repeat">
                                                                                        Submit
                                                                                    </button>
                                                                                    <!--end::Input group-->
                                                                                </div>

                                                                            </div>
                                                                            <!--end::Wrapper-->
                                                                        </div>
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
                                                                <div class="mb-10 fv-row">
                                                                    <label>
                                                                        Category
                                                                    </label>
                                                                    <select class="form-control sel_cate1">
                                                                        <option value="{{$session->lesson->chapter->course->category->id}}" selected>
                                                                            {{$session->lesson->chapter->course->category->cate_name}}
                                                                        </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->cate_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-10 fv-row">
                                                                    <label>
                                                                        Course
                                                                    </label>
                                                                    <select class="form-control sel_course1">
                                                                        <option value="{{$session->lesson->chapter->course->id}}" selected>
                                                                            {{$session->lesson->chapter->course->course_name}}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-10 fv-row">
                                                                    <label>
                                                                        Chapter
                                                                    </label>
                                                                    <select class="form-control sel_chapter1">
                                                                        <option value="{{$session->lesson->chapter->id}}" selected>
                                                                            {{$session->lesson->chapter->chapter_name}}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-10 fv-row">
                                                                    <label>
                                                                        Lesson
                                                                    </label>
                                                                    <select name="lesson_id"
                                                                        class="form-control sel_lesson1">
                                                                        <option value="{{$session->lesson_id}}" selected>
                                                                            {{$session->lesson->lesson_name}}
                                                                        </option>
                                                                    </select>
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
                                                                    <div
                                                                        class="text-muted fw-semibold fs-2 d-flex align-items-center">
                                                                    </div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Input group-->
                                                                <div class="ideas" id="ideas">

                                                                    <div class="idea">
                                                                        <div class="section_idea">
                                                                            <span>Session Link</span>
                                                                            <input name="link" value="{{$session->link}}"
                                                                                class="form-control form-control-lg form-control-solid">
                                                                        </div>
                                                                        <div class="section_syllabus">
                                                                            <span>Material Link</span>
                                                                            <input name="material_link" value="{{$session->material_link}}"
                                                                                class="form-control form-control-lg form-control-solid">
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
                                                                <button type="button"
                                                                    class="btn btn-lg btn-light-primary me-3"
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
                                                                <button type="button"
                                                                    class="btn btn-lg btn-primary continue_btn"
                                                                    data-kt-stepper-action="next">Continue
                                                                    <i
                                                                        class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i></button>
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Actions-->
                                                </div>
                                                <!--end::Stepper-->
                                            </div>
                                            <!--begin::Modal body-->
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete{{ $session->id }}" tabindex="-1"
                                aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="modalCenterTitle">Delete Session</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class='p-3'>
                                            Are You Sure To Delete
                                            <span class='text-danger'>
                                                {{ $session->link }} ?
                                            </span>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{ route('del_session', ['id' => $session->id]) }}"
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

    <script>
        let s_repeat = document.querySelector('.s_repeat');
        let screen = document.querySelector('.screen');
        let close_btn = document.querySelector('.close_btn');
        let btn_repeat
        let days_done_btn = document.querySelector('.days_done_btn');

        s_repeat.addEventListener('change', (e) => {
            if (s_repeat.value == 'Repeat') {
                screen.classList.remove('d-none');
            }
        });
        close_btn.addEventListener('click', () => {
            screen.classList.add('d-none');
        });
        days_done_btn.addEventListener('click', () => {
            screen.classList.add('d-none');
        });

        let btn = document.getElementById("btn_print");

        btn.addEventListener('click', () => {
            window.print();
        })
    </script>
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

    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
    <script src="{{asset('assets/js/forms-tagify.js')}}"></script>
    <script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
    </script>
</x-default-layout>
