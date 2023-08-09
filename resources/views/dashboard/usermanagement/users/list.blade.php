@extends('layouts.master')
@push('adminStyles ')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
@endpush
@section('content')
    <!--begin::Body-->
    <div class="header-tablet-and-mobile-fixed aside-enabled">
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
                                                <input type="text" data-kt-user-table-filter="search"
                                                    class="form-control form-control-solid w-250px ps-14"
                                                    placeholder="Search user" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Filter-->
                                                <button type="button" class="btn btn-light-primary me-3"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Filter</button>
                                                <!--begin::Menu 1-->
                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                    data-kt-menu="true">
                                                    <!--begin::Header-->
                                                    <div class="px-7 py-5">
                                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Separator-->
                                                    <div class="separator border-gray-200"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::Content-->
                                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10">
                                                            <label class="form-label fs-6 fw-bold">Role:</label>
                                                            <select class="form-select form-select-solid fw-bolder"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-allow-clear="true" data-kt-user-table-filter="role"
                                                                data-hide-search="true">
                                                                <option></option>
                                                                <option value="0">Administrator</option>
                                                                <option value="1">Personnel</option>
                                                                <option value="2">Client</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-10">
                                                            <label class="form-label fs-6 fw-bold">Barangay:</label>
                                                            <select class="form-select form-select-solid fw-bolder"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-allow-clear="true" data-kt-user-table-filter="barangay"
                                                                data-hide-search="true">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Actions-->
                                                        <div class="d-flex justify-content-end">
                                                            <button type="reset"
                                                                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                                data-kt-menu-dismiss="true"
                                                                data-kt-user-table-filter="reset">Reset</button>
                                                            <button type="submit" class="btn btn-primary fw-bold px-6"
                                                                data-kt-menu-dismiss="true"
                                                                data-kt-user-table-filter="filter">Apply</button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Menu 1-->
                                                <!--end::Filter-->
                                                <!--begin::Add user-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_user">
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
                                                    <!--end::Svg Icon-->Add User
                                                </button>
                                                <!--end::Add user-->
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::Modal - Adjust Balance-->
                                            <!--end::Modal - New Card-->
                                            <!--begin::Modal - Add task-->
                                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1"
                                                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-800px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header d-flex align-items-center justify-content-between"
                                                            id="kt_modal_add_user_header">
                                                            <!--begin::Modal title-->
                                                            <div class="mx-auto">
                                                                <h2 class="fw-bolder">Create New User</h2>
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
                                                            <!--begin::Form-->
                                                            <form id="kt_modal_add_user_form" class="form"
                                                                action="#" enctype="multipart/form-data">
                                                                @csrf
                                                                <!--begin::Scroll-->
                                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                    id="kt_modal_add_user_scroll"
                                                                    data-kt-scroll-max-height="auto"
                                                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                    data-kt-scroll-offset="300px">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7 text-center">
                                                                        <!--begin::Label-->
                                                                        <label class="d-block fw-bold fs-6 mb-5">
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Image input-->
                                                                        <div class="image-input image-input-outline"
                                                                            data-kt-image-input="true"
                                                                            style="background-image: url{{ asset('admin/media/avatars/blank.png') }})">
                                                                            <!--begin::Preview existing avatar-->
                                                                            <div class="image-input-wrapper w-125px h-125px rounded-circle"
                                                                                style="background-image: url({{ asset('admin/media/avatars/blank.png') }}); border-radius: 50%; overflow: hidden;">
                                                                            </div>
                                                                            <!--end::Preview existing avatar-->
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                data-kt-image-input-action="change"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Change avatar">
                                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                                <!--begin::Inputs-->
                                                                                <input type="file" name="avatar"
                                                                                    accept=".png, .jpg, .jpeg" />
                                                                                {{-- <input type="hidden"
                                                                                    name="avatar_remove" /> --}}
                                                                                <!--end::Inputs-->
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Cancel-->
                                                                            <span
                                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                data-kt-image-input-action="cancel"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Cancel avatar">
                                                                                <i class="bi bi-x fs-2"></i>
                                                                            </span>
                                                                            <!--end::Cancel-->
                                                                            <!--begin::Remove-->
                                                                            <span
                                                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                data-kt-image-input-action="remove"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Remove avatar">
                                                                                <i class="bi bi-x fs-2"></i>
                                                                            </span>
                                                                            <!--end::Remove-->
                                                                        </div>
                                                                        <!--end::Image input-->
                                                                        <!--begin::Hint-->
                                                                        <div class="form-text">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="d-block fw-bold fs-6 mb-5">Profile
                                                                                Picture <br>Allowed file types: png,
                                                                                jpg, jpeg.</label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Hint-->
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <legend class="goupBoxHeader text-center"
                                                                        style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                                                        Personal Information</legend>
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <label class="required fw-bold fs-6 mb-2">Full
                                                                            Name</label>
                                                                        <div class="row g-3">
                                                                            <!-- First Name Column -->
                                                                            <div class="fv-row col">
                                                                                <input type="text" name="first_name"
                                                                                    class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                    placeholder="First name" />
                                                                                <div class="validation-message"></div>
                                                                            </div>
                                                                            <!-- Middle Name Column -->
                                                                            <div class="fv-row col">
                                                                                <input type="text" name="middle_name"
                                                                                    class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                    placeholder="Middle name" />
                                                                                <div class="form-check form-check-inline"
                                                                                    style="margin-top: 10px;">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        id="no_middle_name_checkbox">
                                                                                    <label class="form-check-label"
                                                                                        for="no_middle_name_checkbox">No
                                                                                        Middle Name?</label>
                                                                                </div>
                                                                                <div class="validation-message"></div>
                                                                            </div>
                                                                            <!-- Last Name Column -->
                                                                            <div class="fv-row col">
                                                                                <input type="text" name="last_name"
                                                                                    class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                    placeholder="Last name" />
                                                                                <div class="validation-message"></div>
                                                                            </div>
                                                                            <!-- Suffix Column -->
                                                                            <div class="fv-row col">
                                                                                <select
                                                                                    class="form-select form-select-solid fw-bolder"
                                                                                    data-kt-select2="true"
                                                                                    data-placeholder="Select Suffix"
                                                                                    data-allow-clear="true"
                                                                                    data-kt-user-table-filter="suffix"
                                                                                    id="suffix" name="suffix"
                                                                                    data-hide-search="true">
                                                                                    <option value="">Select
                                                                                        Suffix
                                                                                    </option>
                                                                                    <option value="Jr.">Jr.</option>
                                                                                    <option value="Jr. II">Jr. II
                                                                                    </option>
                                                                                    <option value="Sr.">Sr.</option>
                                                                                    <option value="II">II</option>
                                                                                    <option value="III">III</option>
                                                                                    <option value="IV">IV</option>
                                                                                    <option value="V">V</option>
                                                                                    <option value="VI">VI</option>
                                                                                    <!-- Add other suffix options here -->
                                                                                </select>
                                                                                <div class="validation-message"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <div class="row">
                                                                            <!-- Contact Number Column -->
                                                                            <div class="col-md-4">
                                                                                <div class="fv-row mb-7">
                                                                                    <label
                                                                                        class="  fw-bold fs-6 mb-2">Contact
                                                                                        Number</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Contact Number Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="text"
                                                                                                name="contact_number"
                                                                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                                placeholder="Contact number" />
                                                                                            <div
                                                                                                class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Birthday Column -->
                                                                            <div class="col-md-4">
                                                                                <div class="fv-row mb-7">
                                                                                    <label
                                                                                        class="  fw-bold fs-6 mb-2">Birthday</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Birthday Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="date"
                                                                                                name="birthday"
                                                                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                                placeholder="Birthday" />
                                                                                            <div
                                                                                                class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Username Column -->
                                                                            <div class="col-md-4">
                                                                                <div class="fv-row mb-7">
                                                                                    <label
                                                                                        class=" required fw-bold fs-6 mb-2">Username</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Username Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="text"
                                                                                                name="username"
                                                                                                class="form-control form-control-solid mb-3 mb-lg-0   "
                                                                                                placeholder="Username" />
                                                                                            <div
                                                                                                class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <!--begin::Label-->
                                                                        <label class="  fw-bold fs-6 mb-2">Email</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="email" name="user_email"
                                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                                            placeholder="example@gmail.com" />
                                                                        <!--end::Input-->
                                                                        <div class="validation-message"></div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin:: Location group-->
                                                                    <fieldset class="fv-row mb-7">
                                                                        <legend class="goupBoxHeader text-center"
                                                                            style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                                                            Location</legend>
                                                                        <div class="row">
                                                                            <div class="fv-row mb-7">
                                                                                <div class="form-group label-animate">
                                                                                    <label class="required">Barangay
                                                                                    </label>
                                                                                    <select
                                                                                        class="form-select form-select-solid fw-bolder"
                                                                                        data-kt-select2="true"
                                                                                        data-placeholder="Select option"
                                                                                        data-allow-clear="true"
                                                                                        data-kt-user-table-filter="barangay"
                                                                                        data-hide-search="true"
                                                                                        id="brgy" name="brgyId"
                                                                                        required>
                                                                                        <option disabled selected
                                                                                            value="">Select Barangay
                                                                                        </option>

                                                                                        <!-- Add your barangay options here -->
                                                                                    </select>
                                                                                    <small
                                                                                        class="text-danger font-weight-bold"
                                                                                        id="loadingAddress"
                                                                                        style="display: none;">Loading
                                                                                        barangay. Please wait...</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group label-animate">
                                                                                    <label>Room/Flr/Unit No. &amp;
                                                                                        Bldg</label>
                                                                                    <input type="text" name="unitNo"
                                                                                        class="form-control form-control-solid mb-3 mb-lg-0 "
                                                                                        placeholder="Room/Flr/Unit No. &amp; Bldg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>House/Lot &amp; Block
                                                                                        No.</label>
                                                                                    <input type="text" name="houseNo"
                                                                                        class="form-control form-control-solid mb-3 mb-lg-0 "
                                                                                        placeholder="House/Lot &amp; Block No.">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Street </label>
                                                                                    <input type="text" name="street"
                                                                                        class="form-control form-control-solid mb-3 mb-lg-0 "
                                                                                        placeholder="Street">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Subd./ Phase/ Purok</label>
                                                                                    <input type="text" name="village"
                                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                        placeholder="Subd./ Phase/ Purok">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <!--end:: Location group-->

                                                                    <!--begin::Permission group-->
                                                                    <div class="mb-7">
                                                                        <legend class="goupBoxHeader text-center"
                                                                            style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                                                            Permission</legend>
                                                                        <!--begin::Label-->
                                                                        <label
                                                                            class="required fw-bold fs-6 mb-5">Role</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Roles-->
                                                                        <!--begin::Input row-->
                                                                        <div class="d-flex fv-row">
                                                                            <!--begin::Radio-->
                                                                            <div
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input class="form-check-input me-3"
                                                                                    name="user_role" type="radio"
                                                                                    value="0"
                                                                                    id="kt_modal_update_role_option_0"
                                                                                    checked='checked' />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <label class="form-check-label"
                                                                                    for="kt_modal_update_role_option_0">
                                                                                    <div class="fw-bolder text-gray-800">
                                                                                        Administrator</div>
                                                                                    <div class="text-gray-600">The
                                                                                        admin
                                                                                        plays a key role in overseeing
                                                                                        the
                                                                                        system and ensuring its smooth
                                                                                        operation.</div>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                            </div>
                                                                            <!--end::Radio-->
                                                                        </div>
                                                                        <!--end::Input row-->
                                                                        <div class='separator separator-dashed my-5'>
                                                                        </div>
                                                                        <!--begin::Input row-->
                                                                        <div class="d-flex fv-row">
                                                                            <!--begin::Radio-->
                                                                            <div
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input class="form-check-input me-3"
                                                                                    name="user_role" type="radio"
                                                                                    value="1"
                                                                                    id="kt_modal_update_role_option_1" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <label class="form-check-label"
                                                                                    for="kt_modal_update_role_option_1">
                                                                                    <div class="fw-bolder text-gray-800">
                                                                                        Personnel</div>
                                                                                    <div class="text-gray-600">Refers
                                                                                        to
                                                                                        the employees or workforce of an
                                                                                        organization or business</div>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                            </div>
                                                                            <!--end::Radio-->
                                                                        </div>
                                                                        <!--end::Input row-->
                                                                        <div class='separator separator-dashed my-5'>
                                                                        </div>
                                                                        <!--begin::Input row-->
                                                                        <div class="d-flex fv-row">
                                                                            <!--begin::Radio-->
                                                                            <div
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <!--begin::Input-->
                                                                                <input class="form-check-input me-3"
                                                                                    name="user_role" type="radio"
                                                                                    value="2"
                                                                                    id="kt_modal_update_role_option_3" />
                                                                                <!--end::Input-->
                                                                                <!--begin::Label-->
                                                                                <label class="form-check-label"
                                                                                    for="kt_modal_update_role_option_3">
                                                                                    <div class="fw-bolder text-gray-800">
                                                                                        Client</div>
                                                                                    <div class="text-gray-600">Refers
                                                                                        to
                                                                                        the end-users or
                                                                                        individuals who use the
                                                                                        application
                                                                                        or software to access its
                                                                                        functionalities and services
                                                                                    </div>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                            </div>
                                                                            <!--end::Radio-->
                                                                        </div>
                                                                        <!--end::Input row-->
                                                                        <div class='separator separator-dashed my-5'>
                                                                        </div>
                                                                        <!--end::Roles-->
                                                                    </div>
                                                                    <!--end::Permission group-->
                                                                    <!--begin::Attachment group-->
                                                                    <div class="fv-row mb-7">
                                                                        <legend class="goupBoxHeader text-center"
                                                                            style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                                                            Attachment
                                                                        </legend>
                                                                        <!--begin::Label-->
                                                                        <label class="fw-bold fs-6 mb-5">Valid ID</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Roles-->
                                                                        <!--begin::Input row-->
                                                                        <div class="d-flex fv-row"
                                                                            style="flex-wrap: wrap; gap: 10px;">
                                                                            <!--begin::Attachment-->
                                                                            <input type="file" id="attachmentInput"
                                                                                name="valid_id[]" multiple>
                                                                            <div class="attachment-preview"
                                                                                style="display: none; flex-wrap: wrap; gap: 5px; padding: 5px; border: 1px solid #ddd; border-radius: 5px; justify-content: flex-start;">
                                                                            </div>
                                                                            <!--end::Attachment-->
                                                                        </div>
                                                                        <!--end::Input row-->
                                                                        <button id="removeAllButton"
                                                                            style="display: none;"
                                                                            class="btn btn-danger me-3">Remove
                                                                            FIles
                                                                        </button>
                                                                    </div>
                                                                    <!--end::Attachment group-->
                                                                </div>
                                                                <!--end::Scroll-->
                                                                <!--begin::Actions-->
                                                                <div class="text-center pt-15">
                                                                    <button type="reset" class="btn btn-light me-3"
                                                                        data-kt-users-modal-action="cancel">Discard</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        data-kt-users-modal-action="submit">
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
                                            <!--end::Modal - Add task-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                            <!--begin::Table head-->
                                            <thead class="align-middle">
                                                <!--begin::Table row-->
                                                <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-120px">User</th>
                                                    <th class="min-w-120px">Role</th>
                                                    <th class="min-w-120px">Birthday</th>
                                                    <th class="min-w-120px">Contact#</th>
                                                    <th class="min-w-120px">Address</th>
                                                    <th class="min-w-120px">Status</th>
                                                    <th class="min-w-120px">Created</th>
                                                    <th class=" min-w-120px">Actions</th>
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
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-800px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header d-flex align-items-center justify-content-between"
                        id="kt_modal_edit_user_header">
                        <!--begin::Modal title-->
                        <div class="mx-auto">
                            <h2 class="fw-bolder">Update User Information</h2>
                        </div>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_edit_user_form" class="form" action="#" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_user_scroll"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header"
                                data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 text-center">
                                    <!--begin::Label-->
                                    <label class="d-block fw-bold fs-6 mb-5">
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url{{ asset('admin/media/avatars/blank.png') }})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px rounded-circle"
                                            id="editImageWrapper"
                                            style="background-image: url({{ asset('admin/media/avatars/blank.png') }}); border-radius: 50%; overflow: hidden;">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            {{-- <input type="hidden"
                                                                                    name="avatar_remove" /> --}}
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">
                                        <!--begin::Label-->
                                        <label class="d-block fw-bold fs-6 mb-5">Profile
                                            Picture <br>Allowed file types: png,
                                            jpg, jpeg.</label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group-->
                                <legend class="goupBoxHeader text-center"
                                    style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                    Personal Information</legend>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="required fw-bold fs-6 mb-2">Full
                                        Name</label>
                                    <div class="row g-3">
                                        <!-- First Name Column -->
                                        <div class="fv-row col">
                                            <input type="text" name="first_name"
                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                placeholder="First name" />
                                            <div class="validation-message"></div>
                                        </div>
                                        <!-- Middle Name Column -->
                                        <div class="fv-row col">
                                            <input type="text" name="middle_name"
                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                placeholder="Middle name" />
                                            <div class="form-check form-check-inline" style="margin-top: 10px;">
                                                <input class="form-check-input" type="checkbox"
                                                    id="no_middle_name_checkbox_edit">
                                                <label class="form-check-label" for="no_middle_name_checkbox_edit">No
                                                    Middle Name?</label>
                                            </div>
                                            <div class="validation-message"></div>
                                        </div>
                                        <!-- Last Name Column -->
                                        <div class="fv-row col">
                                            <input type="text" name="last_name"
                                                class="form-control form-control-solid mb-3 mb-lg-0 "
                                                placeholder="Last name" />
                                            <div class="validation-message"></div>
                                        </div>
                                        <!-- Suffix Column -->
                                        <div class="fv-row col">
                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                data-placeholder="Select Suffix" data-allow-clear="true"
                                                data-kt-user-table-filter="suffix" id="suffix" name="suffix"
                                                data-hide-search="true">
                                                <option value="">Select
                                                    Suffix
                                                </option>
                                                <option value="Jr.">Jr.</option>
                                                <option value="Jr. II">Jr. II
                                                </option>
                                                <option value="Sr.">Sr.</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <!-- Add other suffix options here -->
                                            </select>
                                            <div class="validation-message"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <!-- Contact Number Column -->
                                        <div class="col-md-4">
                                            <div class="fv-row mb-7">
                                                <label class="required fw-bold fs-6 mb-2">Contact Number</label>
                                                <div class="row g-3">
                                                    <!-- Contact Number Input -->
                                                    <div class="fv-row col">
                                                        <input type="text" name="contact_number"
                                                            class="form-control form-control-solid mb-3 mb-lg-0  "
                                                            placeholder="Contact number" />
                                                        <div class="validation-message"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Birthday Column -->
                                        <div class="col-md-4">
                                            <div class="fv-row mb-7">
                                                <label class="required fw-bold fs-6 mb-2">Birthday</label>
                                                <div class="row g-3">
                                                    <!-- Birthday Input -->
                                                    <div class="fv-row col">
                                                        <input type="date" name="birthday"
                                                            class="form-control form-control-solid mb-3 mb-lg-0  "
                                                            placeholder="Birthday" />
                                                        <div class="validation-message"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Username Column -->
                                        <div class="col-md-4">
                                            <div class="fv-row mb-7">
                                                <label class=" required fw-bold fs-6 mb-2">Username</label>
                                                <div class="row g-3">
                                                    <!-- Username Input -->
                                                    <div class="fv-row col">
                                                        <input type="text" name="username"
                                                            class="form-control form-control-solid mb-3 mb-lg-0 "
                                                            placeholder="Username" />
                                                        <div class="validation-message"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="  fw-bold fs-6 mb-2">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="user_email"
                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                        placeholder="example@gmail.com" />
                                    <!--end::Input-->
                                    <div class="validation-message"></div>

                                </div>
                                <!--end::Input group-->
                                <!--begin:: Location group-->
                                <fieldset class="fv-row mb-7">
                                    <legend class="goupBoxHeader text-center"
                                        style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                        Location</legend>
                                    <div class="row">
                                        <div class="fv-row mb-7">
                                            <div class="form-group label-animate">
                                                <label class="required">Barangay
                                                </label>
                                                <select class="form-select form-select-solid fw-bolder"
                                                    data-kt-select2="true" data-placeholder="Select option"
                                                    data-allow-clear="true" data-kt-user-table-filter="barangay"
                                                    data-hide-search="true" id="brgy" name="barangay" required>
                                                    <option disabled selected value="">Select Barangay
                                                    </option>

                                                    <!-- Add your barangay options here -->
                                                </select>
                                                <small class="text-danger font-weight-bold" id="loadingAddress"
                                                    style="display: none;">Loading
                                                    barangay. Please wait...</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-animate">
                                                <label>Room/Flr/Unit No. &amp;
                                                    Bldg</label>
                                                <input type="text" name="unitNo"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 "
                                                    placeholder="Room/Flr/Unit No. &amp; Bldg">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>House/Lot &amp; Block
                                                    No.</label>
                                                <input type="text" name="houseNo"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 "
                                                    placeholder="House/Lot &amp; Block No.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Street </label>
                                                <input type="text" name="street"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 "
                                                    placeholder="Street">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subd./ Phase/ Purok</label>
                                                <input type="text" name="village"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Subd./ Phase/ Purok">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--end:: Location group-->
                                <!--begin::Permission group-->
                                <div class="fv-row mb-7">
                                    <legend class="goupBoxHeader text-center"
                                        style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                        Permission</legend>
                                    <div class="row">
                                        <div class="col">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-5">Role</label>
                                            <!--end::Label-->
                                            <!--begin::Roles-->
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio"
                                                        value="0" id="kt_modal_update_user_role_option_0"
                                                        checked='checked' />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                        for="kt_modal_update_user_role_option_0">
                                                        <div class="fw-bolder text-gray-800">
                                                            Administrator</div>
                                                        <div class="text-gray-600">
                                                            User Type: Admin with default access level as Administrator.
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio"
                                                        value="1" id="kt_modal_update_user_role_option_1" />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                        for="kt_modal_update_user_role_option_1">
                                                        <div class="fw-bolder text-gray-800">
                                                            Personnel</div>
                                                        <div class="text-gray-600">
                                                            User Type: Personnel with default access level as Personnel.
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio"
                                                        value="3" id="kt_modal_update_user_role_option_3" />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                        for="kt_modal_update_user_role_option_3">
                                                        <div class="fw-bolder text-gray-800">
                                                            Client</div>
                                                        <div class="text-gray-600">
                                                            User Type: Client with default access level as Client.
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--end::Roles-->
                                        </div>
                                        <div class="col">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-5">Access
                                                Level</label>
                                            <!--end::Label-->
                                            <!--begin::Roles-->
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="access_level"
                                                        type="radio" value="0"
                                                        id="kt_modal_update_access_option_0" checked='checked' />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_access_option_0">
                                                        <div class="fw-bolder text-gray-800">
                                                            Administrator</div>
                                                        <div class="text-gray-600">Module : User Management , Logs ,
                                                            Anayltical Reports.</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="access_level"
                                                        type="radio" value="1"
                                                        id="kt_modal_update_access_option_1" />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_access_option_1">
                                                        <div class="fw-bolder text-gray-800">
                                                            Personnel</div>
                                                        <div class="text-gray-600">
                                                            Module: User, Schedules , Services , Health and Report
                                                            Management.
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="access_level"
                                                        type="radio" value="3"
                                                        id="kt_modal_update_access_option_3" />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_access_option_3">
                                                        <div class="fw-bolder text-gray-800">
                                                            Client</div>
                                                        <div class="text-gray-600">
                                                            Module: Client Home , Scheduling , History , Schedules and
                                                            Volunteer.
                                                        </div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'>
                                            </div>
                                            <!--end::Roles-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Permission group-->
                                <!--begin::VALID-ID group-->
                                <div class="fv-row mb-7">
                                    <legend class="goupBoxHeader text-center"
                                        style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                        Valid ID
                                    </legend>
                                    <div class="row g-3" id="valid-id-preview" style="margin:5px ; padding:2px">
                                        <!-- Valid ID previews will be added here dynamically -->
                                    </div>
                                    <div>
                                        <!--begin::Input row-->
                                        <div class="d-flex fv-row" style="flex-wrap: wrap; gap: 10px;">
                                            <!--begin::Attachment-->
                                            <input type="file" id="edit_attachmentInput" name="edit_valid_id[]"
                                                multiple>
                                            <div class="edit_attachment-preview"
                                                style="display: none; flex-wrap: wrap; gap: 5px; padding: 5px; border: 1px solid #ddd; border-radius: 5px; justify-content: flex-start;">
                                            </div>
                                            <!--end::Attachment-->
                                        </div>
                                        <!--end::Input row-->
                                        <button id="edit_removeAllButton" style="display: none;"
                                            class="btn btn-danger me-3">Remove
                                            FIles
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-bold">Status:</label>
                                        <select class="form-select form-select-solid fw-bolder" id="status-select"
                                            data-kt-select2="true" data-placeholder="Select option"
                                            data-allow-clear="true" data-kt-user-table-filter="status" name="status"
                                            data-hide-search="true">
                                            <option></option>
                                            <option value="0">Pending</option>
                                            <option value="1">Verified</option>
                                            <option value="2">Not Verified</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->

                                </div>
                                <!--end::VALID-ID group-->

                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3"
                                    data-kt-users-edit-modal-action="cancel">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-edit-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
        <!--end::Modal - Add task-->
        <!--end::Modals-->
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!-- Fancybox JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="{{ asset('admin/js/custom/user/list.js') }}"></script>
    <script src="{{ asset('admin/js/custom/user/add.js') }}"></script>
    <script src="{{ asset('admin/js/custom/user/edit.js') }}"></script>

    <!--end::Page Vendors Javascript-->
@endpush
