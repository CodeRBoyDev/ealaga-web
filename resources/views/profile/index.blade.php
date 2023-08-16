@extends('layouts.master')
@push('customStyles')
    @if (auth()->user()->role === 2)
        <link href="{{ asset('client/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('client/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <link href="{{ asset('/client/css/custom.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/loader.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <link href="{{ asset('admin/css/loader.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .body_background {
                background-image: url(/client/media/taguigbranding/footer-trim.png), url(/client/media/taguigbranding/sunray.jpg);
                background-size: 100%, cover;
                background-repeat: no-repeat;
                background-position: bottom, center;
            }
        </style>
    @endif
@endpush
@section('content')
    @if (auth()->user()->role === 2)
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
                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                            <!--begin::Post-->
                            <div class="post d-flex flex-column-fluid" id="kt_post">
                                <!--begin::Container-->
                                <div id="kt_content_container" class="container-xxl">
                                    <!--begin::Layout-->
                                    <div class="d-flex flex-column flex-xl-row">
                                        <!--begin::Sidebar-->
                                        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10"
                                            style="height: auto;">
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
                                                            style="border: 1px solid #ED1C24; border-radius: 10px; padding: 5px;">
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
                                                                        type="checkbox" value="1"
                                                                        id="kt_modal_is_active"
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
                                                        data-bs-toggle="tab"
                                                        href="#kt_user_view_overview_security">Security</a>
                                                </li>
                                                <!--end:::Tab item-->
                                            </ul>
                                            <!--end:::Tabs-->
                                            <!--begin:::Tab content-->
                                            <div class="tab-content" id="myTabContent">
                                                <!--begin::: Personal Tab panel-->
                                                @include('profile.profileTabs.personaltab')
                                                <!--end::: Personal Tab panel-->
                                                <!--begin:: Security Tab panel-->
                                                @include('profile.profileTabs.securitytab')
                                                <!--end::: Security Tab panel-->
                                                <!--begin::: Health Tab panel-->
                                                @include('profile.profileTabs.comorbiditytab')
                                                <!--end::: Health Tab panel-->
                                            </div>
                                            <!--end:::Tab content-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Layout-->

                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Post-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Footer-->
                        {{-- @include('dashboard.footer') --}}
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>
            <!--end::Root-->
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
    @else
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
                                    <!--begin::Layout-->
                                    <div class="d-flex flex-column flex-xl-row">
                                        <!--begin::Sidebar-->
                                        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10"
                                            style="height: auto;">
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
                                                                        type="checkbox" value="1"
                                                                        id="kt_modal_is_active"
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
                                                    <a class="nav-link text-active-primary pb-4 active"
                                                        data-bs-toggle="tab"
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
                                                    <a class="nav-link text-active-primary pb-4"
                                                        data-kt-countup-tabs="true" data-bs-toggle="tab"
                                                        href="#kt_user_view_overview_security">Security</a>
                                                </li>
                                                <!--end:::Tab item-->
                                            </ul>
                                            <!--end:::Tabs-->
                                            <!--begin:::Tab content-->
                                            <div class="tab-content" id="myTabContent">
                                                <!--begin::: Personal Tab panel-->
                                                @include('profile.profileTabs.personaltab')
                                                <!--end::: Personal Tab panel-->
                                                <!--begin:: Security Tab panel-->
                                                @include('profile.profileTabs.securitytab')
                                                <!--end::: Security Tab panel-->
                                                <!--begin::: Health Tab panel-->
                                                @include('profile.profileTabs.comorbiditytab')
                                                <!--end::: Health Tab panel-->
                                            </div>
                                            <!--end:::Tab content-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Layout-->

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
    @endif
@endsection

@push('adminScripts')
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('profile/js/personal.js') }}"></script>
    <script src="{{ asset('profile/js/security.js') }}"></script>
@endpush
