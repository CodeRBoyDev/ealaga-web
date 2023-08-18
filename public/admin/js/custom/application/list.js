$(document).ready(function () {
    // Function to fetch data from the server and populate the table
    let originalData;
    let table;
    let tableBody;
    let data;
    let applicationID;
    const fetchDataAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/application-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_volunteer tbody");
                // Store the original data for filtering
                data = response.data;
                originalData = data.slice();
                console.log('HERE-',data);

                // Create a DataTable instance with initial options
                table = $("#kt_table_volunteer").DataTable({
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
                                return ` 
                                    ${
                                        row.firstname === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.firstname
                                    } 
                            `;
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
                            data: "is_attended" ,
                            render: function (data, type, row) {
                                // This column is for displaying the status
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
                                const isStatus1Or2 = row.status === 1 || row.status === 2;
                        
                                return `
                                    <div class="text-center min-w-100px">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-flex ${isStatus1Or2 ? 'btn-secondary disabled' : 'btn-primary'} me-3 dropdown-toggle" ${isStatus1Or2 ? 'disabled' : ''} data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" data-id="${row.id}" data-kt-application-table-filter="approve_row">Approve</a>
                                                <a href="#" class="dropdown-item" data-id="${row.id}" data-kt-application-table-filter="deny_row">Deny</a>
                                            </div>
                                        </div>
                                    </div>
                                `;
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
            }
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
            }
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

    // Call the function to fetch data and populate the table
    fetchDataAndPopulateTable();
    approveApplication();
    denyApplication();
});
