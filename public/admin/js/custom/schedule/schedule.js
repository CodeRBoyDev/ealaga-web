$(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });


    let filter_status = "";
    let filter_time = "";
    let filter_start_date = moment().startOf('day');
    let filter_end_date = "";
    let filter_barangay = "";
    
    function loadScheduleTable() {
      var tbody = $("#schedule_table tbody");
      tbody.html(
        '<tr id="loading-row"><td colspan="7" class="text-center">Loading...</td></tr>'
      );
  
      $.ajax({
        url: "/schedule",
        type: "GET",
        success: function (data) {
        console.log(data);
        $("#loading-row").remove();
        var tbody = $("#schedule_table tbody");
          
        // console.log(filter_start_date);
        const displayedSchedule = data.schedule?.filter(schedule => {
          const status = schedule.status?.toString() || ""; // Use || instead of ??
          const time = schedule.schedule_time?.toString() || ""; // Use || instead of ??
          const barangay = schedule.barangay?.toString() || ""; // Use || instead of ??
          const schedule_date = moment(schedule.schedule_date);

          const filterStartDate = filter_start_date ? moment(filter_start_date) : null;
          const filterEndDate =  filter_end_date ? moment(filter_end_date) : null;

          if (filterStartDate && !filterEndDate) {
              return (!filter_status || status.match(filter_status)) && 
                  (!filter_time || time.match(filter_time)) && 
                  (!filter_barangay || barangay.match(filter_barangay)) && 
                  schedule_date.isSame(moment(filterStartDate).startOf('day'), 'day');
          } else if (filterStartDate && filterEndDate) {
              return (!filter_status || status.match(filter_status)) && 
                  (!filter_time || time.match(filter_time)) && 
                  (!filter_barangay || barangay.match(filter_barangay)) && 
                  schedule_date.isBetween(filterStartDate, filterEndDate, 'day', '[]');
          } else {
              return (!filter_status || status.match(filter_status)) && 
                  (!filter_time || time.match(filter_time)) && 
                  (!filter_barangay || barangay.match(filter_barangay));
          }
        });

       
        if (displayedSchedule.length === 0) {
          const cardBody = $(".card-body.pt-0");
          cardBody.html("<h1 style='margin-top: 50px;' class='text-center'>No schedules to display</h1>");
        } 
        

        $.each(displayedSchedule, function (i, schedule) { 
          
          var tr = $("<tr>");
          tr.append(`
            <td>
              ${schedule?.schedule_id}
            </td>
            <td>
            ${schedule?.firstname + ' ' + schedule?.lastname}
          </td>
          <td>
         ${(schedule?.services || '').substring(0, 20) + ((schedule?.services || '').length > 20 ? '...' : '')}
          </td>
          <td>
          ${schedule?.schedule_time == '0' ? '<div class="badge badge-light-primary fs-4 fw-bold">' + 'AM' + '</div>' : 
          '<div class="badge badge-light-warning fs-4 fw-bold">' + 'PM' + '</div>' }
          <br>
          ${moment(schedule?.schedule_date).format('MMMM DD, YYYY')}
          </td>
          <td>
          ${schedule?.barangay}
          </td>
          <td>
          ${
            schedule?.status == '0' ? '<div class="badge badge-light-warning fs-4 fw-bold">' + 'Pending' + '</div>'
            :
            schedule?.status == '1' ? '<div class="badge badge-light-success fs-4 fw-bold">' + 'Attended' + '</div>'
            :
            schedule?.status == '2' ? '<div class="badge badge-light-danger fs-4 fw-bold">' + 'Not Attended' + '</div>'
            :
            schedule?.status == '3' ? '<div class="badge badge-light-primary fs-4 fw-bold">' + 'Cancelled' + '</div>'
            :
            ""
          }
          </td>

          <td>
          <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" id="view_schedule" data-view_schedule="${schedule?.schedule_id}" title="View Schedule">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect x="0" y="0" width="24" height="24"/>
              <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" style="fill: #1A4798;" opacity="0.3"/>
              <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" style="fill: #1A4798;" opacity="1"/>
          </g>
         </svg>
            </a>

            ${
              schedule?.status === 0 && moment(schedule.schedule_date).isSame(moment().format('YYYY-MM-DD'), 'day') ? 
                `
                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" id="accept_schedule" data-accept_schedule="${schedule?.schedule_id}" title="Accept Schedule">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" style="fill: #1A4798;" fill-rule="evenodd">
                    <rect style="fill: #1A4798;" x="4" y="11" width="16" height="2" rx="1"/>
                    <rect style="fill: #1A4798;" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                </g>
            </svg>
                  </a>
                `
              :
              ""
            }
          </td>
          
           
          `);
          tbody.append(tr);
         
        })
        $("#schedule_table").DataTable();
        },
        error: function (xhr, status, error) {
          $("#loading-row").remove();
          console.error(error);
        },
      });
     
    }
  
    // $('[data-kt-user-table-filter="search"]').on("keyup", function () {
    //   $("#admin_leaves_table").DataTable().search($(this).val()).draw();
    // });
    loadScheduleTable();


    $(document).on("click", "#add_schedule", function (event) {
      event.preventDefault();
      $("#modal_add_schedule").modal("show");
    });

    $("#search_fullname").click(function (event) {
      event.preventDefault(); // prevent the default form submission behavior
   
      $("#search_result_div").hide();
      $("#indicator_search_loading_result").show();

      const full_name = $("#fullname").val();

      console.log(full_name);

      $.ajax({
        url: "/schedule/search",
        type: "POST",
        data: {
          full_name: full_name,
        },
        success: function (data) {
          console.log(data);
         
          $("#indicator_search_loading_result").hide();
          $("#search_result_div").show();
          
  
          if (data.length > 0) {
            var html = "";
            // Loop through the array and generate HTML code for each element
            for (var i = 0; i < data.length; i++) {
              html +=
                '<a href="#" class="data-item d-flex text-dark text-hover-primary align-items-center mb-5" data-user_id="' +
                data[i].id +
                '" data-firstname="' +
                data[i].firstname +
                '" data-lastname="' +
                data[i].lastname +
                '"> <!--begin::Symbol--> <div class="symbol symbol-40px me-4"> <span class="symbol-label bg-light"> <img class="w-20px h-20px" src="/' +
                data[i].img_path +
                '" alt="' +
                data[i].img_path +
                '"  /> </span> </div> <!--end::Symbol--> <!--begin::Title--> <div class="d-flex flex-column justify-content-start fw-semibold"> <span class="fs-6 fw-semibold">' +
                data[i].firstname +
                " " +
                data[i].lastname +
                '</span> <span class="fs-7 fw-semibold text-muted">' +
                data[i].barangay +
                "</span> </div> <!--end::Title--> </a>";
            }
            // Append the generated HTML code to the div
            $("#search_result_div").html(html);
          } else {
            var html =
              '<div class="d-flex flex-column justify-content-start fw-semibold"> <span class="fs-6 fw-semibold">' +
              "No data found" +
              "</span></div>";
  
            // Append the generated HTML code to the div
            $("#search_result_div").html(html);
          }
        },
        error: function (xhr, status, error) {
          console.log(error);
        },
      });


      
    });



    // add schedule ==================================================================

    let formattedDates = [];
    let selected_date_formattedDates = [];
    let holiday_date_formattedDates = [];

    const date_input = flatpickr("#date_input", {
      minDate: "today",
      onChange: function (selectedDates, dateStr, instance) {
        applyCustomFormatting();
      },
      onMonthChange: function (selectedDates, dateStr, instance) {
        applyCustomFormatting();
      },
      onYearChange: function (selectedDates, dateStr, instance) {
        applyCustomFormatting();
      },
    });
    
    function applyCustomFormatting() {
      formattedDates.forEach((formattedDate) => {
        const specificDateElement = document.querySelector(
          `[aria-label="${formattedDate}"]`
        );
        if (specificDateElement) {
          specificDateElement.classList.add("custom-date-color");
        }
      });
    
      selected_date_formattedDates.forEach((selectedformattedDate) => {
        const selectedspecificDateElement = document.querySelector(
          `[aria-label="${selectedformattedDate}"]`
        );
        if (selectedspecificDateElement) {
          selectedspecificDateElement.classList.add("custom-selected-date-color");
        }
      });

      holiday_date_formattedDates.forEach((selectedformattedDate) => {
        const selectedspecificDateElement = document.querySelector(
          `[aria-label="${selectedformattedDate}"]`
        );
        if (selectedspecificDateElement) {
          selectedspecificDateElement.classList.add("custom-holiday-date-color");
        }
      });
    }
    
    // Call applyCustomFormatting initially to apply formatting to the current dates
    applyCustomFormatting();

    $("#schedule_content").hide();
    $("#indicator_search_loading").hide();
    let selected_date_disable = [];
    let disable_holidays_date = [];
    
    let user_id = "";

    $("#search_result_div").on("click", ".data-item", function () {
      user_id = $(this).data("user_id");
      const fullname = $(this).data("firstname") + " " + $(this).data("lastname");

      $("#fullname").val(fullname).prop("disabled", true);
      $("#schedule_content").hide();
      $("#indicator_search_loading").hide();

      $.ajax({
        url: "/schedule/disable-date",
        type: "GET",
        data: {
          user_id: user_id,
        },
        beforeSend: function () {
          $("#indicator_search_loading").show();
        },
        success: function (data) {
          console.log(data)

          $("#indicator_search_loading").hide();
          $("#schedule_content").show();

          const schedule_slot_total = data?.schedule_total;
          selected_date_disable = data?.selected_date_disable;
          disable_holidays_date = data?.disable_holidays_date;

            // Step 1: Group scheduleTotals by schedule_date
          const groupedByDate = {};
          schedule_slot_total.forEach((item) => {
            const { schedule_date, schedule_time, total } = item;
            if (!groupedByDate[schedule_date]) {
              groupedByDate[schedule_date] = { [schedule_time]: total };
            } else {
              groupedByDate[schedule_date][schedule_time] = total;
            }
          });

                // Step 2: Filter the dates with both schedule_time 0 and 1 having a total of 10
          const disabledDates = Object.entries(groupedByDate)
          .filter(([_, scheduleTimes]) => scheduleTimes[0] === 50 && scheduleTimes[1] === 50)
          .map(([date]) => date);

          date_input.set("disable", [
            function (date) {
              // Disable weekends (Saturday and Sunday)
              return date.getDay() === 6 || date.getDay() === 0;
            },
            ...disabledDates,
            ...selected_date_disable,
            ...disable_holidays_date
          ]);
          

          date_input.config.onChange.push((selectedDates, dateStr, instance) => {
            const selectedDate = moment(selectedDates[0]).format('YYYY-MM-DD'); // Convert to "YYYY-MM-DD" format
        
            // Filter the scheduleTotals for the selected date
            const selectedDateTotals = schedule_slot_total.filter(item => item.schedule_date === selectedDate);
        
            // Calculate the total for schedule_time 0 and 1 for the selected date
            const total0 = selectedDateTotals.find(item => item.schedule_time === 0)?.total || 0;
            const total1 = selectedDateTotals.find(item => item.schedule_time === 1)?.total || 0;
        
            // // Check if either total0 or total1 is equal to 10
            if (total0 === 50) {
              $("#time_input option[value='0']").remove();
            }else if(total1 === 50){
              $("#time_input option[value='1']").remove();
            }else{
              $("#time_input option[value='0']").remove();
              $("#time_input option[value='1']").remove();
              $("#time_input").append('<option value="0">AM</option>');
              $("#time_input").append('<option value="1">PM</option>');
            }
          });
          
          // Loop through the original date strings and format each one
          disabledDates.forEach((dateStr) => {
            const formattedDate = moment(dateStr).format('MMMM D, YYYY');
            formattedDates.push(formattedDate);
          });
        
          selected_date_disable.forEach((dateStr) => {
            const selectedformattedDate = moment(dateStr).format('MMMM D, YYYY');
            selected_date_formattedDates.push(selectedformattedDate);
          });

          disable_holidays_date.forEach((dateStr) => {
            const selectedformattedDate = moment(dateStr).format('MMMM D, YYYY');
            holiday_date_formattedDates.push(selectedformattedDate);
          });
        
          // Loop through the formatted dates and find the corresponding element to change its color
          formattedDates.forEach((formattedDate) => {
            const specificDateElement = document.querySelector(`[aria-label="${formattedDate}"]`);
            // Now you can change the color or do any other manipulation with the specificDateElement
            specificDateElement.classList.add('custom-date-color-default');
            specificDateElement.classList.add('custom-date-color');
          });
        
          selected_date_formattedDates.forEach((selectedformattedDate) => {
            const selectedspecificDateElement = document.querySelector(`[aria-label="${selectedformattedDate}"]`);
            
            if (selectedspecificDateElement) {
              selectedspecificDateElement.classList.add('custom-selected-date-default');
              selectedspecificDateElement.classList.add('custom-selected-date-color');
            }
          });

          holiday_date_formattedDates.forEach((selectedformattedDate) => {
            const selectedspecificDateElement = document.querySelector(`[aria-label="${selectedformattedDate}"]`);
            
            if (selectedspecificDateElement) {
              selectedspecificDateElement.classList.add('custom-holiday-date-color');
            }
          });


        }
        
      });

      

    });



    
  const selectedDate = {
    date: "",
    time: ""
  };

  // Attach an event listener to the date input field and update the selectedDate

  $("#time_input").prop("disabled", true);
  $("#slot_loader").hide();
  
  $("#date_input").on("change", function() {
    $("#available_slot_display").text("");
    selectedDate.date = $(this).val();
    $("#time_input").val(null).trigger('change.select2');
    $("#time_input").prop("disabled", false);

    $("#date_time_display").text("Date & Time: " + moment(selectedDate.date).format("MMMM DD, YYYY"));
    $("#time_summary_display").text("Date: " + moment(selectedDate.date).format("MMMM DD, YYYY"));
  });
  

  $("#time_input").on("change", function() {
    selectedDate.time = $(this).val();
    // Do something with the selected time (replace this with your desired action)
    // alert("Selected time: " + selectedDate.time);

    // Update the label with the selected time
    var meridian = selectedDate.time === "0" ? "MORNING" : "AFTERNOON";
    $("#date_time_display").text("Date & Time: " + moment(selectedDate.date).format("MMMM DD, YYYY") + " - " + meridian);

    $("#time_summary_display").text("Time: " + meridian);


    $.ajax({
      url: `/schedule/slot`,
      type: "GET",
      data: selectedDate,
      beforeSend: function () {
     
        $("#slot_loader").show();
        $("#available_slot_display").text("");
      },
      success: function (data) {
        console.log(data);
       
        $("#slot_loader").hide();

        if (Array.isArray(data.schedule)) {
          // Get the length of the data array
          const dataLength = data.schedule.length;
          const total_slot = 50;
        
          $("#available_slot_display").text("Available Slot: " + (total_slot - dataLength));
        } else {
          // Handle the case when there is no data or data is not an array
          $("#available_slot_display").text("");
        }
      

      },
    });
    
  });
  

  $("#reset_fullname").on("click", function (e) {
    e.preventDefault();

    $("#schedule_content").hide();
    $("#fullname").val("").prop("disabled", false);
    $("#fullname").val("");
    $("#services").val(null).trigger('change.select2');
    
    $("#time_input").val(null).trigger('change.select2');
    $("#time_input").prop("disabled", true);
    $("#date_input").val('');
    selectedDate.date = null;
    selectedDate.time = null;
    $("#available_slot_display").text("");

    $("#date_time_display").text("Date & Time: Please select date & time");
  });


    $("#reset_date_time").on("click", function (e) {
      e.preventDefault();

      $("#time_input").val(null).trigger('change.select2');
      $("#time_input").prop("disabled", true);
      $("#date_input").val('');
      selectedDate.date = null;
      selectedDate.time = null;
      $("#available_slot_display").text("");
  
      $("#date_time_display").text("Date & Time: Please select date & time");
    });


    var submit_add_services_form = FormValidation.formValidation(
      document.getElementById("modal_add_schedule_form"),
      {
          fields: {
            "services[]": {
                  validators: {
                      notEmpty: {
                          message: "Services field required.",
                      },
                  },
              },
              date_input: {
                  validators: {
                      notEmpty: {
                          message: "Date_input field required.",
                      },
                  },
              },
              time_input: {
                  validators: {
                      notEmpty: {
                          message: "Time_input field required.",
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


    $("#modal_add_schedule_form").submit(function (event) {
      event.preventDefault(); // prevent default form submission
  
          console.log("yoooo");
          var formData = new FormData();
        formData.append("service_id", $("#services").val());
        formData.append("schedule_time", $("#time_input").val());
        formData.append("schedule_date", $("#date_input").val());
        formData.append("user_id", user_id);
        

    // console.log(checkedServiceData, $("#time_input").val(), $("#date_input").val())

        submit_add_services_form.validate().then(function (status) {
          if (status === "Valid") {
          
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
                  url: "/schedule/add",
                  data: formData,
                  contentType: false,
                  processData: false,
                  beforeSend: function () {
        
                    $('#schedule_submit_button').prop('disabled', true);
                    $('#schedule_back_button').prop('disabled', true);
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
                     $("#modal_add_schedule").modal("hide");
                      $("#schedule_table").DataTable().destroy();
                      loadScheduleTable();
        
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



    // schedule management ===============================================================================

    $(document).on("click", "#accept_schedule", function (event) {
      event.preventDefault();
      var id = $(this).data("accept_schedule");

      console.log(id); 
      
      Swal.fire({
        text: "Are you sure you would like to accept?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, accept it!",
        cancelButtonText: "No, return",
        customClass: {
          confirmButton: "btn btn-primary",
          cancelButton: "btn btn-active-light",
        },
      }).then(function (result) {
        
        if (result.isConfirmed) {
          $.ajax({
            url: `/schedule/accept/${id}`,
            type: "POST",
            // data: formData,
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
            success: function (data) {

              // console.log(data);
              Swal.close();
  
              $("#schedule_table").DataTable().destroy();
              loadScheduleTable();
  
              Swal.fire({
                text: "Attendees has been successfully attended.",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Close",
                customClass: {
                  confirmButton: "btn btn-primary",
                },
              });
  
              // console.log(data);
            }
          });
        }else{
          Swal.close();
        }
      });
      

    });

    $(document).on("click", "#view_schedule", function (event) {
      event.preventDefault();
      var id = $(this).data("view_schedule");

      console.log(id);

      $.ajax({
        url: `/schedule/view/${id}`,
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
          $("#view_schedule_modal").modal("show");


          $("#qr_code").attr("src", '/' + data?.schedule?.qr_code);

          $("#view_fullname")
          .find(".fw-semibold")
          .html(
            data?.schedule?.firstname + " " +  data?.schedule?.lastname
          );

          $("#view_barangay")
          .find(".fw-semibold")
          .html(
            data?.schedule?.barangay
          );

          $("#view_date")
          .find(".fw-semibold")
          .html(
            moment(data?.schedule?.schedule_date).format('MMMM DD, YYYY')
          );

          $("#view_time")
          .find(".fw-semibold")
          .html(
            (data?.schedule?.schedule_time == "0"
            ? '<div class="badge badge-light-primary fw-bold mb-1">' +
              "MORNING" +
              "</div>"
            : "") +
            (data?.schedule?.schedule_time == "1"
              ? '<div class="badge badge-light-warning fw-bold mb-1">' +
                "AFTERNOON" +
                "</div>"
              : "") 
          );



          $("#view_status")
          .find(".fw-semibold")
          .html(
            (data?.schedule?.status == "0"
              ? '<div class="badge badge-light-warning fw-bold mb-1">' +
                "Pending" +
                "</div>"
              : "") +
              (data?.schedule?.status == "1"
                ? '<div class="badge badge-light-success fw-bold mb-1">' +
                  "Attended" +
                  "</div>"
                : "") +
              (data?.schedule?.status == "2"
                ? '<div class="badge badge-light-danger fw-bold mb-1">' +
                  "Not Attended" +
                  "</div>"
                : "") +
                (data?.schedule?.status == "3"
                ? '<div class="badge badge-light-primary fw-bold mb-1">' +
                  "Cancelled" +
                  "</div>"
                : "") 
          );

          $("#view_email")
          .find(".fw-semibold")
          .html(
            data?.schedule?.email
          );

      // Split the input string into an array
      var servicesArray = data?.schedule?.services.split(',');

      // Create a formatted numbered list with <br> tags
      var formattedList = servicesArray.map(function(service, index) {
          return (index + 1) + ". " + service + "<br>";
      }).join('');

          $("#view_services")
          .find(".fw-semibold")
          .html(
            formattedList
          );

          $("#processed_by")
          .find(".fw-semibold")
          .html(data?.processed_by?.firstname ? data?.processed_by?.firstname + " " + data?.processed_by?.lastname : "Not yet approved");

          $("#processed_on")
          .find(".fw-semibold")
         .html(data?.processed_by?.firstname  ? moment(data?.schedule?.processed_date).format('MMM DD, YYYY h:mm A') : "Not yet approved");

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


      //   function updateTitleIfConditionsMet() {
          
      //     if (moment(filter_start_date) === moment()) {
      //         $("#schedule_title").text("Today Attendees"); // Change the text to "Schedule"
      //     }else{
      //        $("#schedule_title").text("Schedule");
      //     }
      // }


       //filter-================================================================================
       $("#filter_submit").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")
  
        // updateTitleIfConditionsMet();
        
        filter_status = $('#filter_status').val();
        filter_barangay = $('#filter_barangay').val();
        if ($('#filter_start_date').val() === '') {
          filter_start_date = moment().startOf('day');
        }else{
          filter_start_date = $('#filter_start_date').val();
        }
        filter_time = $('#filter_time').val();
        filter_end_date = $('#filter_end_date').val();
        loadScheduleTable();
        // console.log($('#filter_status').val(),
        // $('#filter_date').val());
      });

      $("#filter_reset").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")
  
  
        filter_status = "";
        filter_time = "";
        filter_barangay = "";
        filter_start_date = moment().startOf('day');
        filter_end_date = "";
        $("#filter_status").val(null).trigger('change.select2');
        $("#filter_barangay").val(null).trigger('change.select2');
        filter_start_date_calendar.clear();
        filter_end_date_calendar.clear();
        loadScheduleTable();
        // console.log($('#filter_status').val(),
        // $('#filter_date').val());
      });



      const fetchBarangay = () => {
        // Make an AJAX request to fetch the JSON data

        $.ajax({
            url: "/data/barangay.json",
            type: "GET",
            dataType: "json",
            success: function (response) {
                console.log('hii');
                // Get the select element
                const selectElement = document.getElementById("filter_barangay");
                
                // Loop through the JSON data and create option elements
                response.forEach((barangay, index) => {
                    const option = document.createElement("option");
                    option.value = barangay; // You can set the value to index or barangay name if needed
                    option.textContent = barangay;
                    selectElement.appendChild(option);
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };
    
    // Call the fetchBarangay function to populate the select input
    fetchBarangay();


    /// closing modal function =================================================================================
    $("#modal_add_schedule").on("hide.bs.modal", function () {
      $("#schedule_content").hide();
      $("#fullname").val("").prop("disabled", false);
      $("#fullname").val("");
      $("#services").val(null).trigger('change.select2');
      
      $("#time_input").val(null).trigger('change.select2');
      $("#time_input").prop("disabled", true);
      $("#date_input").val('');
      selectedDate.date = null;
      selectedDate.time = null;
      $("#available_slot_display").text("");
  
      $("#date_time_display").text("Date & Time: Please select date & time");
    });



    $("#qr_scanner_link").click(function (event) {
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
            <span id="redirectText">Redirect you to qr code scanner page...</span>
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
          window.location.href = "/schedule/qrscanner";
        }, 1000); // Adjust the delay as needed
        setTimeout(function () {
          Swal.close();
        }, 2000);

    });
    
});
  