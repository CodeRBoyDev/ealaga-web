$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#application_row_div").hide();
    $("#history_row_div").hide();
  
    $(".nav-link").on("click", function () {
      // Remove 'active' class from all nav items
      $(".nav-link").removeClass("active");

      // Add 'active' class to the clicked nav item
      $(this).addClass("active");
    });

    let currentPage = 1;
    const entriesPerPage = 8;
    let totalEntries = 0;

    let currentApplicationPage = 1;
    const applicationEntriesPerPage = 8; // You can adjust this as needed
    let totalApplicationEntries = 0;

    let currentHistoryPage = 1;
    const historyEntriesPerPage = 8; // You can adjust this as needed
    let totalHistoryEntries = 0;
    
    function updatePagination() {
      // volunteer pagination
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

      $("pagination_card_div .page-item").on("click", function () {
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

        loadVolunteerList();
      });
      //end

      // application pagination
      const totalApplicationPages = Math.ceil(totalApplicationEntries / applicationEntriesPerPage);
      let applicationPaginationHTML = `
      <div class="fs-6 fw-bold text-gray-700">Showing ${(currentApplicationPage - 1) * entriesPerPage + 1} to ${
      Math.min(currentApplicationPage * applicationEntriesPerPage, totalApplicationEntries)
      } of ${totalApplicationEntries} entries</div>
        <ul class="pagination">
      <li class="page-item previous ${currentApplicationPage === 1 ? 'disabled' : ''}">
            <a href="#" class="page-link">
              <i class="previous"></i>
            </a>
          </li>
      `;

      for (let i = 1; i <= totalApplicationPages; i++) {
        applicationPaginationHTML += `
          <li class="page-item ${i === currentApplicationPage ? 'active' : ''}">
            <a href="#" class="page-link">${i}</a>
          </li>
        `;
      }

      applicationPaginationHTML += `
      <li class="page-item next ${currentApplicationPage === totalApplicationPages ? 'disabled' : ''}">
      <a href="#" class="page-link">
        <i class="next"></i>
      </a>
    </li>
        </ul>
      `;
      
      $("#application_pagination_div").html(applicationPaginationHTML);

      $("application_pagination_div .page-item").on("click", function () {
        if ($(this).hasClass("previous") && currentApplicationPage > 1) {
          currentApplicationPage--;
        } else if ($(this).hasClass("next") && currentApplicationPage < totalApplicationPages) {
          currentApplicationPage++;
        } else if (!$(this).hasClass("previous") && !$(this).hasClass("next")) {
          const clickedPage = parseInt($(this).text());
          if (!isNaN(clickedPage)) {
            currentApplicationPage = clickedPage;
          }
        }

        loadVolunteerList();
      });
      // end

      // HIstory pagination

        const totalHistoryPages = Math.ceil(totalHistoryEntries / historyEntriesPerPage);
        let historyPaginationHTML = `
        <div class="fs-6 fw-bold text-gray-700">Showing ${(currentHistoryPage - 1) * historyEntriesPerPage + 1} to ${
        Math.min(currentHistoryPage * historyEntriesPerPage, totalHistoryEntries)
        } of ${totalHistoryEntries} entries</div>
          <ul class="pagination">
        <li class="page-item previous ${currentHistoryPage === 1 ? 'disabled' : ''}">
              <a href="#" class="page-link">
                <i class="previous"></i>
              </a>
            </li>
        `;
  
        for (let i = 1; i <= totalHistoryPages; i++) {
          historyPaginationHTML += `
            <li class="page-item ${i === currentHistoryPage ? 'active' : ''}">
              <a href="#" class="page-link">${i}</a>
            </li>
          `;
        }
  
        historyPaginationHTML += `
        <li class="page-item next ${currentHistoryPage === totalHistoryPages ? 'disabled' : ''}">
        <a href="#" class="page-link">
          <i class="next"></i>
        </a>
      </li>
          </ul>
        `;
        
        $("#history_pagination_div").html(historyPaginationHTML);
  
        $("history_pagination_div .page-item").on("click", function () {
          if ($(this).hasClass("previous") && currentHistoryPage > 1) {
            currentHistoryPage--;
          } else if ($(this).hasClass("next") && currentHistoryPage < totalHistoryPages) {
            currentHistoryPage++;
          } else if (!$(this).hasClass("previous") && !$(this).hasClass("next")) {
            const clickedPage = parseInt($(this).text());
            if (!isNaN(clickedPage)) {
              currentHistoryPage = clickedPage;
            }
          }
  
          loadVolunteerList();
        });
        //end
    }

    function formatDate(inputDate) {
        const date = new Date(inputDate);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString(undefined, options);
    }

    function formatTime(inputTime) {
      const time = new Date(inputTime);
      const options = { hour: 'numeric', minute: 'numeric', hour12: true };
      return time.toLocaleTimeString([], options);
  }

    function formatDummyTime(inputTime) {
      const dummyDate = `1970-01-01T${inputTime}`;
      const time = new Date(dummyDate);
      const options = { hour: 'numeric', minute: 'numeric', hour12: true };
      return time.toLocaleTimeString([], options);
  }

    function loadVolunteerList() {
        $.ajax({
            url: "/client/volunteer",
            type: "GET",
            success: function (data) {
                console.log("Volunteer Data:", data.volunteer);
                console.log("Application Data:", data.application);
                console.log("History Data:", data.history);

                let firstCardData = ""; 
                let secondCardData = "";
                let thirdCardData = "";  
                totalEntries = data.volunteer?.length;
                totalApplicationEntries = data.application?.length;
                totalHistoryEntries = data.history?.length;

                console.log(totalEntries);

                data.volunteer.forEach(function (volunteer) {
                    // Generate HTML for each volunteer
                    firstCardData +=
                        ` <div class="vol-card">
                        <div class="vol-card-content">
                          <h3 class="vol-card-title">${volunteer.title}</h3>
                          <span class="vol-card-details">Description:<div class="inline-div text-gray-600">${volunteer.description}</div></span>
                          <span class="vol-card-details">Vacancy:<div class="inline-div text-gray-600">${volunteer.num_volunteers_needed}</div></span>
                          ${volunteer.required_skills !== null ? `<span class="vol-card-details">Must have:<div class="inline-div text-gray-600">${volunteer.required_skills}</div></span>` : `<span class=" required vol-card-details">No skills needed<div class="inline-div text-gray-600"></div></span>`}
                          <span class="vol-card-details">Schedule:<div class="inline-div text-gray-600">${formatDate(volunteer.scheduled_date)} | ${formatDummyTime(volunteer.scheduled_time)}</div></span>
                          <button id="submit_modal_view" class="vol-card-button btn btn-sm btn-light btn-active-light-primary" data-submit_modal_view="${volunteer.id}">Apply</button>
                        </div>
                      </div> `;
                });

                data.application.forEach(function (application) {
                  let statusClass = application.status === 0 ? '<span class="vol-card-details">Status:<div class="inline-div text-yellow-600">Pending</div></span>'
                  : '<span class="vol-card-details">Status:<div class="inline-div text-green-600">Approved</div></span>'
                  let cancelButton = application.status === 0 ? `<button id="cancel_modal_view" class="vol-card-button btn btn-sm btn-light btn-active-light-primary" data-cancel_modal_view="${application.id}">Cancel</button>` : '';
                  let dateClass = application.status === 0
                  ? `<span class="vol-card-details">Application date:<div class="inline-div text-gray-600">${formatDate(application.created_at)} | ${formatTime(application.created_at)}</div></span>`
                  : `<span class="vol-card-details">Volunteer date:<div class="inline-div text-gray-600">${formatDate(application.scheduled_date)} | ${formatDummyTime(application.scheduled_time)}</div></span>`;

                  secondCardData +=
                      ` <div class="vol-card">
                      <div class="vol-card-content">
                        <h3 class="vol-card-title">${application.title}</h3>
                        <span class="vol-card-details">Description:<div class="inline-div text-gray-600">${application.description}</div></span>
                        <span class="vol-card-details">Vacancy:<div class="inline-div text-gray-600">${application.num_volunteers_needed}</div></span>
                        ${statusClass}
                        ${dateClass}
                        ${cancelButton}
                      </div>
                    </div> `;
              });

                data.history.forEach(function (history) {
                  let isAttendedStatus = history.isAttended === 0 ? '<span class="vol-card-details">Status:<div class="inline-div text-yellow-600">Not attended</div></span>'
                  : '<span class="vol-card-details">Status:<div class="inline-div text-green-600">Attended</div></span>'

                  thirdCardData +=
                      ` <div class="vol-card">
                      <div class="vol-card-content">
                        <h3 class="vol-card-title">${history.title}</h3>
                        <span class="vol-card-details">Description:<div class="inline-div text-gray-600">${history.description}</div></span>
                        <span class="vol-card-details">Vacancy:<div class="inline-div text-gray-600">${history.num_volunteers_needed}</div></span>
                        <span class="vol-card-details">Schedule:<div class="inline-div text-gray-600">${formatDate(history.scheduled_date)} | ${formatDummyTime(history.scheduled_time)}</div></span>
                        ${isAttendedStatus}
                        <button id="delete_modal_view" class="vol-card-button btn btn-sm btn-light btn-active-light-primary" data-submit_modal_view="${history.id}">Delete</button>
                      </div>
                    </div> `;
              });

                $("#volunteer_row_div").html(firstCardData); 
                $("#application_row_div").html(secondCardData);
                $("#history_row_div").html(thirdCardData);

                updatePagination();
            },
            error: function (xhr, status, error) {
                console.error("AJAX Request Error:", error);
            },
        });
    }

    loadVolunteerList();

    $(document).on("click", "#submit_modal_view", function (event) {
        event.preventDefault();
        var id = $(this).data("submit_modal_view");
        console.log(id);
        
        Swal.fire({
            text: "Are you sure you would like to submit?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "For sure",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            }
        }).then(function (result) {
            if (result.isConfirmed) {
                console.log(id);
                // Perform AJAX POST request to submit the application
                $.ajax({
                    url: "/client/volunteer/submit", // Replace with the actual route in your backend
                    type: "POST",
                    data: {
                        volunteer_id: id // Pass the volunteer ID to the backend
                    },
                    beforeSend: function () {
                        Swal.fire({
                          text: "Loading.....",
                          showCancelButton: false,
                          showConfirmButton: false,
                          allowOutsideClick: false, // Disable clicking outside the modal to close it
                        });
                    },
                    success: function (response) {
                      // Handle success response, if needed
                      console.log("Application submitted successfully:", response);
                  
                      // Close the initial loading Swal
                      Swal.close();
                  
                      // Show success alert with custom icon and caption
                      Swal.fire({
                          icon: "success",
                          title: "Application successful",
                          showConfirmButton: false,
                          timer: 1500 // Adjust the delay as needed
                      });
                  
                      // Delay the redirect and then navigate to the /client/volunteer page
                      setTimeout(function () {
                          window.location.href = "/client/volunteer";
                      }, 1500); // Same delay as the timer in the Swal alert
                  },
                    error: function (xhr, status, error) {
                        console.error("Error submitting application:", error);
                    },
                });
            }
        });
    });  
    
    $(document).on("click", "#cancel_modal_view", function (event) {
      event.preventDefault();
      var id = $(this).data("cancel_modal_view");
      console.log(id);
      
      Swal.fire({
          text: "Are you sure you would like to cancel?",
          icon: "warning",
          showCancelButton: true,
          buttonsStyling: false,
          confirmButtonText: "Yes, sorry",
          cancelButtonText: "No, return",
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: "btn btn-active-light",
          }
      }).then(function (result) {
        if (result.isConfirmed) {
            console.log(id);
            // Perform AJAX POST request to submit the application
            $.ajax({
                url: "/client/volunteer/delete", // Replace with the actual route in your backend
                type: "DELETE",
                data: {
                  params_volunteer_application_id: id // Pass the volunteer ID to the backend
                },
                beforeSend: function () {
                    Swal.fire({
                      text: "Loading.....",
                      showCancelButton: false,
                      showConfirmButton: false,
                      allowOutsideClick: false, // Disable clicking outside the modal to close it
                    });
                },
                success: function (response) {
                  // Handle success response, if needed
                  console.log("Application submitted successfully:", response);
              
                  // Close the initial loading Swal
                  Swal.close();
              
                  // Show success alert with custom icon and caption
                  Swal.fire({
                      icon: "success",
                      title: "Application cancelled",
                      showConfirmButton: false,
                      timer: 1500 // Adjust the delay as needed
                  });
              
                  // Delay the redirect and then navigate to the /client/volunteer page
                  setTimeout(function () {
                      window.location.href = "/client/volunteer";
                  }, 1500); // Same delay as the timer in the Swal alert
              },
                error: function (xhr, status, error) {
                    console.error("Error submitting application:", error);
                },
            });
        }
    });
  });    

    $(document).on("click", "#volunteer_view", function (event) {
      event.preventDefault();
  
      $("#volunteer_row_div").show();
      $("#application_row_div").hide();
      $("#history_row_div").hide();
    });

    $(document).on("click", "#application_view", function (event) {
      event.preventDefault();
      
      $("#application_row_div").show();
      $("#volunteer_row_div").hide();
      $("#history_row_div").hide();
    });

    $(document).on("click", "#history_view", function (event) {
      event.preventDefault();
      
      $("#history_row_div").show();
      $("#volunteer_row_div").hide();
      $("#application_row_div").hide();
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