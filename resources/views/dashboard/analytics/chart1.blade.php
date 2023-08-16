 <!--begin::Row-->
 <div class="row g-5 g-xl-8">
     <div class="col-xl-4">
         <!--begin::List Widget 3-->
         <div class="card card-xl-stretch mb-xl-8">
             <!--begin::Header-->
             <div class="card-header border-0">
                 <h3 class="card-title fw-bolder text-dark" id="topListHeader">Top Services</h3>
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
                     <!--begin::Menu 3-->
                     <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                         data-kt-menu="true">
                         <!--begin::Heading-->
                         <div class="menu-item px-3">
                             <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Categories</div>
                         </div>
                         <!--end::Heading-->
                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link px-3 menu-item-link"
                                 data-menu-item="Services">Services</a>
                         </div>
                         <!--end::Menu item-->
                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link flex-stack px-3 menu-item-link"
                                 data-menu-item="Barangay">Barangay</a>
                         </div>
                         <!--end::Menu item-->
                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link px-3 menu-item-link" data-menu-item="Client">Client</a>
                         </div>
                         <!--end::Menu item-->
                     </div>

                     <!--end::Menu 3-->
                     <!--end::Menu-->
                 </div>
             </div>
             <!--end::Header-->
             <!--begin::Body-->
             <div class="card-body pt-2 max-h-400px overflow-auto" id="topListDiv">
                 <!-- Content will be dynamically inserted here -->
             </div>
             <!--end::Body-->
         </div>
         <!--end:List Widget 3-->
     </div>
     <div class="col-xl-8">
         <!--begin::Charts Widget 1-->
         <div class="card card-xl-stretch mb-5 mb-xl-8">
             <!--begin::Header-->
             <div class="card-header border-0 pt-5">
                 <!--begin::Title-->
                 <h3 class="card-title align-items-start flex-column">
                     <span class="card-label fw-bolder fs-3 mb-1">User Statistics</span>
                     <span class="text-muted fw-bold fs-7">For {{ $totalUsers }} new members</span>
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
                                     <rect x="14" y="14" width="5" height="5"
                                         rx="1" fill="#000000" opacity="0.3" />
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
                             <!--begin::Input group-->
                             <div class="mb-10">
                                 <!--begin::Label-->
                                 <label class="form-label fw-bold">By:</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <div>
                                     <select id="filterOption" class="form-select form-select-solid"
                                         data-kt-select2="true" data-placeholder="Select option"
                                         data-dropdown-parent="#kt_menu_6148588700a53" data-allow-clear="true">
                                         <option></option>
                                         <option value="gender">Gender</option>
                                         <option value="age">Age</option>
                                         <option value="barangay">Barangay</option>
                                         <option value="role">Role</option>
                                         <option value="status">Status</option>
                                     </select>
                                 </div>
                                 <!--end::Input-->
                             </div>
                             <!--end::Input group-->
                             <!--begin::Actions-->
                             <div class="d-flex justify-content-end">
                                 <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                     data-kt-menu-dismiss="true" data-kt-users-chart-filter="reset">Reset</button>
                                 <button type="submit" class="btn btn-sm btn-primary"
                                     data-kt-users-chart-filter="apply" data-kt-menu-dismiss="true">Apply</button>
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
                 <div id="kt_charts_widget_chart" style="height: 350px"></div>
                 <!--end::Chart-->
             </div>
             <!--end::Body-->
         </div>
         <!--end::Charts Widget 1-->
     </div>
 </div>
 <!--end::Row-->
