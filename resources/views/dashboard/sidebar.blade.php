     <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
         data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
         data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
         data-kt-drawer-toggle="#kt_aside_mobile_toggle">
         <!--begin::Aside Toolbarl-->
         <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
             <!--begin::Logo-->
             <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                 <!--begin::Symbol-->
                 <div class="">
                     <img alt="Logo" src="{{ asset('client/media/taguigbranding/OSCAJPG.png') }}"
                         class="h-100px h-lg-100px" />
                 </div>
                 <!--end::Symbol-->
             </div>
             <!--end::Logo-->
             <!--begin::User-->
             <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                 <!--begin::Symbol-->
                 <div class="symbol symbol-50px">
                     {{-- <img src="{{ auth()->user()->img_path ? asset(auth()->user()->img_path) : asset('admin/media/avatars/blank.png') }}"
                         alt="" /> --}}
                     <img src="{{ auth()->user()->img_path ? asset(auth()->user()->img_path) : asset('admin/media/avatars/blank.png') }}"
                         alt="" />
                 </div>
                 <!--end::Symbol-->

                 <!--begin::Wrapper-->
                 <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                     <!--begin::Section-->
                     <div class="d-flex">
                         <!--begin::Info-->
                         <div class="flex-grow-1 me-2">
                             <!--begin::Username-->
                             <a href="" class="text-white fs-6 fw-bold disabled">
                                 {{ //   auth()->user()->firstname . ' ' .
                                     auth()->user()->lastname }}
                             </a>
                             <!--end::Username-->
                             <!--begin::Description-->
                             <span
                                 class="text-white fw-bold d-block fs-8 mb-1">{{ auth()->user()->role === 0 ? 'Administrator' : (auth()->user()->role === 1 ? 'Personnel' : 'Client') }}

                             </span>
                             <!--end::Description-->
                             <!--begin::Label-->
                             <div class="d-flex align-items-center text-success fs-9">
                                 <span class="bullet bullet-dot bg-success me-1"></span>online
                             </div>
                             <!--end::Label-->
                         </div>
                         <!--end::Info-->
                         <!--begin::User menu-->
                         <div class="me-n2">
                             <!--begin::Action-->
                             <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                                 data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                 data-kt-menu-overflow="true">
                                 <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                 <span class="svg-icon svg-icon-muted svg-icon-1">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                         <path opacity="0.3"
                                             d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                             fill="black" />
                                         <path
                                             d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                             fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </a>
                             <!--begin::Menu-->
                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                 data-kt-menu="true">
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-3">
                                     <div class="menu-content d-flex align-items-center px-3">
                                         <!--begin::Avatar-->
                                         <div class="symbol symbol-50px me-5">
                                             <img alt="Logo"
                                                 src="{{ auth()->user()->img_path ? asset(auth()->user()->img_path) : asset('admin/media/avatars/blank.png') }}" />
                                         </div>
                                         <!--end::Avatar-->
                                         <!--begin::Username-->
                                         <div class="d-flex flex-column">
                                             <div class="fw-bolder d-flex align-items-center fs-5">
                                                 {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}
                                                 <span
                                                     class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->user()->role === 0 ? 'Admin' : (auth()->user()->role === 1 ? 'Personnel' : 'Client') }}</span>
                                             </div>
                                             {{-- <a href="#"
                                                 class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a> --}}
                                         </div>
                                         <!--end::Username-->
                                     </div>
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu separator-->
                                 <div class="separator my-2"></div>
                                 <!--end::Menu separator-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-5">
                                     <a href="{{ route('profilePage') }}" class="menu-link px-5">My
                                         Profile</a>
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu separator-->
                                 <div class="separator my-2"></div>
                                 <!--end::Menu separator-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-5 my-1">
                                     <a href="../../demo8/dist/account/settings.html" class="menu-link px-5">Account
                                         Settings</a>
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu item-->
                                 <div class="menu-item px-5">
                                     <a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
                                 </div>
                                 <!--end::Menu item-->
                                 <!--begin::Menu separator-->
                                 <div class="separator my-2"></div>
                                 <!--end::Menu separator-->
                             </div>
                             <!--end::Menu-->
                             <!--end::Action-->
                         </div>
                         <!--end::User menu-->
                     </div>
                     <!--end::Section-->
                 </div>
                 <!--end::Wrapper-->
             </div>
             <!--end::User-->
             <!--end::Aside user-->
         </div>
         <!--end::Aside Toolbarl-->
         <!--begin::Aside menu-->
         <div class="aside-menu flex-column-fluid">
             <!--begin::Aside Menu-->
             <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                 data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
                 data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
                 <!--begin::Menu-->
                 <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                     id="#kt_aside_menu" data-kt-menu="true">
                     <div class="menu-item">
                         <div class="menu-content pb-2">
                             <span class="menu-section text-white text-uppercase fs-8 ls-1">Dashboard</span>
                         </div>
                     </div>
                     <div class="menu-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
                         <a class="menu-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"
                             href="{{ route('dashboard') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                         <rect x="2" y="2" width="9" height="9"
                                             rx="2" fill="black" />
                                         <rect opacity="0.3" x="13" y="2" width="9"
                                             height="9" rx="2" fill="black" />
                                         <rect opacity="0.3" x="13" y="13" width="9"
                                             height="9" rx="2" fill="black" />
                                         <rect opacity="0.3" x="2" y="13" width="9"
                                             height="9" rx="2" fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">Analytics</span>
                         </a>
                     </div>
                     <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion mb-1{{ Route::currentRouteName() === 'userList' ? ' hover show' : (Route::currentRouteName() === 'userView' ? 'hover show' : '') }}">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                         <path opacity="0.3"
                                             d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                             fill="black" />
                                         <path
                                             d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                             fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">User Management</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion">
                             <div data-kt-menu-trigger="click"
                                 class="menu-item menu-accordion mb-1{{ Route::currentRouteName() === 'userList' ? ' hover show' : (Route::currentRouteName() === 'userView' ? 'hover show' : '') }}">

                                 <span class="menu-link">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Users</span>
                                     <span class="menu-arrow"></span>
                                 </span>
                                 <div class="menu-sub menu-sub-accordion"
                                     @if (Route::currentRouteName() === 'userList') style="pointer-events: auto; {{ Route::currentRouteName() === 'userList' ? 'display: block;' : '' }}" @endif>
                                     <div
                                         class="menu-item {{ Route::currentRouteName() === 'userList' ? ' hover' : '' }}">
                                         <a class="menu-link" href="{{ route('userList') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Users List</span>
                                         </a>
                                     </div>
                                     @if (Route::currentRouteName() === 'userView')
                                         <div
                                             class="menu-item  {{ Route::currentRouteName() === 'userView' ? ' hover' : '' }}">
                                             <a class="menu-link" href="#">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">View User</span>
                                             </a>
                                         </div>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div data-kt-menu-trigger="click"
                         class="menu-item menu-accordion mb-1{{ Route::currentRouteName() === 'comorbidityList' ? ' hover show' : '' }}">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <polygon points="0 0 24 0 24 24 0 24" />
                                             <path
                                                 d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                 fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                             <path
                                                 d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z"
                                                 fill="#000000" fill-rule="nonzero" />
                                         </g>
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">Health Management</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion">
                             <div
                                 class="menu-item  {{ Route::currentRouteName() === 'comorbidityList' ? ' hover' : '' }}">
                                 <a class="menu-link" href="{{ route('comorbidityList') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Health List</span>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('reportList') }}">
                             <span class="menu-icon">
                                 <span
                                     class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/File.svg--><svg
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <polygon points="0 0 24 0 24 24 0 24" />
                                             <path
                                                 d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                 fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                             <rect fill="#000000" x="6" y="11" width="9"
                                                 height="2" rx="1" />
                                             <rect fill="#000000" x="6" y="15" width="5"
                                                 height="2" rx="1" />
                                         </g>
                                     </svg><!--end::Svg Icon--></span>
                             </span>
                             <span class="menu-title">Report Management</span>
                         </a>
                     </div>
                     <div class="menu-item">
                         <div class="menu-content">
                             <div class="separator mx-1 my-4"></div>
                         </div>
                     </div>
                     <div class="menu-item">
                         <a class="menu-link" href="../../demo8/dist/documentation/getting-started/changelog.html">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                         <path
                                             d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z"
                                             fill="black" />
                                         <path opacity="0.3"
                                             d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z"
                                             fill="black" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">Logs</span>
                         </a>
                     </div>
                 </div>
                 <!--end::Menu-->
             </div>
             <!--end::Aside Menu-->
         </div>
         <!--end::Aside menu-->
     </div>
     @push('styles')
         <style>
             /* Custom CSS to center the logo */
             .header-brand img {
                 display: block;
                 margin: auto;
             }
         </style>
     @endpush
