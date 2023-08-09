@extends('layouts.master')
@push('adminStyles ')
@endpush
@section('content')
    <!--begin::Body-->
    <div id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
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
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10" style="height: auto;">
                                        <!--begin::Card-->
                                        <div class="card mb-5 mb-xl-8">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <!--begin::Summary-->
                                                <!--begin::User Info-->
                                                <div class="d-flex flex-center flex-column py-5">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                                        <img src="{{ $userData->img_path ? asset($userData->img_path) : asset('admin/media/avatars/blank.png') }}"
                                                            alt="image" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <p class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">
                                                        {{ $userData->firstname . ' ' . $userData->lastname }}</p>
                                                    <!--end::Name-->
                                                    <!--begin::Position-->
                                                    <div class="mb-9">
                                                        <!--begin::Badge-->
                                                        <div class="badge badge-light-info d-inline">
                                                            {{ $userData->role === 0 ? 'Administrator' : ($userData->role === 1 ? 'Personnel' : 'Client') }}
                                                        </div>
                                                        <!--begin::Badge-->
                                                    </div>
                                                    <!--end::Position-->

                                                    <!--begin::Qr-->
                                                    <div class="symbol symbol-100px "
                                                        style="border: 2px solid #ED1C24; border-radius: 10px; padding: 5px;">
                                                        <img src="{{ asset($userData->qr_code) }}" alt="image" />
                                                    </div>
                                                    <p class=" ">User Qr Code</p>
                                                    <!--end::Qr-->
                                                </div>
                                                <!--end::User Info-->
                                                <!--end::Summary-->
                                                <div class="separator"></div>
                                                <!--begin::Items-->
                                                <div class="py-2">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack">
                                                        <div class="d-flex">
                                                            <div class="d-flex flex-column">
                                                                <a href="#"
                                                                    class="fs-5 text-dark text-hover-primary fw-bolder"
                                                                    id="userStatusText">{{ $userData->is_active === 1 ? 'Activated' : 'Deactivated' }}</a>
                                                                <div class="fs-6 fw-bold text-muted"
                                                                    id="userStatusDescription">
                                                                    {{ $userData->is_active === 1 ? 'Account is currently active and usable' : 'Account has been deactivated and is not currently usable' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <!--begin::Switch-->
                                                            <label
                                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input" name="is_active"
                                                                    type="checkbox" value="1" id="kt_modal_is_active"
                                                                    data-user-id="{{ $userData->id }}"
                                                                    {{ $userData->is_active === 1 ? 'checked' : '' }} />
                                                                <!--end::Input-->
                                                                <!--begin::Label-->
                                                                <span class="form-check-label fw-bold text-muted"
                                                                    for="kt_modal_is_active"></span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Items-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Sidebar-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid ms-lg-15">
                                        <!--begin:::Tabs-->
                                        <ul
                                            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                                    href="#kt_user_view_personal_tab">Personal</a>
                                            </li>
                                            <!--end:::Tab item-->
                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                                    href="#kt_user_view_overview_health_tab">Health Information</a>
                                            </li>
                                            <!--end:::Tab item-->

                                            <!--begin:::Tab item-->
                                            <li class="nav-item">
                                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                                    data-bs-toggle="tab" href="#kt_user_view_overview_security">Security</a>
                                            </li>
                                            <!--end:::Tab item-->
                                        </ul>
                                        <!--end:::Tabs-->
                                        <!--begin:::Tab content-->
                                        <div class="tab-content" id="myTabContent">
                                            <!--begin::: Personal Tab panel-->
                                            @include('dashboard.usermanagement.users.profileTabs.personaltab')
                                            <!--end::: Personal Tab panel-->
                                            <!--begin:: Security Tab panel-->
                                            @include('dashboard.usermanagement.users.profileTabs.securitytab')
                                            <!--end::: Security Tab panel-->
                                            <!--begin::: Health Tab panel-->
                                            @include('dashboard.usermanagement.users.profileTabs.comorbiditytab')
                                            <!--end::: Health Tab panel-->
                                        </div>
                                        <!--end:::Tab content-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Layout-->
                                @include('dashboard.usermanagement.users.profileTabs.schedules')
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
        <!--end::Main-->
    </div>
    <!--end::Body-->
@endsection
@push('adminScripts')
    <script>
        var hostUrl = "admin/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/custom/user/view.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
@endpush
