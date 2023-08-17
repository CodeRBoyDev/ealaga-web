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
                                              <h1>Services</h1>
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                               
                                                <!--begin::Add user-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_service">
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
                                                    <!--end::Svg Icon-->Add Service
                                                </button>
                                                <!--end::Add user-->
                                            </div>
                                            <!--end::Toolbar-->
                                            <!--begin::Modal - Adjust Balance-->
                                            <!--end::Modal - New Card-->
                                            <!--begin::Modal - Add task-->
                                            <div class="modal fade" id="kt_modal_add_service" tabindex="-1"
                                                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-600px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header d-flex align-items-center justify-content-between"
                                                            id="kt_modal_add_user_header">
                                                            <!--begin::Modal title-->
                                                            <div class="mx-auto">
                                                                <h2 class="fw-bolder">Create New Service</h2>
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
                                                            <form id="modal_add_service_form" class="form"
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
                                                                                title="Change icon">
                                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                                <!--begin::Inputs-->
                                                                                <input type="file" id="add_icon" name="add_icon"
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
                                                                                class="d-block fw-bold fs-6 mb-5">Icon<br>Allowed file types: png,
                                                                                jpg, jpeg, Svg.</label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Hint-->
                                                                    </div>
                                                                    <!--end::Input group-->

                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-7">
                                                                        <!--begin::Label-->
                                                                        <label class="  fw-bold fs-6 mb-2">Title</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <input type="text" name="add_title" id="title"
                                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                                            placeholder="title..." />
                                                                        <!--end::Input-->
                                                                        <div class="validation-message"></div>

                                                                    </div>
                                                                    <div class="fv-row mb-7">
                                                                        <!--begin::Label-->
                                                                        <label class="  fw-bold fs-6 mb-2">Description</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <textarea name="add_description" id="description" placeholder="description..." class="form-control form-control-solid mb-3 mb-lg-0" rows="5" cols="50"></textarea>
                                                                        <!--end::Input-->
                                                                        <div class="validation-message"></div>

                                                                    </div>

                                                                    <!--begin::Dropzone-->
                                                                    {{-- <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                                                        <!--begin::Controls-->
                                                                        <div class="dropzone-panel mb-4">
                                                                            <a class="dropzone-select btn btn-sm btn-primary me-2">Attach Image</a>
                                                                            <a class="dropzone-upload btn btn-sm btn-light-primary me-2">Upload All</a>
                                                                            <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
                                                                        </div>
                                                                        <!--end::Controls-->
                                                                        <!--begin::Items-->
                                                                        <div class="dropzone-items wm-200px">
                                                                            <div class="dropzone-item p-5" style="display:none">
                                                                                <!--begin::File-->
                                                                                <div class="dropzone-file">
                                                                                    <div class="dropzone-filename text-dark" title="some_image_file_name.jpg">
                                                                                        <span data-dz-name="">some_image_file_name.jpg</span>
                                                                                        <strong>(
                                                                                        <span data-dz-size="">340kb</span>)</strong>
                                                                                    </div>
                                                                                    <div class="dropzone-error mt-0" data-dz-errormessage=""></div>
                                                                                </div>
                                                                                <!--end::File-->
                                                                                <!--begin::Progress-->
                                                                                <div class="dropzone-progress">
                                                                                    <div class="progress bg-gray-300">
                                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Progress-->
                                                                                <!--begin::Toolbar-->
                                                                                <div class="dropzone-toolbar">
                                                                                    
                                                                                    <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                                                    <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                                                                    <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <span class="dropzone-delete" data-dz-remove="">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                                                    <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                                                                    <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                </div>
                                                                                <!--end::Toolbar-->
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Items-->
                                                                    </div> --}}
                                                                    <!--end::Dropzone-->
                                                                    <!--end::Input group-->
                                                                    
                                                                </div>
                                                                <!--end::Scroll-->
                                                                <!--begin::Actions-->
                                                                <div class="text-center pt-15">
                                                                    <button type="reset" class="btn btn-light me-3"
                                                                    data-bs-dismiss="modal">Discard</button>
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
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="service_table">
                                            <!--begin::Table head-->
                                            <thead class="align-middle">
                                                <!--begin::Table row-->
                                                <tr class="text-left text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-120px">ID</th>
                                                    <th class="min-w-120px">Title</th>
                                                    <th class="min-w-120px">Description</th>
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
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!-- Fancybox JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="{{ asset('admin/js/custom/service/service.js') }}"></script>
    <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!--end::Page Vendors Javascript-->
@endpush
