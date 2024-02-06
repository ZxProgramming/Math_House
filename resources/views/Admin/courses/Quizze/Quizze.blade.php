
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@section('title','Quizze')
@include('success')
{{-- Bootstrap pack --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- ////Bootstrap pack --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
  /* Hide the default checkbox */
.btn-container input {
  display: none;
}

.btn-container {
  width: 30px;
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
  border-color: #fff;
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
  .add_qz{
    font-size: 1.2rem;
    font-weight: 500;
    padding: 5px 10px;
    border: none;
    outline: none;
    text-align: center;
    margin-top: 2px;
    color: #fff;
    background: #14bc14;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
  }
  .add_qz:hover{
    box-shadow:0px 0px 5px 5px rgb(134 134 134 / 22%);
  }
  .remove_qz{
    font-size: 1.2rem;
    font-weight: 500;
    padding: 5px 25px;
    border: none;
    outline: none;
    text-align: center;
    margin-top: 2px;
    color: #fff;
    background: red;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
  }
  .remove_qz:hover{
    box-shadow:0px 0px 5px 5px rgb(134 134 134 / 22%);
  }
  .edit_qz{
    font-size: 1.2rem;
    font-weight: 500;
    padding: 5px 10px;
    border: none;
    outline: none;
    text-align: center;
    margin-top: 2px;
    color: #fff;
    background: #14bc14;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
  }
  .edit_qz:hover{
    box-shadow:0px 0px 5px 5px rgb(134 134 134 / 22%);
  }
  .remove_qz_edit{
    font-size: 1.2rem;
    font-weight: 500;
    padding: 5px 25px;
    border: none;
    outline: none;
    text-align: center;
    margin-top: 2px;
    color: #fff;
    background: red;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
  }
  .remove_qz_edit:hover{
    box-shadow:0px 0px 5px 5px rgb(134 134 134 / 22%);
  }
  .avil{
    font-size: 1.3rem !important;
    font-weight: 500 !important;
    color: #62a8aa !important;
    letter-spacing: 1px !important;
    text-align: center !important;
  }
</style>          
<div class="section_add">
  <button class="btn_add_quizz" type="button" data-toggle="modal" data-target="#exampleModalCenter">New Quizze</button>
</div> 
<!-- Modal Add Quizze -->
<div class="modal fade" id="exampleModalCenter" style="transform: translate(20px, 0px); " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 1300px !important; display: flex;align-items: center;justify-content: center;" role="document">
    <div class="modal-content" style="border-radius: 15px;">
      <form action="{{route('add_quizze')}}" method="POST">
      @csrf
      <input type="hidden" class="questions_data" name="ques_id" />
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
            <div class="tab-content">
              {{-- Info --}}
              <div class="tab-pane container active" style="min-height: 300px; max-width: 1340px !important;margin: 15px 0;" id="home">

                <div class="" style="display: flex;flex-direction: column;align-items: flex-start;row-gap: 15px;">

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Title: </span>
                    <input type="text" name="title" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Description: </span>
                    <textarea class="col-md-9 form-control" name="description" id="dec_quizze" cols="30" rows="3"></textarea>
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Duration: </span>
                    <div class="col-md-9" style="display: flex; align-items: center;padding: 0;justify-content: start">
                      <div class="d-flex col-md-2" style="align-items: center;padding: 0;  column-gap: 10px">
                        <span>Houre: </span>
                        <input type="number" name="time_h" max="3" min="1" class="col-md-4 form-control">
                      </div>
                      <div class="d-flex col-md-2" style="align-items: center;padding: 0;  column-gap: 10px">
                        <span>Minets: </span>
                        <input type="number" name="time_m" max="60" min="1" class="col-md-4 form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Total Score: </span>
                    <input type="text" name="score" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Pass Score: </span>
                    <input type="text" name="pass_score" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Active: </span>
                    <div class="col-md-9 p-0">
                      <label class="btn-container">
                        <input name="state" value="1" type="checkbox">
                        <div class="checkmark"></div>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end" style="column-gap: 16px">
                  <a class="btnNext btn_add_quizz">Next</a>
                </div>
              </div>
              {{-- Details --}}
              <div class="tab-pane container fade" style="height: 300px; max-width: 1340px !important;margin: 10px 0;" id="menu1">
                
                <div class="" style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                
                  <div class="" style="display: flex;flex-direction: column;align-items: flex-start; row-gap: 30px;">
                  
                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Category: </span>
                      <select name="select" id="sel_category" class="col-md-2 form-control">
                        <option value="" selected>Select Category</option>
                        @foreach( $categories as $category )
                        <option value="{{$category->id}}">{{$category->cate_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Course: </span>
                      <select name="select" id="sel_course" class="col-md-2 form-control">
                        <option value="" selected>Select Course</option>
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Chapter: </span>
                      <select name="select" id="sel_chapter" class="col-md-2 form-control">
                        <option value="" selected>Select Chapter</option>
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Lesson: </span>
                      <select name="lesson_id" id="sel_lesson" class="col-md-2 form-control">
                        <option value="" selected>Select Lesson</option>
                      </select>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end" style="column-gap: 16px">
                    <a class="btnPrevious btn_add_quizz">Prev</a>
                    <a class="btnNext btn_add_quizz next_btn d-none">Next</a>
                  </div>
                </div>
              </div>
              {{-- Questions --}}
              <div class="tab-pane container fade" style="min-height: 300px; max-width: 1340px !important;margin: 10px 0;" id="menu2">
                
                <div class="" style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                    
                  <div class="d-flex" style="margin-bottom: 1rem; align-items: center; justify-content: space-around; column-gap: 10px">
                    <span style="font-size: 1.2rem;font-weight: 600;">Filter Quizzes :</span>
                   
                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                      <span>Year:</span>
                        <select id="sel_year" name="names" class="form-control">
                          @for( $i = date('Y'); $i >= 1990; $i-- )
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                    </div>
                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                      <span>Month:</span>
                        <select id="sel_month" name="names" class="form-control">
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                      <span>Section:</span>
                        <select id="sel_month" name="names" class="form-control">
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                      <span>Code:</span>
                        <select id="sel_month" name="names" class="form-control">
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex p-0" style="align-items: center; column-gap:10px">
                      <span class="col-md-8">Question Num:</span>
                       <input type="number" class="col-md-4 form-control" style="padding:.375rem 0 !important; padding-left: 5px !important;">
                    </div>
                    
                  </div>
                    <input class="category" type="hidden" value="{{$categories}}" />
                    <input class="course" type="hidden" value="{{$courses}}" />
                    <input class="chapter" type="hidden" value="{{$chapters}}" />
                    <input class="lesson" type="hidden" value="{{$lessons}}" />
                  
                  <div style="max-height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                    <table class="table table-striped" id="tblData_Quizzes">
                        <thead class="border-bottom">
                          <tr>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">#</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Type</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Year</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Month</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Code</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Section</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">No</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Difficulty</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Select</th>
                          </tr>
                        </thead>
                        
                        <tbody class="quizze_item"></tbody>
                     
                    </table>
                  </div>

                  <div class="d-flex" style="align-items: center; justify-content: center">
                    <span style="font-size: 2rem;font-weight: 500;background: #1b84ff;color: #fff;border-radius: 10px;padding: 10px 15px;margin-top: 10px;">Quizzes</span>
                  </div>

                  <div style="max-height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                    <table class="table table-striped" id="tblData">
                      <thead class="border-bottom">
                        <tr>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">#</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Type</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Year</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Month</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Code</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Section</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">No</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Difficulty</th>
                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Action</th>
                        </tr>
                      </thead>

                        <tbody class="sel_quz"></tbody>

                      </table>
                  </div>

                  <div class="d-flex justify-content-end" style="column-gap: 16px; margin-top: 10px">
                    <a class="btnPrevious btn_add_quizz">Prev</a>
                  </div>

                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary add_btn">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>


<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
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
              <div style="position: relative; text-align: left;">
 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                  Edit
                </button>
                
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                  Delete
                </button>

                {{-- Modal Edit Quizze --}}
                <div class="modal fade modal_edit" id="modalCenter{{$item->id}}" style="transform: translate(20px, 0px); " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" style="max-width: 1300px !important; display: flex;align-items: center;justify-content: center;" role="document">
                    <div class="modal-content" style="border-radius: 15px;">
                      <form action="{{route('edit_quizze', ['id' => $item->id])}}" method="POST">
                      @csrf 
                        <div class="modal-header" style="border-bottom: 0 !important;">
                          <h2 class="modal-title" id="exampleModalLongTitle">Edit Quizze</h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="cls_edite" style="font-size: 3rem;padding: 0;font-weight: 600 !important;color: #1b84ff;margin: 0;">&times;</span>
                          </button>
                        </div>
                      {{-- Content Modal --}}
                        <div class="modal-body" style="padding: 0 1rem !important">
                          <!-- Nav tabs -->
                            <ul class="nav nav-edit nav-tabs" style="margin-top: 20px;">
                              <li class="nav-item nav-info" style="width: calc(100% / 2);text-align: center;">
                                <a class="nav-link active" data-bs-toggle="tab" href="#info_edit{{$item->id}}">INFO</a>
                              </li>
                              <li class="nav-item nav-question" style="width: calc(100% / 2);text-align: center;">
                                <a class="nav-link" data-bs-toggle="tab" href="#question_edit{{$item->id}}">QUESTIONS</a>
                              </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                              {{-- Info --}}
                              <div class="tab-pane container active" style="min-height: 300px; max-width: 1340px !important;margin: 15px 0;" id="info_edit{{$item->id}}">

                                <div class="" style="display: flex;flex-direction: column;align-items: flex-start;row-gap: 15px;">

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Title: </span>
                                    <input type="text" name="title" value="{{ $item->title }}" class="col-md-9 form-control">
                                  </div>

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Description: </span>
                                    <textarea class="col-md-9 form-control" name="description" id="dec_quizze" cols="30" rows="3">{{ $item->description }}</textarea>
                                  </div>

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Duration: </span>
                                    <div class="col-md-9" style="display: flex; align-items: center;padding: 0;justify-content: start">
                                        <input name="time" value="{{ $item->time }}" max="60" min="1" class="col-md-4 form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Total Score: </span>
                                    <input type="text" name="score" value="{{ $item->score }}" class="col-md-9 form-control">
                                  </div>

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Pass Score: </span>
                                    <input type="text" name="pass_score" value="{{ $item->pass_score }}" class="col-md-9 form-control">
                                  </div>

                                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                                    <span class="col-md-2" style="font-size: 1.2rem;">Active: </span>
                                    <div class="col-md-9 p-0">
                                      <label class="btn-container">
                                        @if( $item->state == 0 )
                                        <input name="state" value="1" type="checkbox" />
                                        @else
                                        <input name="state" value="1" type="checkbox" checked />
                                        @endif
                                        <div class="checkmark"></div>
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                {{-- <div class="d-flex justify-content-end" style="column-gap: 16px">
                                  <a class="btnNext btn_add_quizz nex_btn">Next</a>
                                </div> --}}
                              </div>
                              {{-- Questions --}} 
                                
                              <div class="tab-pane container fade" style="min-height: 300px; max-width: 1340px !important;margin: 10px 0;" id="question_edit{{$item->id}}">
                                
                                <div class="" style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                                    
                                  <div class="d-flex" style="margin-bottom: 1rem; align-items: center; justify-content: space-around; column-gap: 10px">
                                    <span style="font-size: 1.2rem;font-weight: 600;">Filter Quizzes :</span>
                                  
                                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                                      <span>Year:</span>
                                        <select id="sel_year" name="names" class="form-control">
                                          @for( $i = date('Y'); $i >= 1990; $i-- )
                                            <option value="{{$i}}">{{$i}}</option>
                                          @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                                      <span>Month:</span>
                                        <select id="sel_month" name="names" class="form-control">
                                          <option value="01">January</option>
                                          <option value="02">February</option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                                      <span>Section:</span>
                                        <select id="sel_month" name="names" class="form-control">
                                          <option value="01">January</option>
                                          <option value="02">February</option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                                      <span>Code:</span>
                                        <select id="sel_month" name="names" class="form-control">
                                          <option value="01">January</option>
                                          <option value="02">February</option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 d-flex p-0" style="align-items: center; column-gap:10px">
                                      <span class="col-md-8">Question Num:</span>
                                      <input type="number" class="col-md-4 form-control" style="padding:.375rem 0 !important; padding-left: 5px !important;">
                                    </div>
                                    
                                  </div>
                                    <input class="category" type="hidden" value="{{$categories}}" />
                                    <input class="course" type="hidden" value="{{$courses}}" />
                                    <input class="chapter" type="hidden" value="{{$chapters}}" />
                                    <input class="lesson" type="hidden" value="{{$lessons}}" />
                                  
                                  <div style="max-height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                                    <table class="table table-striped" id="tblData_Quizzes">
                                        <thead class="border-bottom">
                                          <tr>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">#</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Type</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Year</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Month</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Code</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Section</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">No</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Difficulty</th>
                                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Select</th>
                                          </tr>
                                        </thead>
                                        <tbody class="quizze_item lesson_quizze">
                                          @foreach( $questions as $question )
                                            @if( $question->lesson_id == $item->lesson_id )
                                              <input type="hidden" value="{{$question->id}}" class="question_id ques_id" />
                                              <input type="hidden" value="{{$item->id}}" name="quizze_id" class="quizze_id" />
                                              <tr>
                                                <th scope="row" class="idd d-none">{{$question->id}}</th>
                                                <th>{{$loop->iteration}}</th>
                                                <td class="type">{{$question->q_type}}</td>
                                                <td class="year">{{$question->year}}</td>
                                                <td class="month">{{$question->month}}</td>
                                                <td class="code">{{$question->q_code}}</td>
                                                <td class="section">{{$question->section}}</td>
                                                <td class="noNum">{{$question->q_num}}</td>
                                                <td class="diff">{{$question->difficulty}}</td>
                                                <td class="p-0">
                                                  <button type="button" class="edit_qz add_question">Add</button>
                                                </td>
                                              </tr>
                                            @endif
                                          @endforeach
                                        </tbody>
                                    </table>
                                  </div>

                                  <div class="d-flex" style="align-items: center; justify-content: center">
                                    <span style="font-size: 2rem;font-weight: 500;background: #1b84ff;color: #fff;border-radius: 10px;padding: 10px 15px;margin-top: 10px;">Quizzes</span>
                                  </div>

                                  <div style="max-height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                                    <table class="table table-striped" id="tblData">
                                      <thead class="border-bottom">
                                        <tr>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">#</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Type</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Year</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Month</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Code</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Section</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">No</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Difficulty</th>
                                          <th scope="col" style="font-weight: 500; font-size: 1.1rem">Action</th>
                                        </tr>
                                      </thead>
                                        <input type="hidden" class="add_new_questions" name="add_new_questions" />

                                        <tbody class="sel_quz sel_quz_edit">
                                        @foreach( $item->question as $question )
                                        <input type="hidden" class="e_questions" value="{{$question}}" />
                                        <input type="hidden" value="{{$question->ques_id}}" name="questions_id[]" class="question_id" />
                                          <tr>
                                            <td style="font-weight: 500; font-size: 1.1rem">
                                              {{$loop->iteration}}
                                            </td>
                                            <td style="font-weight: 500; font-size: 1.1rem">
                                              <input type="hidden" value="{{$question->ques_id}}" name="ques_id[]" class="question_id" />
                                            {{$question->question->q_type}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->year	}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->month}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->q_code}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->section}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->q_num}}</td>
                                            <td style="font-weight: 500; font-size: 1.1rem">{{$question->question->difficulty}}</td>
                                            <td style='width: 150px !important; padding: 0 !important;'>
                                              <button type='button' class='remove_qz_edit'>Remove</button>
                                            </td>
                                          </tr>
                                          @endforeach
                                        </tbody>

                                      </table>
                                  </div>

                                  {{-- <div class="d-flex justify-content-end" style="column-gap: 16px; margin-top: 10px">
                                    <a class="btnPrevious btn_add_quizz pre_btn">Prev</a>
                                  </div> --}}

                                </div>
                              </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary close_btn"  data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary add_btn">Edit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal To Delete Quizze -->
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

