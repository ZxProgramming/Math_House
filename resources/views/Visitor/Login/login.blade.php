
@extends('layout.loginMaster')
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		@section('styleCssSection')
			<style>
				.py-20 {
    padding-top: 21rem !important;
    padding-bottom: 26rem !important;
}
			</style>
		@endsection
		@section('contentScript')
		<script>
	
			var defaultThemeMode = "light"; 
			var themeMode; 
			if ( document.documentElement ) { 
				if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
					themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
				 } else { if ( localStorage.getItem("data-bs-theme") !== null ) {
					themeMode = localStorage.getItem("data-bs-theme"); 
				} else {
					 themeMode = defaultThemeMode; 
					} } 
					if (themeMode === "system") { 
						themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
					} document.documentElement.setAttribute("data-bs-theme", themeMode);
				 }
		
		
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		</script>
	
	@endsection
	@if(auth()->check())
	already loged in 
	Your Name Is  : {{ auth()->user()->email }}
	<br>
	and Your Name Is  : {{ auth()->user()->name }} <a href="{{ route('logout') }}">Logout</a>
		@else
		@section('content')
	@if(session()->has('success'))
	{{ session()->get('success') }}
@endif



<div class="d-flex flex-column flex-root" id="kt_app_root">
	<!--begin::Page bg image-->
	<style>body { background-image: url('assets/media/auth/bg4.jpg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
	<!--end::Page bg image-->
	<!--begin::Authentication - Sign-in -->
	<div class="d-flex flex-column flex-column-fluid flex-lg-row">
		<!--begin::Aside-->
		<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
			<!--begin::Aside-->
			<div class="d-flex flex-center flex-lg-start flex-column">
				<!--begin::Logo-->
				<a href="index.html" class="mb-7">
					<img alt="Logo" src="assets/media/logos/Maths-house.png" width = '300px' />
				</a>
				<!--end::Logo-->
				<!--begin::Title-->
				<h2 class="text-white fw-normal m-0">Welcome To Math House</h2>
				<!--end::Title-->
			</div>
			<!--begin::Aside-->
		</div>
		<!--begin::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
			<!--begin::Card-->
			<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
				<!--begin::Wrapper-->
				<div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
					<!--begin::Form-->
					<form class="form w-100" action="{{ route('market_ch') }}" method="POST" novalidate="novalidate" id="kt_sign_in_form">
						@csrf
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
							<!--end::Subtitle=-->
						</div>
						<!--begin::Heading-->
						
						<!--begin::Separator-->
						
						<!--end::Separator-->
						<!--begin::Input group=-->
						<div class="fv-row mb-8">
							@error('error')
							<span style="color: red">{{ $message }}</span>
						@enderror
							<!--begin::Email-->
							<input type="text" placeholder="Email" name="email" autocomplete="off" value="ziad57@yahoo.com" data-kt-translate="sign-in-input-email" class="form-control form-control-solid" />
							@error('email')
							<span> 	{{ $message }} </span>
							@enderror
							<!--end::Email-->
						</div>
						<!--end::Input group=-->
						<div class="fv-row mb-3">
							<!--begin::Password-->
							<input type="password" placeholder="Password" name="password" value="Makemesmile123" autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid" />
							@error('password')
							<span>	{{ $message }} </span>
								@enderror	
							<!--end::Password-->
						</div>
						<!--end::Input group=-->
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
							<div></div>
							<!--begin::Link-->
							{{-- <a href="authentication/layouts/creative/reset-password.html" class="link-primary">Forgot Password ?</a> --}}
							<!--end::Link-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" value="Sign In"  class="btn btn-primary">
								Sign In
							</button>
						</div>
						<!--end::Submit button-->
						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
						<a href="{{ route('sign_up') }}" class="link-primary">Sign up</a></div>
						<!--end::Sign up-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Footer-->
				<div class="d-flex flex-stack px-lg-10">
					<!--begin::Languages-->
			
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Authentication - Sign-in-->
</div>
		
	@endsection
	
	@section('script')
	 <!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')"></script>
		<script src="{{asset('assets/js/custom/authentication/sign-in/i18n.js')"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	@endsection
	@endif
	




	
























