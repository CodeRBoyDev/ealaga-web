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
                                                <input type="text" data-kt-volunteer-filter="search"
                                                    class="form-control form-control-solid w-250px ps-14"
                                                    placeholder="Search Volunteer" />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Add Volunteer-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_volunteer">
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
                                                    <!--end::Svg Icon-->Add Opportunity
                                                </button>
                                                <!--end::Add Volunteer-->
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::Modal - Adjust Balance-->
                                            <!--end::Modal - New Card-->
                                            <!--begin::Modal - Add task-->
                                            <div class="modal fade" id="kt_modal_add_volunteer" tabindex="-1"
                                                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-600px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header d-flex align-items-center justify-content-between"
                                                            id="kt_modal_add_volunteer_header">
                                                            <!--begin::Modal title-->
                                                            <div class="mx-auto">
                                                                <h2 class="fw-bolder">Create New Volunteer Opportunity</h2>
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
                                                                            style="fill:black" />
                                                                        <rect x="7.41422" y="6"
                                                                            width="16" height="2" rx="1"
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
                                                            <form id="kt_modal_add_volunteer_form" class="form"
                                                                action="#" enctype="multipart/form-data">
                                                                @csrf
                                                                <!--begin::Scroll-->
                                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                    id="kt_modal_add_volunteer_scroll"
                                                                    data-kt-scroll-max-height="auto"
                                                                    data-kt-scroll-dependencies="#kt_modal_add_volunteer_header"
                                                                    data-kt-scroll-wrappers="#kt_modal_add_volunteer_scroll"
                                                                    data-kt-scroll-offset="300px">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <label class="required fw-bold fs-6 mb-2">
                                                                            Position
                                                                        </label>
                                                                        <!-- First Name Column -->
                                                                        <div class="fv-row ">
                                                                            <input type="text" name="title"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                placeholder="Title" required />
                                                                            <div class="validation-message"></div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <label
                                                                            class="required fw-bold fs-6 mb-2">Description</label>
                                                                        <!-- First Name Column -->
                                                                        <div class="fv-row">
                                                                            <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" cols="50"
                                                                            placeholder="Description" required></textarea>
                                                                            <div class="validation-message"></div>
                                                                        </div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <div class="row">
                                                                            <!-- Date Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="required fw-bold fs-6 mb-2">Date Schedule</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Birthday Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="date" name="date" class="form-control form-control-solid mb-3 mb-lg-0  " placeholder="Date" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Time Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="required fw-bold fs-6 mb-2">Time Schedule</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Time Picker Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="time" name="time" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Time" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb -7">
                                                                        <div class="row">
                                                                            <!-- Contact Number Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="fw-bold fs-6 mb-2">Skill</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Contact Number Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="text" name="skill" class="form-control form-control-solid mb-3 mb-lg-0  " placeholder="Skill" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Username Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class=" required fw-bold fs-6 mb-2">Vacant</label>
                                                                                    <div class="row g-3">
                                                                                        <div class="fv-row col">
                                                                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select Vacancy" data-allow-clear="true" data-kt-user-table-filter="vacant" id="vacant" name="vacant" data-hide-search="true" tabindex="0" aria-hidden="false" required>
                                                                                                <option value="">Select vacancies
                                                                                                </option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                <option value="5">5</option>
                                                                                                <option value="6">6</option>
                                                                                                <option value="7">7</option>
                                                                                                <option value="8">8</option>
                                                                                            </select>
                                                                                            <div class="validation-message"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <!--end::Scroll-->
                                                                <!--begin::Actions-->
                                                                <div class="text-center pt-15">
                                                                    <button type="reset" class="btn btn-light me-3"
                                                                        data-kt-volunteer-modal-action="cancel">Discard</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        data-kt-volunteer-modal-action="submit">
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
                                            <!--begin::Modal - Edit task-->
                                            <div class="modal fade" id="kt_modal_edit_volunteer" tabindex="-1"
                                                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <div class="modal-dialog modal-dialog-centered mw-600px">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex align-items-center justify-content-between"
                                                            id="kt_modal_edit_volunteer_header">
                                                            <div class="mx-auto">
                                                                <h2 class="fw-bolder">Edit Volunteer Information</h2>
                                                            </div>
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
                                                                            style="fill:black" />
                                                                        <rect x="7.41422" y="6"
                                                                            width="16" height="2" rx="1"
                                                                            transform="rotate(45 7.41422 6)"
                                                                            style="fill:black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                        </div>
                                                        <div class="modal-body mx-5 mx-xl-15 my-7">
                                                            <form id="kt_modal_edit_volunteer_form" class="form"
                                                                action="#" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                    id="kt_modal_add_volunteer_scroll"
                                                                    data-kt-scroll-max-height="auto"
                                                                    data-kt-scroll-dependencies="#kt_modal_add_volunteer_header"
                                                                    data-kt-scroll-wrappers="#kt_modal_add_volunteer_scroll"
                                                                    data-kt-scroll-offset="300px">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <label class="required fw-bold fs-6 mb-2">
                                                                            Position
                                                                        </label>
                                                                        <!-- First Name Column -->
                                                                        <div class="fv-row ">
                                                                            <input type="text" name="title"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0  "
                                                                                placeholder="Title" required />
                                                                            <div class="validation-message"></div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <label
                                                                            class="required fw-bold fs-6 mb-2">Description</label>
                                                                        <!-- First Name Column -->
                                                                        <div class="fv-row">
                                                                            <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" cols="50"
                                                                            placeholder="Description" required></textarea>
                                                                            <div class="validation-message"></div>
                                                                        </div>

                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <div class="row">
                                                                            <!-- Date Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="required fw-bold fs-6 mb-2">Date Schedule</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Birthday Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="date" name="date" class="form-control form-control-solid mb-3 mb-lg-0  " placeholder="Date" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Time Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="required fw-bold fs-6 mb-2">Time Schedule</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Time Picker Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="time" name="time" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Time" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb -7">
                                                                        <div class="row">
                                                                            <!-- Contact Number Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class="required fw-bold fs-6 mb-2">Skill</label>
                                                                                    <div class="row g-3">
                                                                                        <!-- Contact Number Input -->
                                                                                        <div class="fv-row col">
                                                                                            <input type="text" name="skill" class="form-control form-control-solid mb-3 mb-lg-0  " placeholder="Skill" required>
                                                                                            <div class="validation-message">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Username Column -->
                                                                            <div class="col-md-6">
                                                                                <div class="fv-row mb-7">
                                                                                    <label class=" required fw-bold fs-6 mb-2">Vacant</label>
                                                                                    <div class="row g-3">
                                                                                        <div class="fv-row col">
                                                                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                                                                            data-placeholder="Select Vacancy" data-allow-clear="true"
                                                                                            data-kt-user-table-filter="vacant" id="vacant" name="vacant"
                                                                                            data-hide-search="true" required>
                                                                                                <option value="">Select vacancies
                                                                                                </option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                <option value="5">5</option>
                                                                                                <option value="6">6</option>
                                                                                                <option value="7">7</option>
                                                                                                <option value="8">8</option>
                                                                                            </select>
                                                                                            <div class="validation-message"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                </div>
                                                                <div class="text-center pt-15">
                                                                    <button type="reset" class="btn btn-light me-3"
                                                                        data-kt-edit-volunteer-modal-action="cancel">Discard</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        data-kt-edit-volunteer-modal-action="submit">
                                                                        <span class="indicator-label">Save Changes</span>
                                                                        <span class="indicator-progress">Please
                                                                            wait...<span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Modal - Edit task-->

                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                            id="kt_table_volunteer">
                                            <!--begin::Table head-->
                                            <thead class="align-middle">
                                                <!--begin::Table row-->
                                                <tr class=" text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class=" ">Title</th>
                                                    <th class=" ">Description</th>
                                                    <th class=" ">Scheduled date</th>
                                                    <th class=" ">Scheduled time</th>
                                                    <th class=" ">Skill</th>
                                                    <th class=" ">Vacant</th>
                                                    <th class=" ">Created</th>
                                                    <th class=" ">Actions</th>
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
    <script src="{{ asset('admin/js/custom/volunteer/list.js') }}"></script>
    <!--end::Page Vendors Javascript-->
@endpush
