
@include('Student.inc.header')
@section('title', 'Quizze')




<main class="main_wrapper overflow-hidden">

    <!-- tution__section__start -->
    <div class="tution sp_bottom_100 sp_top_100">
        <div class="full__width__padding">

            <form action="{{ route('quizze_ans') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $quizze->id }}" name="quizze_id" class="form-control" />
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                        <div class="lesson__quiz__wrap">

                            @foreach ($quizze->question as $question)
                                <div class="quiz__single__attemp">
                                    <ul>
                                        <li>Question : {{ $loop->iteration }}/{{ count($quizze->question) }} | </li>

                                    </ul>
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
                                            @foreach ($question->mcq as $mcq)
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" type="radio"
                                                        value="{{ $mcq->mcq_ans }}"
                                                        id="flexCheckChecked{{ $mcq->id }}"
                                                        name="ans{{ $question->id }}" />
                                                    <label class="form-check-label"
                                                        for="flexCheckChecked{{ $mcq->id }}">
                                                        {{ $mcq->mcq_ans }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-check px-3">
                                                <input type="number" name="ans{{ $question->id }}"
                                                    class="form-control" />
                                            </div>
                                        @endif
                                    </div>


                                </div>

                                <br><br><br>
                            @endforeach

                        </div>
                    </div>

                </div>
                <button class="btn btn-primary">
                    Submit
                </button>
                <button type="reset" class="btn btn-danger">
                    Clear
                </button>
            </form>
        </div>
    </div>
    <!-- tution__section__end -->



</main>

@include('Student.inc.footer')
