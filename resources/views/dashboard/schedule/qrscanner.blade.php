@extends('layouts.master')
@push('adminStyles')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-4">
                                        <!--begin::List Widget 1-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <button id="table_link" type="button" class="btn btn-light-primary me-3 button_blue">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <rect   style="fill: #fff;"  x="2" y="4" width="19" height="4" rx="1"/>
                                                            <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" 
                                                            style="fill: #fff;"  opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->Table</button>
                                            </div>
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    QR SCANNER
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-5">
                                                <div id="camera_block_error" class="notice bg-light-secondary p-4">
                                                    <label class="fs-6 text-danger">
                                                        Status:
                                                    </label>
                                                    <label class="fs-6 fw-semibold">
                                                    </label>
                                                </div>

                                                <div style="margin-bottom: 10px;" class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="" id="camera_management" checked="checked">
                                                    <label class="form-check-label fw-bold text-gray-400 ms-3" for="allowchanges">Open</label>
                                    
                                                </div>

                                                <video id="qrScanner"
                                                    style="width: 100%; height: 50%; border: 2px solid black;"></video>
                                                <select id="cameraSelect" name="time_input"
                                                    class="form-select form-select-solid" data-control="select2"
                                                    data-hide-search="true" data-placeholder="Available Camera">
                                                    <option></option>
                                                </select>

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::List Widget 1-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-8">
                                        <!--begin::Tables Widget 5-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bolder fs-3 mb-1">Schedule Details</span>
                                                    {{-- <span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span> --}}
                                                </h3>

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body p-9" style="height: 450px;">
                                               
                                                <span id="qr_code_title" class="fw-bold fs-6 text-gray-800">
                                                    Position the QR code in front of the camera to accept attendees.</span>

                                                <div id="qr_content">
                                                    
                                                </div>

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Tables Widget 5-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
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

    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!-- Fancybox JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="{{ asset('admin/js/custom/schedule/qrscanner.js') }}"></script>
    <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    {{-- <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> --}}
    <!--end::Page Vendors Javascript-->
@endpush
