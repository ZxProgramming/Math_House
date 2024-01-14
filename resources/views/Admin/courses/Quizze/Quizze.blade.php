
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
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                        <option value="category3">Category 3</option>
                        <option value="category4">Category 4</option>
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Course: </span>
                      <select name="select" id="sel_course" class="col-md-2 form-control">
                        <option value="" selected>Select Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                        <option value="course3">Course 3</option>
                        <option value="course4">Course 4</option>
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Chapter: </span>
                      <select name="select" id="sel_chapter" class="col-md-2 form-control">
                        <option value="" selected>Select Chapter</option>
                        <option value="chapter1">Chapter 1</option>
                        <option value="chapter2">Chapter 2</option>
                        <option value="chapter2">Chapter 3</option>
                        <option value="chapter4">Chapter 4</option>
                      </select>
                    </div>

                    <div style="width: 100%;" class="d-flex align-items-center justify-content-start">
                      <span class="col-md-2" style="font-size: 1.2rem;">Lesson: </span>
                      <select name="select" id="sel_lesson" class="col-md-2 form-control">
                        <option value="" selected>Select Lesson</option>
                        <option value="lesson1">Lesson 1</option>
                        <option value="lesson2">Lesson 2</option>
                        <option value="lesson3">Lesson 3</option>
                        <option value="lesson4">Lesson 4</option>
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
                    <div class="col-md-2 d-flex p-0" style="align-items: center; column-gap:10px">
                      <span class="col-md-8">Question Num:</span>
                       <input type="number" class="col-md-4 form-control" style="padding:.375rem 0 !important; padding-left: 5px !important;">
                    </div>
                    
                  </div>
                  
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
   <tbody>
                          <tr>
                            <th scope="row" class="idd">1</th>
                            <td class="type">Quizze1</td>
                            <td class="year">2020</td>
                            <td class="month">04</td>
                            <td class="code">A12C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">2</th>
                            <td class="type">Quizze2</td>
                            <td class="year">2013</td>
                            <td class="month">07</td>
                            <td class="code">vs452</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">3</th>
                            <td class="type">Quizze3</td>
                            <td class="year">2022</td>
                            <td class="month">09</td>
                            <td class="code">552C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">4</th>
                            <td class="type">Quizze4</td>
                            <td class="year">2021</td>
                            <td class="month">01</td>
                            <td class="code">222C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">5</th>
                            <td class="type">Quizze5</td>
                            <td class="year">2020</td>
                            <td class="month">06</td>
                            <td class="code">A122C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">6</th>
                            <td class="type">Quizze6</td>
                            <td class="year">2017</td>
                            <td class="month">05</td>
                            <td class="code">A5552C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">7</th>
                            <td class="type">Quizze7</td>
                            <td class="year">2023</td>
                            <td class="month">08</td>
                            <td class="code">A155C2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row" class="idd">8</th>
                            <td class="type">Quizze8</td>
                            <td class="year">2018</td>
                            <td class="month">02</td>
                            <td class="code">A1545s2</td>
                            <td class="section">English</td>
                            <td class="noNum">No.Of</td>
                            <td class="diff">Difficulty</td>
                            <td class="p-0">
                              <button type="button" class="add_qz">Add</button>
                            </td>
                          </tr>
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
          <button type="submit" class="btn btn-primary">Add</button>
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

  // addEmptyRow();
  var emptyRow = "<tr><td colspan='12' class='avil'> No Quizzes Available</td></tr>"
  
  function addEmptyRow() {
    // debugger;
    if ($("#tblData tbody").children().children().length == 0) {
      $("#tblData tbody").append(emptyRow);
    };
    if ($("#tblData_Quizzes tbody").children().children().length == 0) {
      $("#tblData_Quizzes tbody").append(emptyRow);
    };
  };



  if($("tbody").length >= 1){
    console.log("yes")
    addEmptyRow();
  }else{
    console.log("no")
  }

  
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
 
    console.log(quziId)
    console.log(quziType)
    console.log(quziYear)
    console.log(quziMonth)
    console.log(quziCode)
    console.log(quziNoNum)
    console.log(quziSection)
    console.log(quziDiff)

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
    quizzes.push(quziObject);
    console.log(quizzes);


    var object_serialized = JSON.stringify(quizzes);

    localStorage.setItem("quizzes", object_serialized)
    console.log(localStorage);

    var myObjectDeserialized = JSON.parse(localStorage.getItem("quizzes"));
    console.log(myObjectDeserialized);


    var quizz_container = $(".sel_quz");

    var removeBtn =  "<button type='button' class='remove_qz'>Remove</button>";

    var index = 1;

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
        dynamicTR = dynamicTR + "<td style='width: 150px !important; padding: 0 !important;' > " + removeBtn + "</td>"; 
        
        dynamicTR = dynamicTR + " </tr>";

        index++;
        
        quizz_container.append(dynamicTR);
      
    });




      console.log("#".repeat(15));
      console.log(quizzes);
      console.log("#".repeat(15));

  

      // $(".remove_qz").click(()=>{
        // localStorage.clear();
        // console.log()

        // if($("tbody").length <= 1){
        //   console.log("yes")
        //   addEmptyRow();
        // }else{
        //   console.log("nooo")
        //   $(".avil").parent().remove();
        // };

      // })


    if($("tbody").length <= 1){
      console.log("yes")
      addEmptyRow();
    }else{
      console.log("nooo")
      $(".avil").parent().remove();
    };

  });
      $(".remove_qz").click(function(){
        $(this).closest(".sel_quz").find("tr").hide()
        console.log(quizzes)
      })

});
</script>
</x-default-layout>