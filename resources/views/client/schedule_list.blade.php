@extends('layouts.master')
@section('content')

       <link href="{{ asset('/client/css/custom.css') }}" rel="stylesheet" type="text/css" />
	   <link href="{{ asset('/client/css/loader.css') }}" rel="stylesheet" type="text/css" />
       <link href="/client/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
   	<!--begin::Body-->
       <div class="body_background header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
                @include('layouts.client.sidebar')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					
                    @include('layouts.client.header')

					<!--begin::Content-->
				

             	<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Card-->
                            <div class="card mb-5 mb-xl-10">
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<a href="#" id="back_homepage" class="map-icon">
                                                <span class="symbol symbol-50px me-6 ">
                                                    <span class="symbol-label bg-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1"
                                                                class="kt-svg-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M12.6572352,10 L12.6572352,5.67013288 C12.6572352,5.25591932 12.3214488,4.92013288 11.9072352,4.92013288 C11.7235496,4.92013288 11.5462507,4.98754181 11.4089624,5.10957589 L4.25173515,11.4715556 C3.94214808,11.7467441 3.91426253,12.2207984 4.18945104,12.5303855 C4.19921056,12.541365 4.20929054,12.5520553 4.21967795,12.5624427 L11.3769052,19.7196699 C11.6697984,20.0125631 12.1446721,20.0125631 12.4375653,19.7196699 C12.5782176,19.5790176 12.6572352,19.3882522 12.6572352,19.1893398 L12.6572352,15 C14.0044226,14.9188289 16.8348635,14.9157978 21.1485581,14.9909069 L21.1485586,14.9908794 C21.424644,14.9956866 21.6523523,14.7757721 21.6571595,14.4996868 C21.65721,14.4967857 21.6572352,14.4938842 21.6572352,14.4909827 L21.6572888,10.5050185 C21.6572888,10.2288465 21.4334072,10.0049649 21.1572352,10.0049649 C21.1556184,10.0049649 21.1540016,10.0049728 21.1523849,10.0049884 C16.0216074,10.0547574 13.1898909,10.0530946 12.6572352,10 Z"
                                                                        style="fill: #fff;" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </a>

											  

											<h2>My Schedule</h2>
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										{{-- <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
											<!--begin::Filter-->
											<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->Filter</button>
											<!--begin::Menu 1-->
											<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
												<!--begin::Header-->
												<div class="px-7 py-5">
													<div class="fs-4 text-dark fw-bolder">Filter Options</div>
												</div>
												<!--end::Header-->
												<!--begin::Separator-->
												<div class="separator border-gray-200"></div>
												<!--end::Separator-->
												<!--begin::Content-->
												<div class="px-7 py-5">
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label fs-5 fw-bold mb-3">Month:</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
															<option></option>
															<option value="aug">August</option>
															<option value="sep">September</option>
															<option value="oct">October</option>
															<option value="nov">November</option>
															<option value="dec">December</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label fs-5 fw-bold mb-3">Payment Type:</label>
														<!--end::Label-->
														<!--begin::Options-->
														<div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="payment_type">
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
																<input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
																<span class="form-check-label text-gray-600">All</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
																<input class="form-check-input" type="radio" name="payment_type" value="visa" />
																<span class="form-check-label text-gray-600">Visa</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
																<input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
																<span class="form-check-label text-gray-600">Mastercard</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="radio" name="payment_type" value="american_express" />
																<span class="form-check-label text-gray-600">American Express</span>
															</label>
															<!--end::Option-->
														</div>
														<!--end::Options-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
														<button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
													</div>
													<!--end::Actions-->
												</div>
												<!--end::Content-->
											</div>
											<!--end::Menu 1-->
											<!--end::Filter-->
										
										</div> --}}
										<!--end::Toolbar-->
									
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Addresses-->
									<div id="loader_div" style="text-align: center;">
										<div class="loader">
											<span class="dot"></span>
											<span class="dot"></span>
											<span class="dot"></span>
											<span class="dot"></span>
										  </div>
									</div>
									<div id="card_row_div" class="row gx-9 gy-6">
										
									</div>
									<!--end::Addresses-->
									 <!--begin::Pagination-->
							<div id="pagination_card_div" class="d-flex flex-stack flex-wrap pt-10">
								
								<!--end::Pages-->
							</div>
							<!--end::Pagination-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
							
						</div>
						<!--end::Container-->


                        <div class="modal fade" id="client_schedule_view_modal" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2>Add New Card</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
									<div class="modal-body mx-2 mx-md-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_new_card_form" class="form" action="#">
                                           
											<div id="ticket_schedule_div">
											
											</div>

                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>

					</div>
					<!--end::Content-->

					<!--end::Content-->
					<!--begin::Footer-->
					{{-- <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">2023 @CITY GOVERNMENT OF</span>
								<a href="https://www.taguig.gov.ph/OfficialWebsite/" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Taguig</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div> --}}
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
	
		<!--begin::Modal - Select Location-->
		<div class="modal fade" id="kt_modal_select_location" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-1000px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Title-->
						<h2>Select Location</h2>
						<!--end::Title-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body">
						<div id="kt_modal_select_location_map" class="w-100 rounded" style="height:450px"></div>
					</div>
					<!--end::Modal body-->
					<!--begin::Modal footer-->
					<div class="modal-footer d-flex justify-content-end">
						<a href="#" class="btn btn-active-light me-5" data-bs-dismiss="modal">Cancel</a>
						<button type="button" id="kt_modal_select_location_button" class="btn btn-primary" data-bs-dismiss="modal">Apply</button>
					</div>
					<!--end::Modal footer-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Select Location-->
		<!--end::Modals-->
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
		<!--end::Main-->

      

	</div>
	<!--end::Body-->
@endsection

@push('scripts')
<script src="/client/js/schedule_list.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
@endpush


