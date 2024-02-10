
@php
    $page_name = 'Courses';
@endphp
@section('title', 'My Courses')
@include('Student.inc.header')
@include('Student.inc.nav')

<main class="main_wrapper overflow-hidden">







    <!-- dashboardarea__area__start  -->
    <div class="dashboardarea sp_bottom_100">

        <div class="dashboard">
            <div class=" full__width__padding">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="dashboard__content__wraper">
                            <div class="row">


                                <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent"
                                    data-aos="fade-up">


                                    <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                                        aria-labelledby="projects__one">
                                        <div class="row">

                                            @foreach ($courses as $course)
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a
                                                                href="{{ route('stu_chapters', ['id' => $course->id]) }}"><img
                                                                    loading="lazy"
                                                                    src="{{ asset('images/courses/' . $course->course_url) }}"
                                                                    alt="grid"></a>
                                                            <div class="gridarea__small__button">
                                                                <div class="grid__badge">Data &amp; Tech</div>
                                                            </div>
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                                            </div>

                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i>
                                                                        {{ count($course->chapter) }}
                                                                        Chapters
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a
                                                                        href="{{ route('stu_chapters', ['id' => $course->id]) }}">
                                                                        {{ $course->course_name }}
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
                                                                                {{ $course->teacher->name }}
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


@include('Student.inc.footer')
