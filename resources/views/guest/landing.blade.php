@extends('layouts.master') 
@section('content')
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root"> 
			<!--begin::How It Works Section-->
			<div class="mb-n10 mb-lg-n20 z-index-2">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-17">
						<!--begin::Title-->
						<h3 class="fs-2hx text-dark mb-5" id="how">How to use</h3>
						<!--end::Title-->
						<!--begin::Text-->
						{{-- <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin</div> --}}
						<!--end::Text-->
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div class="row w-100 gy-10 mb-md-20">
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="client/media/illustrations/elder_cp.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-warning fw-bolder p-5 me-3 fs-3 ff-futura">1</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bolder text-dark ff-futura">Register and log in</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 fs-lg-4 text-muted ff-futura">a. If a user is new, register using email address. An email confirmation is sent to activate the account.
									<br />
								<br />b. If a user is an existing user, they can log in using their registered email and password.</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="client/media/illustrations/elder_activity.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-warning fw-bolder p-5 me-3 fs-3 ff-futura">2</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bolder text-dark ff-futura">Choose Healthcare Service</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 fs-lg-4 text-muted ff-futura">a. Show a list of available healthcare services offered by the Center for the Elderly.
									<br />
								<br />b. Pick a service from the options available (e.g. Therapy Pool, Massage, Sauna, Gym, Yoga, Balroom, etc.).</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="client/media/illustrations/elder_calendar.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-warning fw-bolder p-5 me-3 fs-3 ff-futura">3</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bolder text-dark ff-futura">Set a Schedule</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 fs-lg-4 text-muted ff-futura">a. Provide options for the user to select their preferred date and time for the service.
									<br />
								<br />b. System will display available slots for the selected date and time. If there is no avaiable slot, schedule will not proceed.</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="client/media/illustrations/elder_check.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-warning fw-bolder p-5 me-3 fs-3 ff-futura">4</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bolder text-dark ff-futura">Confirm Schedule</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-bold fs-6 fs-lg-4 text-muted ff-futura">a. Confirm the details of the user's selected service, date, and time.
									<br />
									<br />
								<br />b. Generate a proof of confirmation in the form of QR codes that contains necessary details.</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Product slider-->
					<div class="card">
						<div class="tns tns-default mb-10">
							{{-- <h3 class="fs-2hx text-blue mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Announcement</h3> --}}
							<h3 id="announcement" class="text-center fs-2hx text-dark fw-bolder mt-10">Announcement</h3>
							<!--begin::Slider-->
							<div id="announcement_row_div" data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
								
							</div>
							<!--end::Slider-->
							<!--begin::Slider button-->
							<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
								<span class="svg-icon svg-icon-3x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
							<!--end::Slider button-->
							<!--begin::Slider button-->
							<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
								<span class="svg-icon svg-icon-3x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
							<!--end::Slider button-->
						</div>
					</div>
					<!--end::Product slider-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::How It Works Section-->
			<!--begin::Statistics Section-->
			<div class="mt-sm-n10">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Statistics Section-->
			<!--begin::Team Section-->
			<div class="py-20 py-lg-20">
				<!--begin::Container-->
				<div class="container" id="team">
					<!--begin::Heading-->
					<div class="text-center mb-12">
						<!--begin::Title-->
						<h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">Meet Our Great Team</h3>
						<!--end::Title-->
						<!--begin::Sub-title-->
						<div class="fs-5 text-muted fw-bold ff-futura">The Center for Elderly's team is a group of dedicated individuals who provide care and support to the elderly community, aiming to improve their well-being and quality of life.</div>
						<!--end::Sub-title=-->
					</div>
					<!--end::Heading-->
					<!--begin::Slider-->
					<div class="row w-100 gy-10 mb-md-20">
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3 px-5">
						  <!--begin::Story-->
						  <div class="text-center mb-10 mb-md-0">
							<!--begin::Photo-->
							<div class="rounded-circle mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('client/media/avatars/mayor.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
							  <!--begin::Name-->
							  <a href="#" class="text-dark fw-bolder text-hover-yellow fs-3 ff-futura">Hon. Laarni Cayetano</a>
							  <!--end::Name-->
							  <!--begin::Position-->
							  <div class="text-muted fs-6 fw-bold mt-1 ff-futura">City Mayor</div>
							  <!--begin::Position-->
							</div>
							<!--end::Person-->
						  </div>
						  <!--end::Story-->
						</div>
						<!--end::Col-->
					  
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3 px-5">
						  <!--begin::Story-->
						  <div class="text-center mb-10 mb-md-0">
							<!--begin::Photo-->
							<div class="rounded-circle mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('client/media/avatars/vmayor.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
							  <!--begin::Name-->
							  <a href="#" class="text-dark fw-bolder text-hover-yellow fs-3 ff-futura">Hon. Arvin Alit</a>
							  <!--end::Name-->
							  <!--begin::Position-->
							  <div class="text-muted fs-6 fw-bold mt-1 ff-futura">City Vice Mayor</div>
							  <!--begin::Position-->
							</div>
							<!--end::Person-->
						  </div>
						  <!--end::Story-->
						</div>
						<!--end::Col-->
					  
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3 px-5">
						  <!--begin::Story-->
						  <div class="text-center mb-10 mb-md-0">
							<!--begin::Photo-->
							<div class="rounded-circle mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('client/media/avatars/hosca.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
							  <!--begin::Name-->
							  <a href="#" class="text-dark fw-bolder text-hover-yellow fs-3 ff-futura">Ramonita Jordan</a>
							  <!--end::Name-->
							  <!--begin::Position-->
							  <div class="text-muted fs-6 fw-bold mt-1 ff-futura">Head of OSCA</div>
							  <!--begin::Position-->
							</div>
							<!--end::Person-->
						  </div>
						  <!--end::Story-->
						</div>
						<!--end::Col-->
					  
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3 px-5">
						  <!--begin::Story-->
						  <div class="text-center mb-10 mb-md-0">
							<!--begin::Photo-->
							<div class="rounded-circle mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('client/media/avatars/hcenter.png')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
							  <!--begin::Name-->
							  <a href="#" class="text-dark fw-bolder text-hover-yellow fs-3 ff-futura">Jeanette Reynoso</a>
							  <!--end::Name-->
							  <!--begin::Position-->
							  <div class="text-muted fs-6 fw-bold mt-1 ff-futura">Head of the Center for the Elderly</div>
							  <!--begin::Position-->
							</div>
							<!--end::Person-->
						  </div>
						  <!--end::Story-->
						</div>
						<!--end::Col-->
					  </div>
					<!--end::Slider-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Team Section-->
			<!--begin::Projects Section-->
			<div class="mb-lg-n15 position-relative z-index-2" id="services">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Card-->
					<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
						<!--begin::Card body-->
						<div class="card-body p-lg-20">
							<!--begin::Heading-->
							<div class="text-center mb-5 mb-lg-10">
								<!--begin::Title-->
								<h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">Our Services</h3>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Tabs wrapper-->
							<div class="d-flex flex-center mb-5 mb-lg-15">
								<!--begin::Tabs-->
								<ul class="nav border-transparent flex-center fs-5 fw-bold">
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#" data-bs-toggle="tab" data-bs-target="#therapypool">Therapy pool</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#massage">Massage</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#sauna">Sauna</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#gym">Gym/Yoga/Ballroom</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#mph">Multi-purpose hall</a>
									</li>
								</ul>
								<!--end::Tabs-->
							</div>
							<!--end::Tabs wrapper-->
							<!--begin::Tabs content-->
							<div class="tab-content">
								<!--begin::Tab pane-->
								<div class="tab-pane fade show active" id="therapypool">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay g-10 mb-10" data-fslightbox="lightbox-projects" href="client/media/center/therapy_pool/1.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/therapy_pool/1.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/therapy_pool/3.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/therapy_pool/3.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/therapy_pool/5.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/therapy_pool/5.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/therapy_pool/4.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/therapy_pool/4.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/therapy_pool/2.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/therapy_pool/2.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="massage">
									<!--begin::Row-->
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay g-10 mb-10" data-fslightbox="lightbox-projects" href="client/media/center/massage/1.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/massage/1.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/massage/4.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/massage/4.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/massage/2.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/massage/2.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/massage/3.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/massage/3.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/massage/5.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/massage/5.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="sauna">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="client/media/center/sauna/2.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('client/media/center/sauna/2.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay g-10 mb-10" data-fslightbox="lightbox-projects" href="client/media/center/sauna/1.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/sauna/1.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/sauna/3.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/sauna/3.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="gym">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/gym_yoga_ballroom/4.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/gym_yoga_ballroom/4.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/gym_yoga_ballroom/1.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/gym_yoga_ballroom/1.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/gym_yoga_ballroom/2.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/gym_yoga_ballroom/2.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="client/media/center/gym_yoga_ballroom/3.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('client/media/center/gym_yoga_ballroom/3.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="mph">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/mph/1.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/mph/1.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/mph/2.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/mph/2.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/mph/3.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/mph/3.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay g-10 mb-10" data-fslightbox="lightbox-projects" href="client/media/center/mph/4.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/mph/4.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/center/mph/5.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/center/mph/5.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="draft">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/stock/600x600/img-16.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/stock/600x600/img-16.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/stock/600x600/img-12.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/stock/600x600/img-12.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="bi bi-eye-fill fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="client/media/stock/600x400/img-15.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('client/media/stock/600x600/img-15.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="client/media/stock/600x600/img-23.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('client/media/stock/600x600/img-23.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="bi bi-eye-fill fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
							</div>
							<!--end::Tabs content-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Projects Section-->
			<!--begin::Pricing Section-->
			<div class="mt-sm-n20">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Pricing Section-->
			<!--begin::Testimonials Section-->
			<div class="mt-20 mb-n20 position-relative z-index-2">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-17">
						<!--begin::Title-->
						<h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our Clients Say</h3>
						<!--end::Title-->
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div id="review_row_div" class="row g-lg-10 mb-10 mb-lg-20">
						<!--begin::Col-->

						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Testimonials Section-->
			<!--begin::Footer Section-->
			<div class="mb-0">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div class="landing-dark-bg pt-20">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
							<!--begin::Copyright-->
							<div class="d-flex align-items-center order-2 order-md-1">
								<!--begin::Logo-->
								<a href="https://www.taguig.gov.ph/OfficialWebsite/">
									<img alt="Logo" src="client/media/logos/logotaguig.png" class="h-15px h-md-20px" />
								</a>
								<!--end::Logo image-->
								<!--begin::Logo image-->
								<span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://www.taguig.gov.ph/OfficialWebsite/">© 2023 eAlaga.</span>
								<!--end::Logo image-->
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							{{-- <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item mx-5">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul> --}}
							<!--end::Menu-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Footer Section-->
			<!--begin::Scrolltop-->
			<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
				<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
				<span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
						<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
			<!--end::Scrolltop-->
		</div>
		<!--end::Main-->
@endsection

@push('scripts')
<!-- Push the JS client to the 'scripts' stack -->
<script src="{{asset('client/js/custom/authentication/sign-in/general.js')}}"></script>
<script src="/client/js/landing.js"></script>
@endpush