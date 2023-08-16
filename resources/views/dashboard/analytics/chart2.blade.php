<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <div class="col-xl-6">
        <!--begin::Charts Widget 1-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Services Statistics</span>
                    <span class="text-muted fw-bold fs-7"> {{ $totalServices }} Total Booked Services </span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Chart-->
                <div id="kt_charts_services_chart" style="height: 350px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 1-->
    </div>
    <div class="col-xl-6">
        <!--begin::Charts Widget 2-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Schedules Statistics</span>
                    <span class="text-muted fw-bold fs-7">For {{ $OverallSchedules }} Total Schedules</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                        fill="#000000" />
                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3" />
                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3" />
                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                        id="kt_menu_6148588700a53">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select id="schedules_status" class="form-select form-select-solid"
                                        data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
                                        <option></option>
                                        <option value="4">Pending</option>
                                        <option value="1">Attended</option>
                                        <option value="2">Not Attended</option>
                                        <option value="3">Cancelled</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                                <!--begin::Label-->
                                <label class="form-label fw-bold">From :</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <input type="date" name="date_from" id="date_from"
                                        class="form-control form-control-solid mb-3 mb-lg-0  " />
                                </div>
                                <!--end::Input-->
                                <!--begin::Label-->
                                <label class="form-label fw-bold">To :</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <input type="date" name="date_to" id="date_to"
                                        class="form-control form-control-solid mb-3 mb-lg-0  " />
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-schedules-chart-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    data-kt-schedules-chart-filter="apply" data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Chart-->
                <div id="kt_charts_widget_schedules" style="height: 350px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 2-->
    </div>
</div>
<!--end::Row-->
