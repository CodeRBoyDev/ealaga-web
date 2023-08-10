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
                          </tr>
                          <tr>
                              <td>Username</td>
                              <td>{{ $userData->username ? $userData->username : 'N/A' }}</td>
                          </tr>
                          <tr>
                              <td>Password</td>
                              <td>******</td>
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
