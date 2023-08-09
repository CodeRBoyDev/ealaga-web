 <!--begin::Card-->
 <div class="card pt-4 mb-6 mb-xl-9">
     <!--begin::Card header-->
     <div class="card-header border-0 pt-6">
         <!--begin::Card title-->
         <div class="card-title">
             <h2>Schedules</h2>
         </div>
         <!--begin::Card title-->
         <!--begin::Card toolbar-->
         <div class="card-toolbar">
             <!--begin::Toolbar-->
             <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                 <!--begin::Filter-->
                 <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                     data-kt-menu-placement="bottom-end">
                     <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                     <span class="svg-icon svg-icon-2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                             <path
                                 d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                 fill="black" />
                         </svg>
                     </span>
                     <!--end::Svg Icon-->Filter</button>
                 <!--begin::Menu 1-->
                 <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                     <!--begin::Header-->
                     <div class="px-7 py-5">
                         <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                     </div>
                     <!--end::Header-->
                     <!--begin::Separator-->
                     <div class="separator border-gray-200"></div>
                     <!--end::Separator-->
                     <!--begin::Content-->
                     <div class="px-7 py-5" data-kt-schedule-table-filter="form">
                         <!--begin::Input group-->
                         <div class="mb-10">
                             <label class="form-label fs-6 fw-bold">Role:</label>
                             <select id="kt_user_table_filter_service" class="form-select form-select-solid fw-bolder"
                                 data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                 data-kt-schedule-table-filter="service" data-hide-search="true">
                                 <option></option>
                                 @foreach ($servicesData as $services)
                                     <option value="{{ $services->service }}">{{ $services->service }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <!--end::Input group-->
                         <!--begin::Input group-->
                         <div class="mb-10">
                             <label class="form-label fs-6 fw-bold">Schedule Status:</label>
                             <!-- Status dropdown -->
                             <select id="kt_user_table_filter_status" class="form-select form-select-solid fw-bolder"
                                 data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true"
                                 data-kt-schedule-table-filter="status" data-hide-search="true">
                                 <option></option>
                                 <option value="Pending">Pending</option>
                                 <option value="Attended">Attended</option>
                                 <option value="Not Attended">Not Attended</option>
                             </select>
                         </div>
                         <!--end::Input group-->
                         <!--begin::Actions-->
                         <div class="d-flex justify-content-end">
                             <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                 data-kt-menu-dismiss="true" data-kt-schedule-table-filter="reset">Reset</button>
                             <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                                 data-kt-schedule-table-filter="filter">Apply</button>
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
     <div class="card-body pt-0 pb-5">
         <!--begin::Table wrapper-->
         <div class="table-responsive" style=" overflow-x: hidden;">
             <!--begin::Table-->
             <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_schedules" data-page-length="5">
                 <!--begin::Table head-->
                 <thead class="align-middle">
                     <!--begin::Table row-->
                     <tr class="  text-muted fw-bolder fs-7 text-uppercase gs-0">
                         <th class="min-w-120px">ID</th>
                         <th class="min-w-120px">Services</th>
                         <th class="min-w-120px">Schedule Date</th>
                         <th class="min-w-120px">Time</th>
                         <th class="min-w-120px">Status</th>
                         <th class="min-w-120px">Requested Date</th>
                     </tr>
                     <!--end::Table row-->
                 </thead>
                 <!--end::Table head-->
                 <!--begin::Table body-->
                 <tbody class="align-middle text-black-400 fw-bold">
                     <!-- Table rows will be dynamically populated using JavaScript -->
                     @foreach ($scheduleData as $schedule)
                         <!--begin::Table row-->
                         <tr>
                             <td>
                                 {{ $schedule->schedule_id }}
                             </td>
                             <td data-kt-table-filter-value="{{ $schedule->services }}"> <!-- Update here -->
                                 @php
                                     $servicesArray = explode(',', $schedule->services);
                                 @endphp
                                 @foreach ($servicesArray as $service)
                                     {{-- <span class="badge badge-light-primary me-1">{{ $service }}</span> --}}
                                     <div class="badge badge-light-danger fw-bolder">{{ $service }}</div>
                                 @endforeach
                             </td>
                             <td>
                                 {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d M Y') }}
                                 <!-- Format date using Carbon -->
                             </td>
                             <td>
                                 {{ $schedule->schedule_time === 0 ? 'AM' : 'PM' }}
                             </td>
                             <td data-kt-table-filter-value="{{ $schedule->status }}">
                                 @if ($schedule->status === 0)
                                     <div class="badge badge-light-info fw-bolder">Pending</div>
                                 @elseif ($schedule->status === 1)
                                     <div class="badge badge-light-success fw-bolder">Attended</div>
                                 @else
                                     <div class="badge badge-light-warning fw-bolder">Not Attended</div>
                                 @endif
                             </td>
                             <td>
                                 @if ($schedule->createdAt)
                                     <div class="badge badge-light-success fw-bolder">
                                         {{ \Carbon\Carbon::parse($schedule->createdAt)->format('d M Y') }}
                                         <!-- Format date using Carbon -->

                                     </div>
                                 @else
                                     <div class="badge badge-light-warning fw-bolder">N/A</div>
                                 @endif

                             </td>
                         </tr>
                         <!--end::Table row-->
                     @endforeach

                 </tbody>
                 <!--end::Table body-->
             </table>
             <!--end::Table-->
         </div>
         <!--end::Table wrapper-->
     </div>
     <!--end::Card body-->
 </div>
 <!--end::Card-->
