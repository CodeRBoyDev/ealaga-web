@extends('layouts.master')
@section('content')

       <link href="{{ asset('/client/css/custom.css') }}" rel="stylesheet" type="text/css" />
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
								<div class="card-header">
									<!--begin::Title-->
									<div class="card-title">
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-3 pt-3">
                                                
    
                                                <a id="back_homepage" class="map-icon">
                                                    <span class="symbol symbol-50px me-6">
                                                      <span class="symbol-label bg-light-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                              <rect x="0" y="0" width="24" height="24"/>
                                                              <path d="M12.6572352,10 L12.6572352,5.67013288 C12.6572352,5.25591932 12.3214488,4.92013288 11.9072352,4.92013288 C11.7235496,4.92013288 11.5462507,4.98754181 11.4089624,5.10957589 L4.25173515,11.4715556 C3.94214808,11.7467441 3.91426253,12.2207984 4.18945104,12.5303855 C4.19921056,12.541365 4.20929054,12.5520553 4.21967795,12.5624427 L11.3769052,19.7196699 C11.6697984,20.0125631 12.1446721,20.0125631 12.4375653,19.7196699 C12.5782176,19.5790176 12.6572352,19.3882522 12.6572352,19.1893398 L12.6572352,15 C14.0044226,14.9188289 16.8348635,14.9157978 21.1485581,14.9909069 L21.1485586,14.9908794 C21.424644,14.9956866 21.6523523,14.7757721 21.6571595,14.4996868 C21.65721,14.4967857 21.6572352,14.4938842 21.6572352,14.4909827 L21.6572888,10.5050185 C21.6572888,10.2288465 21.4334072,10.0049649 21.1572352,10.0049649 C21.1556184,10.0049649 21.1540016,10.0049728 21.1523849,10.0049884 C16.0216074,10.0547574 13.1898909,10.0530946 12.6572352,10 Z" fill="#000000" fill-rule="nonzero"/>
                                                            </g>
                                                          </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                      </span>
                                                    </span>
                                                  </a>
                                                  
    
                                                <h2>My History</h2>
                                            
                                            </div>
                                            <!--end::Name-->
                                        
                                        </div>
									</div>
									<!--end::Title-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Addresses-->
									<div id="card_row_div" class="row gx-9 gy-6">
										
									</div>
									<!--end::Addresses-->
									 <!--begin::Pagination-->
							<div class="d-flex flex-stack flex-wrap pt-10">
								<div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
								<!--begin::Pages-->
								<ul class="pagination">
									<li class="page-item previous">
										<a href="#" class="page-link">
											<i class="previous"></i>
										</a>
									</li>
									<li class="page-item active">
										<a href="#" class="page-link">1</a>
									</li>
									<li class="page-item">
										<a href="#" class="page-link">2</a>
									</li>
									<li class="page-item">
										<a href="#" class="page-link">3</a>
									</li>
									<li class="page-item next">
										<a href="#" class="page-link">
											<i class="next"></i>
										</a>
									</li>
								</ul>
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
                                           
										<div class="ticket-container">
                                            <div class="ticket" id="ticket">
                                                <div class="left">
                                                  <div class="image" style="background-image:url('/client/media/taguigbranding/qr.png')">
                                                    <div class="ticket-number">
                                                      <p>
                                                        ticket no.20030220
                                                      </p>
                                                    </div>
                                                  </div>
                                                  <div class="ticket-info">
                                                    <p class="date">
                                                      <span>MONDAY</span>
                                                      <span class="day">AUGUST 15</span>
                                                      <span>2023</span>
                                                    </p>
                                                    <div class="show-name">
                                                      <h1>CENTER FOR THE ELDERLY</h1>
                                                      <p>Services: Yoga, Gym, Ballroom</p>
                                                    </div>
                                                    <div class="time">
                                                      <p>8:00 PM - 11:00 PM</p>
                                                    </div>
                                                    <p class="location"><span>13, 1639 Ipil-Ipil Street North Signal Village, Taguig City.</span>
                                                    </p>
                                                  </div>
                                                </div>
                                            </div>
										</div>

                                         
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                                                <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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

					</div>
					<!--end::Content-->

					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
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
					</div>
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
<script src="/client/js/schedule_history.js"></script>
<script src="/client/plugins/custom/datatables/datatables.bundle.js"></script>
@endpush


