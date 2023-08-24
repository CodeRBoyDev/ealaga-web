@extends('layouts.master')
@section('content')
    <!--begin::Main-->
    <link href="{{ asset('/client/css/loader.css') }}" rel="stylesheet" type="text/css" />
    
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
            <!--begin::Body - Mobile First (order 1 in mobile, order 2 in larger screens)-->
            <div class="d-flex flex-column flex-lg-row-auto py-10" style="overflow-y: auto; overflow-x: hidden;">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center flex-column-fluid mx-auto">
                    <!--begin::Wrapper-->
                    <div class="w-lg-550px p-10 p-lg-15" style="max-width: 100%;">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
                            @csrf
                            <!--begin::Heading-->
                            <div class="mb-10 text-center">
                                <!--begin::Logo-->
                                <img alt="Logo" src="{{ asset('client/media/logos/OSCA.png') }}" class="h-150px" />
                                <!--end::Logo-->
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Create an Account</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                    <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Separator-->
                            <div class="d-flex align-items-center mb-10">
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                                <span class="fw-bold text-gray-400 fs-7 mx-2">Register</span>
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6 required">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        placeholder="" name="first-name" autocomplete="off" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6 required">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                        placeholder="" name="last-name" autocomplete="off" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6 required">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                                    name="email" autocomplete="off" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 required">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" name="password" autocomplete="off" />
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
                            <!--end::Input group=-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-6 required">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="" name="confirm-password" autocomplete="off" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline required">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                        <a href="#" class="ms-1 link-primary" data-bs-toggle="modal"
                                            data-bs-target="#termsModal">Terms and conditions</a>
                                        .</span>

                                </label>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <!--begin::Footer-->
                        <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                            <!--begin::Links-->
                            <div class="d-flex flex-center fw-bold fs-6">
                                <a href="{{ route('VisitorLanding') }}" class="text-muted text-hover-primary px-2">Go Back
                                    Home</a>
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
    <script src="{{ asset('client/js/custom/authentication/sign-up/general.js') }}"></script>
    <script>
        function handleAgree() {
            // Get the checkbox element
            const checkbox = document.querySelector('input[name="toc"]');
            // Check the checkbox
            checkbox.checked = true;

            // Remove validation messages if any
            const validationMessage = document.querySelector('[data-validator="notEmpty"]');
            if (validationMessage) {
                validationMessage.remove();
            }
        }
    </script>
@endpush