<script>
   $( document ).ready(function() {

          $("#show_menu").click(function(){
              
            $("#menu_action").toggle(function(){
              
              $(this).addClass("d-flex"); 
              }, function(){
                $(this).removeClass("d-flex");

              })
              
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

          // $('.nex_btn').click(function() {
          //   const nextTabLinkEl = $('.nav-edit .active').closest('.nav-item').next('li').find('a')[0];
          //   const nextTab = new bootstrap.Tab(nextTabLinkEl);
          //   nextTab.show();
          // });

          // $('.pre_btn').click(function() {
          //   const prevTabLinkEl = $('.nav-edit .active').closest('.nav-question').prev('li').find('a')[0];
          //   const prevTab = new bootstrap.Tab(prevTabLinkEl);
          //   prevTab.show();
          // });

          $(".cls_edite").click(()=>{
            $(".modal_edit").modal("hide");
          })
          $(".close_btn").click(()=>{
            $(".modal_edit").modal("hide");
          })



          var emptyRow = "<tr><td colspan='12' class='avil'> No Quizzes Available</td></tr>"
          
          function addEmptyRow() {
            if ($("#tblData tbody").html() == "") {
              $("#tblData tbody").append(emptyRow);
            };
            if ($("#tblData_Quizzes tbody").html() == "") {
              $("#tblData_Quizzes tbody").append(emptyRow);
            };
          };
          addEmptyRow();
        });
</script>

<script>
  
</script>

<script>
  $("#menu_action").css("display","none");


  let sel_category = document.querySelector('#sel_category');
  let sel_course = document.querySelector('#sel_course');
  let sel_chapter = document.querySelector('#sel_chapter');
  let sel_lesson = document.querySelector('#sel_lesson');
  let category = document.querySelector('.category');
  let course = document.querySelector('.course');
  let chapter = document.querySelector('.chapter');
  let lesson = document.querySelector('.lesson');
  let questions_data = document.querySelector('.questions_data');
  course = course.value;
  course = JSON.parse(course);
  chapter = chapter.value;
  chapter = JSON.parse(chapter);
  lesson = lesson.value;
  lesson = JSON.parse(lesson);

sel_category.addEventListener('change', () => {
      sel_course.innerHTML = `
      <option selected disabled>
        Select Course
      </option>
      `;
  course.forEach(element => {
    if ( sel_category.value == element.category_id ) {
      sel_course.innerHTML += `
      <option value="${element.id}">
      ${element.course_name}
      </option>
      `;
    }
  })
});

sel_course.addEventListener('change', () => {
  sel_chapter.innerHTML = `
      <option selected disabled>
        Select Chapter
      </option>
      `;
  chapter.forEach(element => {
    if ( sel_course.value == element.course_id ) {
      sel_chapter.innerHTML += `
      <option value="${element.id}">
      ${element.chapter_name}
      </option>
      `;
    }
  });
});

sel_chapter.addEventListener('change', () => {
    sel_lesson.innerHTML = `
        <option selected disabled>
          Select Lesson
        </option>
        `;
      lesson.forEach(element => {
      if ( sel_chapter.value == element.chapter_id ) {
        sel_lesson.innerHTML += `
        <option value="${element.id}">
        ${element.lesson_name}
        </option>
        `;
      }
    });
});

let quizze_item = document.querySelector('.quizze_item');

let add_question_btn = document.querySelectorAll('.add_question');
let ques_id = document.querySelectorAll('.ques_id');
let quizze_id = document.querySelectorAll('.quizze_id');
let arr = [];
for ( let i = 0, end = add_question_btn.length; i < end; i++ ) {
  add_question_btn[i].addEventListener('click', ( e ) => {
    for (let j = 0; j < end; j++) {
      if ( e.target == add_question_btn[j] ) {
        let ques = ques_id[j].value;
        let quizze = quizze_id[j].value;
        let obj = {'ques_id': ques, 'quizze_id': quizze}
        arr = [...arr, obj];
      }
    }
  })
}

sel_lesson.addEventListener('change', () => {
  
  $(".next_btn").removeClass("d-none");

  $.ajax("{{route('quize_data')}}", {
      type: 'GET',  // http method
      data: { lesson: sel_lesson.value },  // data to submit
      success: function (data) {
          quizze_item.innerHTML = null; 
          data.forEach((element, index) => {
            quizze_item.innerHTML += `<tr>
                              <th scope="row" class="idd d-none">${element.id}</th>
                              <th>${index + 1}</th>
                              <td class="type">${element.q_type}</td>
                              <td class="year">${element.year}</td>
                              <td class="month">${element.month}</td>
                              <td class="code">${element.q_code}</td>
                              <td class="section">${element.section}</td>
                              <td class="noNum">${element.q_num}</td>
                              <td class="diff">${element.difficulty}</td>
                              <td class="p-0">
                                <button type="button" class="add_qz">Add</button>
                              </td>
                            </tr>`;
            });

          var quizzes = [];
          
          $(".add_qz").click(function(){

            var quziId = $(this).closest("tr").find(".idd").text();
            var quziType = $(this).closest("tr").find(".type").text();
            var quziYear = $(this).closest("tr").find(".year").text();
            var quziMonth = $(this).closest("tr").find(".month").text();
            var quziCode = $(this).closest("tr").find(".code").text();
            var quziNoNum = $(this).closest("tr").find(".noNum").text();
            var quziSection = $(this).closest("tr").find(".section").text();
            var quziDiff = $(this).closest("tr").find(".diff").text();

            var allData = []; 


            var quziObject = {
              id: quziId,
              type: quziType,
              year: quziYear,
              month: quziMonth,
              code: quziCode,
              section: quziSection,
              noNum: quziNoNum,
              diff: quziDiff,
            }
            
            allData.push(quziObject);

            quizzes.push(...allData); 

            var object_serialized = JSON.stringify(allData);


            var allObject_serialized = JSON.stringify(quizzes);

            localStorage.setItem("Allquizzes", allObject_serialized)



            localStorage.setItem("quizzes", object_serialized)
             

            var myObjectDeserialized = JSON.parse(localStorage.getItem("quizzes"));
             

            var quizz_container = $(".sel_quz");

            var index = quizzes.length;
            var removeBtn =  "<button type='button' class='remove_qz'>Remove</button>";
            
            
            myObjectDeserialized.forEach(element => {
              var dynamicTR = "<tr>";
                dynamicTR = dynamicTR + "<td class='iddd'> " + index + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.type + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.year + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.month + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.code + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.section + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.noNum + "</td>"; 
                dynamicTR = dynamicTR + "<td> " + element.diff + "</td>"; 
                dynamicTR = dynamicTR + "<td style='width: 150px !important; padding: 0 !important;'  > " + removeBtn + "</td>"; 
                
                dynamicTR = dynamicTR + " </tr>";

                index++;
                //_____________________________________________________________________________
                quizz_container.append(dynamicTR);
                questions_data.value = JSON.stringify(quizzes);
                //_____________________________________________________________________________
            });

            if($("tbody").length <= 1){ 
              addEmptyRow();
            }else{ 
              $(".avil").parent().remove();
            };
          });

          $(document).on('click', '.remove_qz', function() {
            var emptyRow = "<tr><td colspan='12' class='avil'> No Quizzes Available</td></tr>";
             
            
            var getIndex = $(this).closest("tr").index();
            
            quizzes.splice(getIndex , 1);
             

            $(this).closest("tr").remove();
            
            if ($("#tblData .sel_quz").html() == "") { 
              $("#tblData .sel_quz").append(emptyRow);
            };
          });
      },
  });
});
</script>
<script>
  $(document).ready(()=>{

    var quizzesEdit = [];
      $(".edit_qz").click(function(){

            var quziId = $(this).closest("tr").find(".idd").text();
            var quziType = $(this).closest("tr").find(".type").text();
            var quziYear = $(this).closest("tr").find(".year").text();
            var quziMonth = $(this).closest("tr").find(".month").text();
            var quziCode = $(this).closest("tr").find(".code").text();
            var quziNoNum = $(this).closest("tr").find(".noNum").text();
            var quziSection = $(this).closest("tr").find(".section").text();
            var quziDiff = $(this).closest("tr").find(".diff").text();

            var allDataEdit = []; 


            var quziObjectEdit = {
              id: quziId,
              type: quziType,
              year: quziYear,
              month: quziMonth,
              code: quziCode,
              section: quziSection,
              noNum: quziNoNum,
              diff: quziDiff,
            }
            
            allDataEdit.push(quziObjectEdit);

            quizzesEdit.push(...allDataEdit);

            var object_serialized_edit = JSON.stringify(allDataEdit);


            var allObject_serialized_edit = JSON.stringify(quizzesEdit);

            localStorage.setItem("AllquizzesEdit", allObject_serialized_edit)



            localStorage.setItem("quizzesEdit", object_serialized_edit)
             

            var myObjectDeserializedEdit = JSON.parse(localStorage.getItem("quizzesEdit"));
             

            var quizz_container_edit = $(".sel_quz");

            var index = quizzesEdit.length;
            var removeBtn =  "<button type='button' class='remove_qz_edit'>Remove</button>";
            
            
            myObjectDeserializedEdit.forEach(element => {
              var dynamicTREdit = "<tr>";
                dynamicTREdit = dynamicTREdit + "<td class='iddd'> " + index + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.type + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.year + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.month + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.code + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.section + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.noNum + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td> " + element.diff + "</td>"; 
                dynamicTREdit = dynamicTREdit + "<td style='width: 150px !important; padding: 0 !important;'> " + removeBtn + "</td>"; 
                
                dynamicTREdit = dynamicTREdit + " </tr>";

                index++;
                //_____________________________________________________________________________
                quizz_container_edit.append(dynamicTREdit);
                questions_data.value = JSON.stringify(quizzesEdit);
                //_____________________________________________________________________________
            });

            if($("tbody").length <= 1){ 
              addEmptyRow();
            }else{ 
              $(".avil").parent().remove();
            };
      });

        $(document).on('click', '.remove_qz_edit', function() {
            var emptyRowEdit = "<tr><td colspan='12' class='avil'> No Quizzes Available</td></tr>";
             
            
            var getIndexEdit = $(this).closest("tr").index();
            
            quizzesEdit.splice(getIndexEdit , 1);
             

            $(this).closest("tr").remove();
            
            if ($("#tblData .sel_quz_edit").html() == "") { 
              $("#tblData .sel_quz_edit").append(emptyRowEdit);
            };
          });
  
});

</script>
</x-default-layout>