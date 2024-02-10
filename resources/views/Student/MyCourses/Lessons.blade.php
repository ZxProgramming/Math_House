
@php
    $page_name = 'Lesson';
@endphp
@section('title', 'Lessons')
@include('Student.inc.header')
@include('Student.inc.nav')

<!-- pre loader area start -->
<div id="back__preloader">
    <div id="back__circle_loader"></div>
    <div class="back__loader_logo">
        <img loading="lazy" src="img/pre.png" alt="Preload">
    </div>
</div>
<!-- pre loader area end -->

<!-- Dark/Light area start -->
<div class="mode_switcher my_switcher">
    <button id="light--to-dark-button" class="light align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512">
            <path
                d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94" />
            <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-miterlimit="10" stroke-width="32" />
        </svg>

        <span class="light__mode">Light</span>
        <span class="dark__mode">Dark</span>
    </button>
</div>
<!-- Dark/Light area end -->


<main class="main_wrapper overflow-hidden">




    <!-- headar section start -->
    <header>
        <div class="headerarea headerarea__3 header__sticky header__area">


            <div class="mob_menu_wrapper">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo">
                            <a class="logo__dark" href="#"><img loading="lazy" src="img/logo/logo_1.png"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right-wrap">

                            <div class="headerarea__right">

                                <div class="header__cart">
                                    <a href="#"> <i class="icofont-cart-alt"></i></a>
                                    <div class="header__right__dropdown__wrapper">
                                        <div class="header__right__dropdown__inner">
                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy" src="img/grid/cart1.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Web Directory</a>
                                                    <p>1 x <span class="price">$ 80.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>

                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy" src="img/grid/cart2.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Design Minois</a>
                                                    <p>1 x <span class="price">$ 60.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>

                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy" src="img/grid/cart3.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Crash Course</a>
                                                    <p>1 x <span class="price">$ 70.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="dropdown__price">Total: <span>$1,100.00</span>
                                        </p>
                                        <div class="header__right__dropdown__button">
                                            <a href="#" class="white__color">VIEW
                                                CART</a>
                                            <a href="#" class="blue__color">CHECKOUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i
                                        class="icofont-navigation-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end -->

    <!-- Mobile Menu Start Here -->
    <div class="mobile-off-canvas-active">
        <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
        <div class="header-mobile-aside-wrap">
            <div class="mobile-search">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button class="button-search"><i class="icofont icofont-search-2"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap headerarea">

                <div class="mobile-navigation">

                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="index.html">Homes Light</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home (Default)</a></li>
                                            <li><a href="home-2.html">Elegant</a></li>
                                            <li><a href="home-3.html">Classic</a></li>
                                            <li><a href="home-4.html">Classic LMS</a></li>
                                            <li><a href="home-5.html">Online Course </a></li>
                                            <li><a href="home-6.html">Marketplace </a></li>
                                            <li><a href="home-7.html">University</a></li>
                                            <li><a href="home-8.html">eCommerce</a></li>
                                            <li><a href="home-9.html">Kindergarten</a></li>
                                            <li><a href="home-10.html">Machine Learning</a></li>
                                            <li><a href="home-11.html">Single Course</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="index.html">Homes Dark</a>
                                        <ul class="dropdown">
                                            <li><a href="index-dark.html">Home Default (Dark)</a></li>
                                            <li><a href="home-2-dark.html">Elegant (Dark)</a></li>
                                            <li><a href="home-3-dark.html">Classic (Dark)</a></li>
                                            <li><a href="home-4-dark.html">Classic LMS (Dark)</a></li>
                                            <li><a href="home-5-dark.html">Online Course (Dark)</a></li>
                                            <li><a href="home-6-dark.html">Marketplace (Dark)</a></li>
                                            <li><a href="home-7-dark.html">University (Dark)</a></li>
                                            <li><a href="home-8-dark.html">eCommerce (Dark)</a></li>
                                            <li><a href="home-9-dark.html">Kindergarten (Dark)</a></li>
                                            <li><a href="home-10-dark.html">Kindergarten (Dark)</a></li>
                                            <li><a href="home-11-dark.html">Single Course (Dark)</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>


                            <li class="menu-item-has-children "><a href="#">Pages</a>

                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 1</a>

                                        <ul class="dropdown">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="about-dark.html">About (Dark)<span
                                                        class="mega__menu__label new">New</span></a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-dark.html">Blog (Dark)</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="blog-details-dark.html">Blog Details (Dark)</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 2</a>
                                        <ul class="dropdown">
                                            <li><a href="error.html">Error 404</a></li>
                                            <li><a href="error-dark.html">Error (Dark)</a></li>
                                            <li><a href="event-details.html">Event Details</a></li>
                                            <li><a href="zoom/zoom-meetings.html">Zoom<span
                                                        class="mega__menu__label">Online Call</span></a></li>
                                            <li><a href="zoom/zoom-meetings-dark.html">Zoom Meeting (Dark)</a>
                                            </li>
                                            <li><a href="zoom/zoom-meeting-details.html">Zoom Meeting
                                                    Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 3</a>
                                        <ul class="dropdown">
                                            <li><a href="zoom/zoom-meeting-details-dark.html">Meeting Details
                                                    (Dark)</a>
                                            </li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="login-dark.html">Login (Dark)</a></li>
                                            <li><a href="maintenance.html">Maintenance</a></li>
                                            <li><a href="maintenance-dark.html">Maintenance Dark</a></li>
                                            <li><a href="#">Terms & Condition</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 4</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Terms & Condition (Dark)</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Privacy Policy (Dark)</a></li>
                                            <li><a href="#">Success Stories</a></li>
                                            <li><a href="#">Success Stories (Dark)</a></li>
                                            <li><a href="#">Work Policy</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <div class="mega__menu__img">
                                            <a href="#"><img loading="lazy" src="img/mega/mega_menu_2.png"
                                                    alt="Mega Menu"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>



                            <li class="menu-item-has-children "><a href="course.html">Courses</a>

                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 1</a>

                                        <ul class="dropdown">
                                            <li><a href="course.html">Grid <span class="mega__menu__label">All
                                                        Courses</span></a></li>
                                            <li><a href="course-dark.html">Course Grid (Dark)</a></li>
                                            <li><a href="course-grid.html">Course Grid</a></li>
                                            <li><a href="course-grid-dark.html">Course Grid (Dark)</a></li>
                                            <li><a href="course-list.html">Course List</a></li>
                                            <li><a href="course-list-dark.html">Course List (Dark)</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 2</a>
                                        <ul class="dropdown">
                                            <li><a href="course-details.html">Course Details</a></li>
                                            <li><a href="course-details-dark.html">Course Details (Dark)</a>
                                            </li>
                                            <li><a href="course-details-2.html">Course Details 2</a></li>
                                            <li><a href="course-details-2-dark.html">Details 2 (Dark)</a></li>
                                            <li><a href="course-details-3.html">Course Details 3</a></li>
                                            <li><a href="course-details-3.html">Details 3 (Dark)</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Get Started 3</a>
                                        <ul class="dropdown">
                                            <li><a href="dashboard/become-an-instructor.html">Become An
                                                    Instructor</a>
                                            <li><a href="dashboard/create-course.html">Create Course <span
                                                        class="mega__menu__label">Career</span></a></li>
                                            <li><a href="instructor.html">Instructor</a></li>
                                            <li><a href="instructor-dark.html">Instructor (Dark)</a></li>
                                            <li><a href="instructor-details.html">Instructor Details</a></li>
                                            <li><a href="lesson.html">Course Lesson<span
                                                        class="mega__menu__label new">New</span></a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <div class="mega__menu__img">
                                            <a href="#"><img loading="lazy" src="img/mega/mega_menu_1.png"
                                                    alt="Mega Menu"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-item-has-children "><a href="dashboard/admin-dashboard.html">Dashboard</a>

                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Admin</a>

                                        <ul class="dropdown">
                                            <li><a href="dashboard/admin-dashboard.html">Admin Dashboard</a>
                                            </li>
                                            <li><a href="dashboard/admin-profile.html">Admin Profile</a></li>
                                            <li><a href="dashboard/admin-message.html">Message</a></li>
                                            <li><a href="dashboard/admin-course.html">Courses</a></li>
                                            <li><a href="dashboard/admin-reviews.html">Review</a></li>
                                            <li><a href="dashboard/admin-quiz-attempts.html">Admin Quiz</a>
                                            </li>

                                            <li><a href="dashboard/admin-settings.html">Settings</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Instructor</a>
                                        <ul class="dropdown">
                                            <li><a href="dashboard/instructor-dashboard.html">Inst.
                                                    Dashboard</a></li>
                                            <li><a href="dashboard/instructor-profile.html">Inst. Profile</a>
                                            </li>
                                            <li><a href="dashboard/instructor-message.html">Message</a></li>
                                            <li><a href="dashboard/instructor-wishlist.html">Wishlist</a></li>
                                            <li><a href="dashboard/instructor-reviews.html">Review</a></li>
                                            <li><a href="dashboard/instructor-my-quiz-attempts.html">My
                                                    Quiz</a></li>
                                            <li><a href="dashboard/instructor-order-history.html">Order
                                                    History</a></li>
                                            <li><a href="dashboard/instructor-course.html">My Courses</a></li>
                                            <li><a href="dashboard/instructor-announcments.html">Announcements</a>
                                            </li>
                                            <li><a href="dashboard/instructor-quiz-attempts.html">Quiz
                                                    Attempts</a></li>
                                            <li><a href="dashboard/instructor-assignments.html">Assignment</a>
                                            </li>
                                            <li><a href="dashboard/instructor-settings.html">Settings</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">Student</a>
                                        <ul class="dropdown">
                                            <li><a href="dashboard/student-dashboard.html">Dashboard</a></li>
                                            <li><a href="dashboard/student-profile.html">Profile</a></li>
                                            <li><a href="dashboard/student-message.html">Message</a></li>
                                            <li><a href="dashboard/student-enrolled-courses.html">Enrolled
                                                    Courses</a></li>
                                            <li><a href="dashboard/student-wishlist.html">Wishlist</a></li>
                                            <li><a href="dashboard/student-reviews.html">Review</a></li>
                                            <li><a href="dashboard/student-my-quiz-attempts.html">My Quiz</a>
                                            </li>
                                            <li><a href="dashboard/student-assignments.html">Assignment</a>
                                            </li>
                                            <li><a href="dashboard/student-settings.html">Settings</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children"><a href="ecommerce/shop.html">eCommerce</a>
                                <ul class="dropdown">
                                    <li><a href="ecommerce/shop.html">Shop<span class="mega__menu__label">Online
                                                Store</span></a></li>
                                    <li><a href="ecommerce/product-details.html">Product Details</a></li>
                                    <li><a href="ecommerce/cart.html">Cart</a></li>
                                    <li><a href="ecommerce/checkout.html">Checkout</a></li>
                                    <li><a href="ecommerce/wishlist.html">Wishlist</a></li>

                                </ul>
                            </li>

                        </ul>
                    </nav>

                </div>

            </div>
            <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-language-active" href="#">Language <i class="icofont-thin-down"></i></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            <li><a href="#">English (US)</a></li>
                            <li><a href="#">English (UK)</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div>
                </div>

                <!-- <div class="single-mobile-curr-lang">
                                    <a class="mobile-currency-active" href="#">Currency <i class="icofont-thin-down"></i></a>
                                    <div class="lang-curr-dropdown curr-dropdown-active">
                                        <ul>
                                            <li><a href="#">USD</a></li>
                                            <li><a href="#">EUR</a></li>
                                            <li><a href="#">Real</a></li>
                                            <li><a href="#">BDT</a></li>
                                        </ul>
                                    </div>
                                </div> -->

                <div class="single-mobile-curr-lang">
                    <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>
                    <div class="lang-curr-dropdown account-dropdown-active">
                        <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login.html">/ Create Account</a></li>
                            <li><a href="login.html">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-social-wrap">
                <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
                <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
                <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a>
                <a class="instagram" href="#"><i class="icofont icofont-instagram"></i></a>
                <a class="google" href="#"><i class="icofont icofont-youtube-play"></i></a>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end Here -->

    <!-- theme fixed shadow -->
    <div>
        <div class="theme__shadow__circle"></div>
        <div class="theme__shadow__circle shadow__right"></div>
    </div>
    <!-- theme fixed shadow -->


    <!-- tution__section__start -->
    <div class="tution sp_bottom_100 sp_top_50">
        <div class="container-fluid full__width__padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">

                    <div class="accordion content__cirriculum__wrap" id="accordionExample">

                        @foreach ($payment_request as $order)
                            @foreach ($order->order as $chapter)
                                @if ($chapter_id == $chapter->id)
                                    @foreach ($chapter->lessons as $lesson)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    {{ $lesson->lesson_name }}
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    @foreach ($lesson->ideas as $idea)
                                                        <a href="{{ route('stu_lessons', ['id' => $chapter_id, 'L_id' => $L_id, 'idea' => $idea->id]) }}"
                                                            class="scc__wrap">
                                                            <div class="scc__info">
                                                                <i class="icofont-video-alt"></i>
                                                                <h5> <span>
                                                                        {{ $idea->idea }}
                                                                    </span> </h5>
                                                            </div>
                                                        </a>
                                                    @endforeach

                                                    @foreach ($lesson->quizze as $quizze)
                                                        <a href="{{ route('stu_quizze', ['id' => $quizze->id]) }}"
                                                            class="scc__wrap">
                                                            <div class="scc__info">
                                                                <i class="fa-solid fa-paperclip"></i>
                                                                <h5> <span>
                                                                        {{ $quizze->title }}
                                                                    </span> </h5>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach


                    </div>
                </div>
                @foreach ($payment_request as $order)
                    @foreach ($order->order as $chapter)
                        @if ($chapter_id == $chapter->id)
                            @foreach ($chapter->lessons as $lesson)
                                @if ($lesson->id == $L_id)
                                    @foreach ($lesson->ideas as $ideas)
                                        @if ($ideas->id == $idea_num)
                                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12"
                                                data-aos="fade-up">
                                                <div class="lesson__content__main">
                                                    <div class="lesson__content__wrap">
                                                        <h3>{{ $ideas->idea }}</h3>
                                                    </div>

                                                    <div class="plyr__video-embed rbtplayer">
                                                        <iframe style="width: 100%; margin-top: 45px;"
                                                            src="{{ $ideas->v_link }}" title="YouTube video player"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>
    </div>
    <!-- tution__section__end -->





</main>

@include('Student.inc.footer')
