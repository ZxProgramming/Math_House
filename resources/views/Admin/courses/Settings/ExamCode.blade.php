
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Exam Code')
    @error('exam_code')
    <div class="alert alert-danger">
    {{$message}}
    </div>
    @enderror

<form class="my-2" action="{{route('code_exam_add')}}" method="POST">
    @csrf
    <label class="py-2">Enter Exam Code</label>
    <div class="d-flex">
        <input name="exam_code" class="form-control" placeholder="Enter Exam Code" />
        <button class="btn btn-primary mx-2">
            Add
        </button>
    </div>
</form>

<div class="my-2">
    

    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
        <thead class="fs-7 text-gray-500 text-uppercase">
            <tr>
                <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Exam Code</th>
                <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
        </thead>
        <tbody class="fs-6">
            @foreach( $exam_codes as $item )
            <tr class="odd">
                <td class="sorting_1">
                    {{$loop->iteration}}
                </td>
                <td class="sorting_1">
                    {{$item->exam_code}}
                </td>
                <td class="sorting_1">
                    <div class="menu-item px-3">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends{{ $item->id }}">Edit</button>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#kt_del_btn{{ $item->id }}">Delete</button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="kt_del_btn{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
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
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                         
                            Are You Sure Delete
                            <span class="text-danger">
                                {{$item->exam_code}}
                            </span>
                        <div class="mt-5">
                            <a href="{{ route('examCodeDelete',['id'=>$item->id]) }}" class="btn btn-danger">
                                Delete
                            </a>
                            <div class="btn btn-primary" data-bs-dismiss="modal">
                                Cancel
                            </div>
                        </div>
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>

            {{-- start Model With Edit --}}
            <div class="modal fade" id="kt_modal_invite_friends{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end">
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
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Edit Exam Code</h1>
                                <!--end::Title-->
                                
                                
                            </div>
                            <!--end::Heading-->
                         
                            <form action="{{ route('examCodeEdit', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="my-2">
                                <label>Exam Code</label>
                                <input class="form-control" name="exam_code" value="{{$item->exam_code}}" placeholder="Exam Code" />
                            </div>
                        
                            <button class="btn btn-primary">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Clear
                            </button>
                        </form>
                           
                          
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            {{-- End Model With Edit --}}
            @endforeach
        
        </tbody>
    </table>
</div>
</x-default-layout>