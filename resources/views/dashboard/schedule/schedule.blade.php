@extends('layouts.master')
@push('adminStyles')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <style>
        .body_background {
            background-image: url(/client/media/taguigbranding/footer-trim.png), url(/client/media/taguigbranding/sunray.jpg);
            background-size: 100%, cover;
            background-repeat: no-repeat;
            background-position: bottom, center;
        }
    </style>

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
                        <!--begin::Post-->
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <!--begin::Container-->
                            <div id="kt_content_container" class="container-xxl">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                              <h1 id="schedule_title">Today Attendees</h1>
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Filter-->

                                                <button id="qr_scanner_link" type="button" class="btn btn-light-primary me-3 button_blue">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <rect  style="fill: #fff;" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                                        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" 
                                                        style="fill: #fff;" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->QRcode Scanner</button>
                                            <button type="button" class="btn btn-light-primary me-3 button_blue"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="top-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="black">
                                                    <path
                                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                        style="fill: #fff;" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Filter</button>
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                            data-kt-menu="true" id="kt-toolbar-filter">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Separator-->
                                            <!--begin::Content-->
                                            <div class="px-7 py-5">
                                                
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid fw-bolder"
                                                        data-kt-select2="true" data-placeholder="Select option"
                                                        data-allow-clear="true" data-kt-customer-table-filter="month"
                                                        data-dropdown-parent="#kt-toolbar-filter"
                                                        id="filter_status"
                                                        >
                                                        <option></option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Attended</option>
                                                        <option value="2">Not Attended</option>
                                                        <option value="3">Cancelled</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                 <!--begin::Input group-->
                                                 <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Barangay:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid fw-bolder"
                                                        data-kt-select2="true" data-placeholder="Select option"
                                                        data-allow-clear="true" data-kt-customer-table-filter="month"
                                                        data-dropdown-parent="#kt-toolbar-filter"
                                                        id="filter_barangay"
                                                        >
                                                        <option></option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                 <!--begin::Input group-->
                                                 <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Time:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid fw-bolder"
                                                        data-kt-select2="true" data-placeholder="Select option"
                                                        data-allow-clear="true" data-kt-customer-table-filter="month"
                                                        data-dropdown-parent="#kt-toolbar-filter"
                                                        id="filter_time"
                                                        >
                                                        <option></option>
                                                        <option value="0">Morning</option>
                                                        <option value="1">Afternoon</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Date:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                        <input class="form-control form-control-solid mb-3"
                                                        id="filter_start_date" placeholder="Start Date"
                                                            name="filter_start_date" />
                                                            <input class="form-control form-control-solid"
                                                            id="filter_end_date" placeholder="End Date"
                                                                name="filter_end_date" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" id="filter_reset"
                                                        class="btn btn-light btn-active-light-primary me-2"
                                                        {{-- data-kt-menu-dismiss="true" --}}
                                                        data-kt-customer-table-filter="reset">Reset</button>
                                                    <button id="filter_submit" class="btn btn-primary"
                                                        data-kt-menu-dismiss="true"
                                                        data-kt-customer-table-filter="filter">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Filter-->
                                                <!--begin::Add user-->
                                                <button type="button" class="btn btn-primary" id="add_schedule"
                                                    >
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11.364" y="20.364"
                                                                width="16" height="2" rx="1"
                                                                transform="rotate(-90 11.364 20.364)" fill="black" />
                                                            <rect x="4.36396" y="11.364" width="16"
                                                                height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Add Schedule
                                                </button>
                                                <!--end::Add user-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    {{-- <h1>QR Code Scanner</h1>
                                    <label for="cameraSelect">Select Camera:</label>
                                    <select id="cameraSelect"></select>
                                    <video id="qrScanner"></video> --}}
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="schedule_table">
                                            <!--begin::Table head-->
                                            <thead class="align-middle">
                                                <!--begin::Table row-->
                                                <tr class="text-left text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-120px">ID</th>
                                                    <th class="min-w-120px">Full Name</th>
                                                    <th class="min-w-120px">Services</th>
                                                    <th class="min-w-120px">Date & Time</th>
                                                    <th class="min-w-120px">Barangay</th>
                                                    <th class="min-w-120px">Status</th>
                                                    <th class="min-w-120px">Action</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="align-middle text-black-400 fw-bold">
                                                <!-- Table rows will be dynamically populated using JavaScript -->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Post-->
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
        <!--begin::Modals-->
        <!--begin::Modal - Add task-->
         <!--begin::Modal - Add Leave-->
           <!--begin::Modal - Add task-->
           <div class="modal fade" id="modal_add_schedule" tabindex="-1"
           aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
           <!--begin::Modal dialog-->
           <div class="modal-dialog modal-dialog-centered mw-600px">
               <!--begin::Modal content-->
               <div class="modal-content">
                   <!--begin::Modal header-->
                   <div class="modal-header d-flex align-items-center justify-content-between"
                       id="kt_modal_add_user_header">
                       <!--begin::Modal title-->
                       <div class="mx-auto">
                           <h2 class="fw-bolder">Add Schedule</h2>
                       </div>
                       <!--end::Modal title-->
                       <!--begin::Close-->
                       <div class="btn btn-icon btn-sm btn-active-icon-primary"
                           data-bs-dismiss="modal">
                           <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                           <span class="svg-icon svg-icon-1">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                   height="24" viewBox="0 0 24 24"
                                   fill="none">
                                   <rect opacity="0.5" x="6"
                                       y="17.3137" width="16" height="2"
                                       rx="1"
                                       transform="rotate(-45 6 17.3137)"
                                       style="fill: #000;" />
                                   <rect x="7.41422" y="6"
                                       width="16" height="2" rx="1"
                                       transform="rotate(45 7.41422 6)"
                                       style="fill: #000;" />
                               </svg>
                           </span>
                           <!--end::Svg Icon-->
                       </div>
                       <!--end::Close-->
                   </div>
                   <!--end::Modal header-->
                   <!--begin::Modal body-->
                   <div class="modal-body   mx-5 mx-xl-15 my-7">
                       <!--begin::Form-->
                       <form id="modal_add_schedule_form" class="form"
                           action="#" enctype="multipart/form-data">
                           @csrf
                           <!--begin::Scroll-->
                           <div class="d-flex flex-column scroll-y me-n7 pe-7"
                               id="kt_modal_add_user_scroll"
                               data-kt-scroll-max-height="auto"
                               data-kt-scroll-dependencies="#kt_modal_add_user_header"
                               data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                               data-kt-scroll-offset="300px">
                            
                               <!--end::Input group-->

                               <div class="fv-row mb-7">
                                <div id="admin_fullname_select_div">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold mb-2">Full Name</label>
                                    <!--end::Label-->
                                    <div class="input-group">
                                        <input type="text" name="fullname" id="fullname"
                                            class="form-control form-control-solid mb-lg-0"
                                            placeholder="Full name" value="" />
                                        <button type="button" class="btn btn-light-primary"
                                            id="search_fullname" data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" style="fill: #fff;" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" style="fill: #fff;" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <span id="admin_indicator_search_loading"
                                                style="display: none;">
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>

                                        <!--begin::Menu 1-->
                                        <div style="margin: 0 !important;" class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                            data-kt-menu="true">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div id="title_search"
                                                    class="fs-5 text-dark fw-bold">Search Result</div>
                                            </div>
                                            
                                            <!--end::Header-->
                                            <!--begin::Separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Separator-->
                                            <!--begin::Content-->
                                            <div class="px-7 py-5"
                                                data-kt-user-table-filter="form">

                                                <!--begin::Input group-->
                                                <!--begin::Items-->
                                                <div class="mb-7">
                                                    <div class="scroll-y mh-200px mh-lg-325px">

                                                        <!--begin::Item-->
                                                        <span id="indicator_search_loading_result">
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                                                        <div id="search_result_div">
                                                            
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                <!--end::Items-->
                                                <!--end::Input group-->

                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Menu 1-->

                                    </div>
                                </div>
                                <a href="#" id="reset_fullname"
                                    class="link-danger fw-bold">reset</a>
                            </div>

                            <span id="indicator_search_loading">
                            <span
                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                            
                            <div id="schedule_content">

                                <!--begin::Col-->
                                <!--begin::Col-->
                             <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Services?</label>
                                <label class="fs-8 fw-semibold mb-2">(You can select a multiple services)</label>
                                <select class="form-select form-select-solid "
                                    data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Services" id="services"
                                    name="services[]" data-required="true" multiple>

                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">
                                            {{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->

                            <div class="row fv-row">
                                <!--begin::Col-->
                                <div class="card-title">
                                    <!--begin::User-->
                                    <div class="d-flex justify-content-center flex-column me-3">
                                    <!--begin::Info-->
                                        <div class="mb-0 lh-1">
                                            <span class="badge badge-circle w-10px h-10px" style="background-color: rgba(26, 71, 152, 0.7);"></span>
                                            <span class="fs-7 fw-bold text-muted me-1">Selected</span>
                                            <span class="badge badge-circle w-10px h-10px" style="background-color: #F4C027;"></span>
											<span class="fs-7 fw-bold text-muted me-1">Holiday</span>
                                            <span class="badge badge-circle w-10px h-10px" style="background-color: #c7c7c7;"></span>
                                            <span class="fs-7 fw-bold text-muted me-1">No Slot</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>

                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold form-label mb-2">Date</label>
                                    <!--begin::Input-->
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                    
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid"
                                            id="date_input" placeholder="Select a date"
                                            name="date_input" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-bold form-label mb-2">Available Time</label>
                                    <select id="time_input" name="time_input" class="form-select form-select-solid" data-control="select2"c data-hide-search="true" data-placeholder="Time">
                                        <option></option>
                                        <option value="0">AM</option>
                                        <option value="1">PM</option>
                                    </select>
                                </div>
                                <!--end::Col-->

                                <div class="row fv-row">
                                    <!--begin::Col-->

                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center flex-column me-3">
                                        <!--begin::Info-->
                                            <div class="mb-0 lh-1">
                                                <span class="badge badge-circle w-10px h-10px" style="background-color: rgba(26, 71, 152, 0.7);"></span>
                                                <span class="fs-7 fw-bold text-muted me-1">Selected</span>
                                                <span class="badge badge-circle w-10px h-10px" style="background-color: #c7c7c7;"></span>
                                                <span class="fs-7 fw-bold text-muted me-1">No Slot</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>

                                    <div class="col-md-6">
                                        <label class="required fs-6 fw-bold form-label mb-2">Date</label>
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center">
                                            <!--begin::Icon-->
                                        
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-solid"
                                                id="date_input" placeholder="Select a date"
                                                name="date_input" />
                                            <!--end::Datepicker-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6">
                                        <label class="required fs-6 fw-bold form-label mb-2">Available Time</label>
                                        <select id="time_input" name="time_input" class="form-select form-select-solid" data-control="select2"c data-hide-search="true" data-placeholder="Time">
                                            <option></option>
                                            <option value="0">AM</option>
                                            <option value="1">PM</option>
                                        </select>
                                    </div>
                                
                                    <!--end::Col-->
                                </div>
                                <a href="#" id="reset_date_time" class="fs-7 fw-bold text-danger form-label mb-2">reset</a>
                                <!--end::Row-->

                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label id="date_time_display" class="fs-5 fw-bold text-muted">Date & Time: Please select date & time</label>
                                        <div id="available_slot_display" class="fs-3 fw-bold form-label">
                                        </div>

                                        <div class="fv-row mb-7" id="slot_loader">
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </div>

                                    </div>
                                    <!--end::Label-->
                                    
                                </div>

                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">Discard</button>
                                    <button type="submit" class="btn btn-primary"
                                        data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            

                             </div>

                            
                               
                           </div>
                           <!--end::Scroll-->
                           <!--begin::Actions-->
                          
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

         <div class="modal fade" id="view_schedule_modal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Schedule Information</h2>
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
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin::Form-->


                        <form id="employee_view_leave_form" class="form">
                            <!--begin::Heading-->
                          
                            <div class="symbol symbol-100px symbol-lg-160px align-items-middle symbol-fixed position-relative" style="display: flex; justify-content: center; align-items: center;">
                                <img id="qr_code" src="assets/media/avatars/150-26.jpg" alt="image" style="margin-top: 20px; max-width: 100%; max-height: 100%;">
                            </div>
                            
                               <!--begin::Input group-->
                               <div class="row g-9 mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                   <label class="fs-6 fw-semibold mb-2">&nbsp;</label>
                                   <div id="view_fullname"
                                       class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                       <label class="fs-6 text-primary">
                                           Full Name:
                                       </label>
                                       <label class="fs-6 fw-semibold">
                                           
                                       </label>
                                   </div>

                               </div>
                               <!--end::Col-->
                               <!--begin::Col-->
                               <div class="col-md-6 fv-row">
                                   <label class="fs-6 fw-semibold mb-2">&nbsp;</label>
                                   <div id="view_barangay"
                                       class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                       <label class="fs-6 text-primary">
                                           Barangay:
                                       </label>
                                       <label class="fs-6 fw-semibold">
                                           
                                       </label>
                                   </div>

                               </div>
                               <!--end::Col-->
                           </div>
                           <!--end::Input group-->

                           <div class="d-flex flex-column mb-8">

                            <div id="view_email"
                                class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                              

                                <label class="fs-6 text-primary">
                                    Email:
                                </label>
                                <label class="fs-6 fw-semibold">
                                </label>
                            </div>

                        </div>

                            
                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <div id="view_date"
                                        class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                     

                                            <label class="fs-6 text-primary">
                                                Date:
                                            </label>
                                            <label class="fs-6 fw-semibold">
                                            </label>
                                       
                                    </div>

                                </div>
                                <div class="col-md-6 fv-row">

                                    <div id="view_time"
                                        class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                      

                                            <label class="fs-6 text-primary">
                                                 Time:
                                            </label>
                                            <label class="fs-6 fw-semibold">
                                            </label>
                                      
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex flex-column mb-8">

                                <div id="view_status"
                                    class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                  
    
                                    <label class="fs-6 text-primary">
                                        Status:
                                    </label>
                                    <label class="fs-6 fw-semibold">
                                    </label>
                                </div>
    
                            </div>
                        
                            <div class="d-flex flex-column mb-8">

                                <div id="view_services"
                                    class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                  

                                        <label class="fs-6 text-primary">
                                            Services:
                                        </label>
                                        <br />
                                        <div class="fs-6 fw-semibold">
                                        </div>
                                </div>

                            </div>


                            <div class="separator border-gray-200"></div>
                            <br />

                            <div class="d-flex flex-column mb-8">

                                <div id="processed_by"
                                    class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                  
    
                                    <label class="fs-6 text-primary">
                                        Processed by:
                                    </label>
                                    <label class="fs-6 fw-semibold">
                                    </label>
                                </div>
    
                            </div>
                            <div class="d-flex flex-column mb-8">

                                <div id="processed_on"
                                    class="notice bg-light-secondary rounded border-secondary border border-dashed p-4">
                                  
    
                                    <label class="fs-6 text-primary">
                                        Processed on:
                                    </label>
                                    <label class="fs-6 fw-semibold">
                                    </label>
                                </div>
    
                            </div>

                            <div class="text-center">
                                <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">Close</button>
                                   {{-- <span id="employee_undo_revoke_div">
                                    <button type="button" id="employee_undo_revoke"
                                        class="btn btn-info">
                                        <span class="indicator-label">Undo Revoke</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    </span> --}}
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
        <!--end::Modal - Add Leave-->

        <!--end::Modal - Add task-->
        <!--end::Modals-->
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
 
    <script src="{{ asset('admin/js/custom/schedule/schedule.js') }}"></script>
@endpush
