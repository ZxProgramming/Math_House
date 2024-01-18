
@include('Visitor.inc.header')
@include('Visitor.inc.menu')
<div class="wrapper">
	<div class="preloader"></div>


	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Course</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Course</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Courses List 2 -->
	<section class="courses-list2 pb40">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 col-xl-9">
					<div class="row courses_list_heading style2">
						<div class="col-xl-4 p0">
							<div class="instructor_search_result style2">
								<p class="mt10 fz15"><span class="color-dark pr10">85 </span> results <span class="color-dark pr10">1,236</span> Video Tutorials</p>
							</div>
						</div>
						<div class="col-xl-8 p0">
							<div class="candidate_revew_select style2 text-right">
								<ul class="mb0">
									<li class="list-inline-item">
										<select class="selectpicker show-tick">
											<option>Newly published</option>
											<option>Recent</option>
											<option>Old Review</option>
										</select>
									</li>
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											<form class="form-inline my-2 my-lg-0">
										    	<input class="form-control mr-sm-2" type="search" placeholder="Search our instructors" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row courses_container style2">
                        @foreach( $chapters as $chapter )
                        <div class="d-flex col-lg-12 p0 main_item_chapter">
                        <div style="height: 100%" class="d-flex align-items-center justify-content-center">
                            <input id="ch_{{$chapter->id}}" type="checkbox" class="form-control chapter_item_check" checked />
                        </div>

						<label for="ch_{{$chapter->id}}" class="">
							<div class="courses_list_content">
								<div class="top_courses list">
									<div class="thumb">
										<img class="img-whp" src="{{asset('images/Chapters/' . $chapter->ch_url)}}" alt="t1.jpg">
										<div class="overlay">
                                        <i style="font-size: 27px;" class="fa-solid fa-cart-plus cart_btn text-light m-3"></i> 
											<a class="tc_preview_course" href="#">Preview Course</a>
										</div>
									</div>
                                    
									<div class="details">
										<div class="tc_content"> 
											<h5>
                                                {{$chapter->chapter_name}}
                                            </h5>
											<p>
                                                {{$chapter->ch_des}}
                                            </p>
										</div>
										<div class="tc_footer">
											<div class="tc_price float-right fn-414">
                                                {{$chapter->ch_price}}$
												<input type="hidden" class="chapter_price" value="{{$chapter->ch_price}}" />
                                            </div>
										</div>
									</div>
								</div> 
							</div>
                        </label>
</div>
                        @endforeach
					</div>
			</div>
		</div>
	</section>

<div class="t_price" style="position: fixed;bottom:0; left:0; height:60px; width: 100vw; background-color: #774499;
display:flex; justify-content:center; align-items:center; font-size: 25px; color:#ffffff; font-weight: bold;">
    {{$course_price->course_price}} $
</div>
<script>
    let chapter_item_check = document.querySelectorAll('.chapter_item_check');
    let chapter_price = document.querySelectorAll('.chapter_price');
    let t_price = document.querySelector('.t_price');
	let price = 0;
    for (let i = 0, end = chapter_item_check.length; i < end; i++) {
        chapter_item_check[i].addEventListener('change', ( e ) => {
            for (let j = 0; j < end; j++) {
                if ( e.target == chapter_item_check[j] || e.target.parentElement == chapter_item_check[j]
                || e.target.parentElement.parentElement == chapter_item_check[j] ) {
                    for (let k = 0; k < end; k++) {
						if ( chapter_item_check[k].checked ) {
							price += parseFloat(chapter_price[k].value);
						} 
					}
					t_price.innerHTML = price;
					price = 0;
                }
            }
        })
    }
</script>
<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
</div>
@include('Visitor.inc.footer')