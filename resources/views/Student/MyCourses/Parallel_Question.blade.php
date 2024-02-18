
@php
    $page_name = 'Quizze';
@endphp
@section('title', 'Quizze')
@include('Student.inc.header')
@extends('Student.inc.nav')

@section('page_content')
<main class="main_wrapper overflow-hidden">

    <!-- tution__section__start -->
    <div class="tution sp_bottom_100 sp_top_100">
        <div class="full__width__padding">
            @foreach( $q_parallel as $question )
            <form action="{{route('solve_parallel', ['id' => $question->id])}}" method="POST">
            @csrf
            <button type="button" class="btn btn-primary show_question_btn">
                Show Parallel {{$loop->iteration}}
            </button>
            <div class="quiz__single__attemp show_question d-none"> 
                <hr class="hr" />
                <h3>{{ $loop->iteration }}.
                    @if (!empty($question->question))
                        {{ $question->question }}
                    @else
                        <img style="width: 200px; height: 200px;"
                            src="{{ asset('images/questions/' . $question->q_url) }}" />
                    @endif
                </h3>
                <div class="row">
                    @if ($question->ans_type == 'MCQ')
                    @php
                        $arr = ['A', 'B', 'C', 'D'];
                    @endphp
                        @foreach ($question->mcq as $mcq)
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="radio" 
                                    value="{{@$arr[$loop->iteration - 1]}}"
                                    id="flexCheckChecked{{ $mcq->id }}"
                                    name="ans{{$question->id}}" />
                                <label class="form-check-label"
                                    for="flexCheckChecked{{ $mcq->id }}">
                                    {{ @$arr[$loop->iteration - 1] . ' . ' . $mcq->mcq_ans }}
                                </label>
                            </div>
                        @endforeach
                    @else
                        <div class="form-check px-3">
                            <input name="ans{{$question->id}}"
                                class="form-control" />
                        </div>
                    @endif
                </div>
                <button class="btn btn-primary my-2">
                    Submit
                </button>

            </div>

            <br><br><br>
            @endforeach
            
        </div>
    </div>
    <!-- tution__section__end -->



</main>

<script>
    let show_question = document.querySelectorAll('.show_question');
    let show_question_btn = document.querySelectorAll('.show_question_btn');
    for (let i = 0, end = show_question_btn.length; i < end; i++) {
        show_question_btn[i].addEventListener('click', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == show_question_btn[j] ) {
                    show_question[j].classList.toggle('d-none');
                }
            }
        })
    }
</script>
@endsection

@include('Student.inc.footer')
