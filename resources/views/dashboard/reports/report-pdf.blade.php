 @extends('layouts.master')
 @push('adminStyles')
     <style>
         /* Global Styles */
         .table-container {
             display: flex;
             justify-content: center;
             align-items: center;
             height: 100vh;
         }

         .data-table {
             max-width: 100%;
             overflow-x: auto;
             page-break-inside: avoid;
             /* Prevent the table from breaking across pages */

         }

         .report-table {
             width: 100%;
             border-collapse: collapse;
             border: 1px solid black;
             text-align: center;
             padding: 8px;
         }

         .report-table th,
         .report-table td {
             border: 1px solid black;
             border-right: 1px solid black;
         }

         .report-table tr {
             border: 1px solid black;
         }

         /* Custom Styles for Report Header */
         .header-logo {
             width: 100px;
             height: 100px;
             border-radius: 50%;
             margin-right: 10px;
         }

         .logo-cell {
             width: 100px;
         }

         .title-cell {
             text-align: center;
         }

         .report-title {
             font-size: 15px;
             font-weight: bold;
             margin-bottom: 5px;
             text-align: center;

         }

         /* Create two unequal columns that floats next to each other */
         .column {
             float: left;
             padding: 10px;
             height: 100px;
             /* Should be removed. Only for demonstration */
         }

         .left {
             width: 20%;
             text-align: center;
         }

         .right {
             width: auto;
             text-align: center;
         }

         .row {
             padding: 0px 40px 0px 40px;
         }

         /* Clear floats after the columns */
         .row:after {
             content: "";
             display: table;
             clear: both;
         }

         .column.right h3 {
             margin-bottom: -10px !important;
             /* You can adjust the value as needed */
         }

         .total-entries {
             margin-left: 10px !important;
             font-size: 14px;
         }

         .report-info {
             float: left;
             width: 50%;
         }

         .date-holder {
             text-align: right;
         }
     </style>
 @endpush
 @section('content')
     <!--begin::Body-->
     <div class="row">
         <div class="column left">
             <img alt="Logo"
                 src="data:image/jpeg;base64,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"
                 class="header-logo" />
         </div>
         <div class="column right">
             <h3>OFFICE FOR SENIOR CITIZENS AFFAIRS</h3>
             <h4>Taguig City's Center for the Elderly</h4>
         </div>
     </div>
     <div class="row">
         <div class="report-info">
             <p>Process by: {{ auth()->user()->lastname }} {{ auth()->user()->firstname }}</p>
         </div>
         <div class="report-info">
             <p class="date-holder">Date: {{ $currentDate }}</p>
         </div>
     </div>

     <div class="table-container">
         @if ($usersReport)
             <div class="data-table">
                 <p class="report-title">Users Report Table</p>
                 <!--begin::Table-->
                 <table class="report-table">
                     <thead>
                         <tr>
                             <th>Full Name</th>
                             <th>Barangay</th>
                             <th>Total Booked Schedules</th>
                             <th>Comorbidity</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($usersReport as $user)
                             <tr>
                                 <td>{{ $user->lastname }} {{ $user->firstname }} {{ $user->middlename }}
                                     {{ $user->suffix }}
                                 </td>
                                 <td>{{ $user->barangay ? $user->barangay : 'Unknown' }}</td>
                                 <td>{{ $user->total_schedules }}</td>
                                 <td>{{ $user->total_comorbidities }}</td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
                 <!--end::Table-->
                 <p class="total-entries"><strong>Total Entries:</strong> {{ count($usersReport) }} Users</p>
             </div>
         @endif
         @if ($barangayReport)
             <div class="data-table">
                 <!--begin::Table-->
                 <p class="report-title">Barangay Report Table</p>
                 <table class="report-table">
                     <thead>
                         <tr>
                             <th>Barangay</th>
                             <th>Total Users</th>
                             <th>Total Booked Schedules</th>
                             <th>Total Volunteer</th>
                             <th>Total Comorbidities</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($barangayReport as $barangay)
                             <tr>
                                 <td>{{ $barangay->barangay ? $barangay->barangay : 'Unknown' }}</td>
                                 <td>{{ $barangay->total_users }}</td>
                                 <td>{{ $barangay->total_schedules }}</td>
                                 <td>{{ $barangay->total_volunteers }}</td>
                                 <td>{{ $barangay->total_comorbidities }}</td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
                 <!--end::Table-->
                 <p class="total-entries"><strong>Total Entries:</strong> {{ count($barangayReport) }} barangay</p>
             </div>
         @endif

         @if ($servicesData)
             <div class="data-table">
                 <!--begin::Table-->
                 <p class="report-title">Services Report Table</p>
                 <table class="report-table">
                     <thead>
                         <tr>
                             <th>Services</th>
                             <th>Total Users</th>
                             <th>Pending</th>
                             <th>Attended</th>
                             <th>Not Attended</th>
                             <th>Cancelled</th>
                             <th>Total</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($servicesData as $service)
                             <tr>
                                 <td>{{ $service->title }}</td>
                                 <td>{{ $service->total_users_per_service }}</td>
                                 <td>{{ $service->total_pending }}</td>
                                 <td>{{ $service->total_attended }}</td>
                                 <td>{{ $service->total_not_attended }}</td>
                                 <td>{{ $service->total_cancelled }}</td>
                                 <td>{{ (int) $service->total_attended + (int) $service->total_attended + (int) $service->total_not_attended + (int) $service->total_cancelled }}
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
                 <!--end::Table-->
                 <p class="total-entries"><strong>Total Entries:</strong> {{ count($servicesData) }} services</p>
             </div>
         @endif
         @if ($comorbidityData)
             <div class="data-table">
                 <!--begin::Table-->
                 <p class="report-title">Comorbidities Report Table</p>
                 <table class="report-table">
                     <thead>
                         <tr>
                             <th>Comorbidities</th>
                             <th>Desrciption</th>
                             <th>Total Users</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($comorbidityData as $comorbidity)
                             <tr>
                                 <td>{{ $comorbidity->name }}</td>
                                 <td>{{ $comorbidity->description }}</td>
                                 <td>{{ $comorbidity->total_users_per_comorbidity }}</td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
                 <!--end::Table-->
                 <p class="total-entries"><strong>Total Entries:</strong> {{ count($comorbidityData) }} comorbidities</p>
             </div>
         @endif

     </div>
     <!--end::Body-->
 @endsection
