
@php
  function fun_admin(){
    return 'admin';
  }
@endphp
<x-default-layout>
@include('Admin.Users.stu_header')
    @section('title','Students')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div style="display: flex; align-items: center;justify-content: flex-start">
  <input type="text" class="form-control" placeholder="Search..." style="width: 200px;" id="myInput">
</div>
<table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
    <thead class="fs-7 text-gray-500 text-uppercase">
        <tr>
            <th class="min-w-250px sorting sorting_desc" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Manager: activate to sort column ascending" style="width: 336.359px;" aria-sort="descending">Name</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Phone</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Email</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Parent Phone</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Parent Email</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Category</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Course</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">History</th>
            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_profile_overview_table" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 205.188px;">Wallet</th>
    </thead>
    <tbody class="fs-6" id="myTable">
        @foreach( $students as $item )
        <tr class="odd">
            <td class="sorting_1">
                {{$item->name}}
            </td>
            <td class="sorting_1">
                {{$item->phone}}
            </td>
            <td class="sorting_1">
                {{$item->email}}
            </td> 
            <td class="sorting_1">
                {{$item->parent_phone}}
            </td> 
            <td class="sorting_1">
                {{$item->parent_email}}
            </td> 
            <td class="sorting_1">
                @php
                $marketing = DB::table('marketings')
                ->where('student_id', $item->id)
                ->get();
                $arr = [];
                foreach($marketing as $m_item){
                  if(!empty($m_item->cate_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'categories.cate_price AS arr_price', 'categories.cate_name as arr_name')
                    ->where('marketings.id', $m_item->id)
                    ->leftJoin('categories', 'marketings.cate_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($m_item->chapter_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'chapters.ch_price AS arr_price', 'chapters.chapter_name AS arr_name')
                    ->where('marketings.id', $m_item->id)
                    ->leftJoin('chapters', 'marketings.chapter_id', '=', 'chapters.id')
                    ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($m_item->course_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'courses.course_price AS arr_price', 'courses.course_name AS arr_name')
                    ->where('marketings.id', $m_item->id)
                    ->leftJoin('courses', 'marketings.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($m_item->lesson_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'lessons.lesson_price AS arr_price', 'lessons.lesson_name AS arr_name')
                    ->where('marketings.id', $m_item->id)
                    ->leftJoin('lessons', 'marketings.lesson_id', '=', 'lessons.id')
                    ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
                    ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($m_item->question_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'questions.q_price AS arr_price', 'questions.question AS arr_name')
                    ->where('marketings.id', $m_item->id)
                    ->leftJoin('questions', 'marketings.question_id', '=', 'questions.id')
                    ->leftJoin('lessons', 'questions.lesson_id', '=', 'lessons.id')
                    ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
                    ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                } 
                @endphp
                {{@$arr[0]->cate_name}}
            </td>

            <td>
              @php
              $arr_item = null;
              foreach($arr as $element){
                if( isset($element->course_name) && $element->course_name != $arr_item ){
                  echo $arr_item;
                  $arr_item = $item->course_name;
                }
              }
              @endphp
            </td>

            <td>
              <button class='btn btn-primary show_history'>
                View
              </button>
              <div class="history d-none">
                @foreach($arr as $arr_item)
                {{$arr_item->arr_name}}
                @endforeach
              </div>
            </td>

            <td>
              @php
              $wallet = DB::table('wallets')
              ->where('student_id', $item->id)
              ->get();
              $total = 0;
              @endphp
              
          <div class='d-flex align-items-center w-200px'>
          <button type="button" class="btn btn-primary show_wallet">
            View
          </button>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter{{$item->id}}">
            Top up
          </button>
          </div>
          <div class='wallet_h d-none'>
            @php
            foreach($wallet as $w_item){
              echo $w_item->wallet . '$ at ' . $w_item->date . '<br/>';
              $total += $w_item->wallet;
            }
            @endphp
          </div>
<!-- Modal -->
<div class="modal fade" id="modalCenter{{$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Top Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form method="POST" action="{{route('add_wallet')}}">
        @csrf
      <div class='p-3'>
        Wallet
        <span class='text-danger'>
          {{$total}} ??
        </span>
      </div>
        <input class="form-control" name="wallet" type="number" />
        <input class="form-control" name="student_id" type="hidden" value="{{$item->id}}" />
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button class="btn btn-success" data-bs-dismiss="modal">
          Confirm
        </button>
        
      </div>
      </form>
    </div>
  </div>
</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
  let show_history = document.querySelectorAll('.show_history');
  let history = document.querySelectorAll('.history');
  for (let i = 0, end = show_history.length; i < end; i++) {
    show_history[i].addEventListener('click', (e)=> {
      for (let j = 0; j < end; j++) {
        if(e.target == show_history[j]){
          history[j].classList.toggle('d-none');
        }
      }
    })
  } 
  let show_wallet = document.querySelectorAll('.show_wallet');
  let wallet_h = document.querySelectorAll('.wallet_h');
  for (let i = 0, end = show_wallet.length; i < end; i++) {
    show_wallet[i].addEventListener('click', (e) => {
      for (let j = 0; j < end; j++) {
        if ( e.target == show_wallet[j] ) {
          wallet_h[j].classList.toggle('d-none')
        }
      }
    })
  }
</script>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", ()=>{
      var vale = $("#myInput").val().toLowerCase();
      $("#myTable tr").filter(function(){
          $(this).toggle($(this).text().toLowerCase().indexOf(vale)>-1);
      })
    })
  })
</script>

</x-default-layout>