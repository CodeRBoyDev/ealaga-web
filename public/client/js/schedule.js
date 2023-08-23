"use strict";
var KTCreateApp = (function () {
  var e,
    t,
    o,
    r,
    a,
    i,
    n = [];
  return {
    init: function () {
      (e = $("#kt_modal_create_app")[0]) &&
        (new bootstrap.Modal(e),
        (t = $("#kt_modal_create_app_stepper")[0]),
        (o = $("#create_schedule_form")[0]),
        (r = t.querySelector('[data-kt-stepper-action="submit"]')),
        (a = t.querySelector('[data-kt-stepper-action="next"]')),
        (i = new KTStepper(t)).on("kt.stepper.changed", function (e) {
          3 === i.getCurrentStepIndex()
            ? (r.classList.remove("d-none"),
              r.classList.add("d-inline-block"),
              a.classList.add("d-none"))
            : 4 === i.getCurrentStepIndex()
            ? (r.classList.add("d-none"), a.classList.add("d-none"))
            : (r.classList.remove("d-inline-block"),
              r.classList.remove("d-none"),
              a.classList.remove("d-none"));
        }),
        i.on("kt.stepper.next", function (e) {
          //console.log("stepper.next");
          var t = n[e.getCurrentStepIndex() - 1];
          t
            ? t.validate().then(function (t) {
                //console.log("validated!"),
                  "Valid" == t
                    ? e.goNext()
                    : Swal.fire({
                        text: "Please fill up all fields before proceeding.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn btn-light" },
                      }).then(function () {});
              })
            : (e.goNext(), KTUtil.scrollTop());
        }),
        i.on("kt.stepper.previous", function (e) {
          //console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop();
        }),
        n.push(
          FormValidation.formValidation(o, {
            fields: {
              service_id: {
                validators: { notEmpty: { message: "Service is required" } },
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
          })
        ),
        n.push(
          FormValidation.formValidation(o, {
            fields: {
              date_input: {
                validators: { notEmpty: { message: "Date is required" } },
              },
              time_input: {
                validators: { notEmpty: { message: "Time is required" } },
              }
            },
            plugins: {
              trigger: new FormValidation.plugins.Trigger(),
              bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
              }),
            },
          })
        ));
    },
  };
})();


$(document).ready(function () {
  KTCreateApp.init();

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });


  $("#slot_loader").hide();

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



  let checkedServiceData = [];
  let selected_date_disable = [];
  let disable_holidays_date = [];

  function schedule_slot() {
    $.ajax({
      url: "/client/schedule",
      type: "GET",
      success: function (data) {
        const schedule_slot_total = data?.schedule_total;
        selected_date_disable = data?.selected_date_disable; // Move this line inside the success callback
        disable_holidays_date = data?.disable_holidays_date;

        
  // slot disable ============================================================
  // const scheduleTotals = [
  //   { schedule_date: "2023/08/04", schedule_time: 0, total: 10 },
  //   { schedule_date: "2023/08/04", schedule_time: 1, total: 10 },
  //   { schedule_date: "2023/08/03", schedule_time: 0, total: 10 },
  //   { schedule_date: "2023/08/03", schedule_time: 1, total: 9 },
  //   { schedule_date: "2023/08/06", schedule_time: 0, total: 5 },
  //   { schedule_date: "2023/08/06", schedule_time: 1, total: 5 },
  // ];

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
    .filter(([_, scheduleTimes]) => scheduleTimes[0] === 2 && scheduleTimes[1] === 2)
    .map(([date]) => date);

    //console.log("Disabled Dates:", disabledDates);


  
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
    if (total0 === 2) {
      $("#time_input option[value='0']").remove();
    }else if(total1 === 2){
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
    specificDateElement.classList.add('custom-date-color');
  });

  selected_date_formattedDates.forEach((selectedformattedDate) => {
    const selectedspecificDateElement = document.querySelector(`[aria-label="${selectedformattedDate}"]`);
    
    if (selectedspecificDateElement) {
      selectedspecificDateElement.classList.add('custom-selected-date-color');
    }
  });

  holiday_date_formattedDates.forEach((selectedformattedDate) => {
    const selectedspecificDateElement = document.querySelector(`[aria-label="${selectedformattedDate}"]`);
    
    if (selectedspecificDateElement) {
      selectedspecificDateElement.classList.add('custom-holiday-date-color');
    }
  });



  //==========================================

      }
    });
  }
  
  schedule_slot();


