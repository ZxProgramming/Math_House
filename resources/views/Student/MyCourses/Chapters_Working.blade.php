
@php
    $page_name = 'Chapter';
@endphp
@section('title','Chapters')
@include('Student.inc.header')
@extends('Student.inc.nav')

@section('page_content')
<main class="main_wrapper overflow-hidden col-xl-9 col-lg-9 col-md-12">
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

                                            @foreach( $payment_request as $order )
                                            @foreach( $order->order as $chapter )
                                            @if( $course_id == $chapter->course_id )
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                <div class="gridarea__wraper">
                                                    <div class="gridarea__img">
                                                        <a href="{{route('stu_lessons', ['id' => $chapter->id, 'L_id' =>  $chapter->lessons[0]->id, 'idea' => $chapter->lessons[0]->ideas[0]->id])}}"><img loading="lazy"
                                                                src="{{asset('images/Chapters/' . $chapter->ch_url)}}"
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
                                                                    {{count($chapter->lessons)}} 
                                                                    Lesson
                                                                </li> 
                                                            </ul>
                                                        </div>
                                                        <div class="gridarea__heading">
                                                            <h3><a href="{{route('stu_lessons', ['id'=> $chapter->id, 'L_id' => $chapter->lessons[0]->id, 'idea' =>$chapter->lessons[0]->ideas[0]->id])}}">
                                                                    {{$chapter->chapter_name}}
                                                            </a></h3>
                                                        </div> 
                                                        <div class="gridarea__bottom">


                                                        </div>
                                                    </div>
                                                    

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
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

@endsection

@include('Student.inc.footer')
