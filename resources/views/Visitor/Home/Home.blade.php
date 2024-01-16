
@include('Visitor.inc.header')
@include('Visitor.inc.menu')

<div class="wrapper">
	<div class="preloader"></div>
	<!-- Modal -->
	<div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
	    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="login_form p30">
							<form action="#">
								<div class="heading">
									<h3 class="text-center">Login to your account</h3>
									<p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="form-group custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="exampleCheck1">
									<label class="custom-control-label" for="exampleCheck1">Remember me</label>
									<a class="tdu btn-fpswd float-right" href="#">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm2">Login</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="sign_up_form">
							<div class="heading">
								<h3 class="text-center">Create New Account</h3>
								<p class="text-center">Have an account? <a class="text-thm" href="#">Login</a></p>
							</div>
							<form action="#">
								<div class="form-group">
							    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Username">
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email Address">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
								</div>
								<div class="form-group custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="exampleCheck2">
									<label class="custom-control-label" for="exampleCheck2">Want to become an instructor?</label>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm2">Register</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				</div>
	    	</div>
	  	</div>
	</div>
	<!-- Modal Search Button Bacground Overlay -->
    <div class="search_overlay dn-992">
		<div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
		    <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
		    <div id="mk-fullscreen-search-wrapper">
		      <form method="get" id="mk-fullscreen-searchform">
		        <input type="text" value="" placeholder="Search courses..." id="mk-fullscreen-search-input">
		        <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
		      </form>
		    </div>
		</div>
	</div>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1 home6">
				<div class="main_logo_home2">
		            <img class="nav_logo_img img-fluid float-left mt20" src="images/header-logo.png" alt="header-logo.png">
		            <span>edumy</span>
				</div>
				<ul class="menu_bar_home2">
					<li class="list-inline-item">
	                	<div class="search_overlay">
						  <a id="search-button-listener2" class="mk-search-trigger mk-fullscreen-trigger" href="#">
						    <div id="search-button2"><i class="flaticon-magnifying-glass"></i></div>
						  </a>
							<div class="mk-fullscreen-search-overlay" id="mk-search-overlay2">
							    <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button2"><i class="fa fa-times"></i></a>
							    <div id="mk-fullscreen-search-wrapper2">
							      <form method="get" id="mk-fullscreen-searchform2">
							        <input type="text" value="" placeholder="Search courses..." id="mk-fullscreen-search-input2">
							        <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
							      </form>
							    </div>
							</div>
						</div>
					</li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><span>Home</span>
	                <ul>
	                    <li><a href="index.html">Home 1</a></li>
	                    <li><a href="index2.html">Home 2</a></li>
	                    <li><a href="index3.html">Home 3</a></li>
	                    <li><a href="index4.html">Home 4</a></li>
	                    <li><a href="index5.html">Home 5</a></li>
	                    <li><a href="index6.html">Home - University</a></li>
	                    <li><a href="index7.html">Home College</a></li>
	                    <li><a href="index8.html">Home Kindergarten</a></li>

	                    <li><span>Update New Homepages</span>
												<ul>
													<li><a href="index9.html">New Home 01</a></li>
														<li><a href="index10.html">New Home 02</a></li>
														<li><a href="index11.html">New Home 03</a></li>
														<li><a href="index12.html">New Home 04</a></li>
														<li><a href="index13.html">New Home 05</a></li>
												</ul>
											</li>

	                </ul>
				</li>
				<li><span>Courses</span>
					<ul>
						<li><span>Courses List</span>
							<ul>
	                            <li><a href="page-course-v1.html">Courses v1</a></li>
	                            <li><a href="page-course-v2.html">Courses v2</a></li>
	                            <li><a href="page-course-v3.html">Courses v3</a></li>
							</ul>
						</li>
						<li><span>Courses Single</span>
							<ul>
	                            <li><a href="page-course-single-v1.html">Single V1</a></li>
	                            <li><a href="page-course-single-v2.html">Single V2</a></li>
	                            <li><a href="page-course-single-v3.html">Single V3</a></li>
	                            <li><a href="page-course-single-v4.html">New Single V4</a></li>
		                          <li><a href="page-course-single-v5.html">New Single V5</a></li>
		                          <li><a href="page-course-single-v6.html">New Single V6</a></li>
		                          <li><a href="page-course-single-v7.html">New Single V7</a></li>
							</ul>
						</li>
                        <li><a href="page-instructors.html">Instructors</a></li>
		                <li><a href="page-instructors-single.html">Instructor Single</a></li>
					</ul>
				</li>
				<li><span>Events</span>
					<ul>
						<li><a href="page-event.html">Event List</a></li>
						<li><a href="page-event-single.html">Event Single</a></li>
					</ul>
				</li>
				<li><span>Pages</span>
					<ul>
						<li><span>Shop Pages</span>
							<ul>
			                    <li><a href="page-shop.html">Shop</a></li>
			                    <li><a href="page-shop-single.html">Shop Single</a></li>
			                    <li><a href="page-shop-cart.html">Cart</a></li>
			                    <li><a href="page-shop-checkout.html">Checkout</a></li>
			                    <li><a href="page-shop-order.html">Order</a></li>
							</ul>
						</li>
						<li><span>User Admin</span>
							<ul>
								<li><a href="page-dashboard.html">Dashboard</a></li>
								<li><a href="page-my-courses.html">My Courses</a></li>
								<li><a href="page-my-order.html">My Order</a></li>
								<li><a href="page-my-message.html">My Message</a></li>
								<li><a href="page-my-review.html">My Review</a></li>
								<li><a href="page-my-bookmarks.html">My Bookmarks</a></li>
								<li><a href="page-my-listing.html">My Listing</a></li>
								<li><a href="page-my-setting.html">My Setting</a></li>
		                    </ul>
						</li>
		        <li><a href="page-about.html">About Us</a></li>
						<li><a href="page-gallery.html">Gallery</a></li>
						<li><a href="page-gallery2.html">Video Gallery</a></li>
						<li><a href="page-faq.html">Faq</a></li>
						<li><a href="page-login.html">LogIn</a></li>
						<li><a href="page-login2.html">New LogIn V2</a></li>
						<li><a href="page-login3.html">New LogIn V3</a></li>
						<li><a href="page-login4.html">New LogIn V4</a></li>
						<li><a href="page-register.html">Register</a></li>
						<li><a href="page-pricing.html">Membership</a></li>
						<li><a href="page-error.html">404 Page</a></li>
						<li><a href="page-terms.html">Terms and Conditions</a></li>
						<li><a href="page-become-instructor.html">Become an Instructor</a></li>
						<li><a href="page-ui-element.html">UI Elements</a></li>
					</ul>
				</li>
				<li><span>Blog</span>
					<ul>
	                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
	                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
	                    <li><a href="page-blog-list.html">Blog List 3</a></li>
	                    <li><a href="page-blog-list2.html">New Blog List 4</a></li>
		                    <li><a href="page-blog-list3.html">New Blog List 5</a></li>
		                    <li><a href="page-blog-list4.html">New Blog List 6</a></li>
	                    <li><a href="page-blog-single.html">Single Post</a></li>
					</ul>
				</li>
				<li><a href="page-contact.html">Contact</a></li>
				<li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
				<li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
			</ul>
		</nav>
	</div>

	<!-- 6th Home Slider -->
	<div class="home11-slider style2">
		<div class="container-fluid p0">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-banner-wrapper">
					    <div class="banner-style-one owl-theme owl-carousel home13">
					        <div class="slide slide-one home13" style="background-image: url(images/home/h1.jpg);">
					            <div class="container">
					                <div class="row">
					                    <div class="col-lg-8 offset-lg-2 text-center">
					                        <div class="banner-sub-title text-capitalize fwb">Build Skills With Experts</div>
					                        <div class="banner-title text-capitalize fwb mb0">Any Time, Anywhere</div>
					                        <P>Reach out to the most competent & passionate mentors</P>
					                        <div class="btn-block">
					                            <a href="#" class="banner-btn bdrs3">FIND COURSES</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <div class="slide slide-one home13" style="background-image: url(images/home/h2.jpg);">
					            <div class="container">
					                <div class="row">
					                    <div class="col-lg-8 offset-lg-2 text-center">
					                        <div class="banner-sub-title text-capitalize fwb">Build Skills With Experts</div>
					                        <div class="banner-title text-capitalize fwb mb0">Any Time, Anywhere</div>
					                        <P>Reach out to the most competent & passionate mentors</P>
					                        <div class="btn-block">
					                            <a href="#" class="banner-btn bdrs3">FIND COURSES</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <div class="slide slide-one home13" style="background-image: url(images/home/h3.jpg);">
					            <div class="container">
					                <div class="row">
					                    <div class="col-lg-8 offset-lg-2 text-center">
					                        <div class="banner-sub-title text-capitalize fwb">Build Skills With Experts</div>
					                        <div class="banner-title text-capitalize fwb mb0">Any Time, Anywhere</div>
					                        <P>Reach out to the most competent & passionate mentors</P>
					                        <div class="btn-block">
					                            <a href="#" class="banner-btn bdrs3">FIND COURSES</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="carousel-btn-block banner-carousel-btn dn">
					        <span class="carousel-btn left-btn"><i class="flaticon-back left"></i></span>
					        <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
					    </div><!-- /.carousel-btn-block banner-carousel-btn -->
					</div><!-- /.main-banner-wrapper -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="bg-wave"><img src="images/background/wave.svg" alt="wave.svg"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- About Video Section -->
	<section class="about-us-home13 pb20 pt0">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-xl-3">
					<div class="hvr_img_box_container home13">
						<div class="overlay">
							<div class="details">
								<div class="icon"><span class="flaticon-account"></span></div>
								<h5>Create Account</h5>
								<p>Sed cursus turpis vitae tortor donec eaque ipsa quaeab illo.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xl-3">
					<div class="hvr_img_box_container home13">
						<div class="overlay">
							<div class="details">
								<div class="icon"><span class="flaticon-online"></span></div>
								<h5>Create Online Course</h5>
								<p>Sed cursus turpis vitae tortor donec eaque ipsa quaeab illo.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xl-3">
					<div class="hvr_img_box_container home13">
						<div class="overlay">
							<div class="details">
								<div class="icon"><span class="flaticon-student-1"></span></div>
								<h5>Interact with Students</h5>
								<p>Sed cursus turpis vitae tortor donec eaque ipsa quaeab illo.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xl-3">
					<div class="hvr_img_box_container home13">
						<div class="overlay">
							<div class="details">
								<div class="icon"><span class="flaticon-employee"></span></div>
								<h5>Achieve Your Goals</h5>
								<p>Sed cursus turpis vitae tortor donec eaque ipsa quaeab illo.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="gallery_item home13 mt80">
						<img class="img-fluid img-circle-rounded" src="images/background/2.jpg" alt="2.jpg">
						<div class="gallery_overlay">
							<div class="home_post_overlay_icon bgc-theme8">
								<a class="video_popup_btn popup-img popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play-button-1"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- School Category Courses -->
	<section id="our-top-courses" class="our-courses pt0">
		<div class="container pb100">
			<div class="row">
				<div class="col-sm-6 col-lg-3">
					<div class="funfact_one home13 text-center">
						<div class="details">
							<div class="timer text-thm8">749</div>
							<h5>Creative Events</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="funfact_one home13 text-center">
						<div class="details">
							<div class="timer text-thm8">832</div>
							<h5>Skilled Tutor</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="funfact_one home13 text-center">
						<div class="details">
							<ul>
								<li class="list-inline-item"><div class="timer text-thm8">35</div></li>
								<li class="list-inline-item"><span class="text-thm8">k</span></li>
							</ul>
							<h5>Online Courses</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="funfact_one home13 text-center">
						<div class="details">
							<ul>
								<li class="list-inline-item"><div class="timer text-thm8">92</div></li>
								<li class="list-inline-item"><span class="text-thm8">k</span></li>
							</ul>
							<h5>People Wordwide</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0">Browse Our Top Courses</h3>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
				</div>
			</div>
 			<div class="row">
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t1.jpg" alt="t1.jpg">
							<div class="overlay">
								<div class="tag">Best Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Introduction Web Design with HTML</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t2.jpg" alt="t2.jpg">
							<div class="overlay">
								<div class="tag">Top Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Designing a Responsive Mobile Website with Muse</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t3.jpg" alt="t3.jpg">
							<div class="overlay">
								<div class="tag">Top Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Adobe XD: Prototyping Tips and Tricks</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t4.jpg" alt="t4.jpg">
							<div class="overlay">
								<div class="tag">Best Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Sketch: Creating Responsive SVG</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t5.jpg" alt="t5.jpg">
							<div class="overlay">
								<div class="tag">Best Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Design Instruments for Communication</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t6.jpg" alt="t6.jpg">
							<div class="overlay">
								<div class="tag">Top Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>How to be a DJ? Make Electronic Music</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t7.jpg" alt="t7.jpg">
							<div class="overlay">
								<div class="tag">Top Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>How to Make Beautiful Landscape Photos?</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
 				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="top_courses home13">
						<div class="thumb">
							<img class="img-whp" src="images/courses/t8.jpg" alt="t8.jpg">
							<div class="overlay">
								<div class="tag">Best Seller</div>
								<div class="icon"><span class="flaticon-like"></span></div>
								<a class="tc_preview_course" href="#">Preview Course</a>
							</div>
						</div>
						<div class="details">
							<div class="tc_content pb0">
								<div class="tc_price text-thm8 mb15">$69.95</div>
								<p>Ali TUFAN</p>
								<h5>Fashion Photography From Professional</h5>
							</div>
							<div class="tc_footer">
								<ul class="tc_meta">
									<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
									<li class="list-inline-item"><a href="#">1548</a></li>
									<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
									<li class="list-inline-item"><a href="#">25</a></li>
								</ul>
							</div>
						</div>
					</div>
 				</div>
				<div class="col-lg-6 offset-lg-3">
					<div class="text-center mt25">
						<a class="btn btn-thm5" href="#">View All Courses</a>
					</div>
				</div>
 			</div>
		</div>
	</section>

	<!-- Our Testimonials -->
	<section id="our-testimonials" class="our-testimonial bgc-theme8">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0 text-white">What People Say</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial_slider_home2 home13">
						<div class="item">
							<div class="testimonial_item home2">
								<div class="wrapper bgc-white">
									<div class="thumb df">
										<img class="img-fluid rounded-circle mb0" src="images/testimonial/1.jpg" alt="1.jpg">
										<div class="user text-left pl20">
											<div class="title">Aura Brooks</div>
											<div class="subtitle text-thm8 mb0">Client</div>
										</div>
									</div>
									<div class="details">
										<div class="icon"><span class="fa fa-quote-left"></span></div>
										<p>Without Careerup i’d be homeless, they found me a job and got me sorted out quickly with everything! I love their flexibility. Even when my request is too complicated to handle. they could still suggest something useful for me.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="wrapper bgc-white">
									<div class="thumb df">
										<img class="img-fluid rounded-circle mb0" src="images/testimonial/2.jpg" alt="2.jpg">
										<div class="user text-left pl20">
											<div class="title">Ali TUFAN</div>
											<div class="subtitle text-thm8 mb0">Client</div>
										</div>
									</div>
									<div class="details">
										<div class="icon"><span class="fa fa-quote-left"></span></div>
										<p>Without Careerup i’d be homeless, they found me a job and got me sorted out quickly with everything! I love their flexibility. Even when my request is too complicated to handle. they could still suggest something useful for me.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="wrapper bgc-white">
									<div class="thumb df">
										<img class="img-fluid rounded-circle mb0" src="images/testimonial/3.jpg" alt="3.jpg">
										<div class="user text-left pl20">
											<div class="title">Jack Graham</div>
											<div class="subtitle text-thm8 mb0">Client</div>
										</div>
									</div>
									<div class="details">
										<div class="icon"><span class="fa fa-quote-left"></span></div>
										<p>Without Careerup i’d be homeless, they found me a job and got me sorted out quickly with everything! I love their flexibility. Even when my request is too complicated to handle. they could still suggest something useful for me.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="wrapper bgc-white">
									<div class="thumb df">
										<img class="img-fluid rounded-circle mb0" src="images/testimonial/1.jpg" alt="1.jpg">
										<div class="user text-left pl20">
											<div class="title">Ali TUFAN</div>
											<div class="subtitle text-thm8 mb0">Client</div>
										</div>
									</div>
									<div class="details">
										<div class="icon"><span class="fa fa-quote-left"></span></div>
										<p>Without Careerup i’d be homeless, they found me a job and got me sorted out quickly with everything! I love their flexibility. Even when my request is too complicated to handle. they could still suggest something useful for me.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_item home2">
								<div class="wrapper bgc-white">
									<div class="thumb df">
										<img class="img-fluid rounded-circle mb0" src="images/testimonial/2.jpg" alt="2.jpg">
										<div class="user text-left pl20">
											<div class="title">Jack Graham</div>
											<div class="subtitle text-thm8 mb0">Client</div>
										</div>
									</div>
									<div class="details">
										<div class="icon"><span class="fa fa-quote-left"></span></div>
										<p>Without Careerup i’d be homeless, they found me a job and got me sorted out quickly with everything! I love their flexibility. Even when my request is too complicated to handle. they could still suggest something useful for me.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Upcoming Events -->
	<section class="our-event">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0 mb0">Upcoming Event</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial_slider_home11 style2">
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog_post_home6_date home11 style2 mb40">
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9 mb20">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="post_grid bgc-f9">
									<div class="event-thumb"><img src="images/blog/s4.jpg" alt="event1.jpg"></div>
									<div class="post_body pl30">
										<div class="post_date_home13 text-center text-thm8">18 Mar</div>
										<h4 class="post_title">Embarrassing hidden in the</h4>
										<div class="post_meta">
											<ul>
												<li class="list-inline-item"><a href="#"><span class="flaticon-calendar"></span> 8:00 am - 5:00 pm</a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-placeholder"></span> Vancouver, Canada</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Blog -->
	<section class="our-blog bgc-f9">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0 mb0">Blog</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-6 col-xl-4">
					<div class="blog_post_home6">
						<div class="thumb">
							<img class="img-fluid img-rounded" src="images/blog/h31.jpg" alt="h11-b1.jpg">
							<h5 class="mt20">Tips</h5>
							<h4 class="mt0">Attract More Attention Sales And Profits</h4>
							<a class="post_date" href="#">May 15, 2020</a>
						</div>
						<div class="details"></div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-6 col-xl-4">
					<div class="blog_post_home6">
						<div class="thumb">
							<img class="img-fluid img-rounded" src="images/blog/h31.jpg" alt="h11-b2.jpg">
							<h5 class="mt20">Marketing</h5>
							<h4 class="mt0">11 Tips to Help You Get New Clients</h4>
							<a class="post_date" href="#">May 15, 2020</a>
						</div>
						<div class="details"></div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-6 col-xl-4">
					<div class="blog_post_home6">
						<div class="thumb">
							<img class="img-fluid img-rounded" src="images/blog/h31.jpg" alt="h11-b3.jpg">
							<h5 class="mt20">Tips</h5>
							<h4 class="mt0">An Overworked Newspaper Editor</h4>
							<a class="post_date" href="#">May 15, 2020</a>
						</div>
						<div class="details"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Newslatters -->
	<section id="our-newslatters" class="our-newslatters bg-img11 pt110 pb120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="newslatter_title text-center">
						<h3 class="mt0">Subscribe our newsletter</h3>
						<p class="fz16">Your download should start automatically, if not Click here. Should I give up, huh?.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="footer_apps_widget_home1 home11">
						<form class="form-inline mailchimp_form">
							<input type="email" class="form-control" placeholder="Email address">
							<button type="submit" class="btn btn-lg btn-thm5">Subscribe <span class="flaticon-right-arrow-1"></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer -->
	<section class="footer_one bgc-black22 pb50">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
					<div class="footer_contact_widget home12">
						<h4>CONTACT</h4>
						<p>329 Queensberry Street, North Melbourne </p>
						<p>VIC 3051, Australia.</p>
						<p>123 456 7890</p>
						<p>support@edumy.com</p>
					</div>
					<div class="footer_social_widget home12 mt15 text-left mb30-md">
						<ul>
							<li class="list-inline-item pl0"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_company_widget home12 pl30 pl0-lg">
						<h4>COMPANY</h4>
						<ul class="list-unstyled">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="page-contact.html">Contact</a></li>
							<li><a href="#">Become a Teacher</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_program_widget home12 style2 pl60 pl0-lg">
						<h4>PROGRAMS</h4>
						<ul class="list-unstyled">
							<li><a href="#">Nanodegree Plus</a></li>
							<li><a href="#">Veterans</a></li>
							<li><a href="#">Georgia</a></li>
							<li><a href="#">Self-Driving Car</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_support_widget home12 style2 pl30 pl0-lg">
						<h4>SUPPORT</h4>
						<ul class="list-unstyled">
							<li><a href="#">Documentation</a></li>
							<li><a href="#">Forums</a></li>
							<li><a href="#">Language Packs</a></li>
							<li><a href="#">Release Status</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-md-3 col-lg-3">
					<div class="footer_support_widget home12">
						<h4>MOBILE</h4>
						<div class="app_grid home13">
							<button class="apple_btn btn-dark mb15">
								<span class="icon">
									<span class="flaticon-apple"></span>
								</span>
								<span class="title">App Store</span>
								<span class="subtitle">Available now on the</span>
							</button>
							<button class="play_store_btn btn-dark">
								<span class="icon">
									<span class="flaticon-google-play"></span>
								</span>
								<span class="title">Google Play</span>
								<span class="subtitle">Get in on</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area bgc-black22 pt25 pb25">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="copyright-widget text-center home12">
						<p>Copyright Edumy © 2019. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
</div>
@include('Visitor.inc.footer')