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
                             <td> {{ $userData->birthday ? \Carbon\Carbon::parse($userData->birthday)->format('d M Y') : 'N/A' }}
                                 {{ $userData->age ? '(' . $userData->age . ' years old)' : '' }}
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
