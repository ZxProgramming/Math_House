
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

</style>          
<div class="section_add">
  <button class="btn_add_quizz" type="button" data-toggle="modal" data-target="#exampleModalCenter">New Quizze</button>
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" style="transform: translate(20px, 0px); " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 1300px !important; display: flex;align-items: center;justify-content: center;" role="document">
    <div class="modal-content" style="border-radius: 15px;">
      <form action="">


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
                    <input type="text" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Description: </span>
                    <textarea class="col-md-9 form-control" name="dec_quizze" id="dec_quizze" cols="30" rows="3"></textarea>
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Duration: </span>
                    <div class="col-md-9" style="display: flex; align-items: center;padding: 0;justify-content: start">
                      <div class="d-flex col-md-2" style="align-items: center;padding: 0;  column-gap: 10px">
                        <span>Houre: </span>
                        <input type="number" max="3" min="1" class="col-md-4 form-control">
                      </div>
                      <div class="d-flex col-md-2" style="align-items: center;padding: 0;  column-gap: 10px">
                        <span>Minets: </span>
                        <input type="number" max="60" min="1" class="col-md-4 form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Total Score: </span>
                    <input type="text" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Pass Score: </span>
                    <input type="text" class="col-md-9 form-control">
                  </div>

                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                    <span class="col-md-2" style="font-size: 1.2rem;">Active: </span>
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

                    <input class="category" type="hidden" value="{{$categories}}" />
                    <input class="course" type="hidden" value="{{$courses}}" />
                    <input class="chapter" type="hidden" value="{{$chapters}}" />
                    <input class="lesson" type="hidden" value="{{$lessons}}" />
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
                      <select name="select" id="sel_lesson" class="col-md-2 form-control">
                        <option value="" selected>Select Lesson</option>
                      </select>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end" style="column-gap: 16px">
                    <a class="btnPrevious btn_add_quizz">Prev</a>
                    <a class="btnNext btn_add_quizz">Next</a>
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
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
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
                    <div class="col-md-2 d-flex" style="align-items: center; column-gap:10px">
                      <span class="col-md-8">Question Num:</span>
                       <input type="number" class="form-control">
                    </div>
                    
                  </div>
                  
                  <div style="height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                    <table class="table table-striped">
                        <thead class="border-bottom">
                          <tr>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Select</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">#</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Type</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Year</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Month</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Code</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Section</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">No</th>
                            <th scope="col" style="font-weight: 500; font-size: 1.1rem">Difficulty</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>1</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>2</td>
                          <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>3</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="btn-container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                            </th>
                            <td>4</td>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                        </tbody>
                    </table>
                  </div>

                  <div class="d-flex" style="align-items: center; justify-content: center">
                    <span style="font-size: 2rem;font-weight: 500;background: #1b84ff;color: #fff;border-radius: 10px;padding: 10px 15px;margin-top: 10px;">Quizzes</span>
                  </div>

                  <div style="max-height: 300px;overflow: scroll;padding: 12px 0; border-bottom: 2px solid #8f8f8f">
                    <table class="table table-striped">
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Quizze</td>
                            <td>2020</td>
                            <td>04</td>
                            <td>A12C2</td>
                            <td>English</td>
                            <td>No.Of</td>
                            <td>Difficulty</td>
                          </tr>
                        </tbody>
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
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
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
              NO. OF QUESTIONS	
            </td>
            <td>
            <div style="position: relative; text-align: left;">
              <i class="fa-solid fa-ellipsis-vertical" style="font-size: 1.7rem; margin-left: 20px;cursor: pointer;" id="show_menu"></i>
                          <!-- Button trigger modal -->
                           <div style="width: 100px; position: absolute;z-index: 10; top: 0px;left: 30px; display: flex;flex-direction: column;background: #ececec;" id="menu_action">
                            <button type="button" style="width: 100%; background: none;border: none;outline: none;padding: 8px 20px;" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
                              Edit
                            </button>
                            <button type="button" class="text-danger" style="width: 100%; border-top: 1px solid #a7a7a7 !important; background: none;border: none;outline: none;padding: 8px 20px;" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">
                              Delete
                            </button>
                          </div>

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

<script>
  let sel_category = document.querySelector('#sel_category');
  let sel_course = document.querySelector('#sel_course');
  let sel_chapter = document.querySelector('#sel_chapter');
  let sel_lesson = document.querySelector('#sel_lesson');
  let category = document.querySelector('.category');
  let course = document.querySelector('.course');
  let chapter = document.querySelector('.chapter');
  let lesson = document.querySelector('.lesson');
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

sel_lesson.addEventListener('change', () => {
  $.ajax("{{route('quize_data')}}", {
      type: 'GET',  // http method
      data: { lesson: sel_lesson.value },  // data to submit
      success: function (data) {
        console.log(data);
      },
  });
});
</script>
<script>
  $("#menu_action").css("display","none");
  $( document ).ready(function() {
    $("#show_menu").click(function(){
        
      $("#menu_action").toggle(function(){
         
        $(this).addClass("d-flex");
          console.log("ssssssss");
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

});
</script>
</x-default-layout>