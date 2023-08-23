@extends('layouts.master')
@push('adminStyles')
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
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                            height="2" rx="1"
                                                            transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                        <path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" data-kt-application-filter="search"
                                                    class="form-control form-control-solid w-250px ps-14"
                                                    placeholder="Search Application" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Add Application-->
                                                <button type="button" class="btn btn-primary" id="add_application"
                                                    data-bs-target="#kt_modal_add_application">
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
                                                    <!--end::Svg Icon-->Add Application
                                                </button>
                                                <!--end::Add Volunteer-->
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::Modal - Adjust Balance-->
                                            <!--end::Modal - New Card-->
                                            <!--begin::Modal - Add task-->
                                            <div class="modal fade" id="kt_modal_add_application" tabindex="-1"
                                                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-600px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header d-flex align-items-center justify-content-between"
                                                            id="kt_modal_add_application_header">
                                                            <!--begin::Modal title-->
                                                            <div class="mx-auto">
                                                                <h2 class="fw-bolder">Create New Application</h2>
                                                            </div>
                                                            <!--end::Modal title-->
                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                data-bs-dismiss="modal">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                                            width="16" height="2" rx="1"
                                                                            transform="rotate(-45 6 17.3137)"
                                                                            style="fill:black" />
                                                                        <rect x="7.41422" y="6" width="16"
                                                                            height="2" rx="1"
                                                                            transform="rotate(45 7.41422 6)"
                                                                            style="fill:black" />
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
                                                            <form id="modal_add_application_form" class="form"
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
                                                                            <label class="required fw-semibold mb-2">Full
                                                                                Name</label>
                                                                            <!--end::Label-->
                                                                            <div class="input-group">
                                                                                <input type="text" name="fullname"
                                                                                    id="fullname"
                                                                                    class="form-control form-control-solid mb-lg-0"
                                                                                    placeholder="Full name"
                                                                                    value="" />
                                                                                <button type="button"
                                                                                    class="btn btn-light-primary"
                                                                                    id="search_fullname"
                                                                                    data-kt-menu-trigger="click"
                                                                                    data-kt-menu-placement="bottom-end">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        width="30px" height="30px"
                                                                                        viewBox="0 0 24 24" version="1.1"
                                                                                        class="kt-svg-icon">
                                                                                        <g stroke="none" stroke-width="1"
                                                                                            fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0"
                                                                                                y="0"
                                                                                                width="24"
                                                                                                height="24" />
                                                                                            <path
                                                                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                                                style="fill: #fff;"
                                                                                                fill-rule="nonzero"
                                                                                                opacity="0.3" />
                                                                                            <path
                                                                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                                                style="fill: #fff;"
                                                                                                fill-rule="nonzero" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <span
                                                                                        id="admin_indicator_search_loading"
                                                                                        style="display: none;">
                                                                                        <span
                                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                                </button>

                                                                                <!--begin::Menu 1-->
                                                                                <div id="search_name_container"
                                                                                    style="margin: 0 !important;"
                                                                                    class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                                                    data-kt-menu="true">
                                                                                    <!--begin::Header-->
                                                                                    <div class="px-7 py-5">
                                                                                        <div id="title_search"
                                                                                            class="fs-5 text-dark fw-bold">
                                                                                            Search Results</div>
                                                                                    </div>


                                                                                    <!--end::Header-->
                                                                                    <!--begin::Separator-->
                                                                                    <div class="separator border-gray-200">
                                                                                    </div>
                                                                                    <!--end::Separator-->
                                                                                    <!--begin::Content-->
                                                                                    <div class="px-7 py-5"
                                                                                        data-kt-user-table-filter="form">

                                                                                        <!--begin::Input group-->
                                                                                        <!--begin::Items-->
                                                                                        <div class="mb-7">
                                                                                            <div
                                                                                                class="scroll-y mh-200px mh-lg-325px">

                                                                                                <!--begin::Item-->
                                                                                                <span
                                                                                                    id="indicator_search_loading_result">
                                                                                                    <span
                                                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                                                                                                <div
                                                                                                    id="search_result_div">

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


                                                                    <div id="application_content">

                                                                        <!--begin::Col-->
                                                                        <div class="fv-row mb-7">
                                                                            <label
                                                                                class="required fs-6 fw-semibold mb-2">Position</label>
                                                                            <select class="form-select form-select-solid "
                                                                                data-control="select2"
                                                                                data-hide-search="true"
                                                                                data-placeholder="Select a position"
                                                                                id="volunteer" name="volunteer"
                                                                                data-required="true">

                                                                                @foreach ($volunteers as $volunteer)
                                                                                    <option value="{{ $volunteer->id }}">
                                                                                        {{ $volunteer->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Col-->

                                                                        <div class="text-center pt-15">
                                                                            <button type="reset"
                                                                                class="btn btn-light me-3"
                                                                                data-bs-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                data-kt-application-modal-action="submit">
                                                                                <span class="indicator-label">Submit</span>
                                                                                <span class="indicator-progress">Please
                                                                                    wait...
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
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_table_application">
                                            <!--begin::Table head-->
                                            <thead class="align-middle">
                                                <!--begin::Table row-->
                                                <tr class=" text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class=" ">User ID</th>
                                                    <th class=" ">Name</th>
                                                    <th class=" ">Position</th>
                                                    <th class=" ">Vacant</th>
                                                    <th class=" ">Status</th>
                                                    <th class=" ">Application date</th>
                                                    <th class=" ">Attendace</th>
                                                    <th class=" ">Scheduled date</th>
                                                    <th class=" ">Actions</th>
                                                    <th class=" ">Attendance</th>
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
        <!--end::Modals-->
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/custom/application/list.js') }}"></script>
    <!--end::Page Vendors Javascript-->
@endpush
