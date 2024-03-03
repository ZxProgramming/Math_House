
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('success')
    @section('title','Payment Request')

  <form action="{{route('filter_payment_req')}}" method="POST">
    @csrf
    <div class="my-2 d-flex">
      <div class="d-flex align-items-center mx-2">
        <label>
          From
        </label>
        <input type="date" name="from" class="form-control mx-2" />
      </div>
      <div class="d-flex align-items-center mx-2">
        <label>
          To
        </label>
        <input type="date" name="to" class="form-control mx-2" />
      </div>
      <div class="d-flex align-items-center mx-2">
        <label>
          Statue
        </label>
        <select name="state" class="form-control mx-2">
          <option selected disabled>
            Select Statue ...
          </option>
          <option value="Approve">
            Approve
          </option>
          <option value="Rejected">
            Rejected
          </option>
        </select>
      </div>
      <div class="mx-2">
        <button class="btn btn-primary">
          Filter
        </button>
      </div>
    </div>
  </form>

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Payment Method</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Student</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Material</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Module</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Price</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Receipt</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Statue</th>
    </thead>
    <tbody class="fs-6">
        @foreach($payment as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->method->payment}}
            </td>
            <td>
                {{$item->user->name}}
            </td>
            <td>
              @foreach( $item->order as $order )
              {{$order->chapter_name}}
              @endforeach
            </td>
            <td>
                {{$item->module}}
            </td>
            <td>
                ${{$item->price}}
            </td>
            <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalReceipt{{$item->id}}">
                          view
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalReceipt{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Approve Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <img src="{{asset('images/payment_reset/' . $item->image)}}" />
                              
                            </div>
                          </div>
                        </div>
            </td>
            <td>
                {{$item->state}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-default-layout>