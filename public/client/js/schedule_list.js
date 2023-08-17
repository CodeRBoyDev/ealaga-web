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
      <div class="fs-6 fw-bold text-gray-700">Showing ${(currentPage - 1) * entriesPerPage + 1} to ${
      Math.min(currentPage * entriesPerPage, totalEntries)
    } of ${totalEntries} entries</div>
      <ul class="pagination">
     <li class="page-item previous ${currentPage === 1 ? 'disabled' : ''}">
          <a href="#" class="page-link">
            <i class="previous"></i>
          </a>
        </li>
    `;

    for (let i = 1; i <= totalPages; i++) {
      paginationHTML += `
        <li class="page-item ${i === currentPage ? 'active' : ''}">
          <a href="#" class="page-link">${i}</a>
        </li>
      `;
    }

    paginationHTML += `
    <li class="page-item next ${currentPage === totalPages ? 'disabled' : ''}">
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
      } else if (!$(this).hasClass("previous") && !$(this).hasClass("next")) {
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

  function loadScheduleList() {
    $.ajax({
      url: "/client/schedule/list",
      type: "GET",
      beforeSend: function () {
        $("#loader_div").show();
        $("#card_row_div").hide();
      },
      success: function (data) {
        // console.log(data)
        $("#loader_div").hide();
        $("#card_row_div").show();
        // Initialize an empty variable to store the generated HTML code
        let card_data = "";

        totalEntries = data.schedule?.length;

        // Filter the schedule data based on pagination
        const startIndex = (currentPage - 1) * entriesPerPage;
        const endIndex = startIndex + entriesPerPage;
        const displayedSchedule = data.schedule?.slice(startIndex, endIndex);
        
        // Loop through each leave in the data.schedule array
        $.each(displayedSchedule, function (i, schedule) {
          // Get the schedule date from the schedule object
          const scheduleDate = schedule?.schedule_date;
        
          // Format the schedule date using moment.js
          const formattedScheduleDate = moment(scheduleDate).format('MMMM DD, YYYY');
        
          // Get the current date
          const currentDate = moment().format('YYYY-MM-DD');
        
          // Compare the schedule date with the current date
          const isToday = moment(scheduleDate).isSame(currentDate, 'day');
        
             // Determine the text to display for the schedule date
             let scheduleDateText = "";
             let badgeColorClass = "";

             let statusText = "";
             let statusbadgeColorClass = "";
          
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
        

          if (schedule?.status === 0) {
            statusText = "Pending";
            statusbadgeColorClass = "badge-light-warning"; // Change to your desired class for today's date
        }
       else if (schedule?.status === 1) {
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
          card_data +=
            ` <div class="col-xl-3">
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

        updatePagination();

      }

    });
  }

  loadScheduleList();

  $(document).on("click", "#client_schedule_view", function (event) {
    event.preventDefault();
    var id = $(this).data("client_schedule_view");

    $.ajax({
      url: `/client/schedule/list/${id}`,
      type: "GET",
      beforeSend: function () {
        Swal.fire({
          text: "Loading.....",
          showCancelButton: false,
          showConfirmButton: false,
          allowOutsideClick: false, // Disable clicking outside the modal to close it
        });
      },
      success: function (data) {
        
        console.log(data);
        Swal.close();
        $("#client_schedule_view_modal").modal("show");
        const ticket_schedule_div =
        `
        <div class="ticket-container" id="ticket-container">
        <div class="ticket">
          <div class="left">
            <div class="image" style="background-image:url('/${data.schedule?.qr_code}')">
              <div class="ticket-number">
                <p>schedule id: ${data.schedule?.schedule_id}</p>
              </div>
            </div>
          </div>
          <div class="right">
            <p class="date">
              <span>MONDAY</span>
              <span>|</span>
              <span class="day">${moment(data.schedule?.schedule_date).format('MMMM DD, YYYY')}</span>
            </p>
            <div class="show-name">
              <h1>CENTER FOR THE ELDERLY</h1>
              <p>Services: ${data.schedule?.services}</p>
            </div>
            <div class="time">
            <p>
            ${
              data.schedule?.schedule_time === 0 ? '8:00 AM - 11:59 AM' : '1:00 PM - 5:00 PM'
            }
            </p>
              
            </div>
            <div class="location">
              <p>13, 1639 Ipil-Ipil Street North Signal Village, Taguig City.</p>
            </div>
          </div>
        </div>
      </div>
      <!--begin::Actions-->
      <div class="text-center pt-15">
        <button type="reset" id="downloadimage" class="btn btn-light me-3">Download</button>
        ${data.schedule?.status == 0
          ?
          `
          <button type="submit"  id="cancel_schedule" data-cancel_schedule="${data.schedule?.schedule_id}" class="btn btn-warning">
          <span class="indicator-label">Cancel Schedule</span>
          <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
          `
          :
          ""

        }
      
      </div>
      <!--end::Actions-->
        `;
            // Append the generated HTML code to the div
            $("#ticket_schedule_div").html(ticket_schedule_div);
            
      },
    });



  });





  $(document).on("click", "#downloadimage", function (event) {
    const ticketDiv = document.getElementById('ticket-container');
    
    // Check if the ticketDiv element is valid
    if (ticketDiv) {
        html2canvas(ticketDiv, { scale: 2, logging: true }).then(function (canvas) {
            const imageData = canvas.toDataURL('image/jpeg', 0.9);
            const downloadLink = document.createElement('a');
            downloadLink.href = imageData;
            downloadLink.download = 'ticket.jpg';
            downloadLink.click();
            console.log('SUCCESS');
        });
    } else {
        console.log("Invalid element: 'ticket-container' not found.");
    }
});

$(document).on("click", "#cancel_schedule", function (event) {
  event.preventDefault();
  var id = $(this).data("cancel_schedule");

  console.log(id);


  Swal.fire({
    text: "Are you sure you would like to cancel?",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: "Yes, cancel it!",
    cancelButtonText: "No, return",
    customClass: {
      confirmButton: "btn btn-primary",
      cancelButton: "btn btn-active-light",
    },
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: `/client/schedule/cancel/${id}`,
        type: "GET",
        beforeSend: function () {
          Swal.fire({
            text: "Loading.....",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false, // Disable clicking outside the modal to close it
          });
        },
        success: function (data) {
          
          Swal.close();
          $("#client_schedule_view_modal").modal("hide");
          Swal.fire({
            text: "Schedule has been successfully cancelled.",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Close",
            customClass: {
              confirmButton: "btn btn-primary",
            },
          });
    
          loadScheduleList();
    
          // console.log(data)
    
        },
      });
    }
  });



});






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
      }
    });
  
    function animateText() {
      const redirectText = document.getElementById('redirectText');
      redirectText.style.animation = 'waveAnimation 2s infinite';
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
