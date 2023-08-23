<html lang="en">

<!--begin::Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="/manifest.json">
    <title>eAlaga</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    @if (request()->route()->getName() === 'dashboard' ||
            request()->route()->getName() === 'userList' ||
            request()->route()->getName() === 'userView' ||
            request()->route()->getName() === 'comorbidityList' ||
            request()->route()->getName() === 'reportList' ||
            request()->route()->getName() === 'generatePDF' ||
            request()->route()->getName() === 'volunteerList' ||
            request()->route()->getName() === 'applicationList' ||
            request()->route()->getName() === 'ServiceList'||
            request()->route()->getName() === 'schedule' || 
            request()->route()->getName() === 'scheduleQRscanner' ||
            request()->route()->getName() === 'HolidaysView'
            )
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
            type="text/css" />
        <!--end::Page Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!-- Fancybox CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <!--end::Global Stylesheets Bundle-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @stack('adminStyles')
    @elseif(request()->route()->getName() === 'login' ||
            request()->route()->getName() === 'register' ||
            request()->route()->getName() === 'dashboard' ||
            request()->route()->getName() === 'ClientHome' ||
            request()->route()->getName() === 'ClientSchedule' ||
            request()->route()->getName() === 'ClientScheduleList' ||
            request()->route()->getName() === 'ClientScheduleHistory' ||
            request()->route()->getName() === 'ClientVolunteerList' ||
            request()->route()->getName() === 'emailOTP' ||
            request()->route()->getName() === 'VisitorLanding' ||
            request()->route()->getName() === 'forgotPassword' 
            
            )
        <link href="{{ asset('client/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        @stack('styles')
    @else
        <!--begin::Global Stylesheets Bundle(Certain Page and User)-->
        @stack('customStyles')
        <!--end::Global Stylesheets Bundle-->
    @endif

</head>

<!--end::Head-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_VisitorLanding_menu" data-bs-offset="200"
    class="bg-white position-relative">
    @if (request()->route()->getName() != 'login' &&
            request()->route()->getName() != 'register' &&
            request()->route()->getName() != 'dashboard' &&
            request()->route()->getName() != 'userList' &&
            request()->route()->getName() != 'userView' &&
            request()->route()->getName() != 'comorbidityList' &&
            request()->route()->getName() != 'volunteerList' &&
            request()->route()->getName() != 'applicationList' &&
            request()->route()->getName() != 'ClientHome' &&
            request()->route()->getName() != 'ClientSchedule' &&
            request()->route()->getName() != 'ClientScheduleList' &&
            request()->route()->getName() != 'ClientScheduleHistory' &&
            request()->route()->getName() != 'ClientVolunteerList' &&
            request()->route()->getName() != 'emailOTP' &&
            request()->route()->getName() != 'profilePage' &&
            request()->route()->getName() != 'reportList' &&
            request()->route()->getName() != 'generatePDF' &&
            request()->route()->getName() != 'ServiceList' && 
            request()->route()->getName() != 'schedule' &&
            request()->route()->getName() != 'scheduleQRscanner' &&
            request()->route()->getName() != 'HolidaysView' &&
            request()->route()->getName() != 'forgotPassword' 
            )
        @include('layouts.header')
    @endif
    <!-- Your other content goes here -->

    <div id="sample">

    </div>
    <!--begin::Main-->
    <div>
        @yield('content')
    </div>
    <!--end::Main-->
    {{-- @if (request()->route()->getName() != 'dashboard' &&
    request()->route()->getName() != 'userList' &&
    request()->route()->getName() != 'userView' &&
    request()->route()->getName() != 'comorbidityList')
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
    @endif --}}
    <script src="{{ asset('client/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('client/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    @stack('scripts')
    @stack('adminScripts')
</body>
<!--end::Body-->

</html>