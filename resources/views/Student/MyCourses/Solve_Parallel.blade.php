@php
    $page_name = 'Grade';
@endphp
@section('title', 'Lessons')
@include('Student.inc.header')
@include('Student.inc.menu')
@extends('Student.inc.nav')

@section('page_content')

<div class="app-email card my-3">
    <div class="border-0">
        <div class="row g-0">


            <!-- Emails List -->
            <div class="col app-emails-list">
                <div class="card shadow-none border-0">
                    <div class="card-body emails-list-header p-3 py-lg-3 py-2">
                        <!-- Email List: Search -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <i class="bx bx-menu bx-sm cursor-pointer d-block d-lg-none me-3" data-bs-toggle="sidebar"
                                    data-target="#app-email-sidebar" data-overlay=""></i>
                                <div class="mb-0 mb-lg-2 w-100">
                                    <div class="d-flex justify-content-center">
                                        @if ($grade)
                                            <button class="btn btn-success">
                                                Excellent
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                Wrong
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mx-n3 emails-list-header-hr">
                        <!-- Email List: Actions -->


                        <!-- Email View -->
                        <div class="col app-email-view flex-grow-0 bg-body" id="app-email-view">

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="app-email card my-3 mistakes_questions">
    <div class="border-0">
        <div class="row g-0  p-3">
                @if ( !empty($question->question) )
                {{$question->question}}
                @endif
                @if ( !empty($question->q_url) )
                <img style="width: 200px; height: 200px;"
                    src="{{ asset('images/questions/' . $question->q_url) }}" />
                @endif
                <button class="btn btn-primary ans_item_btn my-2">View Answer</button>
                <div class="ans_item d-none">
                    <b> Answer :
                    @if ( $question->ans_type == 'MCQ' )
                        {{$question->mcq[0]->mcq_answers}}
                    @else 
                    {{$question->g_ans[0]->grid_ans}}
                    @endif
                    </b>
                    <br />
                    @foreach ( $question->q_ans as $q_ans )
                    @if ( !empty($q_ans->ans_video) )
                    <iframe width="560" height="315" src="{{$q_ans->ans_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                
                    @endif
                    @endforeach
                  </div>
                @foreach ( $question->q_ans as $q_ans)
                <a href="{{asset('files/q_pdf/' . $q_ans->ans_pdf)}}" class="btn btn-success my-2" download>Download Pdf {{$loop->iteration}}</a>
                @endforeach

                <a href="{{route('question_parallel', ['id' => $question->id])}}" class="btn btn-info my-2" >Solve Parallel</a>

                <hr />
        </div>
    </div>
</div>

<script> 
    let ans_item_btn = document.querySelectorAll('.ans_item_btn');
    let ans_item = document.querySelectorAll('.ans_item');
    
    for (let i = 0, end = ans_item_btn.length; i < end; i++) {
        ans_item_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == ans_item_btn[j] ) {
                    ans_item[j].classList.toggle('d-none');
                }
            }
        })
    } 
</script>

@endsection

@include('Student.inc.footer')
