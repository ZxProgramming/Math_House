
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

		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Logo-->
			<a href="index.html" class="d-block d-lg-none mx-auto py-20">
				<img alt="Logo" src="assets/media/logos/default.svg" class="theme-light-show h-25px" />
				<img alt="Logo" src="assets/media/logos/default-dark.svg" class="theme-dark-show h-25px" />
			</a>
			<!--end::Logo-->
			<!--begin::Aside-->
			<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
				<!--begin::Wrapper-->
				<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
					<!--begin::Header-->
					<div class="d-flex flex-stack py-2">
						<!--begin::Back link-->
						<div class="me-2"></div>
						<!--end::Back link-->
						<!--begin::Sign Up link-->
					
						<!--end::Sign Up link=-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="py-20">
						<!--begin::Form-->
						<form class="form w-100" action='{{ 'login.store' }}' method="POST" novalidate="novalidate" id="kt_sign_in_form">
							@csrf
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Heading-->
								<div class="text-start mb-10">
									<!--begin::Title-->
									<h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-in-title">Sign In</h1>
									<!--end::Title-->
									<!--begin::Text-->
									<div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Get unlimited access & earn money</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
									@error('error')
										<span style="color: red">{{ $message }}</span>
									@enderror
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Email" name="email" autocomplete="off" value="ziad57@yahoo.com" data-kt-translate="sign-in-input-email" class="form-control form-control-solid" />
										@error('email')
										<span> 	{{ $message }} </span>
										@enderror
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-7">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="password" value="Makemesmile123" autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid" />
									@error('password')
								<span>	{{ $message }} </span>
									@enderror										
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
									<div></div>
									<!--begin::Link-->
									<a href="authentication/layouts/fancy/reset-password.html" class="link-primary" data-kt-translate="sign-in-forgot-password">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<!--begin::Submit-->
									<input type="submit" value="Sign Up"  class="btn btn-primary me-2 flex-shrink-0">
								</div>
								<!--end::Actions-->
							</div>
							<!--begin::Body-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Body-->
					
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Aside-->
			<!--begin::Body-->
			<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url(assets/media/auth/Maths-house.png);background-size: contain;background-color: black;"></div>
			<!--begin::Body-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
		
	@endsection
	
	@section('script')
	 <!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
		<script src="assets/js/custom/authentication/sign-in/i18n.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	@endsection
	@endif
	