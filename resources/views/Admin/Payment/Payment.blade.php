
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('success')
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCenter">
    Add New Payout
</button>

<form method="POST" action="{{route('q_edit')}}">
        @csrf
    <div class="modal fade" id="modalAddCenter" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            
            <h5 class="modal-title" id="modalCenterTitle">Add Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 

        <div class="my-2 px-3">
            <label>
            Payment
            </label>
            <input class='form-control' name="payment" placeholder="Payment" />
        </div>

        <div class="my-2 px-3">
            <label>
                Year
            </label>
            <input class='form-control' name="logo" type="file" />
        </div>

        <div class="my-2 px-3">
        <label>
            Month
        </label>
        <input class='form-control' name="month" value="{{$item->month}}" placeholder="Month" />
        </div>

        <div class="my-2 px-3">
        <label>
            Code
        </label>
        <input class='form-control' name="q_code" value="{{$item->q_code}}" placeholder="Code" />
        </div>

        <div class="my-2 px-3">
        <label>
            Section
        </label> 
    
        <select class="form-control" name="section">
            <option value="{{$item->section}}">{{$item->section}}</option>
            <option value="Blank">Blank</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>     
        </div>

        <div class="my-2 px-3">
        <label>
            item No.
        </label>
        <input class='form-control' name="q_num" value="{{$item->q_num}}" placeholder="item No." />
        </div>



            <input type="hidden" value="{{$item->id}}" name="id" />
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

<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">#</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Payout</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Logo</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Statue</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($payments as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->payment}}
            </td>
            <td>
                <img style="height: 120px;width: 120px;;" src="{{asset('images/payment/' . $item->logo)}}" />
            </td>
            <td>
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="" name="notifications" {{$item->statue ? 'checked' : ''}}>
            </div>
            </td>
            <td>
            <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                          Delete
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{route('q_edit')}}">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                            <div class="my-2 px-3">
                              <label>
                                item
                              </label>
                              <input class='form-control' name="item" value="{{$item->item}}" placeholder="item" />
                            </div>

                            <div class="my-2 px-3">
                              <label>
                                Type
                              </label>
                            
                              <select class="form-control" name="q_type">
                                <option value="{{$item->q_type}}">{{$item->q_type}}</option>
                                <option value="Trail">Trail</option> 
                                <option value="Parallel">Parallel</option> 
                                <option value="Extra">Extra</option>
                            </select>  
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Year
                            </label>
                            <input class='form-control' name="year" value="{{$item->year}}" placeholder="Year" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Month
                            </label>
                            <input class='form-control' name="month" value="{{$item->month}}" placeholder="Month" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Code
                            </label>
                            <input class='form-control' name="q_code" value="{{$item->q_code}}" placeholder="Code" />
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                Section
                            </label> 
                        
                            <select class="form-control" name="section">
                                <option value="{{$item->section}}">{{$item->section}}</option>
                                <option value="Blank">Blank</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>     
                            </div>

                            <div class="my-2 px-3">
                            <label>
                                item No.
                            </label>
                            <input class='form-control' name="q_num" value="{{$item->q_num}}" placeholder="item No." />
                            </div>



                              <input type="hidden" value="{{$item->id}}" name="id" />
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
                        <div class="modal fade" id="modalDelete{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="modalCenterTitle">Delete Quizze</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$item->title}} ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_quizze', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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