
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
    @section('title','Cancelation')
    @include('success')
<button id="btn_print" class=" btn btn-success">
    <i class="fa-solid fa-print mr-2"></i>
    Print
</button>

    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">User</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Date</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Time</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session Type</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Session Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Teacher</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Status</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach ( $cancelations as $item )
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
            {{$item->time}}
          </td>
          <td>
            {{$item->session->lesson->chapter->course->category->cate_name}}
          </td>
          <td>
            {{$item->session->lesson->chapter->course->course_name}}
          </td>
          <td>
            {{$item->session->type}}
          </td>
          <td>
            {{$item->session->name}}
          </td>
          <td>
            {{$item->session->teacher->name}}
          </td>
          <td>
            {{$item->statue}}
          </td>
            <td>
              <div class="mt-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                Approve
              </button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                Rejected
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
              <div class="modal-header">

              <h5 class="modal-title" id="modalCenterTitle">Approve Cancelation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> 

              <div class='p-3'>
              Are You Sure To Approve Cancelation ?
              </div>

              <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
              Close
              </button>
              <a href="{{route('approve_cancelation', ['id'=>$item->id])}}" class="btn btn-success">Approve</a>
              </div>
              </div>
              </div>
              </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modalDelete{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
              <div class="modal-header">

              <h5 class="modal-title" id="modalCenterTitle">Rejected Cancelation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> 

              <div class='p-3'>
              Are You Sure To Rejected Cancelation ?
              </div>

              <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
              Close
              </button>
              <a href="{{route('reject_cancelation', ['id'=>$item->id])}}" class="btn btn-danger">Rejected</a>
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
  let btn  = document.getElementById("btn_print");

  btn.addEventListener('click', () => {
    window.print();
  })
</script>
</x-default-layout>