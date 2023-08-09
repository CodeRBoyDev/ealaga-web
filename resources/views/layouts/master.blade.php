<html lang="en">

<!--begin::Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>eAlaga</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    @if (request()->route()->getName() === 'dashboard')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
            type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @else
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('client/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    @endif


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        @stack('adminStyles')
</head>

<!--end::Head-->

<body id="kt_body" class="bg-body">
    @if (request()->route()->getName() != 'login' &&
            request()->route()->getName() != 'register' &&
            request()->route()->getName() != 'dashboard' 
            &&  request()->route()->getName() != 'ClientHome'
            &&  request()->route()->getName() != 'ClientSchedule'
            &&  request()->route()->getName() != 'ClientScheduleList'
            &&  request()->route()->getName() != 'ClientScheduleHistory'
            &&  request()->route()->getName() != 'ClientVolunteerList'
            )
        @include('layouts.header')
    @endif

    <!-- Your other content goes here -->

    <!--begin::Main-->
    <div>
        @yield('content')
    </div>
    <!--end::Main-->
    @if (request()->route()->getName() != 'dashboard')
        <script>
            var hostUrl = "client/";
        </script>
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('client/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('client/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        @stack('scripts')
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
    @else
        <!-- Push the JS assets to the 'scripts' stack -->
        <script>
            var hostUrl = "admin/";
        </script>
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        @stack('adminScripts')
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
    @endif

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
	<script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
	<script src="{{asset('assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
	<!--end::Page Vendors Javascript-->
    @stack('scripts')
    <!--end::Page Custom Javascript-->

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>