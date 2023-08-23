@extends('layouts.master')
@push('adminStyles')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('/client/css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/css/loader.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .body_background {
            background-image: url(/client/media/taguigbranding/footer-trim.png), url(/client/media/taguigbranding/sunray.jpg);
            background-size: 100%, cover;
            background-repeat: no-repeat;
            background-position: bottom, center;
        }
    </style>

    <!--end::Page Vendor Stylesheets-->
@endpush
@section('content')
    <!--begin::Body-->
    <div class="body_background header-tablet-and-mobile-fixed aside-enabled">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                @include('dashboard.sidebar')
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    @include('dashboard.header')
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Container-->
                        <div class="container-xxl" id="kt_content_container">
                        <div class="row gy-5 g-xl-10">
                            <!--begin::Col-->
                            <div class="col-xl-4 mb-xl-10">
                                <!--begin::List widget 16-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-7">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Holidays</span>
                                            <span class="text-gray-600 mt-1 fw-semibold fs-6">Official Non-Working Holidays</span>
                                        </h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal_add_holiday" title="Add Holidays">Add</a>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Modal - Add task-->
                                    <div class="modal fade" id="modal_add_holiday" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Modal header-->
                                                <div class="modal-header" id="kt_modal_add_holiday">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold">Add Holiday</h2>
                                                    <!--end::Modal title-->
                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                                        <i class="ki-duotone ki-cross fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                    <!--begin::Form-->
                                                    <form id="submit_new_holiday" class="form" action="#">
                                                        <!--begin::Scroll-->
                                                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                            id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                            data-kt-scroll-activate="{default: false, lg: true}"
                                                            data-kt-scroll-max-height="auto"
                                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                            data-kt-scroll-offset="300px">

                                                            <!--begin::Col-->
                                                            <div class="fv-row mb-7">
                                                                <label class="required fs-6 fw-semibold mb-2">Holiday Type</label>
                                                                <select class="form-select form-select-solid" data-control="select2"
                                                                    data-hide-search="true" data-placeholder="Select a Type"
                                                                    id="holiday_type" name="holiday_type">
                                                                    <option value="" selected disabled>Select a Type</option>
                                                                    <option value="1">Reqular Holiday</option>
                                                                    <option value="2">Sepecial (Non-Working) Holiday</option>
                                                                    <option value="3">Others</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                                    <span>Name of Holiday</span>
                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Specify a target priorty">
                                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="Name of holiday..." value="" id="name"
                                                                    name="name" />
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <label class="required fs-6 fw-semibold mb-2">Date</label>
                                                                <!--begin::Input-->
                                                                <div class="position-relative d-flex align-items-center">
                                                                    <!--begin::Icon-->
                                                                    <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                        <span class="path6"></span>
                                                                    </i>
                                                                    <!--end::Icon-->
                                                                    <!--begin::Datepicker-->
                                                                    <input class="form-control form-control-solid ps-12"
                                                                        id="holiday_date_input" placeholder="Select a Date"
                                                                        name="holiday_date_input" />
                                                                    <!--end::Datepicker-->
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <!--end::Scroll-->
                                                        <!--begin::Actions-->
                                                        <div class="text-center pt-15" id="add_overtime_action">
                                                            <button type="reset" class="btn btn-light me-3"
                                                                id="modal_holiday_cancel">Discard</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                data-kt-users-modal-action="submit">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - Add task-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-4 px-0">
                                        <!--begin::Nav-->
                                        <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
                                            <!--begin::Item-->
                                            <li class="nav-item col-4 mx-0 p-0">
                                                <!--begin::Link-->
                                                <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100"
                                                    data-bs-toggle="pill" href="#kt_ph_holidays">
                                                    <!--begin::Subtitle-->
                                                    <span class="nav-text text-white-800 fw-bold fs-6 mb-3">Philippines</span>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Bullet-->
                                                    {{-- <span
                                                        class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span> --}}
                                                    <!--end::Bullet-->
                                                </a>
                                                <!--end::Link-->
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="nav-item col-4 mx-0 px-0">
                                                <!--begin::Link-->
                                                <a class="nav-link d-flex justify-content-center w-100 border-0 h-100"
                                                    data-bs-toggle="pill" href="#kt_cu_holidays">
                                                    <!--begin::Subtitle-->
                                                    <span class="nav-text text-white-800 fw-bold fs-6 mb-3">Custom</span>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Bullet-->
                                                    {{-- <span
                                                        class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span> --}}
                                                    <!--end::Bullet-->
                                                </a>
                                                <!--end::Link-->
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Bullet-->
                                            <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                                            <!--end::Bullet-->
                                        </ul>
                                        <!--end::Nav-->
                                        <!--begin::Tab Content-->
                                        <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 454px">
                                            <!--begin::Tap pane-->
                                            <div id="indicator_search_loading">
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </div>

                                            <div class="tab-pane fade show active" id="kt_ph_holidays">
                                            </div>
                                            <!--end::Tap pane-->
                                            <!--begin::Tap pane-->
                                            <div class="tab-pane fade" id="kt_cu_holidays">
                                            </div>
                                            <!--end::Tap pane-->
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end::List widget 16-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-8 mb-xl-10">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">

                                        <div class="d-flex align-items-center">
                                                <!--begin::Bullet-->
                                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                                <span class="fw-bold text-gray-600 fs-6">Regular Holiday &nbsp</span>

                                                <span class="badge badge-primary badge-circle w-10px h-10px me-1"></span>
                                                <span class="fw-bold text-gray-600 fs-6"> Special(Non-Working) Holiday &nbsp</span>
                                                <span></span>
                                                <span class="badge badge-warning badge-circle w-10px h-10px me-1"></span>
                                                <span class="fw-bold text-gray-600 fs-6">Custom &nbsp</span>
                                                <!--end::Bullet-->
                                            </div>
                                    </div>
                                    <div id="calendar"></div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Card-->
                     <!--end::Container-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    @include('dashboard.footer')
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--end::Drawers-->
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <script src="{{ asset('client/js/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('client/js/holiday.js') }}"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // defaultView: 'dayGridMonth',
                showNonCurrentDates: true,
                displayEventEnd: true,
                events: @json($events),
                
            });
            calendar.render();
        });
    </script> --}}
    <!--end::Page Vendors Javascript-->
@endpush
