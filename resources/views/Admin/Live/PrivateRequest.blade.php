
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Private Request')
    @include('success')
    
<button id="btn_print" class=" btn btn-success">
    <i class="fa-solid fa-print mr-2"></i>
    Print
</button>

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">User Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Date</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">From</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">To</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Teacher</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Status</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($private_r as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->user->name}}
            </td>
            <td>
                {{$item->date}}
            </td> 
            <td>
                {{$item->from}}
            </td>
            <td>
                {{$item->to}}
            </td>
            <td>
                {{$item->teacher->name}}
            </td>
            <td>
                {{$item->status}}
            </td>
            
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ApproveModal{{$item->id}}">
                          Approve
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#RejectedModal{{$item->id}}">
                          Rejected
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="ApproveModal{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Approve</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Approve This Session
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('private_session_approve', ['id'=>$item->id])}}" class="btn btn-success">Approve</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="RejectedModal{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{route('private_request_rejected')}}">
                                <div class="modal-header">
                                    @csrf
                                    <h5 class="modal-title" id="modalCenterTitle">Rejected</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> 
                                
                                <div class='p-3'>
                                    <label>
                                        Reject Reason
                                    </label>
                                    <input class="form-control" name="reject_reason" placeholder="Reject Reasons" />
                                    <input name="id" type="hidden" value="{{$item->id}}" />
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Close
                                    </button>
                                    <button class="btn btn-danger">Rejected</button>
                                </div>
                            </form>
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
        let btn  = document.getElementById("btn_print");

        btn.addEventListener('click', () => {
            window.print();
        })
</script>
</x-default-layout>