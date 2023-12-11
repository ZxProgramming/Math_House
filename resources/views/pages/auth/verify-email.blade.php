<x-auth-layout>
    <!--begin::Verify Email Form-->
    <div class="w-100">

        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">Verify Email</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another</div>
            <!--end::Subtitle=-->

            <!--begin::Session Status-->
            @if (session('status') === 'verification-link-sent')
                <p class="font-medium text-sm text-gray-500 mt-4">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </p>
            @endif
        <!--end::Session Status-->
        </div>

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">{{ __('Resend Verification Email') }}</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-lg btn-light-primary fw-bolder me-4">{{ __('Log out') }}</button>
            </form>
        </div>
        <!--end::Actions-->
    </div>

    <!--end::Verify Email Form-->
</x-auth-layout>
