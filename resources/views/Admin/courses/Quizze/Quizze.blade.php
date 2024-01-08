
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('success')

{{-- Bootstrap pack --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- ////Bootstrap pack --}}

<style>
  /* Hide the default checkbox */
.btn-container input {
  display: none;
}

.btn-container {
  display: block;
  position: relative;
  cursor: pointer;
  font-size: 20px;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
}

/* Create a custom checkbox */
.checkmark {
  position: relative;
  top: 0;
  left: 0;
  height: 1em;
  width: 1em;
  background-color: #2196F300;
  border-radius: 0.25em;
  transition: all 0.25s;
}

/* When the checkbox is checked, add a blue background */
.btn-container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  transform: rotate(0deg);
  border: 0.1em solid #ddd;
  left: 0;
  top: 0;
  width: 1.05em;
  height: 1.05em;
  border-radius: 0.25em;
  transition: all 0.25s, border-width 0.1s;
}

/* Show the checkmark when checked */
.btn-container input:checked ~ .checkmark:after {
  left: 0.4em;
  top: 0.2em;
  width: 0.25em;
  height: 0.5em;
  border-color: #fff0 white white #fff0;
  border-width: 0 0.15em 0.15em 0;
  border-radius: 0em;
  transform: rotate(45deg);
}





  #kt_app_toolbar{
    display: none;
  }
  .section_add{
    display: flex;
    align-items: center;
    justify-content: end;
  }
  .btn_add_quizz{
    border: none;
    outline: none;
    background: #1b84ff;
    padding: 10px 25px;
    border-radius: 10px;
    font-size: 1.2rem;
    color: #fff !important;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
  }
  .btn_add_quizz:hover{
    -webkit-box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.22);
    -moz-box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.22);
    box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.22);
  }
  .nav-tabs .nav-link{
    border-top-left-radius: 0.8rem !important;
    border-top-right-radius: 0.8rem !important;

  }
  .nav-tabs .nav-link{
    margin-bottom: 0 !important;
    padding: 8px 0px;
    font-size: 1.5rem;
    font-weight: 500;
  }
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    color: #fff !important;
    background-color: #1b84ff !important;
    border-color: #dee2e6 #dee2e6 #fff;
  }

</style>          
<div class="section_add">
  <button class="btn_add_quizz" type="button" data-toggle="modal" data-target="#exampleModalCenter">New Quizze</button>
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" style="transform: translate(20px, -100px); " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 1300px !important; display: flex;align-items: center;justify-content: center;" role="document">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-header" style="border-bottom: 0 !important;">
        <h2 class="modal-title" id="exampleModalLongTitle">New Quizze</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 3rem;padding: 0;font-weight: 600 !important;color: #1b84ff;margin: 0;">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 0 1rem !important">
        <!-- Nav tabs -->
          <ul class="nav nav-tabs" style="margin-top: 20px;">
            <li class="nav-item" style="width: calc(100% / 3);text-align: center;">
               <a class="nav-link active" data-bs-toggle="tab" href="#home">INFO</a>
            </li>
            <li class="nav-item" style="width: calc(100% / 3);text-align: center;">
               <a class="nav-link" data-bs-toggle="tab" href="#menu1">DETAILS</a>
            </li>
            <li class="nav-item" style="width: calc(100% / 3);text-align: center;">
               <a class="nav-link" data-bs-toggle="tab" href="#menu2">QUESTIONS</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="300px">
            <div class="tab-pane container active" style="max-width: 1340px !important;margin: 15px 0;" id="home">

              <div class="" style="display: flex;flex-direction: column;align-items: flex-start;row-gap: 15px;">

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Title: </span>
                  <input type="text" name="title" placeholder="Title" class="col-md-9 form-control">
                </div>

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Description: </span>
                  <input type="text" name="description" placeholder="Description" class="col-md-9 form-control">
                </div>

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Duration: </span>
                  <input type="time" name="time" placeholder="Duration" class="col-md-9 form-control">
                </div>

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Total Score: </span>
                  <input type="text" name="score" placeholder="Total Score" class="col-md-9 form-control">
                </div>

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Pass Score: </span>
                  <input type="text" name="pass_score" placeholder="Pass Score" class="col-md-9 form-control">
                </div>

                <div class="col-md-12 d-flex align-items-center justify-content-around">
                  <span class="col-md-2" style="font-size: 1.2rem;">Acive: </span>
                  <div class="col-md-9 p-0">
                    <label class="btn-container">
                      <input type="checkbox">
                      <div class="checkmark"></div>
                    </label>
                  </div>
                </div>

              </div>

              <div class="d-flex justify-content-end" style="column-gap: 16px">
                <a class="btnNext btn_add_quizz">Next</a>
              </div>
            </div>
            <div class="tab-pane container fade" style="max-width: 1340px !important;margin: 10px 0;" id="menu1">
              <h1>DETAILS</h1>
              <div class="d-flex justify-content-end" style="column-gap: 16px">
                <a class="btnPrevious btn_add_quizz">Prev</a>
                <a class="btnNext btn_add_quizz">Next</a>
              </div>
            </div>
            <div class="tab-pane container fade" style="max-width: 1340px !important;margin: 10px 0;" id="menu2">
              <h1>QUESTIONS</h1>
              <div class="d-flex justify-content-end" style="column-gap: 16px">
                <a class="btnPrevious btn_add_quizz">Prev</a>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>




<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
            <th class="sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width:calc(100% / 7);" aria-sort="descending">#</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">Serial no.</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">Title</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">Time</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">Score</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">No. of Questions</th>
            <th class="sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width:calc(100% / 7);">Action</th>
    </thead>
    <tbody class="fs-6">
        @foreach($quizzes as $item)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$item->title}}
            </td>
            <td>
                {{$item->time}}
            </td>
            <td>
                {{$item->score}}
            </td>
            <td>
                {{count($item->question)}}
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $("#menu_action").css("display","none");
$( document ).ready(function() {
    $("#show_menu").click(function(){
        $("#menu_action").toggle(function(){
          $(this).addClass("d-flex");
        }, function(){
          $(this).removeClass("d-flex");

        } )
        $("#menu_action").click(function(){
          $(this).hide()
        })
    });


  $('.btnNext').click(function() {
    const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('a')[0];
    const nextTab = new bootstrap.Tab(nextTabLinkEl);
    nextTab.show();
  });

  $('.btnPrevious').click(function() {
    const prevTabLinkEl = $('.nav-tabs .active').closest('li').prev('li').find('a')[0];
    const prevTab = new bootstrap.Tab(prevTabLinkEl);
    prevTab.show();
  });

});
</script>

</x-default-layout>