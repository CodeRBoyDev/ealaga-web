  <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
      <!--begin::Card-->
      <div class="card pt-4 mb-6 mb-xl-9">
          <!--begin::Card header-->
          <div class="card-header border-0">
              <!--begin::Card title-->
              <div class="card-title">
                  <h2>Accout Information</h2>
              </div>
              <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0 pb-5">
              <!--begin::Table wrapper-->
              <div class="table-responsive">
                  <!--begin::Table-->
                  <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                      <!--begin::Table body-->
                      <tbody class="fs-6 fw-bold text-gray-600">
                          <tr>
                              <td>Email</td>
                              <td>{{ $userData->email ? $userData->email : 'N/A' }}</td>
                              <td class="text-end">
                                  <button type="button"
                                      class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                      data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                                      <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                      <span class="svg-icon svg-icon-3">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="#a1a5b7">
                                              <path opacity="0.3"
                                                  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                  style="fill:#a1a5b7" />
                                              <path
                                                  d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                  style="fill:#a1a5b7" />
                                          </svg>
                                      </span>
                                      <!--end::Svg Icon-->
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td>Username</td>
                              <td>{{ $userData->username ? $userData->username : 'N/A' }}</td>
                              <td class="text-end">
                                  <button type="button"
                                      class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                      data-bs-toggle="modal" data-bs-target="#kt_modal_update_username">
                                      <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                      <span class="svg-icon svg-icon-3">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="#a1a5b7">
                                              <path opacity="0.3"
                                                  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                  style="fill:#a1a5b7" />
                                              <path
                                                  d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                  style="fill:#a1a5b7" />
                                          </svg>
                                      </span>
                                      <!--end::Svg Icon-->
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td>Password</td>
                              <td>********</td>
                              <td class="text-end">
                                  <button type="button"
                                      class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                      data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                      <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                      <span class="svg-icon svg-icon-3">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="#a1a5b7">
                                              <path opacity="0.3"
                                                  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                  style="fill:#a1a5b7" />
                                              <path
                                                  d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                  style="fill:#a1a5b7" />
                                          </svg>
                                      </span>
                                      <!--end::Svg Icon-->
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td>Role</td>
                              <td> {{ $userData->role === 0 ? 'Administrator' : ($userData->role === 1 ? 'Personnel' : 'Client') }}
                              </td>
                          </tr>
                          <tr>
                              <td>Access Level</td>
                              <td> {{ $userData->access_level === 0 ? 'Administrator' : ($userData->access_level === 1 ? 'Personnel' : 'Client') }}
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
  <!--begin::Modals-->
  <!--begin::Modal - Update password-->
  <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <div class="mx-auto">
                      <h2 class="fw-bolder">Update Password</h2>
                  </div>
                  <!--end::Modal title-->
                  <!--begin::Close-->
                  <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"
                      data-kt-users-modal-action="close">
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
                  <form id="kt_modal_update_password_form" class="form" action="#">
                      @csrf
                      <!--begin::Input group=-->
                      <div class="fv-row mb-10">
                          <label class="required form-label fs-6 mb-2">Current Password</label>
                          <input class="form-control form-control-lg form-control-solid" type="password"
                              placeholder="" name="current_password" autocomplete="off" />
                      </div>
                      <!--end::Input group=-->
                      <!--begin::Input group-->
                      <div class="mb-10 fv-row" data-kt-password-meter="true">
                          <!--begin::Wrapper-->
                          <div class="mb-1">
                              <!--begin::Label-->
                              <label class="form-label fw-bold fs-6 mb-2">New Password</label>
                              <!--end::Label-->
                              <!--begin::Input wrapper-->
                              <div class="position-relative mb-3">
                                  <input class="form-control form-control-lg form-control-solid" type="password"
                                      placeholder="" name="new_password" autocomplete="off" />
                                  <span
                                      class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
                                      <i class="bi bi-eye-slash fs-2"></i>
                                      <i class="bi bi-eye fs-2 d-none"></i>
                                  </span>
                              </div>
                              <!--end::Input wrapper-->
                              <!--begin::Meter-->
                              <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                              </div>
                              <!--end::Meter-->
                          </div>
                          <!--end::Wrapper-->
                          <!--begin::Hint-->
                          <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp;
                              symbols.
                          </div>
                          <!--end::Hint-->
                      </div>
                      <!--end::Input group=-->
                      <!--begin::Input group=-->
                      <div class="fv-row mb-10">
                          <label class="form-label fw-bold fs-6 mb-2">Confirm New Password</label>
                          <input class="form-control form-control-lg form-control-solid" type="password"
                              placeholder="" name="confirm_password" autocomplete="off" />
                      </div>
                      <!--end::Input group=-->
                      <!--begin::Actions-->
                      <div class="text-center pt-15">
                          <button type="reset" class="btn btn-light me-3"
                              data-kt-users-modal-action="cancel">Discard</button>
                          <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
  <!--end::Modal - Update password-->
  <!--begin::Modal - Update email-->
  <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <div class="mx-auto">
                      <h2 class="fw-bolder">Update Email Address</h2>
                  </div>
                  <!--end::Modal title-->
                  <!--begin::Close-->
                  <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                  <form id="kt_modal_update_email_form" class="form" action="#">
                      @csrf
                      <!--begin::Notice-->
                      <!--begin::Notice-->
                      <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6"
                          style="background-color: transparent !important">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                          <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none">
                                  <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                      rx="10" style="fill:black" />
                                  <rect x="11" y="14" width="7" height="2" rx="1"
                                      transform="rotate(-90 11 14)" style="fill:black" />
                                  <rect x="11" y="17" width="2" height="2" rx="1"
                                      transform="rotate(-90 11 17)" style="fill:black" />
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Wrapper-->
                          <div class="d-flex flex-stack flex-grow-1">
                              <!--begin::Content-->
                              <div class="fw-bold">
                                  <div class="fs-6 text-gray-700">Please
                                      note that a valid email address is required to
                                      complete the email verification.</div>
                              </div>
                              <!--end::Content-->
                          </div>
                          <!--end::Wrapper-->
                      </div>
                      <!--end::Notice-->
                      <!--end::Notice-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-7">
                          <!--begin::Label-->
                          <label class="fs-6 fw-bold form-label mb-2">
                              <span class="required">Email Address</span>
                          </label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <input class="form-control form-control-solid" placeholder="" name="profile_email" />
                          <!--end::Input-->
                      </div>
                      <!--end::Input group-->
                      <!--begin::Actions-->
                      <div class="text-center pt-15">
                          <button type="reset" class="btn btn-light me-3"
                              data-kt-users-modal-action="cancel">Discard</button>
                          <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
  <!--end::Modal - Update email-->
  <!--begin::Modal - Update username-->
  <div class="modal fade" id="kt_modal_update_username" tabindex="-1" aria-hidden="true"
      data-bs-backdrop="static">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
          <!--begin::Modal content-->
          <div class="modal-content">
              <!--begin::Modal header-->
              <div class="modal-header">
                  <!--begin::Modal title-->
                  <div class="mx-auto">
                      <h2 class="fw-bolder">Update Username</h2>
                  </div>
                  <!--end::Modal title-->
                  <!--begin::Close-->
                  <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                  <form id="kt_modal_update_username_form" class="form" action="#">
                      @csrf
                      <!--begin::Notice-->
                      <!--begin::Notice-->
                      <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6"
                          style="background-color: transparent !important">
                          <!--begin::Icon-->
                          <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                          <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none">
                                  <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                      rx="10" style="fill:black" />
                                  <rect x="11" y="14" width="7" height="2" rx="1"
                                      transform="rotate(-90 11 14)" style="fill:black" />
                                  <rect x="11" y="17" width="2" height="2" rx="1"
                                      transform="rotate(-90 11 17)" style="fill:black" />
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <!--end::Icon-->
                          <!--begin::Wrapper-->
                          <div class="d-flex flex-stack flex-grow-1">
                              <!--begin::Content-->
                              <div class="fw-bold">
                                  <div class="fs-6 text-gray-700">Please
                                      note that a valid username is required.</div>
                              </div>
                              <!--end::Content-->
                          </div>
                          <!--end::Wrapper-->
                      </div>
                      <!--end::Notice-->
                      <!--end::Notice-->
                      <!--begin::Input group-->
                      <div class="fv-row mb-7">
                          <!--begin::Label-->
                          <label class="fs-6 fw-bold form-label mb-2">
                              <span class="required">Username</span>
                          </label>
                          <!--end::Label-->
                          <!--begin::Input-->
                          <input class="form-control form-control-solid" placeholder="" name="profile_username" />
                          <!--end::Input-->
                      </div>
                      <!--end::Input group-->
                      <!--begin::Actions-->
                      <div class="text-center pt-15">
                          <button type="reset" class="btn btn-light me-3"
                              data-kt-users-modal-action="cancel">Discard</button>
                          <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
  <!--end::Modal - Update username-->
  <!--end::Modals-->
