<x-default-layout>
@include('Admin.Users.stu_header')

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
    <tbody class="fs-6">
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
                foreach($marketing as $item){
                  if(!empty($item->category_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'categories.cate_price AS arr_price', 'categories.cate_name as arr_name')
                    ->where('marketings.id', $item->id)
                    ->leftJoin('categories', 'marketings.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($item->chapter_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'chapters.ch_price AS arr_price', 'chapters.chapter_name AS arr_name')
                    ->where('marketings.id', $item->id)
                    ->leftJoin('chapters', 'marketings.chapter_id', '=', 'chapters.id')
                    ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($item->course_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'courses.course_price AS arr_price', 'courses.course_name AS arr_name')
                    ->where('marketings.id', $item->id)
                    ->leftJoin('courses', 'marketings.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($item->lesson_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'lessons.lesson_price AS arr_price', 'lessons.lesson_name AS arr_name')
                    ->where('marketings.id', $item->id)
                    ->leftJoin('lessons', 'marketings.lesson_id', '=', 'lessons.id')
                    ->leftJoin('chapters', 'lessons.chapter_id', '=', 'chapters.id')
                    ->leftJoin('courses', 'chapters.course_id', '=', 'courses.id')
                    ->leftJoin('categories', 'courses.category_id', '=', 'categories.id')
                    ->first();
                  }
                  elseif(!empty($item->question_id)){
                    $arr[] = DB::table('marketings')
                    ->select('*', 'questions.q_price AS arr_price', 'questions.question AS arr_name')
                    ->where('marketings.id', $item->id)
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
              foreach($arr as $item){
                if( isset($item->course_name) && $item->course_name != $arr_item ){
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
                @foreach($arr as $item)
                {{$item->arr_name}}
                @endforeach
              </div>
            </td>

            <td>
              @php
              $total = 0;
              foreach($arr as $item){
                $total += $item->arr_price;
              }
              @endphp
              {{$total}}
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
</script>


</x-default-layout>