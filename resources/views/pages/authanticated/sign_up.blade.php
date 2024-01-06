
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
				span{
					color:red;
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
@include('success')


<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('assets/media/auth/bg4.jpg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						<a href="index.html" class="mb-7">
							<img alt="Logo" src="assets/media/logos/custom-3.svg" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
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
						<form class="form w-100" action="{{ route('sign_up_add') }}" method="POST" novalidate="novalidate" id="kt_sign_in_form">
							@csrf
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Heading-->
								<div class="text-start mb-10">
									<!--begin::Title-->
									<h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-in-title">Sign Up</h1>
									<!--end::Title-->
									<!--begin::Text-->
									<div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Get unlimited access & earn money</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
									@error('f_name')
										<span style="color: red">{{ $message }}</span>
									@enderror
									@error('l_name')
									<span style="color: red">{{ $message }}</span>
								@enderror
								<div class="fv-row mb-8 d-flex">
									<!--begin::Email-->
									<input type="text" placeholder="First Name" name="f_name" class="form-control form-control-solid ml-2" />
									
									<input type="text" placeholder="Last Name" name="l_name" class="form-control form-control-solid ml-2" />
								
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								@error('email')
								<span style="color"> 	{{ $message }} </span>
							@enderror	
								<div class="fv-row mb-7 d-flex">
									<!--begin::Password-->
									<input placeholder="Nick Name" name="name" autocomplete="off" data-kt-translate="sign-in-input-email" class="form-control form-control-solid mr-2" />
									<!--begin::Password-->
									<input type="email" placeholder="Email" name="email" autocomplete="off" data-kt-translate="sign-in-input-email" class="form-control form-control-solid mr-2" />
																	
									<!--end::Password-->
								</div>
							
								<!--end::Input group=-->
								@error('f_name')
										<span style="color: red">{{ $message }}</span>
									@enderror
								<div class="fv-row mb-7 d-flex">
									<input placeholder="Phone" name="phone" autocomplete="off" data-kt-translate="sign-in-input-email" class="form-control form-control-solid mr-2" />
									@error('password')
								<span>	{{ $message }} </span>
									@enderror										
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-7 d-flex">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid mr-2" />
									<input type="password" placeholder="Confirm Password" name="conf_password" autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid ml-2" />
									@error('password')
								<span>	{{ $message }} </span>
									@enderror										
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								<div class="fv-row mb-7 d-flex">
									<!--begin::Password-->
									<select class="form-control sel_country form-control-solid mr-2" name="country">
										<option disabled selected>
											Select Country
										</option>
										@foreach( $countries as $country )
										<option value="{{$country->id}}" >
											{{$country->name}}
										</option>
										@endforeach
									</select>									
									<!--end::Password-->
									<input type="hidden" class="countries" value="{{$countries}}" />
									<input type="hidden" class="cities" value="{{$cities}}" />
									<!--begin::Password-->
									<select class="form-control sel_city form-control-solid ml-2" name="city_id">
										<option disabled selected>
											Select City
										</option>
									</select>									
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-8 d-flex">
									<select class="form-control form-control-solid ml-2" name="grade">
										<option disabled selected>
											Select Grade
										</option>
										@for( $i = 1; $i < 14; $i++ )
										<option value="{{$i}}" >
											{{$i}}
										</option>
										@endfor
									</select>
								</div>
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
									<div></div> 
								</div>
								<!--end::Wrapper-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack">
									<!--begin::Submit-->
									<input type="submit"   class="btn btn-primary me-2 flex-shrink-0"> 
								</div>
								<!--end::Actions-->
							</div>
							<!--begin::Body-->
						<!--end::Form-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
								<a href="{{route('login.index')}}" class="link-primary fw-semibold">Sign in</a></div>
								<!--end::Sign up-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Footer-->
						<div class="d-flex flex-stack px-lg-10">
							<!--begin::Languages-->
							<div class="me-0">
								<!--begin::Toggle-->
								<button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
									<img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/united-states.svg" alt="" />
									<span data-kt-element="current-lang-name" class="me-1">English</span>
									<i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
								</button>
								<!--end::Toggle-->
								<!--begin::Menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
											<span class="symbol symbol-20px me-4">
												<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
											</span>
											<span data-kt-element="lang-name">English</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
											<span class="symbol symbol-20px me-4">
												<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
											</span>
											<span data-kt-element="lang-name">Spanish</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
											<span class="symbol symbol-20px me-4">
												<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
											</span>
											<span data-kt-element="lang-name">German</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
											<span class="symbol symbol-20px me-4">
												<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
											</span>
											<span data-kt-element="lang-name">Japanese</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
											<span class="symbol symbol-20px me-4">
												<img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/france.svg" alt="" />
											</span>
											<span data-kt-element="lang-name">French</span>
										</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Languages-->
							<!--begin::Links-->
							<div class="d-flex fw-semibold text-primary fs-base gap-5">
								<a href="pages/team.html" target="_blank">Terms</a>
								<a href="pages/pricing/column.html" target="_blank">Plans</a>
								<a href="pages/contact.html" target="_blank">Contact Us</a>
							</div>
							<!--end::Links-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>

		
	@endsection
	
	@section('script')
	<script>
		let sel_country = document.querySelector('.sel_country');
		let sel_city = document.querySelector('.sel_city');
		let countries = document.querySelector('.countries');
		let cities = document.querySelector('.cities');
		cities = cities.value;
		cities = JSON.parse(cities);
		sel_country.addEventListener('change', () => {
			sel_city.innerHTML =`<option disabled selected>Select City ...</option>`;
			cities.forEach(element => {
				if ( sel_country.value == element.country_id ) {
					sel_city.innerHTML +=`
					<option value="${element.id}">${element.city}</option>`;
				}
			});
		})
	</script>
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
	