// Update the checkedData array when any checkbox is clicked or unchecked
$(document).on("change", ".service-checkbox", function() {
  checkedServiceData = [];

  // Get all checked checkboxes with the name "service_id"
  $("input[name='service_id']:checked").each(function() {
    checkedServiceData.push(parseInt($(this).val())); ;
  });

  // Now the checkedData array contains the values of all checked checkboxes
 
  // You can do whatever you want with the checked data here
});




  const selectedDate = {
    date: "",
    time: ""
  };

  // Attach an event listener to the date input field and update the selectedDate

  $("#time_input").prop("disabled", true);

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
      url: `/client/schedule/slot`,
      type: "GET",
      data: selectedDate,
      beforeSend: function () {
     
        $("#slot_loader").show();
        $("#available_slot_display").text("");
      },
      success: function (data) {
        //console.log(data);
       
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
 

  $("#reset_date_time").on("click", function (e) {
    e.preventDefault();
    $("#time_input").val(null).trigger('change.select2');
    $("#time_input").prop("disabled", true);
    $("#date_input").val('');
    // date_input.clear();
    selectedDate.date = null;
    selectedDate.time = null;
    $("#available_slot_display").text("");

    $("#date_time_display").text("Date & Time: Please select date & time");
  });




   // Array to store checked services
   var selectedServices = [];

   // Function to update the array on checkbox change
   function updateSelectedServicesArray() {
       selectedServices = [];
       $(".service-checkbox:checked").each(function () {
           var serviceTitle = $(this).closest('.cursor-pointer').find('.fw-bolder').text();
           var serviceDescription = $(this).closest('.cursor-pointer').find('.text-muted').text();
           var serviceIcon = $(this).closest('.cursor-pointer').find('.svg-icon').data('service-icon');
           selectedServices.push({
               title: serviceTitle,
               description: serviceDescription,
               icon: serviceIcon
           });
       });
   }

   // Call the function initially to capture the already checked items
   updateSelectedServicesArray();

   // Update the array on checkbox change
   $(".service-checkbox").on("change", function () {
       updateSelectedServicesArray();

       var newRowHtml = ""; // Initialize the new row HTML string

       // Add each service's details to the newRowHtml
       selectedServices.forEach(function (service) {
           newRowHtml += `
           <label class="d-flex flex-stack mb-5 align-items-start">
           <!--begin:Label-->
           <span class="d-flex align-items-start me-2"> <!-- Changed 'align-items-left' to 'align-items-start' -->
             <!--begin:Icon-->
             <span class="symbol symbol-65px me-6">
               <span class="symbol-label bg-light">
                 <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                 <span class="svg-icon svg-icon-1 svg-icon-danger" data-service-icon="{{ $service->icon }}">
                   <img alt="Logo" src="/${service.icon}" class="h-60px" />
                 </span>
                 <!--end::Svg Icon-->
               </span>
             </span>
             <!--end:Icon-->
             <!--begin:Info-->
             <span class="d-flex flex-column">
               <span class="fw-bolder fs-6" style="text-align: left;">${service.title}</span>
               <span class="fs-7 text-muted" style="text-align: left;">${service.description}</span>
             </span>
             <!--end:Info-->
           </span>
           <!--end:Label-->
         </label>
         
           `;
       });

       // Update #summary_schedule_details with the new HTML
       $("#summary_schedule_details").html(newRowHtml);
   });

   // //console.log(checkedServiceData);
  $("#create_schedule_form").submit(function (event) {
    event.preventDefault(); // prevent default form submission

    //console.log(checkedServiceData); 

    var formData = new FormData();
    formData.append("service_id", checkedServiceData);
    formData.append("schedule_time", $("#time_input").val());
    formData.append("schedule_date", $("#date_input").val());
    

    // //console.log(checkedServiceData, $("#time_input").val(), $("#date_input").val())


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
          url: "/client/schedule/add",
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
            //console.log(response);
            Swal.close();
        
            // Add a delay before showing the success SweetAlert
         
            Swal.fire({
              html: `
                <div id="successMessage">
                <div style="margin-top: 10px;" class="loader">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                </div>
                  <span id="redirectText">Redirect you to homepage...</span>
                </div>
              `,
              icon: "success",
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
            
          },
          error: function (response) {
            // Handle error response from server
            console.log(response);
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
