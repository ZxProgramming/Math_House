<style>
    a {
        color: #595959 !important;
    }

    .hidee {
        height: 0px;
    }

    a:hover {
        color: #477598 !important;
    }
</style>
<div class="full__width__padding">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-12">
            <div class="dashboard__inner sticky-top">
                <div class="dashboard__nav__title">
                    <h6>Welcome, {{ auth()->user()->name }} </h6>
                </div>
                <div class="dashboard__nav">
                    <ul>
                        <li>
                            <a class="active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('t_profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                My Profile</a>
                        </li>
                    
                        <li>
                            <a href="{{ route('t_live') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Live</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-1">
                                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                    <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                                </svg>
                                Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="-fluid full__width__padding">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboardarea__wraper">
                            <div class="dashboardarea__img">
                                <div class="dashboardarea__inner bg-danger student__dashboard__inner">
                                    <div class="dashboardarea__left">
                                        <div class="dashboardarea__left__img">
                                            <img loading="lazy"
                                                src="{{ asset('images/users/' . auth()->user()->image) }}"
                                                alt="">
                                        </div>
                                        <div class="dashboardarea__left__content">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <ul>
                                                <li> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-book-open">
                                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                                    </svg>
                                                    {{ auth()->user()->email }}
                                                </li>
                                            </ul>

                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#showChild").click(function() {
                        $("#child").toggleClass("hidee")
                    })
                })
            </script>
            <!-- breadcrumbarea__section__end-->

            @yield('page_content')
        </div>
    </div>
</div>
