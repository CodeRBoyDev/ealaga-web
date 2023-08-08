$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  function loadScheduleList() {
    $.ajax({
      url: "/client/schedule/list",
      type: "GET",
      success: function (data) {
        console.log(data)
        // Initialize an empty variable to store the generated HTML code
        let card_data = "";

        // Loop through each leave in the data.schedule array
        $.each(data?.schedule, function (i, schedule) {
          // Get the schedule date from the schedule object
          const scheduleDate = schedule?.schedule_date;
        
          // Format the schedule date using moment.js
          const formattedScheduleDate = moment(scheduleDate).format('MMMM DD, YYYY');
        
          // Get the current date
          const currentDate = moment().format('YYYY-MM-DD');
        
          // Compare the schedule date with the current date
          const isToday = moment(scheduleDate).isSame(currentDate, 'day');
        
          // Determine the text to display for the schedule date
          let scheduleDateText = '';
          let badgeColorClass = '';
          
          if (isToday) {
            scheduleDateText = 'Today';
            badgeColorClass = 'badge-light-primary'; // Change to your desired class for today's date
          } else if (moment(scheduleDate).isBefore(currentDate, 'day')) {
            scheduleDateText = moment(scheduleDate).fromNow();
            badgeColorClass = 'badge-light-danger'; // Change to your desired class for past dates
          } else {
            scheduleDateText = moment(scheduleDate).fromNow();
            badgeColorClass = 'badge-light-warning'; // Change to your desired class for future dates
          }
        
          // Generate the HTML code for each schedule card and append it to the `card_data`
          card_data +=
            ` <div class="col-xl-3">
              <!--begin::Address-->
              <div class="schedule_list_border_below card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                <!--begin::Details-->
                <div class="d-flex flex-column py-2">
                  <div class="d-flex align-items-center fs-5 fw-bolder mb-5">${formattedScheduleDate}
                  <span class="badge ${badgeColorClass} fs-7 ms-2">${scheduleDateText}</span>
                  </div>
                  <div class="fs-6 fw-bold text-gray-600">
                  ${schedule?.schedule_time == 0 ? 'Time: Morning 8:00am - 11:59am' : 'Time: Afternoon 1:00pm - 5:00pm'}
                 
                  <br />Services:       ${schedule?.services}
                  <br />Location: 13, 1639 Manzanitas St, Taguig, Metro Manila</div>
                </div>
                <!--end::Details-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-2">
                  <button class="btn btn-sm btn-light btn-active-light-primary" 
                  id="client_schedule_view" data-client_schedule_view="${schedule.schedule_id}"
                  >
                  View e-Ticket</button>
                </div>
                <!--end::Actions-->
              </div>
              <!--end::Address-->
            </div>
            `;
        });
        
        // Append the generated HTML code to the div
        $("#card_row_div").html(card_data);
        



      }

    });
  }

  loadScheduleList();



  $(document).on("click", "#client_schedule_view", function (event) {
    event.preventDefault();
    var id = $(this).data("client_schedule_view");

    $("#client_schedule_view_modal").modal("show");
    console.log(id);
  });









  $("#back_homepage").click(function (event) {
    event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")
  
    Swal.fire({
      html: `
      <div class="fv-row mb-7">
                          <span
                            class="spinner-border spinner-border-lg align-middle ms-2"></span>
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
      }
    });
  
    function animateText() {
      const redirectText = document.getElementById('redirectText');
      redirectText.style.animation = 'waveAnimation 2s infinite';
    }
  
      // Redirect to the home page after a short delay
      setTimeout(function () {
        window.location.href = "/client/home";
                  Swal.close();
      }, 2000); // Adjust the delay as needed
  
  });
});
