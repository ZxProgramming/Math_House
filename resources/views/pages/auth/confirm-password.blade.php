<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form class="form w-100 " novalidate="novalidate" id="kt_password_reset_form" action="{{ route('password.email') }}">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">Confirm Password</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">This is a secure area of the application. Please confirm your password before continuing.</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container">
            <!--begin::Email-->
            <input placeholder="Password" type="password" name="password" autocomplete="current-password" class="form-control bg-transparent">
            <!--end::Email-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                @include('partials.general._button-indicator')
            </button>
            <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
        </div>
        <!--end::Actions-->
        <div></div>
    </form>
    <!--end::Forgot Password Form-->

</x-auth-layout>
