@extends('layouts.master')
@section('content')
    <link href="{{ asset('/client/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/client/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="/client/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--begin::Body-->
    <div class="body_background header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                @include('layouts.client.sidebar')
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                    @include('layouts.client.header')

                    <!--begin::Content-->


                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Container-->
                        <div class="container-xxl" id="kt_content_container">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <a href="#" id="back_homepage" class="map-icon">
                                                <span class="symbol symbol-50px me-6 ">
                                                    <span class="symbol-label bg-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                                class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M12.6572352,10 L12.6572352,5.67013288 C12.6572352,5.25591932 12.3214488,4.92013288 11.9072352,4.92013288 C11.7235496,4.92013288 11.5462507,4.98754181 11.4089624,5.10957589 L4.25173515,11.4715556 C3.94214808,11.7467441 3.91426253,12.2207984 4.18945104,12.5303855 C4.19921056,12.541365 4.20929054,12.5520553 4.21967795,12.5624427 L11.3769052,19.7196699 C11.6697984,20.0125631 12.1446721,20.0125631 12.4375653,19.7196699 C12.5782176,19.5790176 12.6572352,19.3882522 12.6572352,19.1893398 L12.6572352,15 C14.0044226,14.9188289 16.8348635,14.9157978 21.1485581,14.9909069 L21.1485586,14.9908794 C21.424644,14.9956866 21.6523523,14.7757721 21.6571595,14.4996868 C21.65721,14.4967857 21.6572352,14.4938842 21.6572352,14.4909827 L21.6572888,10.5050185 C21.6572888,10.2288465 21.4334072,10.0049649 21.1572352,10.0049649 C21.1556184,10.0049649 21.1540016,10.0049728 21.1523849,10.0049884 C16.0216074,10.0547574 13.1898909,10.0530946 12.6572352,10 Z"
                                                                        style="fill: #fff;" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </a>


                                            <h2>My History</h2>
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-light-white me-3 button_blue"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                                                            <option value="1">Attended</option>
                                                            <option value="2">Not Attended</option>
                                                            <option value="3">Cancelled</option>
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

                                        </div>
                                        <!--end::Toolbar-->

                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Addresses-->
                                    <div id="loader_div" style="text-align: center;">
                                        <div class="loader">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    </div>

                                    <div id="card_row_div" class="row gx-9 gy-6">

                                    </div>
                                    <!--end::Addresses-->
                                    <!--begin::Pagination-->
                                    <div id="pagination_card_div" class="d-flex flex-stack flex-wrap pt-10">

                                        <!--end::Pages-->
                                    </div>
                                    <!--end::Pagination-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end::Container-->


                        <div class="modal fade" id="client_feedback_view_modal" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2>Feedback</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body mx-2 mx-md-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="submit_feedback" class="form" action="#">

                                            <div  class="fv-row mb-7">
                                                <div class="rating">
                                                    <input type="radio" name="rating" value="5" id="rating-5">
                                                    <label for="rating-5"></label>
                                                    <input type="radio" name="rating" value="4" id="rating-4">
                                                    <label for="rating-4"></label>
                                                    <input type="radio" name="rating" value="3" id="rating-3">
                                                    <label for="rating-3"></label>
                                                    <input type="radio" name="rating" value="2" id="rating-2">
                                                    <label for="rating-2"></label>
                                                    <input type="radio" name="rating" value="1" id="rating-1">
                                                    <label for="rating-1"></label>
                                                    <div class="emoji-wrapper">
                                                        <div class="emoji">
                                                            <svg class="rating-0" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256"
                                                                    fill="#F4C027" />
                                                                <path
                                                                    d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z"
                                                                    fill="#f4c534" />
                                                                <ellipse
                                                                    transform="scale(-1) rotate(31.21 715.433 -595.455)"
                                                                    cx="166.318" cy="199.829" rx="56.146"
                                                                    ry="56.13" fill="#fff" />
                                                                <ellipse transform="rotate(-148.804 180.87 175.82)"
                                                                    cx="180.871" cy="175.822" rx="28.048"
                                                                    ry="28.08" fill="#3e4347" />
                                                                <ellipse transform="rotate(-113.778 194.434 165.995)"
                                                                    cx="194.433" cy="165.993" rx="8.016"
                                                                    ry="5.296" fill="#5a5f63" />
                                                                <ellipse
                                                                    transform="scale(-1) rotate(31.21 715.397 -1237.664)"
                                                                    cx="345.695" cy="199.819" rx="56.146"
                                                                    ry="56.13" fill="#fff" />
                                                                <ellipse transform="rotate(-148.804 360.25 175.837)"
                                                                    cx="360.252" cy="175.84" rx="28.048"
                                                                    ry="28.08" fill="#3e4347" />
                                                                <ellipse
                                                                    transform="scale(-1) rotate(66.227 254.508 -573.138)"
                                                                    cx="373.794" cy="165.987" rx="8.016"
                                                                    ry="5.296" fill="#5a5f63" />
                                                                <path
                                                                    d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z"
                                                                    fill="#3e4347" />
                                                            </svg>
                                                            <svg class="rating-1" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256"
                                                                    fill="#F4C027" />
                                                                <path
                                                                    d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                    fill="#f4c534" />
                                                                <path
                                                                    d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z"
                                                                    fill="#f4c534" />
                                                                <path
                                                                    d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z"
                                                                    fill="#fff" />
                                                                <path
                                                                    d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z"
                                                                    fill="#fff" />
                                                                <path
                                                                    d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z"
                                                                    fill="#f4c534" />
                                                                <path
                                                                    d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z"
                                                                    fill="#fff" />
                                                                <path
                                                                    d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z"
                                                                    fill="#fff" />
                                                            </svg>
                                                            <svg class="rating-2" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256"
                                                                    fill="#F4C027" />
                                                                <path
                                                                    d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                    fill="#f4c534" />
                                                                <path
                                                                    d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z"
                                                                    fill="#fff" />
                                                                <circle cx="340" cy="260.4" r="36.2"
                                                                    fill="#3e4347" />
                                                                <g fill="#fff">
                                                                    <ellipse transform="rotate(-135 326.4 246.6)"
                                                                        cx="326.4" cy="246.6" rx="6.5"
                                                                        ry="10" />
                                                                    <path
                                                                        d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                                                </g>
                                                                <circle cx="168.5" cy="260.4" r="36.2"
                                                                    fill="#3e4347" />
                                                                <ellipse transform="rotate(-135 182.1 246.7)"
                                                                    cx="182.1" cy="246.7" rx="10"
                                                                    ry="6.5" fill="#fff" />
                                                            </svg>
                                                            <svg class="rating-3" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256"
                                                                    fill="#F4C027" />
                                                                <path
                                                                    d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                    fill="#f4c534" />
                                                                <g fill="#fff">
                                                                    <path
                                                                        d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                                                    <ellipse cx="356.4" cy="205.3" rx="81.1"
                                                                        ry="81" />
                                                                </g>
                                                                <ellipse cx="356.4" cy="205.3" rx="44.2"
                                                                    ry="44.2" fill="#3e4347" />
                                                                <g fill="#fff">
                                                                    <ellipse transform="scale(-1) rotate(45 454 -906)"
                                                                        cx="375.3" cy="188.1" rx="12"
                                                                        ry="8.1" />
                                                                    <ellipse cx="155.6" cy="205.3" rx="81.1"
                                                                        ry="81" />
                                                                </g>
                                                                <ellipse cx="155.6" cy="205.3" rx="44.2"
                                                                    ry="44.2" fill="#3e4347" />
                                                                <ellipse transform="scale(-1) rotate(45 454 -421.3)"
                                                                    cx="174.5" cy="188" rx="12"
                                                                    ry="8.1" fill="#fff" />
                                                            </svg>
                                                            <svg class="rating-4" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <circle cx="256" cy="256" r="256"
                                                                    fill="#F4C027" />
                                                                <path
                                                                    d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z"
                                                                    fill="#f4c534" />
                                                                <path
                                                                    d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                                                    fill="#e24b4b" />
                                                                <path
                                                                    d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z"
                                                                    fill="#d03f3f" />
                                                                <path
                                                                    d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                                                    fill="#fff" />
                                                                <path
                                                                    d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z"
                                                                    fill="#e24b4b" />
                                                                <path
                                                                    d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z"
                                                                    fill="#d03f3f" />
                                                                <path
                                                                    d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z"
                                                                    fill="#fff" />
                                                                <path
                                                                    d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z"
                                                                    fill="#e24b4b" />
                                                            </svg>
                                                            <svg class="rating-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <g fill="#F4C027">
                                                                    <circle cx="256" cy="256"
                                                                        r="256" />
                                                                    <path
                                                                        d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                                                </g>
                                                                <path
                                                                    d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z"
                                                                    fill="#e9eff4" />
                                                                <path
                                                                    d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                                                    fill="#45cbea" />
                                                                <path
                                                                    d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z"
                                                                    fill="#e84d88" />
                                                                <g fill="#38c0dc">
                                                                    <path
                                                                        d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                                                </g>
                                                                <g fill="#d23f77">
                                                                    <path
                                                                        d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                                                </g>
                                                                <path
                                                                    d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z"
                                                                    fill="#3e4347" />
                                                                <path
                                                                    d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z"
                                                                    fill="#e24b4b" />
                                                                <path
                                                                    d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z"
                                                                    fill="#fff" opacity=".2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <label class=" fw-bold fs-6 mb-2">Comment</label>
                                                <!-- First Name Column -->
                                                <div class="fv-row">
                                                    <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" cols="50"></textarea>
                                                    <div class="validation-message"></div>
                                                </div>

                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="submit"
                                                    class="btn btn-primary">
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

                    </div>
                    <!--end::Content-->

                    <!--end::Content-->
                    <!--begin::Footer-->
                    {{-- <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                        <!--begin::Container-->
                        <div class="container-xxl d-flex flex-column flex-md-row flex-stack">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-gray-400 fw-bold me-1">2023 @CITY GOVERNMENT OF</span>
                                <a href="https://www.taguig.gov.ph/OfficialWebsite/" target="_blank"
                                    class="text-muted text-hover-primary fw-bold me-2 fs-6">Taguig</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                                <li class="menu-item">
                                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://keenthemes.com/support" target="_blank"
                                        class="menu-link px-2">Support</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://1.envato.market/EA4JP" target="_blank"
                                        class="menu-link px-2">Purchase</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Container-->
                    </div> --}}
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->

        <!--begin::Modal - Select Location-->
        <div class="modal fade" id="kt_modal_select_location" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-1000px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Title-->
                        <h2>Select Location</h2>
                        <!--end::Title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div id="kt_modal_select_location_map" class="w-100 rounded" style="height:450px"></div>
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer d-flex justify-content-end">
                        <a href="#" class="btn btn-active-light me-5" data-bs-dismiss="modal">Cancel</a>
                        <button type="button" id="kt_modal_select_location_button" class="btn btn-primary"
                            data-bs-dismiss="modal">Apply</button>
                    </div>
                    <!--end::Modal footer-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Select Location-->
        <!--end::Modals-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                        transform="rotate(90 13 6)" fill="black" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->
        <!--end::Main-->



    </div>
    <!--end::Body-->
@endsection

@push('scripts')
    <script src="/client/js/schedule_history.js"></script>
    <script src="/client/plugins/custom/datatables/datatables.bundle.js"></script>
@endpush
