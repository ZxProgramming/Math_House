


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
						<h3 class="mb0 mt0">Featured Chapters</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="shop_product_slider">
    @foreach( $payment_request as $key => $item )
        @foreach( $item->order as $order )
        @if( $course_id == $order->course_id)
        
        <div class="item">
            <a href="{{route('stu_chapters', ['id' => $order->id])}}">
            <div class="top_courses">
                <div class="thumb">
                    <img class="img-whp" src="{{asset('images/courses/' . $order->ch_url)}}" alt="t1.jpg">
                    <div class="overlay">
                        <div class="tag">Best Seller</div>
                        <div class="icon"><span class="flaticon-like"></span></div>
                        <a class="tc_preview_course" href="{{route('stu_chapters', ['id' => $order->id])}}">Preview Course</a>
                    </div>
                </div>
                <div class="details">
                    <div class="tc_content">
                        <h5>
                            {{$order->chapter_name}}
                        </h5>
                        <p>
                            {{$order->course_des}}
                        </p>
                    </div>
                </div>
            </div>
            </a>
            </div>
       
        @endif
        @endforeach
    @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
</x-default-layout>