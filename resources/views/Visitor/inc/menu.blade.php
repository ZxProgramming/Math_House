
	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one home13 navbar-scrolltofixed stricky main-menu">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="{{route('home')}}" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" style="height: 50px;" src="{{asset('assets/media/logos/Maths_house.png')}}" alt="header-logo6.png">
		            <span class="color-black22">Math House</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
		            <li>
		                <a href="{{route('categories')}}"><span class="title">Courses</span></a>
		            </li>
		            <li>
		                <a href="#"><span class="title">Diagnostic Exam</span></a>
		            </li>
		            <li>
		                <a href="#"><span class="title">Exams</span></a>
		            </li>
		            <li>
		                <a href="#"><span class="title">Question</span></a>
		            </li>
		            <li>
		                <a href="#"><span class="title">Live</span></a>
		            </li>
		            <li class="last">
		                <a href="{{route('about')}}"><span class="title">About</span></a>
		            </li>
		            <li class="last">
		                <a href="{{route('contact_us')}}"><span class="title">Contact</span></a>
		            </li>
		        </ul>
		    </nav>
		</div>
	</header>