
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
  <x-default-layout>
  @include('Admin.courses.Chapters.AddChapter')
    @section('title','Chapters')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <button type="button" class='btn btn-primary mx-3' data-bs-toggle="modal" data-bs-target="#filter_modal">
      Filter
    </button>

    <div class="modal fade" id="filter_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen p-9">
            <!--begin::Modal content-->
            <div class="modal-content modal-rounded">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Filter Lesson</h2>
                    <!--end::Modal title-->
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
                <form action="{{route('ch_filter')}}" method="POST">
                <div class="p-5 d-flex">
                        @csrf
                        <select name="category_id" class="form-control sel_category mx-2">
                            <option disabled selected>
                                Select Category ...
                            </option>
                            @foreach( $categories as $category )
                                <option value="{{$category->id}}">
                                    {{$category->cate_name}}
                                </option>
                            @endforeach
                        </select>
                        
                        <select name="course_id" class="form-control sel_course_items mx-2">
                            <option disabled selected>
                                Select Course ...
                            </option>
                        </select>
                        
                        <input type="hidden" value="{{$courses}}" class="course" />
                        <script>
                          let sel_category = document.querySelector('.sel_category');
                          let sel_course_items = document.querySelector('.sel_course_items');
                          let course = document.querySelector('.course');
                          course = course.value;
                          course = JSON.parse(course);

                          sel_category.addEventListener('change', () => {
                            sel_course_items.innerHTML = `
                            <option disabled selected>
                                Select Course ...
                            </option>`;
                            course.forEach(element => { 
                              if (sel_category.value == element.category_id) {
                              sel_course_items.innerHTML += `
                              <option value="${element.id}">
                                  ${element.course_name}
                              </option>`;
                              }
                            });
                          })
                        </script>
                        <button class="btn btn-primary mx-2">
                            Submit
                        </button>
                </div>
            </form>
            </div>
        </div>
    </div>
     
