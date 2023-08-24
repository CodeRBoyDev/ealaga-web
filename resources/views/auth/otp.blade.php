@extends('layouts.master')
@section('content')

    <link href="{{ asset('/client/css/loader.css') }}" rel="stylesheet" type="text/css" />

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root" style="height: 100vh;">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid" style="height: 100%;">
            <!--begin::Aside - Mobile First (order 2 in mobile, order 1 in larger screens)-->
            <div class="d-lg-none d-flex flex-column flex-lg-row-auto w-xl-1000px positon-xl-relative order-lg-2"
                style="background-image: url('{{ asset('client/media/taguigbranding/tbdblt.jpg') }}'); background-size: 0% 0%;">
                <!--begin::Wrapper-->
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100 mb-10" novalidate="novalidate" id="kt_sing_in_two_steps_form">
                            @csrf
                            <!--begin::Icon-->
                            <div class="text-center mb-10">
                                <img alt="Logo" class="mh-125px"
                                    src="{{ asset('client/media/svg/misc/smartphone.svg') }}" />
                            </div>
                            <!--end::Icon-->

                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Email Verification</h1>
                                <!--end::Title-->
                                <!--begin::Sub-title-->
                                <div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to</div>
                                <!--end::Sub-title-->
                                <!--begin::Email-->
                                <div id="userEmail" class="fw-bolder text-dark fs-3">{{ $userEmail }}</div>
                                <!--end::Email-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Section-->
                            <div class="mb-10 px-md-10">
                                <!--begin::Label-->
                                <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1 required">Type your 6 digit
                                    security code
                                </div>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="fv d-flex flex-wrap flex-stack">
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value=" " data-index="0" />
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value=" " data-index="1" />
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value=" " data-index="2" />
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value="" data-index="3" />
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value="" data-index="4" />
                                    <input type="text" name="otp[]" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-50px w-50px fs-2qx text-center border-primary border-hover mx-1 my-2 bg-secondary  text-black border-2"
                                        value="" data-index="5" />
                                </div>
                                <!--begin::Input group-->
                            </div>

                            <!--end::Section-->
                            <!--begin::Submit-->
                            <div class="d-flex flex-center">
                                <button type="button" id="kt_sing_in_two_steps_submit" kt_sing_in_two_steps-action="submit"
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
                            <a href="#" kt_sing_in_two_steps-action="resend"
                                class="link-primary fw-bolder fs-5 me-1">Resend</a>
                        </div>
                        <!--end::Notice-->
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
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->

    <!-- Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your terms and conditions content here -->
                    <p>
                        By clicking "Create Account", you are willing to give authorize City Government of Taguig to collect
                        and process the data and account or transaction information or records relating to your information
                        to the database system of City Government of Taguig as Information controller, by whatever means in
                        accordance with Republic Act 10173, otherwise known as the "Data Privacy Act of 2012" of the
                        Republic of the Philippines, including its Implementing Rules and Regulations as well as all other
                        guidelines to issuance by the National Privacy Commission.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="handleAgree()">Agree</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Push the JS client to the 'scripts' stack -->
    {{-- <script src="{{ asset('admin/js/custom/authentication/sign-in/two-steps.js') }}"></script> --}}
    <script src="{{ asset('client/js/custom/otp/submit.js') }}"></script>
@endpush
