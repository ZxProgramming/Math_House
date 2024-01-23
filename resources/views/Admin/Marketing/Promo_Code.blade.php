
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Promo Code')
    <!--  -->

    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Starts</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Ends</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Courses</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Users</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Usage</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $promo as $item )
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->starts}}</td>
            <td>{{$item->ends}}</td>
            <td>
                @foreach( $$item->course as $element )
                {{$element->course->course_name}}
                <br />
                @endforeach
            </td>
            <td></td>
            <td>
                {{$item->num_usage}}
            </td>
            <td>
                <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Accept{{$item->id}}">
                    Accept
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Reject{{$item->id}}">
                    Rejected
                </button>

                <!-- Modal -->
                <div class="modal fade" id="Reject{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                        <h5 class="modal-title" id="modalCenterTitle">Delete Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        
                        <div class='p-3'>
                        Are You Sure Reject This Response
                        <span class='text-danger'>
                            {{$item->amount}} to {{$item->user->name}} ??
                        </span>
                        </div>

                        <form action="{{route('reject_payout', ['id'=>$item->id])}}" method="POST">
                            <input class="form-control" name="rejected_reason" placeholder="Rejected Reason" />
                            @csrf
                            <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button class="btn btn-danger">Reject</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="Accept{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                        <h5 class="modal-title" id="modalCenterTitle">Accept</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        
                        <div class='p-3'>
                        Are You Sure Accept This Response
                        <span class='text-success'>
                            {{$item->amount}} to {{$item->user->name}} ??
                        </span>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <a href="{{route('accept_payout', ['id'=>$item->id])}}" class="btn btn-success">Accept</a>
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

</x-default-layout>