@error('chapter_name')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('teacher_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('ch_price')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
@error('course_id')
  <div class="alert alert-danger">
    {{$message}}
  </div>
@enderror
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Chapter Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">No. of Lessons</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Actions</th>
    </thead>
    <tbody class="fs-6">
        @foreach( $chapters as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->chapter_name}}
            </td>
            <td>
            @foreach($item->lessons as $element)
                {{$element->lesson_name}}
                <br />
            @endforeach
            </td>
            <td data-order="2023-10-25T00:00:00+03:00">
                {{$item->course->category->cate_name}}
            </td>
            <td data-order="2023-10-25T00:00:00+03:00">
                {{$item->course->course_name}}
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
                        <form method="POST" action="{{route('chapter_edit')}}" enctype="multipart/form-data">
                          @csrf
                        <div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content px-2">
                              <input type="hidden" value="{{$item->id}}" name="chapter_id" />

                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Chapter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 

                                <div class="info_section" id="info_section{{$item->id}}">
                                    <div class='my-3'>
                                        <label>Chapter Name</label>
                                        <input class='form-control' value="{{$item->chapter_name}}" name="chapter_name" placeholder="Chapter Name" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Category</label>
                                        <select name="category_id" class="form-control sel_new_cate"> 
                                            <option value="{{$item->course->category->id}}" selected>
                                                {{$item->course->category->cate_name}}
                                            </option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->cate_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class='my-3'>
                                        <label>Course</label>
                                        <select name="course_id" class="form-control sel_new_course">
                                            <option value="{{$item->course->id}}" selected>
                                                {{$item->course->course_name}}
                                            </option>
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">
                                                {{$course->course_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    <div class='my-3'>
                                        <label>Price</label>
                                        <input class='form-control' value="{{$item->ch_price}}" name="ch_price" placeholder="Chapter Price" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Description</label>
                                        <textarea class='form-control' name="ch_des" placeholder="Description" >{{$item->ch_des}}</textarea>
                                    </div>
                                    
                                    <div class='my-3'>
                                        <label>Image</label>
                                        <input class='form-control' type="file" name="ch_url" placeholder="Image" />
                                    </div>
                                    <button type="button" class="btn btn-success details_btn my-3" id="details_btn{{$item->id}}">
                                        Next
                                    </button>
                                </div>

                                <div class="details_section d-none" id="details_section{{$item->id}}">
                                    <div class='my-3'>
                                        <label>Teachers</label>
                                        <select name="teacher_id" class="form-control">
                                            <option value="{{@$item->teacher->id}}">
                                                {{@$item->teacher->name}}
                                            </option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">
                                                {{$teacher->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class='my-3'>
                                        <label>Pre requisition</label>
                                        <textarea class='form-control' name="pre_requisition" placeholder="Pre requisition" >{{$item->pre_requisition}}</textarea>
                                    </div>
                                    <div class='my-3'>
                                        <label>What you gain</label>
                                        <textarea class='form-control' name="gain" placeholder="What you gain" >{{$item->gain}}</textarea>
                                    </div>
                                    <button type="button" class="btn btn-secondary prev_info my-3">
                                        Back
                                    </button>
                                    <button type="button" class="btn btn-success pricing_btn my-3">
                                        Next
                                    </button>
                                </div>

                                <div class="priceing_section d-none" id="priceing_section{{$item->id}}">
                                   
                                  
                                  
                                  @foreach( $item->price as $price )
                                  <div class='my-3'>
                                        <label>Duration</label>
                                        <input class='form-control' value="{{$price->duration}}" name="duration[]" placeholder="Duration" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Price</label>
                                        <input class='form-control' value="{{$price->price}}" name="price[]" placeholder="Price" />
                                    </div>
                                    <div class='my-3'>
                                        <label>Discount</label>
                                        <input class='form-control' value="{{$price->discount}}" name="discount[]" placeholder="Discount" />
                                    </div>
                                    <hr />
                                    @endforeach
                                    <div class="mt-3 Prices" id="Prices{{$item->id}}"></div>

                                    <div class="modal-footer">
                                        <span class='btn btn-secondary prev_details'>
                                            Back
                                        </span>
                                        <button class='btn btn-primary'>
                                            Submit
                                        </button>
                                    </div>
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
                                
                                <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div> 
                              
                              <div class='p-3'>
                                Are You Sure To Delete
                                <span class='text-danger'>
                                  {{$item->chapter_name}} Chapter ??
                                </span>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <a href="{{route('del_chapter', ['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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
<input class="new_courses" type="hidden" value="{{$courses}}" />
<script>
  let sel_new_cate = document.querySelectorAll('.sel_new_cate');
  let sel_new_course = document.querySelectorAll('.sel_new_course');
  let new_courses = document.querySelector('.new_courses');
  new_courses = new_courses.value;
  new_courses = JSON.parse(new_courses);
  
  for (let i = 0, end = sel_new_cate.length; i < end; i++) {
    sel_new_cate[i].addEventListener('change', ( e ) => {
      for (let j = 0; j < end; j++) {
        if ( e.target == sel_new_cate[j] ) {
          sel_new_course[j].innerHTML = '';
          console.log(new_courses);
          new_courses.forEach(element => {
            if ( sel_new_cate[j].value == element.category_id ) {
              sel_new_course[j].innerHTML += `
              <option value="${element.id}">
                  ${element.course_name}
              </option>`;
            }
          });
        }
      }
    })
  }
</script>
<script>
  $(document).ready(()=>{
    $(".details_btn").click(function(){
        var info_id = `#${$(this).parent().attr("id")}`;
        var details_id = `#${$(this).parent().next().attr("id")}`;
        
        
        $(info_id).addClass("d-none");
        $(details_id).removeClass("d-none");
        
      });
      $(".pricing_btn").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var priceing_id = `#${$(this).parent().next().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(priceing_id).removeClass("d-none");
      });

      $(".prev_info").click(function(){
        var details_id = `#${$(this).parent().attr("id")}`;
        var info_id = `#${$(this).parent().prev().attr("id")}`;
       
        $(details_id).addClass("d-none");
        $(info_id).removeClass("d-none");
      });

      $(".prev_details").click(function(){
        var priceing_id = `#${$(this).parent().parent().attr("id")}`;
        var details_id = `#${$(this).parent().parent().prev().attr("id")}`;
       
        $(priceing_id).addClass("d-none");
        $(details_id).removeClass("d-none");
      });

  })
</script>
<script>
    let add_new_Pricing = document.querySelectorAll('.add_new_Pricing');
    let Prices = document.querySelector('.Prices');
    add_new_Pricing.forEach(element => {

      element.addEventListener("click",()=>{
        let btn_price_id = element.getAttribute("id"); 
        let ele_price_id = document.getElementById(btn_price_id); 
        console.log(ele_price_id);
        
        ele_price_id.addEventListener("click",()=>{
          console.log('gggggg');
          console.log($(this));

          Prices.innerHTML += `
          <div class="Price">
          <hr />
              <div class="section_idea my-2 d-flex align-items-center">
                  <span>Duration</span>
                  <input type="number" name="duration[]" class="form-control mx-2 form-control-lg" placeholder="Duration">
                  <span>Dayes</span>
              </div>
              <div class="section_idea my-2">
                  <span>Price</span>
                  <input name="price[]" class="form-control form-control-lg" placeholder="Price">
              </div>
              <div class="section_idea my-2">
                  <span>Discount</span>
                  <input name="discount[]" class="form-control form-control-lg" placeholder="Discount">
              </div>
              <button type="button" class="btn btn-danger btn_remove_idea">Remove</button>
          </div>`;
        })

          
          let btn_remove_idea = document.querySelectorAll('.btn_remove_idea');
          for (let i = 0, end = btn_remove_idea.length; i < end; i++) {
              btn_remove_idea[i].addEventListener('click', ( e ) => {
                  for (let j = 0; j < end; j++) {
                      if ( e.target == btn_remove_idea[j] ) {
                          btn_remove_idea[j].parentElement.remove()
                      }
                  }
              });
          }
  
          
      }); 
    });
</script>
</x-default-layout>