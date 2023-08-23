$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const backgroundContainer = document.querySelector(".bg-no-repeat");
    const now = new Date();

    // Specify the time zone as 'Asia/Manila'
    const options = { timeZone: 'Asia/Manila', hour: 'numeric' };
    const formatter = new Intl.DateTimeFormat('en-US', options);

    // Format the current time in Asia/Manila time zone
    const localTime = formatter.format(now);

    // Extract the hour from the formatted time
    const currentHour = parseInt(localTime);

    // console.log('TIME -', currentHour);

    // Change background image after 6:00 PM 
    if (currentHour <= 6) {
        backgroundContainer.style.backgroundImage = "url(client/media/svg/illustrations/banner_buildings.svg), url(client/media/svg/illustrations/night.jpg)";
        backgroundContainer.style.backgroundSize = "100% auto, cover";
        backgroundContainer.style.backgroundPosition = "0% 100%, center";
    } else {
        backgroundContainer.style.backgroundImage = "url(client/media/svg/illustrations/banner_buildings.svg), url(client/media/svg/illustrations/sunray.jpg)";
        backgroundContainer.style.backgroundSize = "100% auto, cover";
        backgroundContainer.style.backgroundPosition = "0% 100%, center";
    }

    function loadLandingPage() {
        $.ajax({
            url: "/",
            type: "GET",
            success: function (data) {
                // console.log("Announcement Data:", data.announcement);
                console.log("Review Data:", data);

                let sliderHtml = "";
                let reviewHtml = "";

                data.announcement.forEach(function (announcement, index) {
                    const isActive = index === 0 ? 'active' : '';
                    sliderHtml +=
                        `<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10 ${isActive}">
                            <img src="${announcement.image}" class="card-rounded shadow mw-100" alt="" />
                        </div>`;
                });

                $("#announcement_row_div").html(sliderHtml);

                const tnsSlider = tns({
                    container: "#announcement_row_div",
                    loop: true,
                    swipeAngle: false,
                    speed: 2000,
                    autoplay: true,
                    autoplayTimeout: 18000,
                    autoplayButtonOutput: false,
                    controls: true,
                    nav: false,
                    items: 1,
                    center: false,
                    dots: false,
                    prevButton: "#kt_team_slider_prev1",
                    nextButton: "#kt_team_slider_next1",
                });

                data.review.forEach(function (review) {
                    let ratingHtml = "";
                    const rating = review.rate;
                    const maxRating = 5;
                    
                    for (let i = 1; i <= maxRating; i++) {
                        if (i <= rating) {
                            ratingHtml += `<div class="rating-label me-2 checked">
                                              <i class="bi bi-star-fill fs-5"></i>
                                            </div>`;
                        } else {
                            ratingHtml += `<div class="rating-label me-2">
                                              <i class="bi bi-star-fill fs-5"></i>
                                            </div>`;
                        }
                    }
                
                    reviewHtml += `
                        <div class="col-lg-4">
                            <!--begin::Testimonial-->
                            <div class="card testimonial-card">
                                <!-- Card body -->
                                <div class="card-body d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                    <!--begin::Wrapper-->
                                    <div class="mb-7">
                                        <!--begin::Rating-->
                                        <div class="rating mb-6">
                                            ${ratingHtml}
                                        </div>
                                        <!--end::Rating-->
                                        <!--begin::Title-->
                                        <div class="fs-2 fw-bolder text-dark mb-3">${review.rate}</div>
                                        <!--end::Title-->
                                        <!--begin::Feedback-->
                                        <div class="text-gray-500 fw-bold fs-4">${review.comment}</div>
                                        <!--end::Feedback-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Author-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-circle symbol-50px me-10">
                                            <img src="/${review.img_path}" class="" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">${review.id}</a>
                                            <span class="text-muted d-block fw-bold">${review.user_id}</span>
                                        </div>
                                        <!--end::Name-->
                                    </div>
                                    <!--end::Author-->
                                </div>
                                <!--end::Testimonial-->
                            </div>
                        </div>`;
                });

                $("#review_row_div").html(reviewHtml);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Request Error:", error);
            },
        });
    }

    loadLandingPage();
});