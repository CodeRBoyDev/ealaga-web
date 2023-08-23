$(document).ready(function () {
    // Function to fetch data from the server and populate the table
    let originalData;
    let table;
    let tableBody;
    let data;
    let applicationID;

    const options = {
        timeZone: "Asia/Manila",
        year: "numeric",
        month: "numeric",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    };
    const formatter = new Intl.DateTimeFormat("en-US", options);

    const currentDateTimeInManila = formatter.format(new Date());

    const fetchDataAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/application-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_application tbody");
                // Store the original data for filtering
                data = response.data;
                originalData = data.slice();

                // Create a DataTable instance with initial options
                table = $("#kt_table_application").DataTable({
                    data: data,
                    columns: [
                        // Define your column configurations here

                        {
                            data: "user_id",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.user_id === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.user_id
                                    } 
                            `;
                            },
                        },
                        {
                            data: "firstname",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                const fullName =
                                    row.firstname === null
                                        ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                        : `${row.firstname} ${row.lastname}`;
                                return fullName;
                            },
                        },
                        {
                            data: "title",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.title === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.title
                                    } 
                            `;
                            },
                        },
                        {
                            data: "num_volunteers_needed",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.num_volunteers_needed === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.num_volunteers_needed
                                    } 
                            `;
                            },
                        },
                        {
                            data: "status",
                            render: function (data, type, row) {
                                // This column is for displaying the status
                                return ` 
                                    ${
                                        row.status === 0
                                            ? `<div class="badge badge-light-warning fw-bolder">
                                                Pending
                                            </div>`
                                            : row.status === 1
                                            ? ` <div class="badge badge-light-success fw-bolder">
                                                Approved
                                            </div>`
                                            : row.status === 2
                                            ? ` <div class="badge badge-light-danger fw-bolder">
                                                Denied
                                            </div>`
                                            : row.status === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : `<div class="badge badge-light-danger fw-bolder">
                                               Not Verified
                                            </div>`
                                    } 
                            `;
                            },
                        },
                        {
                            data: "created_at",
                            render: function (data, type, row) {
                                return ` 
                                    ${
                                        row.created_at === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : moment(row.created_at).format(
                                                  "DD MMM YYYY, hh:mm a"
                                              )
                                    } 
                            `;
                            },
                        },
                        {
                            data: "is_attended",
                            render: function (data, type, row) {
                                // This column is for displaying the status

                                const isApproved = row.status === 0 || row.status === 2;

                                if (!isApproved) {
                                    return ` 
                                        ${
                                            row.is_attended === 0
                                                ? `<div class="badge badge-light-danger fw-bolder">
                                                    Not Attended
                                                </div>`
                                                : row.is_attended === 1
                                                ? ` <div class="badge badge-light-success fw-bolder">
                                                    Attended
                                                </div>`
                                                : row.is_attended === null
                                                ? `<div class="badge badge-light-warning fw-bolder">To be scheduled</div>`
                                                : `<div class="badge badge-light-warning fw-bolder">
                                                Not Verified
                                                </div>`
                                        } 
                                    `;
                                } return '';
                            },
                        },
                        {
                            data: "scheduled_date",
                            render: function (data, type, row) {
                                return ` 
                                    ${
                                        row.scheduled_date === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : moment(row.scheduled_date).format(
                                                  "DD MMM YYYY"
                                              )
                                    } 
                            `;
                            },
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                // Check if status is 1 or 2, then apply gray and disabled styles
                                const isStatus1Or2 =
                                    row.status === 1 || row.status === 2;

                                return `
                                    <div class="text-center min-w-100px">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-flex ${
                                                isStatus1Or2
                                                    ? "btn-secondary disabled"
                                                    : "btn-primary"
                                            } me-3 dropdown-toggle" ${
                                    isStatus1Or2 ? "disabled" : ""
                                } data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" data-id="${
                                                    row.id
                                                }" data-kt-application-table-filter="approve_row">Approve</a>
                                                <a href="#" class="dropdown-item" data-id="${
                                                    row.id
                                                }" data-kt-application-table-filter="deny_row">Deny</a>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            },
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                const scheduledDate = new Date(row.scheduled_date);
                                const currentDate = new Date(currentDateTimeInManila);
                        
                                const isPastOrToday = scheduledDate <= currentDate;
                                const isAttended0or1 = row.is_attended === 0 || row.is_attended === 1;
                                const isDenied = row.status === 2;
                        
                                if (!isDenied) {
                                    const buttonDisabledAttribute = isPastOrToday ? "" : "disabled";
                        
                                    return `
                                        <button type="button" data-id="${row.id}" data-kt-application-table-filter="check_in" class="btn btn-sm btn-flex ${
                                        isAttended0or1 ? "btn-secondary disabled" : "btn-success"
                                    } me-3"
                                            ${buttonDisabledAttribute}>
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                                                    </g>
                                                </svg>
                                            </span>
                                            Check-in
                                            <!--end::Svg Icon-->
                                        </button>`;
                                }
                        
                                return ''; // Return an empty string if the status is denied
                            },
                        },
                    ],
                    // Set default number of rows per page
                    pageLength: 10,
                    // Disable sorting for all columns
                    ordering: true,
                });

                // Function to filter the table by search term
                const filterBySearchTerm = (searchTerm) => {
                    if (searchTerm === "") {
                        // If the search term is empty, restore the original data
                        data = originalData.slice();
                    } else {
                        // Filter the rows based on the search term
                        data = originalData.filter((row) => {
                            const Firstname = `${row.firstname}`.toLowerCase();
                            const Title = `${row.title}`.toLowerCase();
                            return (
                                Firstname.includes(searchTerm) ||
                                Title.includes(searchTerm)
                            );
                        });
                    }
                    // Re-render the table with the filtered data
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the search input
                const searchInput = document.querySelector(
                    '[ data-kt-application-filter="search"]'
                );
                searchInput.addEventListener("input", () => {
                    const searchTerm = searchInput.value.trim().toLowerCase();
                    filterBySearchTerm(searchTerm);
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const reloadTableData = () => {
        $.ajax({
            url: "/application-list",
            type: "GET",
            dataType: "json",
            success: function (response) {
                data = response.data;
                originalData = data.slice();
                table.clear().rows.add(data).draw();
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const approveApplication = function (event) {
        event.preventDefault();
        // Get the data ID and row data from the clicked link's data attributes
        applicationID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const applicationData = { applicationID: applicationID };

        Swal.fire({
            text: "Are you sure you want to approve this application?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, of course",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (result) {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Loading...",
                    html: "Please wait while we process your request",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
                // Alternatively, you can submit the form here using AJAX if needed
                $.ajax({
                    url: `/application-management/application/approve`,
                    type: "POST",
                    data: JSON.stringify(applicationData), // Stringify the data
                    contentType: "application/json", // Set content type to JSON
                    success: function (response) {
                        if (response.success) {
                            // Close the modal first
                            reloadTableData();
                            Swal.fire({
                                text: "Application approved successfully!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    },
                    error: function (error) {
                        // Handle the error response here
                        console.error(error);
                        Swal.close();
                    },
                });
            }
        });
    };

    const denyApplication = function (event) {
        event.preventDefault();
        // Get the data ID and row data from the clicked link's data attributes
        applicationID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const applicationData = { applicationID: applicationID };

        Swal.fire({
            text: "Are you sure you want to deny this application?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, of course",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (result) {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Loading...",
                    html: "Please wait while we process your request",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
                // Alternatively, you can submit the form here using AJAX if needed
                $.ajax({
                    url: `/application-management/application/deny`,
                    type: "POST",
                    data: JSON.stringify(applicationData), // Stringify the data
                    contentType: "application/json", // Set content type to JSON
                    success: function (response) {
                        if (response.success) {
                            // Close the modal first
                            reloadTableData();
                            Swal.fire({
                                text: "Application denied successfully!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    },
                    error: function (error) {
                        // Handle the error response here
                        console.error(error);
                        Swal.close();
                    },
                });
            }
        });
    };

    const checkInApplication = function (event) {
        event.preventDefault();
        // Get the data ID and row data from the clicked link's data attributes
        applicationID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const applicationData = { applicationID: applicationID };

        Swal.fire({
            text: "Are you sure you want to mark this as attended?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, of course",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (result) {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Loading...",
                    html: "Please wait while we process your request",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
                // Alternatively, you can submit the form here using AJAX if needed
                $.ajax({
                    url: `/application-management/application/attended`,
                    type: "POST",
                    data: JSON.stringify(applicationData), // Stringify the data
                    contentType: "application/json", // Set content type to JSON
                    success: function (response) {
                        if (response.success) {
                            // Close the modal first
                            reloadTableData();
                            Swal.fire({
                                text: "Marked as Attended!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    },
                    error: function (error) {
                        // Handle the error response here
                        console.error(error);
                        Swal.close();
                    },
                });
            }
        });
    };

    $(document).on("click", "#add_application", function (event) {
        event.preventDefault();
        $("#kt_modal_add_application").modal("show");
    });

    $("#search_fullname").click(function (event) {
        event.preventDefault(); // prevent the default form submission behavior

        $("#search_result_div").hide();
        $("#indicator_search_loading_result").show();

        const full_name = $("#fullname").val();

        console.log(full_name);

        $.ajax({
            url: "/application-management/application/search",
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
                            '<a href="#" class="data-item d-flex text-dark text-hover-primary align-items-center mb-5" data-client_id="' +
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

    $("#application_content").hide();
    $("#indicator_search_loading").hide();
    let selected_date_disable = [];
    let user_id = "";

    $("#search_result_div").on("click", ".data-item", function () {
        user_id = $(this).data("client_id");
        console.log("HERE OH - ", user_id);
        const fullname =
            $(this).data("firstname") + " " + $(this).data("lastname");

        $("#fullname").val(fullname).prop("disabled", true);
        // Show the loading indicator and wait for 3 seconds
        $("#indicator_search_loading").show();
        setTimeout(function () {
            // After 3 seconds, hide the loading indicator and show the application content
            $("#indicator_search_loading").hide();
            $("#application_content").show();
            $("#search_name_container").hide();
        }, 2000);
    });

    $("#reset_fullname").on("click", function (e) {
        e.preventDefault();

        $("#application_content").hide();
        $("#fullname").val("").prop("disabled", false);
        $("#fullname").val("");
    });

    var submit_add_application_form = FormValidation.formValidation(
        document.getElementById("modal_add_application_form"),
        {
            fields: {
                fullname: {
                    validators: {
                        notEmpty: {
                            message: "Name field required.",
                        },
                    },
                },
                volunteer: {
                    validators: {
                        notEmpty: {
                            message: "Position field required.",
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

    $("#modal_add_application_form").submit(function (event) {
        event.preventDefault(); // prevent default form submission

        submit_add_application_form.validate().then(function (status) {
            if (status === "Valid") {
                Swal.fire({
                    title: "Loading...",
                    html: "Please wait while we process your request",
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
                var formData = new FormData();
                formData.append("volunteer_id", $("#volunteer").val());
                formData.append("user_id", user_id);

                $.ajax({
                    url: `/application-management/application/add`,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            // Close the modal first
                            reloadTableData();
                            $("#kt_modal_add_application").modal("hide");
                            Swal.fire({
                                text: "Application Created successfully!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    },
                    error: function (error) {
                        // Handle the error response here
                        console.error(error);
                        Swal.close();
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

    $(document).on(
        "click",
        '[data-kt-application-table-filter="approve_row"]',
        approveApplication
    );

    $(document).on(
        "click",
        '[data-kt-application-table-filter="deny_row"]',
        denyApplication
    );

    $(document).on(
        "click",
        '[data-kt-application-table-filter="check_in"]',
        checkInApplication
    );

    // Call the function to fetch data and populate the table
    fetchDataAndPopulateTable();
    approveApplication();
    denyApplication();
});
