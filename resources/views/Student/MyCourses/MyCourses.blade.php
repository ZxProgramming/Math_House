@php
    function fun_admin()
    {
        return 'student';
    }
@endphp
@include('Visitor.inc.header')
<x-default-layout>
    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Student Enrolled Courses| Edurock - Education LMS Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('student/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/aos.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('student/css/swiper-bundle.min.css') }}">
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
 
 
 
 



            <!-- dashboardarea__area__start  -->
            <div class="dashboardarea sp_bottom_100"> 

                <div class="dashboard">
                    <div class=" full__width__padding">
                        <div class="row"> 
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="dashboard__content__wraper">
                                    <div class="row">


                                        <div class="tab-content tab__content__wrapper aos-init aos-animate"
                                            id="myTabContent" data-aos="fade-up">


                                            <div class="tab-pane fade active show" id="projects__one"
                                                role="tabpanel" aria-labelledby="projects__one">
                                                <div class="row">

                                                    @foreach( $courses as $course )
                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                        <div class="gridarea__wraper">
                                                            <div class="gridarea__img">
                                                                <a href="{{route('stu_chapters', ['id'=> $course->id])}}"><img loading="lazy"
                                                                        src="{{asset('images/courses/' . $course->course_url)}}"
                                                                        alt="grid"></a>
                                                                <div class="gridarea__small__button">
                                                                    <div class="grid__badge">Data &amp; Tech</div>
                                                                </div>
                                                                <div class="gridarea__small__icon">
                                                                    <a href="#"><i
                                                                            class="icofont-heart-alt"></i></a>
                                                                </div>

                                                            </div>
                                                            <div class="gridarea__content">
                                                                <div class="gridarea__list">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="icofont-book-alt"></i> 
                                                                            {{count($course->chapter)}} 
                                                                            Chapters
                                                                        </li> 
                                                                    </ul>
                                                                </div>
                                                                <div class="gridarea__heading">
                                                                    <h3><a href="{{route('stu_chapters', ['id' => $course->id])}}">
                                                                            {{$course->course_name}}
                                                                    </a></h3>
                                                                </div> 
                                                                <div class="gridarea__bottom">

                                                                    <a href="instructor-details.html">
                                                                        <div class="gridarea__small__img">
                                                                            <img loading="lazy"
                                                                                src="../img/grid/grid_small_1.jpg"
                                                                                alt="grid">
                                                                            <div class="gridarea__small__content">
                                                                                <h6>
                                                                                    {{$course->teacher->name}}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                            

                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
 

                                                </div>
                                            </div>





                                        </div>




                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- dashboardarea__menu__end   -->
 



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
