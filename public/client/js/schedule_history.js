$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    let currentPage = 1;
    const entriesPerPage = 8;
    let totalEntries = 0;

    function updatePagination() {
        const totalPages = Math.ceil(totalEntries / entriesPerPage);
        let paginationHTML = `
      <div class="fs-6 fw-bold text-gray-700">Showing ${
          (currentPage - 1) * entriesPerPage + 1
      } to ${Math.min(
            currentPage * entriesPerPage,
            totalEntries
        )} of ${totalEntries} entries</div>
      <ul class="pagination">
     <li class="page-item previous ${currentPage === 1 ? "disabled" : ""}">
          <a href="#" class="page-link">
            <i class="previous"></i>
          </a>
        </li>
    `;

        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `
        <li class="page-item ${i === currentPage ? "active" : ""}">
          <a href="#" class="page-link">${i}</a>
        </li>
      `;
        }

        paginationHTML += `
    <li class="page-item next ${currentPage === totalPages ? "disabled" : ""}">
    <a href="#" class="page-link">
      <i class="next"></i>
    </a>
  </li>
      </ul>
    `;

        $("#pagination_card_div").html(paginationHTML);

        $(".page-item").on("click", function () {
            if ($(this).hasClass("previous") && currentPage > 1) {
                currentPage--;
            } else if ($(this).hasClass("next") && currentPage < totalPages) {
                currentPage++;
            } else if (
                !$(this).hasClass("previous") &&
                !$(this).hasClass("next")
            ) {
                const clickedPage = parseInt($(this).text());
                if (!isNaN(clickedPage)) {
                    currentPage = clickedPage;
                }
            }

            loadScheduleList();
        });
    }

    $("#loader_div").hide();
    $("#card_row_div").hide();
    let filter_status = ""
    let filter_start_date = ""
    let filter_end_date = ""

    function loadScheduleList() {
        $.ajax({
            url: "/client/schedule/history",
            type: "GET",
            beforeSend: function () {
                $("#loader_div").show();
                $("#card_row_div").hide();
            },
            success: function (data) {
                console.log(data);

                $("#loader_div").hide();
                $("#card_row_div").show();

                let card_data = "";

                totalEntries = data.schedule?.length;

                // Filter the schedule data based on pagination

               
                const startIndex = (currentPage - 1) * entriesPerPage;
                const endIndex = startIndex + entriesPerPage;
                const displayedSchedule = data.schedule?.filter(schedule => {
                  const status = schedule?.status.toString(); // Convert the integer to a string
                  const schedule_date = moment(schedule?.schedule_date); // Convert schedule_date to a moment object
                  console.log(schedule_date);
              
                  const filterStartDate = filter_start_date ? moment(filter_start_date) : null; // Use null instead of an empty string
                  const filterEndDate =  filter_end_date ? moment(filter_end_date) : null; // Use null instead of an empty string
                  
                  console.log(filterStartDate);
                  
                  if (filterStartDate && filterEndDate) { // Only execute if both filterStartDate and filterEndDate have data
                      return status.match(filter_status) && schedule_date.isBetween(filterStartDate, filterEndDate, 'day', '[]');
                  } else {
                    return status.match(filter_status)
                  }
              });
                displayedSchedule?.slice(
                  startIndex,
                  endIndex
              );


                // Loop through each leave in the data.schedule array
                $.each(displayedSchedule, function (i, schedule) {
                    // Get the schedule date from the schedule object
                    const scheduleDate = schedule?.schedule_date;

                    // Format the schedule date using moment.js
                    const formattedScheduleDate =
                        moment(scheduleDate).format("MMMM DD, YYYY");

                    // Get the current date
                    const currentDate = moment().format("YYYY-MM-DD");

                    // Compare the schedule date with the current date
                    const isToday = moment(scheduleDate).isSame(
                        currentDate,
                        "day"
                    );

                    // Determine the text to display for the schedule date
                    let scheduleDateText = "";
                    let badgeColorClass = "";

                    let statusText = "";
                    let statusbadgeColorClass = "";

                    if (isToday) {
                        scheduleDateText = "Today";
                        badgeColorClass = "badge-light-primary"; // Change to your desired class for today's date
                    } else if (
                        moment(scheduleDate).isBefore(currentDate, "day")
                    ) {
                        scheduleDateText = moment(scheduleDate).fromNow();
                        badgeColorClass = "badge-light-danger"; // Change to your desired class for past dates
                    } else {
                        scheduleDateText = moment(scheduleDate).fromNow();
                        badgeColorClass = "badge-light-warning"; // Change to your desired class for future dates
                    }

                    if (schedule?.status === 1) {
                      statusText = "Attended";
                      statusbadgeColorClass = "badge-light-success"; // Change to your desired class for today's date
                  } else if (
                    schedule?.status === 2
                  ) {
                    statusText = "Not Attended";
                    statusbadgeColorClass = "badge-light-danger"; // Change to your desired class for past dates
                  } else if(schedule?.status === 3) {
                    statusText = "Cancelled";
                    statusbadgeColorClass = "badge-light-primary"; // Change to your desired class for future dates
                  }

                    // Generate the HTML code for each schedule card and append it to the `card_data`
                    card_data += ` <div class="col-xl-3">
              <!--begin::Address-->
              <div class="schedule_list_border_below card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                <!--begin::Details-->
                <div class="d-flex flex-column py-2">
                  <div class="d-flex align-items-center fs-5 fw-bolder mb-5">${formattedScheduleDate}
                  <span class="badge ${badgeColorClass} fs-7 ms-2">${scheduleDateText}</span>
                  </div>
                  <div class="d-flex align-items-center fs-5 fw-bolder mb-2">
                  <span class="badge ${statusbadgeColorClass} fs-7 ms-2">${statusText}</span>
                  </div>
                  <div class="fs-6 fw-bold text-gray-600">
                  ${
                      schedule?.schedule_time == 0
                          ? "8:00am - 11:59am Morning"
                          : "1:00pm - 5:00pm Afternoon"
                  }
                 
                  <br />Services:       ${schedule?.services}
                  <br />Location: 13, 1639 Manzanitas St, Taguig, Metro Manila</div>
                </div>
                <!--end::Details-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-2">

                                                                  ${schedule?.rate ? Array.from({ length: Math.min(Math.max(schedule.rate, 1), 5) }, (_, index) => (
                                                                    `<div class="rating-label me-2 checked">
                                                                       <i class="bi bi-star-fill fs-5"></i>
                                                                     </div>`
                                                                  )).join('') : ''}

                                                                  ${schedule?.status === 1 && schedule?.rate === null ? `
                                                                  <button class="btn btn-sm btn-light btn-active-light-primary" 
                                                                  id="client_feedback_view" data-client_feedback_view="${
                                                                      schedule.schedule_id
                                                                  }"
                                                                  >
                                                                  Review</button>
                                                                  ` : ""}
                                                                  
                 
                </div>
                <!--end::Actions-->
              </div>
              <!--end::Address-->
            </div>
            `;
                });

                // Append the generated HTML code to the div
                $("#card_row_div").html(card_data);
                updatePagination();
            },
        });
    }

    loadScheduleList();

    let feedbackSchedID = "";

    $(document).on("click", "#client_feedback_view", function (event) {
        event.preventDefault();
        $('input[name="rating"]').prop("checked", false);
        $('textarea[name="description"]').val("");

        feedbackSchedID = "";
        feedbackSchedID = $(this).data("client_feedback_view");

        $("#client_feedback_view_modal").modal("show");

        console.log(feedbackSchedID);
    });

    // initialize form validation
    var submit_feedback_fv = FormValidation.formValidation(
        document.getElementById("submit_feedback"),
        {
            fields: {
                rating: {
                    validators: {
                        notEmpty: {
                            message: "Kindly choose a rating.",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: "",
                }),
            },
        }
    );

    $("#submit_feedback").submit(function (event) {
        event.preventDefault(); // prevent default form submission

        submit_feedback_fv.validate().then(function (status) {
            if (status === "Valid") {
                var formData = new FormData();
                formData.append("schedule_id", feedbackSchedID);
                formData.append(
                    "rate",
                    parseInt($('input[name="rating"]:checked').val())
                );
                formData.append(
                    "comment",
                    $('textarea[name="description"]').val()
                );

                Swal.fire({
                    text: "Are you sure you would like to submit?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, submit it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "/client/review/add",
                            data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                Swal.fire({
                                    text: "Loading.....",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    allowOutsideClick: false, // Disable clicking outside the modal to close it
                                });
                            },
                            success: function (response) {
                                console.log(response);
                                Swal.close();
                                loadScheduleList();
                                $("#client_feedback_view_modal").modal("hide");
                                Swal.fire({
                                    text: "Review has been successfully sent.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Close",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            },
                            error: function (response) {
                                // Handle error response from server
                                console.log(response);
                            },
                        });
                    }
                });
            } else {
                // if form is invalid, display an error message
                Swal.close();
                Swal.fire({
                    text: "Please fill in all required fields.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            }
        });
    });


    const filter_start_date_calendar = flatpickr(
      "#filter_start_date",
      {
       
      }
    );

    const filter_end_date_calendar = flatpickr(
      "#filter_end_date",
      {
       
      }
    );
    
   
    //filter-================================================================================
    $("#filter_submit").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")


      filter_status = $('#filter_status').val();
      filter_start_date = $('#filter_start_date').val();
      filter_end_date = $('#filter_end_date').val();
      loadScheduleList();
      // console.log($('#filter_status').val(),
      // $('#filter_date').val());
    });

    $("#filter_reset").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")


      filter_status = "";
      filter_start_date = "";
      filter_end_date = "";
      $("#filter_status").val(null).trigger('change.select2');
      filter_start_date_calendar.clear();
      filter_end_date_calendar.clear();
      loadScheduleList();
      // console.log($('#filter_status').val(),
      // $('#filter_date').val());
    });


    //====================================================================================

    $("#back_homepage").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")

        Swal.fire({
            html: `
      <div class="fv-row mb-7">
      <div style="margin-top: 10px;" class="loader">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      </div>
                        </div>
        <div id="successMessage">
          <span id="redirectText">Redirect you to home page...</span>
        </div>
      `,
            // icon: "success",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: () => {
                animateText();
            },
        });

        function animateText() {
            const redirectText = document.getElementById("redirectText");
            redirectText.style.animation = "waveAnimation 2s infinite";
        }

        // Redirect to the home page after a short delay
        setTimeout(function () {
            window.location.href = "/client/home";
        }, 1000); // Adjust the delay as needed
        setTimeout(function () {
            Swal.close();
        }, 2000); // Adjust the delay as needed
    });


});
