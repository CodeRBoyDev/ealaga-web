@extends('layouts.master')
@push('adminStyles')
    <style>
        .body_background {
            background-image: url(/client/media/taguigbranding/footer-trim.png), url(/client/media/taguigbranding/sunray.jpg);
            background-size: 100%, cover;
            background-repeat: no-repeat;
            background-position: bottom, center;
        }

        .total-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
        }
    </style>
@endpush
@section('content')
    <!--begin::Body-->
    <div class=" body_background header-tablet-and-mobile-fixed aside-enabled">
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
                                <!--begin::Overview-->
                                @include('dashboard.analytics.overview')
                                <!--end::Overview-->
                                <!--begin::Chart1-->
                                @include('dashboard.analytics.chart1')
                                <!--end::Chart1-->
                                <!--begin::Chart2-->
                                @include('dashboard.analytics.chart2')
                                <!--end::Chart2-->
                                <!--begin::Others-->
                                @include('dashboard.analytics.others')
                                <!--end::Others-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Post-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->

                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection

@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <!-- Include the Chart.js library -->
    <script src="{{ asset('admin/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart1.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart2.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart3.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart4.js') }}"></script>
    <script src="{{ asset('dashboard/js/toplist.js') }}"></script>

    <!--end::Page Custom Javascript-->
@endpush
