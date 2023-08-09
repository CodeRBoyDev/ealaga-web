 <div class="tab-pane fade show active" id="kt_user_view_personal_tab" role="tabpanel">
     <!--begin::Card-->
     <div class="card pt-4 mb-6 mb-xl-9">
         <!--begin::Card header-->
         <div class="card-header border-0">
             <!--begin::Card title-->
             <div class="card-title">
                 <h2>Profile</h2>
             </div>
             <!--end::Card title-->
             <div class="card-toolbar">
                 <!--begin::Filter-->
                 <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                     <span class="svg-icon svg-icon-3">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                             <rect opacity="0.3" x="4" y="11" width="12" height="2"
                                 rx="1" fill="black" />
                             <path
                                 d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z"
                                 fill="black" />
                             <path
                                 d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                 fill="#C4C4C4" />
                         </svg>
                     </span>
                     <!--end::Svg Icon-->Sign out</button>
                 <!--end::Filter-->
             </div>
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body pt-0 pb-5"
             style="min-height: 350px; max-height: 350px; overflow-y: auto; overflow-x: hidden;">
             <!--begin::Table wrapper-->
             <div class="table-responsive" style=" overflow-x: hidden;">
                 <!--begin::Table-->
                 <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                     <!--begin::Table body-->
                     <tbody class="fs-6 fw-bold text-gray-600">
                         <tr>
                             <td>Full Name</td>
                             <td> {{ $userData->firstname . ' ' . $userData->middlename . ' ' . $userData->lastname . ' ' . $userData->suffix }}
                             </td>
                         </tr>
                         <tr>
                             <td>Birthday</td>
                             <td> {{ $userData->birthday ? $userData->birthday : 'N/A' }}</td>
                         </tr>
                         <tr>
                             <td>Contac Number</td>
                             <td> {{ $userData->contact_number ? $userData->contact_number : 'N/A' }}</td>
                         </tr>
                         <tr>
                             <td>Address</td>
                             <td>
                                 @if ($userData->houseNo)
                                     {{ $userData->houseNo . ' ' }}
                                 @endif
                                 @if ($userData->street)
                                     {{ $userData->street . ' Street ' }}
                                 @endif
                                 @if ($userData->unitNo)
                                     {{ 'Unit No.' . $userData->unitNo . ', ' }}
                                 @endif
                                 @if ($userData->village)
                                     {{ $userData->village . ' Village ' }}
                                 @endif
                                 @if ($userData->barangay)
                                     {{ 'Barangay ' . $userData->barangay }}
                                 @else
                                     N/A
                                 @endif
                             </td>
                         </tr>
                         <tr>
                             <td>VALID-ID</td>
                             <td>
                                 <div class="row" id="valid-id-preview"
                                     style="margin-left: -5px; margin-right: -5px;">
                                     @if ($userData->valid_id !== null && $userData->valid_id !== '[]')
                                         @php
                                             $validIdArray = json_decode($userData->valid_id);
                                         @endphp
                                         @foreach ($validIdArray as $validIdPath)
                                             <div class="col-md-2"
                                                 style="padding-left: 5px; padding-right: 5px; margin:10px">
                                                 <a href="{{ asset($validIdPath) }}" class="valid-id-image"
                                                     data-fslightbox="valid-id-gallery">
                                                     <img src="{{ asset($validIdPath) }}" alt="Valid ID"
                                                         style="max-width: 100px; height: 100px; border-radius: 5px;">
                                                 </a>
                                             </div>
                                         @endforeach
                                     @else
                                         <div class="badge badge-light-warning">No Uploaded Valid ID</div>
                                     @endif
                                 </div>
                             </td>
                         </tr>



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
 </div>
