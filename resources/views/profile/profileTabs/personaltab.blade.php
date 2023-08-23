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
                 <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                     <!--begin::Edit-->
                     <button type="button" data-kt-users-table-filter="edit_personal"
                         class="btn btn-sm btn-flex btn-primary me-3" data-kt-menu-trigger="click"
                         data-kt-menu-placement="bottom-end">
                         <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                         <span class="svg-icon svg-icon-3">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                 <rect opacity="0.3" x="4" y="11" width="12" height="2"
                                     rx="1" fill="black" />

                                 <path opacity="0.3"
                                     d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" />
                                 <path
                                     d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                     fill="black" />
                             </svg>
                         </span>
                         <!--end::Svg Icon-->
                         Edit
                     </button>
                     <!--end::Edit-->

                     <!--begin::Logout-->
                     @if (auth()->user()->role === 2)
                         <a href="{{ route('logout') }}" style="color: inherit; text-decoration: none;">
                             <button type="button" class="btn btn-sm btn-flex btn-primary me-3"
                                 data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                                 <span class="svg-icon svg-icon-3">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none">
                                         <rect opacity="0.3" x="4" y="11" width="12"
                                             height="2" rx="1" fill="black" />
                                         <path
                                             d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z"
                                             fill="black" />
                                         <path
                                             d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                             fill="#C4C4C4" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->

                             </button>
                         </a>
                     @endif
                     <!--end::Logout-->

                 </div>
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
                             <td> {{ $userData->birthday ? \Carbon\Carbon::parse($userData->birthday)->format('d M Y') : 'N/A' }}
                                 {{ $userData->age ? '(' . $userData->age . ' years old)' : '' }}
                             </td>
                             <!-- Format date using Carbon -->
                         </tr>
                         <tr>
                             <td>Contact Number</td>
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
                                 <div class="row" id="valid-id-preview-personal"
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
 <!--begin::Modal - edit user-->
 <div class="modal fade" id="kt_modal_edit_personal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
     data-bs-keyboard="false">
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-dialog-centered mw-800px">
         <!--begin::Modal content-->
         <div class="modal-content">
             <!--begin::Modal header-->
             <div class="modal-header d-flex align-items-center justify-content-between"
                 id="kt_modal_edit_personal_header">
                 <!--begin::Modal title-->
                 <div class="mx-auto">
                     <h2 class="fw-bolder">Update Personal Information</h2>
                 </div>
                 <!--end::Modal title-->
                 <!--begin::Close-->
                 <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                     <span class="svg-icon svg-icon-1">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                             <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                 rx="1" transform="rotate(-45 6 17.3137)" style="fill:black" />
                             <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                 transform="rotate(45 7.41422 6)" style="fill:black" />
                         </svg>
                     </span>
                     <!--end::Svg Icon-->
                 </div>
                 <!--end::Close-->
             </div>
             <!--end::Modal header-->
             <!--begin::Modal body-->
             <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                 <!--begin::Form-->
                 <form id="kt_modal_edit_personal_form" class="form" action="#" enctype="multipart/form-data">
                     @csrf
                     <!--begin::Scroll-->
                     <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_personal_scroll"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_personal_header"
                         data-kt-scroll-wrappers="#kt_modal_edit_personal_scroll" data-kt-scroll-offset="300px">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7 text-center">
                             <!--begin::Label-->
                             <label class="d-block fw-bold fs-6 mb-5">
                             </label>
                             <!--end::Label-->
                             <!--begin::Image input-->
                             <div class="image-input image-input-outline" data-kt-image-input="true"
                                 style="background-image: url{{ asset('admin/media/avatars/blank.png') }})">
                                 <!--begin::Preview existing avatar-->
                                 <div class="image-input-wrapper w-125px h-125px rounded-circle"
                                     id="editprofileImageWrapper"
                                     style="background-image: url({{ asset('admin/media/avatars/blank.png') }}); border-radius: 50%; overflow: hidden;">
                                 </div>
                                 <!--end::Preview existing avatar-->
                                 <!--begin::Label-->
                                 <label
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                     title="Change avatar">
                                     <i class="bi bi-pencil-fill fs-7"></i>
                                     <!--begin::Inputs-->
                                     <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                     {{-- <input type="hidden"
                                                                                    name="avatar_remove" /> --}}
                                     <!--end::Inputs-->
                                 </label>
                                 <!--end::Label-->
                                 <!--begin::Cancel-->
                                 <span
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                     title="Cancel avatar">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                 <!--end::Cancel-->
                                 <!--begin::Remove-->
                                 <span
                                     class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                     data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                     title="Remove avatar">
                                     <i class="bi bi-x fs-2"></i>
                                 </span>
                                 <!--end::Remove-->
                             </div>
                             <!--end::Image input-->
                             <!--begin::Hint-->
                             <div class="form-text">
                                 <!--begin::Label-->
                                 <label class="d-block fw-bold fs-6 mb-5">Profile
                                     Picture <br>Allowed file types: png,
                                     jpg, jpeg.</label>
                                 <!--end::Label-->
                             </div>
                             <!--end::Hint-->
                         </div>
                         <!--end::Input group-->
                         <legend class="goupBoxHeader text-center"
                             style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                             Personal Information</legend>
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <label class="required fw-bold fs-6 mb-2">Full
                                 Name</label>
                             <div class="row g-3">
                                 <!-- First Name Column -->
                                 <div class="fv-row col">
                                     <input type="text" name="first_name"
                                         class="form-control form-control-solid mb-3 mb-lg-0  "
                                         placeholder="First name" />
                                     <div class="validation-message"></div>
                                 </div>
                                 <!-- Middle Name Column -->
                                 <div class="fv-row col">
                                     <input type="text" name="middle_name"
                                         class="form-control form-control-solid mb-3 mb-lg-0  "
                                         placeholder="Middle name" />
                                     <div class="form-check form-check-inline" style="margin-top: 10px;">
                                         <input class="form-check-input" type="checkbox"
                                             id="no_middle_name_checkbox_edit">
                                         <label class="form-check-label" for="no_middle_name_checkbox_edit">No
                                             Middle Name?</label>
                                     </div>
                                     <div class="validation-message"></div>
                                 </div>
                                 <!-- Last Name Column -->
                                 <div class="fv-row col">
                                     <input type="text" name="last_name"
                                         class="form-control form-control-solid mb-3 mb-lg-0 "
                                         placeholder="Last name" />
                                     <div class="validation-message"></div>
                                 </div>
                                 <!-- Suffix Column -->
                                 <div class="fv-row col">
                                     <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                         data-placeholder="Select Suffix" data-allow-clear="true"
                                         data-kt-user-table-filter="suffix" id="suffix" name="suffix"
                                         data-hide-search="true">
                                         <option value="">Select
                                             Suffix
                                         </option>
                                         <option value="Jr.">Jr.</option>
                                         <option value="Jr. II">Jr. II
                                         </option>
                                         <option value="Sr.">Sr.</option>
                                         <option value="II">II</option>
                                         <option value="III">III</option>
                                         <option value="IV">IV</option>
                                         <option value="V">V</option>
                                         <option value="VI">VI</option>
                                         <!-- Add other suffix options here -->
                                     </select>
                                     <div class="validation-message"></div>
                                 </div>
                             </div>
                         </div>
                         <!--end::Input group-->
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <div class="row">
                                 <!-- Gender Column -->
                                 <div class="col-md-3">
                                     <div class="fv-row mb-7">
                                         <label class="fw-bold fs-6 mb-2">Gender</label>
                                         <div class="row g-3">
                                             <div class="fv-row col">
                                                 <select class="form-select form-select-solid fw-bolder"
                                                     data-kt-select2="true" data-placeholder="Gender"
                                                     data-allow-clear="true" data-kt-user-table-filter="gender"
                                                     id="gender" name="gender" data-hide-search="true"
                                                     tabindex="0" aria-hidden="false">
                                                     <option value="">Gender
                                                     </option>
                                                     <option value="male">Male</option>
                                                     <option value="female">Female</option>
                                                 </select>
                                                 <div class="validation-message"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- Contact Number Column -->
                                 <div class="col-md-3">
                                     <div class="fv-row mb-7">
                                         <label class="required fw-bold fs-6 mb-2">Contact Number</label>
                                         <div class="row g-3">
                                             <!-- Contact Number Input -->
                                             <div class="fv-row col">
                                                 <input type="text" name="contact_number"
                                                     class="form-control form-control-solid mb-3 mb-lg-0  "
                                                     placeholder="Contact number" />
                                                 <div class="validation-message"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <!-- Birthday Column -->
                                 <div class="col-md-3">
                                     <div class="fv-row mb-7">
                                         <label class="required fw-bold fs-6 mb-2">Birthday</label>
                                         <div class="row g-3">
                                             <!-- Birthday Input -->
                                             <div class="fv-row col">
                                                 <input type="date" name="birthday" id="birthday_date"
                                                     class="form-control form-control-solid mb-3 mb-lg-0  "
                                                     placeholder="Birthday" />
                                                 <div class="validation-message"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <!-- Username Column -->
                                 <div class="col-md-3">
                                     <div class="fv-row mb-7">
                                         <label class=" required fw-bold fs-6 mb-2">Username</label>
                                         <div class="row g-3">
                                             <!-- Username Input -->
                                             <div class="fv-row col">
                                                 <input type="text" name="username"
                                                     class="form-control form-control-solid mb-3 mb-lg-0 "
                                                     placeholder="Username" />
                                                 <div class="validation-message"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!--end::Input group-->
                         <!--begin:: Location group-->
                         <fieldset class="fv-row mb-7">
                             <legend class="goupBoxHeader text-center"
                                 style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                 Location</legend>
                             <div class="row">
                                 <div class="fv-row mb-7">
                                     <div class="form-group label-animate">
                                         <label class="required">Barangay
                                         </label>
                                         <select class="form-select form-select-solid fw-bolder"
                                             data-kt-select2="true" data-placeholder="Select option"
                                             data-allow-clear="true" data-kt-user-table-filter="barangay"
                                             data-hide-search="true" id="brgy" name="barangay" required>
                                             <option disabled selected value="">Select Barangay
                                             </option>

                                             <!-- Add your barangay options here -->
                                         </select>
                                         <small class="text-danger font-weight-bold" id="loadingAddress"
                                             style="display: none;">Loading
                                             barangay. Please wait...</small>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group label-animate">
                                         <label>Room/Flr/Unit No. &amp;
                                             Bldg</label>
                                         <input type="text" name="unitNo"
                                             class="form-control form-control-solid mb-3 mb-lg-0 "
                                             placeholder="Room/Flr/Unit No. &amp; Bldg">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>House/Lot &amp; Block
                                             No.</label>
                                         <input type="text" name="houseNo"
                                             class="form-control form-control-solid mb-3 mb-lg-0 "
                                             placeholder="House/Lot &amp; Block No.">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Street </label>
                                         <input type="text" name="street"
                                             class="form-control form-control-solid mb-3 mb-lg-0 "
                                             placeholder="Street">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Subd./ Phase/ Purok</label>
                                         <input type="text" name="village"
                                             class="form-control form-control-solid mb-3 mb-lg-0"
                                             placeholder="Subd./ Phase/ Purok">
                                     </div>
                                 </div>
                             </div>
                         </fieldset>
                         <!--end:: Location group-->
                         <!--begin::VALID-ID group-->
                         <div class="fv-row mb-7">
                             <legend class="goupBoxHeader text-center"
                                 style="background-color: red; border-radius: 5px; padding: 5px; color: white;">
                                 Valid ID
                             </legend>
                             <div class="row g-3" id="valid-id-preview" style="margin:5px ; padding:2px">
                                 <!-- Valid ID previews will be added here dynamically -->
                             </div>
                             <div>
                                 <!--begin::Input row-->
                                 <div class="d-flex fv-row" style="flex-wrap: wrap; gap: 10px;">
                                     <!--begin::Attachment-->
                                     <input type="file" id="edit_attachmentInput" name="edit_valid_id[]" multiple>
                                     <div class="edit_attachment-preview"
                                         style="display: none; flex-wrap: wrap; gap: 5px; padding: 5px; border: 1px solid #ddd; border-radius: 5px; justify-content: flex-start;">
                                     </div>
                                     <!--end::Attachment-->
                                 </div>
                                 <!--end::Input row-->
                                 <button id="edit_personal_removeAllButton" style="display: none;"
                                     class="btn btn-danger me-3">Remove
                                     FIles
                             </div>
                         </div>
                         <!--end::VALID-ID group-->

                     </div>
                     <!--end::Scroll-->
                     <!--begin::Actions-->
                     <div class="text-center pt-15">
                         <button type="reset" class="btn btn-light me-3"
                             kt_modal_edit_personal-modal-action="cancel">Discard</button>
                         <button type="submit" class="btn btn-primary" kt_modal_edit_personal-modal-action="submit">
                             <span class="indicator-label">Submit</span>
                             <span class="indicator-progress">Please wait...
                                 <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
 <!--end::Modal - edit user-->
