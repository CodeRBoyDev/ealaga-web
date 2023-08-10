@extends('layouts.master')

@section('content')
    <div class="d-flex flex-column flex-root" style="height: 100vh;">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid" style="height: 100%;">
            <!--begin::Aside - Mobile First (order 2 in mobile, order 1 in larger screens)-->
            <div class="d-lg-none d-flex flex-column flex-lg-row-auto w-xl-1000px positon-xl-relative order-lg-2"
                style="background-image: url('{{ asset('client/media/taguigbranding/tbdblt.jpg') }}'); background-size: 100% 100%;">
                <!--begin::Wrapper-->
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body - Mobile First (order 1 in mobile, order 2 in larger screens)-->
            <div class="d-flex flex-column flex-lg-row-auto py-10" style="overflow-y: auto; overflow-x: hidden;">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center flex-column-fluid mx-auto">
                    <!--begin::Wrapper-->
                    <div class="w-lg-550px p-10 p-lg-15" style="max-width: 100%;">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Logo-->
                                <img alt="Logo" src="{{ asset('client/media/logos/OSCA.png') }}" class="h-150px" />
                                <!--end::Logo-->
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Welcome to eAlaga</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an
                                        Account</a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                                    autocomplete="off" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->
                                    <a href="../../demo9/dist/authentication/flows/aside/password-reset.html"
                                        class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continue</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                            <!--begin::Links-->
                            <div class="d-flex flex-center fw-bold fs-6">
                                <a href="{{ route('landing') }}" class="text-muted text-hover-primary px-2">Go Back Home</a>
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
            <!--begin::Aside - Larger Screens (order 1 in larger screens)-->
            <div class="d-none d-lg-flex flex-column flex-lg-row-fluid w-xl-1000px positon-xl-relative order-lg-1"
                style="background-image: url('{{ asset('client/media/taguigbranding/tbdblt.jpg') }}');  background-size: 100% 100%;">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-1000px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!-- Your content goes here -->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
@endsection

@push('scripts')
    <!-- Push the JS client to the 'scripts' stack -->
    <script src="{{ asset('client/js/custom/authentication/sign-in/general.js') }}"></script>
@endpush
