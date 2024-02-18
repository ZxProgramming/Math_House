
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Score Sheet')

    <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key">Add</a>

    {{-- Start Model For Add New Category --}}
    <div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_create_api_key_header">
                    <!--begin::Modal title-->
                    <h2>Add Score Sheet</h2>
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
                <!--end::Modal header-->
                <!--begin::Form-->
                <form id="kt_modal_create_api_key_form" action="{{ route('addScore') }}" method="POST" enctype="multipart/form-data" class="form" >
                    @csrf

                    <div class="p-3">
                        <div class="my-2">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Name" />
                        </div>
                        
                        <div class="my-2">
                            <label>Category</label>
                            <select class="form-control cate_sel">
                                <option disabled selected>
                                    Select Category ...    
                                </option>

                                @foreach ( $categories as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->cate_name}}    
                                    </option> 
                                @endforeach
                            </select> 
                        </div>
                        
                        <div class="my-2">
                            <label>Course</label>
                            <select class="form-control course_sel" name="course_id">
                                <option disabled selected>
                                    Select Course ...    
                                </option>
                            </select> 
                        </div>
                        
                        <div class="my-2">
                            <label>Score</label>
                            <input class="form-control" name="score" placeholder="Score" />
                        </div>

                        <input type="hidden" class="course_items" value="{{$courses}}" />
                        
                        <div class="my-2">
                            <label>Number of Questions</label>
                            <div class="d-flex">
                                <input class="form-control question_num" name="q_num" placeholder="Number of Questions" />
                                <button type="button" class="btn btn-primary show_list mx-2">
                                    Show List
                                </button>
                            </div>
                        </div>

                        <div class="score_list"></div>

                    </div>
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="submit"  value="Submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                          ADD
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
        <thead class="fs-7 text-gray-500 text-uppercase">
            <tr>
                <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">SL</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Name</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Score</th>
        </thead>
        <tbody class="fs-6">
            @foreach( $score_sheet as $item )
            <tr class="odd">
                <td class="sorting_1">
                    {{$loop->iteration}}
                </td>
                <td class="sorting_1">
                    {{$item->name}}
                </td>
                <td class="sorting_1">
                    {{$item->course->category->cate_name}}
                </td>
                <td class="sorting_1">
                    {{$item->course->course_name}}
                </td>
                <td class="sorting_1">
                    {{$item->score}}
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
    
    <script>
        let cate_sel = document.querySelector('.cate_sel');
        let course_sel = document.querySelector('.course_sel');
        let course_items = document.querySelector('.course_items');
        course_items = course_items.value;
        course_items = JSON.parse(course_items);
        cate_sel.addEventListener('change', () => {
            console.log(123);
            course_sel.innerHTML = `
            <option disabled selected>
                Select Course ...    
            </option>`;

            course_items.forEach(element => {
                if ( element.category_id == cate_sel.value ) {
                    course_sel.innerHTML += `
                    <option value="${element.id}">
                        ${element.course_name}   
                    </option>`;
                }
            });
        });

        let question_num = document.querySelector('.question_num');
        let show_list = document.querySelector('.show_list');
        let score_list = document.querySelector('.score_list');
        show_list.addEventListener('click', ()=> {
            let num = question_num.value;
            num = parseInt(num);
            let score_arr = '';
            for (let i = 1; i <= num; i++) {
                score_arr += `
                <tr>
                    <td>
                        <input type="hidden" value="${i}" name="question_num[]" />
                        ${i}
                    </td>
                    <td>
                        <input class="form-control" name="score_list[]" />
                    </td>  
                </tr>
                `;
            }
            score_list.innerHTML = `
            <table class="table">
                <thead>
                    <th>Row Score</th>
                    <th>Score</th>    
                </thead> 
                <tbody>
                    ${score_arr}  
                </tbody>   
            </table>
            `;
        })
    </script>

</x-default-layout>