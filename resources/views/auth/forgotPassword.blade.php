@extends('layouts.master')

@section('content')

    <link href="{{ asset('/client/css/loader.css') }}" rel="stylesheet" type="text/css" />

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
                <div id="forgot_password_email_form">
                    <!--begin::Content-->
                    <div class="d-flex flex-column flex-center flex-column-fluid mx-auto">
                        <!--begin::Wrapper-->
                        <div class="w-lg-550px p-10 p-lg-15" style="max-width: 100%;">
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="forgot_password_form" action="#">
                                @csrf
                                <!--begin::Heading-->
                                <div class="text-center mb-10">
                                    <!--begin::Logo-->
                                    <img alt="Logo" src="{{ asset('client/media/logos/OSCA.png') }}" class="h-150px" />
                                    <!--end::Logo-->
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">Forgot Password?</h1>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-4">Provide your account's email for which you want to reset your password.
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
                                    <input class="form-control form-control-lg form-control-solid" type="text" id="email" name="email"
                                        autocomplete="off" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <!--begin::Submit button-->
                                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                        <span class="indicator-label">Send</span>
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
                                    <a href="{{ route('login') }}" class="text-muted text-hover-primary px-2">Go Back to Login</a>
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
            </div>


           

            <div class="d-flex flex-column flex-lg-row-auto py-10" style="overflow-y: auto; overflow-x: hidden;">
            <div id="forgot_password_otp"> 
                <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100 mb-10" novalidate="novalidate" id="otp_form">
                            <!--begin::Icon-->
                            <div class="text-center mb-10">
                                <img alt="Logo" class="mh-125px"
                                    src="{{ asset('client/media/svg/misc/smartphone.svg') }}" />
                            </div>
                            <!--end::Icon-->

                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Reset Password</h1>
                                <!--end::Title-->
                                <!--begin::Sub-title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Section-->
                            <div class="fv-row mb-5 px-md-10">

                                <label class="form-label fw-bolder text-dark fs-6">Enter the OTP code we sent to
                                    <div id="userEmail" class="fw-bolder text-dark fs-7 required">
                                    
                                    </div>
                                </label>
                                <input class="form-control form-control-lg form-control-solid" type="number"
                                placeholder="" id="otp" name="otp" autocomplete="off" min="100000" max="999999" />                         
                            
                            </div>


                            <div class="mb-10 fv-row px-md-10" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 required">New Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" id="new_password" name="new_password" autocomplete="off" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                                    symbols.</div>
                                <!--end::Hint-->
                            </div>

                             <!--begin::Input group-->
                             <div class="mb-10 fv-row px-md-10">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 required">Confirm New Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" id="confirm_new_password" name="confirm_new_password" autocomplete="off" />
                                      
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <!--end::Input group-->

                            <!--end::Section-->
                            <!--begin::Submit-->
                            <div class="d-flex flex-center">
                                <button type="submit"
                                    class="btn btn-lg btn-primary fw-bolder">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Submit-->
                        </form>
                        <!--end::Form-->
                        <!--begin::Notice-->
                        <div class="text-center fw-bold fs-5">
                            <span class="text-muted me-1">Didn’t get the code ?</span>
                            <a href="#" id="resend_otp"
                                class="link-primary fw-bolder fs-5 me-1">Resend</a>
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            </div>
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
    <script src="{{ asset('client/js/custom/authentication/password-reset/forgot_password.js') }}"></script>
    
@endpush
