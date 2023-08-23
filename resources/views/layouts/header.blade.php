 <!--begin::Header Section-->
 <div class="mb-0" id="home">
     <!--begin::Wrapper-->
     <div class="background-container bg-no-repeat bgi-size-cover bgi-position-x-center bgi-position-y-bottom">
         {{-- <div class="background-container bg-no-repeat bgi-size-cover bgi-position-x-center bgi-position-y-bottom"
         style="background-image: url(client/media/svg/illustrations/footer-trim.png), url(client/media/svg/illustrations/sunray.jpg); background-size: 100% auto, cover;
         background-position: 0% 100%, center;"> --}}
         <!--begin::Header-->
         <div class="cloud-container">
            <div class="cloud cloud1" style="background-image: url(client/media/svg/illustrations/cloud1.png)"></div>
            <div class="cloud cloud2" style="background-image: url(client/media/svg/illustrations/cloud2.png)"></div>
            <div class="cloud cloud3" style="background-image: url(client/media/svg/illustrations/cloud3.png)"></div>
         </div>
         <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
             data-kt-sticky-offset="{default: '200px', lg: '300px'}">
             <!--begin::Container-->
             <div class="container">
                 <!--begin::Wrapper-->
                 <div class="d-flex align-items-center justify-content-between">
                     <!--begin::Logo-->
                     <div class="d-flex align-items-center flex-equal">
                         <!--begin::Mobile menu toggle-->
                         <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none z-index-1"
                             id="kt_landing_menu_toggle">
                             <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                             <span class="svg-icon svg-icon-2hx">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                     <path
                                         d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                         fill="black" />
                                     <path opacity="0.3"
                                         d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                         fill="black" />
                                 </svg>
                             </span>
                             <!--end::Svg Icon-->
                         </button>
                         <!--end::Mobile menu toggle-->
                         <!--begin::Logo image-->
                         <a href="../../demo9/dist/landing.html">
                             <img alt="Logo" src="client/media/logos/logotaguig.png"
                                 class="logo-default h-25px h-lg-50px" />
                             <img alt="Logo" src="client/media/logos/logotaguig.png"
                                 class="logo-sticky h-20px h-lg-50px" />
                         </a>
                         <!--end::Logo image-->
                     </div>
                     <!--end::Logo-->
                     <!--begin::Menu wrapper-->
                     <div class="d-lg-block z-index-1" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                             <!--begin::Menu-->
                             <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-dark-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                                 id="kt_landing_menu">
                                 <!--begin::Menu item-->
                                 <div class="menu-item">
                                     <!--begin::Menu link-->
                                     <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                         data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                     <!--end::Menu link-->
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item">
                                     <!--begin::Menu link-->
                                     <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how"
                                         data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How to use</a>
                                     <!--end::Menu link-->
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item">
                                     <!--begin::Menu link-->
                                     <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#announcement"
                                         data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Announcement</a>
                                     <!--end::Menu link-->
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Team</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#services" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Services</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu item-->
                             </div>
                             <!--end::Menu-->
                         </div>
                     </div>
                     <!--end::Menu wrapper-->
                     <!--begin::Toolbar-->
                     @if (!Auth::check())
                         <div class="flex-equal text-end ms-1 z-index-1">
                             <a href="{{ route('login') }}" class="btn btn-warning">Sign In</a>
                         </div>
                     @else
                         <div class="flex-equal text-end ms-1">
                             <a href="{{ route('logout') }}" class="btn btn-success">Sign Out</a>
                         </div>
                     @endif
                     <!--end::Toolbar-->
                 </div>
                 <!--end::Wrapper-->
             </div>
             <!--end::Container-->
         </div>
         <!--end::Header-->
         <!--begin::Landing hero-->
         <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
             <!--begin::Heading-->
             <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20" style="z-index: 1">
                 <!--begin::Title-->
                 <h1 class="text-blue lh-base fw-bolder fs-2x fs-lg-3x mb-15">EXPERIENCE THE ENTERTAINMENT AND RELAXATION
                     <br />AT THE
                     <span style="color: red;">
                         <span id="kt_landing_hero_text">CENTER FOR THE ELDERLY</span>
                     </span>
                 </h1>

             </div>
             <!--end::Heading-->
             <!--end::Clients-->
         </div>
         <!--end::Landing hero-->
     </div>
     <!--end::Wrapper-->
     <!--begin::Curve bottom-->
     <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
    </div>
     <!--end::Curve bottom-->
 </div>
 <!--end::Header Section-->

 <!--begin::Page Vendors Javascript(used by this page)-->
 <script src="client/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
 <script src="client/plugins/custom/typedjs/typedjs.bundle.js"></script>
 <!--end::Page Vendors Javascript-->
 <!--begin::Page Custom Javascript(used by this page)-->
 <script src="client/js/custom/landing.js"></script>
 <script src="client/js/custom/pages/company/pricing.js"></script>
 <!--end::Page Custom Javascript-->
