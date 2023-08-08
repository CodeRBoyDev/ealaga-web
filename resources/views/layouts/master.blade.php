<html lang="en">

<!--begin::Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eAlaga</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        @stack('adminStyles')
</head>

<!--end::Head-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
    @if(request()->route()->getName() != 'login' && request()->route()->getName() != 'register')
    @include('layouts.header')
    @endif 
    <!-- Your other content goes here -->

    <!--begin::Main-->
    <div>
        @yield('content')
    </div>
    <!--end::Main-->
    <script>
    var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->

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