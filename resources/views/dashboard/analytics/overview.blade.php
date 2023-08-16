  <div class="row g-5 g-xl-8">
      <div class="col-xl-3">
          <!--begin::Statistics Widget 5-->
          <a href="{{ route('userList') }}" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
              <!--begin::Body-->
              <div class="card-body">
                  <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                      <img alt="Logo" src="{{ asset('dashboard/icons/group.png') }}" class="h-50px h-lg-50px" />
                  </span>
                  <!--begin::Value-->
                  <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5" data-kt-countup="true"
                      data-kt-countup-value="{{ $totalUsers }}" data-kt-countup-suffix=" Total Users">
                  </div>
                  <!--end::Value-->
                  <div class="fw-bold text-gray-400">Senior Citizen, Personnel, Admin</div>
              </div>
              <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
      </div>
      <div class="col-xl-3">
          <!--begin::Statistics Widget 5-->
          <a href="#" class="card  bg-body-white  hoverable card-xl-stretch mb-xl-8">
              <!--begin::Body-->
              <div class="card-body">
                  <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                      <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                          <img alt="Logo" src="{{ asset('dashboard/icons/calendar.png') }}"
                              class="h-50px h-lg-50px" />
                      </span>
                  </span>
                  <!--end::Svg Icon-->
                  <!--begin::Value-->
                  @if ($totalSchedules > 0)
                      <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5" data-kt-countup="true"
                          data-kt-countup-value="{{ $totalSchedules }}"
                          data-kt-countup-suffix="{{ $totalSchedules === 1 ? ' Booked Schedule' : ' Booked Schedules' }}">
                      </div>
                  @else
                      <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">No Schedules</div>
                  @endif

                  <!--end::Value-->
                  <div class="fw-bold text-gray-400">Senior Citizen</div>
              </div>
              <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
      </div>
      <div class="col-xl-3">
          <!--begin::Statistics Widget 5-->
          <a href="#" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
              <!--begin::Body-->
              <div class="card-body">
                  <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                      <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                          <img alt="Logo" src="{{ asset('dashboard/icons/volunteer.png') }}"
                              class="h-50px h-lg-50px" />
                      </span>
                  </span>
                  <!--end::Svg Icon-->
                  <!--begin::Value-->
                  @if ($totalVolunteer > 0)
                      <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5" data-kt-countup="true"
                          data-kt-countup-value="{{ $totalVolunteer }}"
                          data-kt-countup-suffix=" {{ $totalVolunteer === 1 ? ' Total Volunteer' : ' Total Volunteers' }}">
                      </div>
                  @else
                      <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5"> No Volunteer
                      </div>
                  @endif

                  <!--end::Value-->
                  <div class="fw-bold text-gray-400">Serving seniors in community.</div>
              </div>
              <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
      </div>
      <div class="col-xl-3">
          <!--begin::Statistics Widget 5-->
          <a href="#review_section" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
              <!--begin::Body-->
              <div class="card-body  ">
                  <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                      <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                          <img alt="Logo" src="{{ asset('dashboard/icons/star.png') }}" class="h-100px h-lg-50px" />
                      </span>
                  </span>
                  <!--end::Svg Icon-->
                  <!--begin::Value-->
                  <div id="total-users" class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{ $totalReview }} Ratings
                  </div>
                  <!--end::Value-->
                  <div class="fw-bold text-gray-400">Senior Citizen, Personnel, Admin</div>
              </div>
              <!--end::Body-->
          </a>
          <!--end::Statistics Widget 5-->
      </div>

  </div>
