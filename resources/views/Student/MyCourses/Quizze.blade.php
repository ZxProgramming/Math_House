@php
    function fun_admin()
    {
        return 'student';
    }
@endphp
<x-default-layout>
    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>lesson Quiz | Edurock - Education LMS Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('student/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/aos.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/plugins_plyr.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/style.css') }}">


        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia(
                    "(prefers-color-scheme: dark)").matches)) {
                document.documentElement.classList.add("is_dark");
            }
            if (localStorage.getItem("theme-color") === "light") {
                document.documentElement.classList.remove("is_dark");
            }
        </script>

    </head>


    <body class="body__wrapper">



        <main class="main_wrapper overflow-hidden">
  
            <!-- tution__section__start -->
            <div class="tution sp_bottom_100 sp_top_100">
                <div class="full__width__padding">

                    <form action="{{route('quizze_ans')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$quizze->id}}" name="quizze_id" class="form-control" />
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                                <div class="lesson__quiz__wrap">

                                    @foreach( $quizze->question as $question )
                                    <div class="quiz__single__attemp">
                                        <ul>
                                            <li>Question : {{$loop->iteration}}/{{count($quizze->question)}} | </li>
                                        
                                        </ul>
                                        <hr class="hr" />
                                        <h3>{{$loop->iteration}}.
                                            @if (!empty($question->question))
                                                {{$question->question}}
                                            @else
                                                <img style="width: 200px; height: 200px;" src="{{asset('images/questions/' . $question->q_url)}}" />
                                            @endif
                                        </h3>
                                        <div class="row">
                                            @if ( $question->ans_type == 'MCQ' )
                                            @foreach ( $question->mcq as $mcq )
                                                <div class="form-check mx-3">
                                                    <input class="form-check-input" type="radio" value="{{$mcq->mcq_ans}}"
                                                        id="flexCheckChecked{{$mcq->id}}" name="ans{{$question->id}}" />
                                                    <label class="form-check-label" for="flexCheckChecked{{$mcq->id}}">
                                                        {{$mcq->mcq_ans}}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @else
                                                <div class="form-check px-3">
                                                    <input type="number" name="ans{{$question->id}}" class="form-control" />
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





        <!-- JS here -->
        <script src="{{ asset('student/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('student/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('student/js/popper.min.js') }}"></script>
        <script src="{{ asset('student/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('student/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('student/js/slick.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('student/js/ajax-form.js') }}"></script>
        <script src="{{ asset('student/js/wow.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('student/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('student/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('student/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('student/js/plugins.js') }}"></script>
        <script src="{{ asset('student/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('student/js/plugin_plyr.js') }}"></script>
        <script src="{{ asset('student/js/main.js') }}"></script>

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia(
                    "(prefers-color-scheme: dark)").matches)) {
                document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
            }
            if (localStorage.getItem("theme-color") === "light") {
                document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
            }
        </script>


    </body>

    </html>
</x-default-layout>
