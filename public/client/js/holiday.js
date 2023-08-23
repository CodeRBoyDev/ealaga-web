$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    const calendar_add = flatpickr("#holiday_date_input", {});
    const calendar_edit = flatpickr("#edit_holiday_date_input", {});
    // Initialize Flatpickr on the edit_holiday_date_input field
    // var editHolidayDateInput = document.getElementById('edit_holiday_date_input');
    // var flatpickrInstance = flatpickr(editHolidayDateInput, {
    //     // Flatpickr options go here
    // });

    function getHolidays() {

        $.ajax({
            url: `/holidays`,
            type: "GET",
            beforeSend: function () {
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
                      <span id="redirectText">loading...</span>
                    </div>
                  `,
                  // icon: "success",
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false,
                });


              },
            success: function (holidays) {

                Swal.close();
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    // defaultView: 'dayGridMonth',
                    showNonCurrentDates: true,
                    displayEventEnd: true,
                    events: holidays,
                    
                });
                calendar.render();

            }
        });
    };
    getHolidays();

    function getPhHoliday() {
        var timeline = document.querySelector('#kt_ph_holidays');
        timeline.innerHTML = '';
        $.ajax({
            url: `/holiday/ph`,
            type: "GET",
            beforeSend: function () {
                $("#indicator_search_loading").show();
              },
            success: function (holidays) {

                $("#indicator_search_loading").hide();
                
                var html = '';

                if (holidays.length === 0) {
                    html = `<p>No result.</p>`;
                } else {
                    holidays.forEach(data => {
                        var type = '';
                        var color = '';
                        if (data.holiday_type === 1) {
                            type = 'Regular Holiday';
                            color = 'success';
                        } else {
                            if (data.holiday_type === 2) {
                                type = 'Special (Non-Working) Holiday';
                                color = 'primary';
                            } else {
                                if (data.holiday_type === 3) {
                                    type = 'Others';
                                    color = 'warning';
                                } else {
                                    type = 'Not Set';
                                    color = 'dark';
                                }
                            }
                        };
                        var holiday_date = new Date(data.date);
                        var formatted_date = holiday_date.toLocaleDateString('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric'
                        });
    
                        html += `<div class="m-0">
                        <div class="holiday-timeline ms-n1">
                            <div class="timeline-item align-items-center mb-4">
                                <div class="timeline-content m-0">
                                    <span class="fs-8 fw-bolder text-${color} text-uppercase">${formatted_date}</span>
                                    <a href="#" id='holiday-view' data-holiday-id='${data.id}' class="holiday-view fs-6 text-gray-800 fw-bold d-block text-hover-${color}">${data.name}</a>
                                    <span class="fw-semibold text-gray-600"><strong>${type}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    `;
                    });
                   
                }
                $("#kt_ph_holidays").html(html);
               
            }
        });
    };
    getPhHoliday();

    function getCuHoliday() {
        var timeline = document.querySelector('#kt_cu_holidays');
        timeline.innerHTML = '';
        $.ajax({
            url: `/holiday/cu`,
            type: "GET",
            beforeSend: function () {
                $("#indicator_search_loading").show();
              },
            success: function (holidays) {

                $("#indicator_search_loading").hide();

                var html = '';

                if (holidays.length === 0) {
                    html = `<p>No result.</p>`;
                } else {
                    holidays.forEach(data => {
                        var type = '';
                        var color = '';
                        if (data.holiday_type === 1) {
                            type = 'Regular Holiday';
                            color = 'warning';
                        } else {
                            if (data.holiday_type === 2) {
                                type = 'Special (Non-Working) Holiday';
                                color = 'warning';
                            } else {
                                if (data.holiday_type === 3) {
                                    type = 'Others';
                                    color = 'warning';
                                } else {
                                    type = 'Not Set';
                                    color = 'dark';
                                }
                            }
                        };
                        var holiday_date = new Date(data.date);
                        var formatted_date = holiday_date.toLocaleDateString('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric'
                        });
    
                        html += `<div class="m-0">
                        <div class="holiday-timeline ms-n1">
                            <div class="timeline-item align-items-center mb-4">
                                <div class="timeline-content m-0">
                                    <span class="fs-8 fw-bolder text-${color} text-uppercase">${formatted_date}</span>
                                    <a href="#" id='holiday-view' data-holiday-id='${data.id}' class="holiday-view fs-6 text-gray-800 fw-bold d-block text-hover-${color}">${data.name}</a>
                                    <span class="fw-semibold text-gray-600"><strong>${type}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed mt-5 mb-4"></div>
                    `;
                    });
                   
                }
                $("#kt_cu_holidays").html(html);
              
            }
        });
    };
    getCuHoliday();

    var add_new_holiday_fv = FormValidation.formValidation(
        document.getElementById("submit_new_holiday"), {
            fields: {
                holiday_type: {
                    validators: {
                        notEmpty: {
                            message: "The holiday type is required",
                        },
                    },
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: "The holiday name is required",
                        },
                    },
                },
                holiday_date_input: {
                    validators: {
                        notEmpty: {
                            message: "The date is required",
                        },
                    },
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
        }
    );

    $("#submit_new_holiday").submit(function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        add_new_holiday_fv.validate().then(function (status) {

            if (status === "Valid") {
                var formData = new FormData();
                formData.append("name", $("#name").val());
                formData.append("date", $("#holiday_date_input").val());
                formData.append("holiday_type", $("#holiday_type").val());

                $.ajax({
                    url: "/holiday/add",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
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
                              <span id="redirectText">loading...</span>
                            </div>
                          `,
                          // icon: "success",
                          showCancelButton: false,
                          showConfirmButton: false,
                          allowOutsideClick: false,
                        });

                      },
                    success: function (data) {
                        // Clear the form fields

                        Swal.close();

                        // Close the modal
                        $('#modal_add_holiday').modal('hide');

                        getPhHoliday();
                        getCuHoliday();
                        getHolidays();
                        // getCalendar();

                        // location.reload();

                        Swal.fire({
                            text: "Holidayhas been added successfully.",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.close();
                        //console.log(error);
                    },
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

 

      let holidayId = "";
    document.addEventListener('click', function (event) {
        if (event.target.matches('.holiday-view')) {
            event.preventDefault();

            holidayId = event.target.dataset.holidayId;
            // //console.log(holidayId)

            $.ajax({
                url: `/holiday/single/${holidayId}`,
                method: 'GET',
                beforeSend: function () {
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
                          <span id="redirectText">loading...</span>
                        </div>
                      `,
                      // icon: "success",
                      showCancelButton: false,
                      showConfirmButton: false,
                      allowOutsideClick: false,
                    });
                  },
                success: function (holiday) {
                    
                    Swal.close();
                    var holidayreg;
                    var holidayspe;
                    var holidayoth;
                    var none;

                    if (holiday.holiday_type === 1) {
                        holidayreg = 'selected';
                    } else if(holiday.holiday_type === 2) {
                        holidayspe = 'selected';
                    } else if(holiday.holiday_type === 3) {
                        holidayoth= 'selected';
                    } else {
                        none = 'selected';
                    }
                    // Process the response and create the modal
                    var modalContent = `
                    
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <div class="modal-content">
                                                <div class="modal-header" id="kt_modal_edit_holiday">
                                                    <h2 class="fw-bold">Edit Holiday</h2>
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                                        <i class="ki-duotone ki-cross fs-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                    <form id="submit_edit_holiday" class="form" action="#">
                                                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                            id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                            data-kt-scroll-activate="{default: false, lg: true}"
                                                            data-kt-scroll-max-height="auto"
                                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                            data-kt-scroll-offset="300px">
                                                            <div class="fv-row mb-7">
                                                                <label class="required fs-6 fw-semibold mb-2">Holiday Type</label>
                                                                <select class="form-select form-select-solid" data-control="select2"
                                                                    data-hide-search="true" data-placeholder="Select a Type"
                                                                    id="edit_holiday_type" name="edit_holiday_type">
                                                                    <option value="" ${none} disabled>Select a Type</option>
                                                                    <option value="1" ${holidayreg}>Reqular Holiday</option>
                                                                    <option value="2" ${holidayspe}>Sepecial (Non-Working) Holiday</option>
                                                                    <option value="3" ${holidayoth}>Others</option>
                                                                </select>
                                                            </div>
                                                            <div class="fv-row mb-7">
                                                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                                    <span>Name of Holiday</span>
                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Specify a target priorty">
                                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span>
                                                                </label>
                                                                <input class="form-control form-control-solid"
                                                                    placeholder="${holiday.name}" value="${holiday.name}" id="edit_name"
                                                                    name="edit_name" />
                                                            </div>
                                                        </div>
                                                        <div class="text-center pt-15" id="add_holiday_action">
                                                            <button class="btn btn-danger" data-holiday-delete-id="${holiday.id}" id="delete_button" >Delete</button>
                                                            <button data-holiday-edit-id="${holiday.id}" id="edit_button" type="submit" class="btn btn-primary"
                                                                data-kt-users-modal-action="submit">
                                                                <span class="indicator-label">Update</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        `

                    // Create the modal dynamically
                    var modal = $(`<div class="modal fade" id="modal_edit_holiday_${holiday.id}" tabindex="-1" aria-hidden="true">`).append(modalContent);

                    // Append the modal to the body
                    $('body').append(modal);

                    // Open the modal
                    modal.modal('show');
                },
                error: function (xhr, status, error) {
                    // Handle error case
                    //console.log(error);
                }
            });


        };
    });

    $(document).on('click', '#edit_button', function(event) {
        event.preventDefault();

        var holidayEditId = this.dataset.holidayEditId;
        //console.log(holidayEditId);
        // Get the form element
        var form = document.getElementById(`submit_edit_holiday`);

        // Create an object to store the form data
        var formData = {};

        // Iterate through the form elements and store their values in the formData object
        for (var i = 0; i < form.elements.length; i++) {
            var element = form.elements[i];
            if (element.name) {
                formData[element.name] = element.value;
            }
        }
        // Perform your AJAX call

        $.ajax({
            url: '/holiday/update/'+ holidayId,
            method: 'POST',
            data: formData,
            beforeSend: function () {
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
                      <span id="redirectText">loading...</span>
                    </div>
                  `,
                  // icon: "success",
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false,
                });

              },
            success: function(response) {
                //console.log(response);
                Swal.close();
                // Clear the form fields
                $("#edit_holiday_type").val(null).trigger('change.select2');
                $("#edit_name").val("");

                // Close the modal
                $(`#modal_edit_holiday_${response}`).modal('hide');
                
                getPhHoliday();
                getCuHoliday();
                getHolidays();
                // getCalendar();

                Swal.fire({
                    text: "Holiday has been updated successfully.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Close",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  });

            },
            error: function(xhr, status, error) {
                // Handle the error case
                //console.log(xhr, status, error);
            }
        });
    });

    $(document).on('click', '#delete_button', function(event) {
        event.preventDefault();

        var holidayEditId = this.dataset.holidayDeleteId;

        // Perform your AJAX call
        Swal.fire({
            text: "Loading.....",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false, // Disable clicking outside the modal to close it
          });
      
          Swal.fire({
            text: "Are you sure you would like to Delete this data?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes",
            cancelButtonText: "No, return",
            customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: "btn btn-active-light",
            },
          }).then(function (result) {
            if (result.isConfirmed) {
              $.ajax({
                url: `/holiday/delete/${holidayEditId}`,
                type: "DELETE",
                contentType: false,
                processData: false,
                success: function (data) {
                  location.reload();
                  Swal.fire({
                    text: "Holiday has been successfully deleted.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Close",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  });
                },
                error: function (xhr, status, error) {
                  //console.log(error);
                },
              });
            }
          });
    });
    

    $("#modal_add_holiday").on("hide.bs.modal", function () {
   
        $("#holiday_type").val(null).trigger('change.select2');
        $("#name").val('');
        calendar_add.clear();

      });
      

    // document.querySelector("#modal_holiday_cancel").addEventListener("click", () => {
    //     Swal.fire({
    //         text: "Are you sure you would like to cancel?",
    //         icon: "warning",
    //         showCancelButton: !0,
    //         buttonsStyling: !1,
    //         confirmButtonText: "Yes, cancel it!",
    //         cancelButtonText: "No, return",
    //         customClass: {
    //             confirmButton: "btn btn-primary",
    //             cancelButton: "btn btn-active-light",
    //         },
    //     }).then(function (t) {
    //         t.value ?
    //             ($("#modal_add_holiday").modal("hide"),
    //                 $("#country").prop('selectedIndex', -1),
    //                 $("#holiday_type").prop('selectedIndex', -1),
    //                 $("#name").val(""),
    //                 $("#holiday_date_input").val("") ) :
    //             "cancel" === t.dismiss &&
    //             Swal.fire({
    //                 text: "Your form has not been cancelled!.",
    //                 icon: "error",
    //                 buttonsStyling: !1,
    //                 confirmButtonText: "Ok, got it!",
    //                 customClass: {
    //                     confirmButton: "btn btn-primary",
    //                 },
    //             });
    //     });
    // });


});