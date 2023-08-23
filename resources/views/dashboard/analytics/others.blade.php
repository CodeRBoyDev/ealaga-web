<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <div class="col-xl-6">
        <!--begin::Charts Widget 1-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Comorbidity Statistics</span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Chart-->
                <div id="kt_others_comorbidty" style="height: 300px"></div>
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 1-->
    </div>
    <div class="col-xl-6" id="review_section">
        <!--begin::Charts Widget 1-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Reviews</span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Carousel-->
                <div id="kt_others_reviews" style="height: 300px">
                    <div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel"
                        data-bs-interval="2000">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::Label-->
                            <span class="fs-4 fw-bold pe-2">Client Says</span>
                            <!--end::Label-->

                            <!--begin::Carousel Indicators-->
                            <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                @foreach ($reviews as $index => $review)
                                    <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="{{ $index }}"
                                        class="{{ $index === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <!--end::Carousel Indicators-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Carousel-->
                        <div class="carousel-inner pt-8">
                            @foreach ($reviews as $index => $review)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <p style="font-style: italic; text-align: center;">
                                        <span
                                            class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Text/Quote1.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <polygon style="fill:#ED1C24"
                                                        points="11 7 9 13 11 13 11 18 6 18 6 13 8 7" />
                                                    <polygon style="fill:#ED1C24" opacity="0.3"
                                                        points="19 7 17 13 19 13 19 18 14 18 14 13 16 7" />
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>
                                        {{ $review->comment }}
                                        <span
                                            class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Text/Quote2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <polygon style="fill:#ED1C24"
                                                        transform="translate(16.500000, 12.500000) rotate(-180.000000) translate(-16.500000, -12.500000) "
                                                        points="19 7 17 13 19 13 19 18 14 18 14 13 16 7" />
                                                    <polygon style="fill:#ED1C24" opacity="0.3"
                                                        transform="translate(8.500000, 12.500000) rotate(-180.000000) translate(-8.500000, -12.500000) "
                                                        points="11 7 9 13 11 13 11 18 6 18 6 13 8 7" />
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>
                                    </p>
                                    <!--begin::User-->
                                    <div class="  d-flex align-items-sm-center justify-content-center py-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle">
                                            <img src="{{ $review->img_path ? $review->img_path : asset('admin/media/avatars/blank.png') }}"
                                                alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Wrapper-->
                                        <div class="flex-row-fluid flex-wrap ms-5">
                                            <!--begin::Section-->
                                            <div class="d-flex">
                                                <!--begin::Info-->
                                                <div class="flex-grow-1 me-2">
                                                    <!--begin::Username-->
                                                    <a href="" class="text-black fs-6 fw-bold disabled">
                                                        {{ $review->firstname . ' ' . $review->lastname }}
                                                    </a>
                                                    <!--end::Username-->
                                                    <!--begin::Description-->
                                                    <span
                                                        class="text-success fw-bold d-block fs-8 mb-1">{{ $review->role === 0 ? 'Administrator' : ($review->role === 1 ? 'Personnel' : 'Client') }}
                                                    </span>
                                                </div>

                                                <div class="flex-grow-1 me-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                width="24px" height="24px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path
                                                                        d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                        style="fill:{{ $i <= $review->rate ? '#F4C027' : '#D3D3D3' }}" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    @endfor
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::User-->

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Carousel-->
                    </div>

                </div>
                <!--end::Carousel-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 1-->
    </div>
</div>
<!--end::Row-->
