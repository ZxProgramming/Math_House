
@php
  function fun_admin(){
    return 'student';
  }
@endphp
@include('Visitor.inc.header')
<x-default-layout>
    @section('title','Courses')



    
	<!-- Our Courses List -->
	<section class="features-course pb20">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shop_product_slider">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mb0 mt0">Featured Courses</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="shop_product_slider">
    @foreach( $courses as $key => $item )
    
    <div class="item">
        <a href="{{route('stu_chapters', ['id' => $item->id])}}">
        <div class="top_courses">
            <div class="thumb">
                <img class="img-whp" src="{{asset('images/courses/' . $item->course_url)}}" alt="t1.jpg">
                <div class="overlay">
                    <div class="tag">Best Seller</div>
                    <div class="icon"><span class="flaticon-like"></span></div>
                    <a class="tc_preview_course" href="{{route('stu_chapters', ['id' => $item->id])}}">Preview Course</a>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    <p>
                        Mr. {{$item->teacher->name}}
                    </p>
                    <h5>
                        {{$item->course_name}}
                    </h5>
                    <p>
                        {{$item->course_des}}
                    </p>
                </div>
            </div>
        </div>
        </a>
        </div>
    @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
</x-default-layout>