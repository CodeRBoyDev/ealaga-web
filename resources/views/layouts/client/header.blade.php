<!--begin::Header tablet and mobile-->
<div class="header-mobile py-3">
    <!--begin::Container-->
    <div class="container d-flex flex-stack">
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="/">
                <img alt="Logo" src="/client/media/taguigbranding/OSCAJPG.png" class="h-35px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Aside toggle-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
            <span class="svg-icon svg-icon-2x me-n1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                    <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </button>
        <!--end::Aside toggle-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header tablet and mobile-->
<!--begin::Header-->
<div id="kt_header" class="header py-6 py-lg-0" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
    <!--begin::Container-->
    <div class="header-container container-xxl">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
            <!--begin::Heading-->
            <h1 class="d-flex flex-column text-dark fw-bolder my-1">
                <span class="text-black fs-1">Home</span>
                <small class="text-black-600 fs-6 pt-2">Welcome, {{auth()->user()->firstname . " " . auth()->user()->lastname}}</small>
            </h1>
            <!--end::Heading-->
        </div>
        <!--end::Page title=-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center flex-wrap">
          
            <!--begin::Action-->
            <div class="d-flex align-items-center py-3 py-lg-0">
                <div class="me-3">
                    <a href="#" class="btn btn-icon btn-custom position-relative" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black" />
                                <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div id="notification_total_div">

                        </div>
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-color: #1A4798">
                            <!--begin::Title-->
                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications
                            {{-- <span class="fs-8 opacity-75 ps-3">24 reports</span> --}}
                        </h3>
                            <!--end::Title-->
                           
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div>
                                <!--begin::Items-->
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <!--begin::Item-->
                                    <div id="notification_list_div">

                                    </div>
                                    
                                 
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Tab panel-->
                           
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                </div>
                
            </div>
            <!--end::Action-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
    <div class="header-offset"></div>
</div>


 <!--begin::Modals-->
        <!--begin::Modal - Add task-->
         <!--begin::Modal - Add Leave-->
           <!--begin::Modal - Add task-->
        <div class="modal fade" id="modal_notification" tabindex="-1"
           aria-hidden="true"  data-bs-keyboard="false">
           <!--begin::Modal dialog-->
           <div class="modal-dialog modal-dialog-centered mw-600px">
               <!--begin::Modal content-->
               <div class="modal-content">
                   <!--begin::Modal header-->
                   <div class="modal-header d-flex align-items-center justify-content-between"
                       id="kt_modal_add_user_header">
                       <!--begin::Modal title-->
                       <div class="mx-auto">
                           <h2 class="fw-bolder">Notification</h2>
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
                                       fill="black" />
                                   <rect x="7.41422" y="6"
                                       width="16" height="2" rx="1"
                                       transform="rotate(45 7.41422 6)"
                                       fill="black" />
                               </svg>
                           </span>
                           <!--end::Svg Icon-->
                       </div>
                       <!--end::Close-->
                   </div>
                   <!--end::Modal header-->
                   <!--begin::Modal body-->
                   <div class="modal-body   mx-5 mx-xl-15 my-7">
                     
                        
                               <div id="view_schedule_display">
                             
                            </div>
                           <!--end::Actions-->
                    
                   </div>
                   <!--end::Modal body-->
               </div>
               <!--end::Modal content-->
           </div>
           <!--end::Modal dialog-->
       </div>
       <!--end::Modal - Add task-->

<!--end::Header-->

@push('adminScripts')
    <script src="{{ asset('admin/js/custom/notification/notification.js') }}"></script>
@endpush