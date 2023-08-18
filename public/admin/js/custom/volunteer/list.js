$(document).ready(function () {
    // Function to fetch data from the server and populate the table
    let originalData;
    let table;
    let tableBody;
    let data;
    let volunteerID;
    const fetchDataAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/volunteer-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_volunteer tbody");
                // Store the original data for filtering
                data = response.data;
                originalData = data.slice();

                // Create a DataTable instance with initial options
                table = $("#kt_table_volunteer").DataTable({
                    data: data,
                    columns: [
                        // Define your column configurations here

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
                            data: "description",
                            render: function (data, type, row) {
                                // This column is for displaying the personal address
                                return ` 
                                    ${
                                        row.description === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : `<div class="badge badge-light fw-bolder" style="color: black;  word-wrap: break-word; white-space: pre-wrap;">${row.description}</div>`
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
                            data: "scheduled_time",
                            render: function (data, type, row) {
                                if (row.scheduled_time === null) {
                                    return '<div class="badge badge-light-danger fw-bolder">Not Indicated</div>';
                                } else {
                                    const timeParts = row.scheduled_time.split(":");
                                    const hours = parseInt(timeParts[0]);
                                    const minutes = parseInt(timeParts[1]);
                                    const amPm = hours >= 12 ? "pm" : "am";
                                    const formattedTime = `${hours === 0 || hours === 12 ? 12 : hours % 12}:${minutes.toString().padStart(2, "0")} ${amPm}`;
                                    
                                    return formattedTime;
                                }
                            },
                        },
                        {
                            data: "required_skills",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.required_skills === null
                                            ? `<div class="badge badge-light-success fw-bolder">No skill required</div>`
                                            : row.required_skills
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
                            data: "created_at",
                            render: function (data, type, row) {
                                // This column is for displaying the created_at date
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
                            data: null,
                            render: function (data, type, row) {
                                // This column is for displaying the actions dropdown
                                return `
                                <div class="text-center min-w-100px">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-sm btn-flex btn-primary me-3 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item" data-id="${row.id}" data-kt-volunteer-table-filter="edit_row">Edit</a>
                                            <a href="#" class="dropdown-item" data-id="${row.id}" data-kt-volunteer-table-filter="delete_row">Delete</a>
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
                            const Title = `${row.title}`.toLowerCase();
                            const Description = row.description.toLowerCase();
                            return (
                                Title.includes(searchTerm) ||
                                Description.includes(searchTerm)
                            );
                        });
                    }
                    // Re-render the table with the filtered data
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the search input
                const searchInput = document.querySelector(
                    '[ data-kt-volunteer-filter="search"]'
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
            url: "/volunteer-list",
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

    const addVolunteer = () => {
        let t;
        t = document.querySelector("#kt_modal_add_volunteer_form");
        const submitButton = document.querySelector(
            "[data-kt-volunteer-modal-action='submit']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
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
            var formData = new FormData(t);
            $.ajax({
                url: `/volunteer-management/volunteer/add`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        reloadTableData();
                        t.reset();
                        $("#kt_modal_add_volunteer").modal("hide");
                        Swal.fire({
                            text: "Volunteer Created successfully!",
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
        });
    };

    const editVolunteer = function (event) {
        event.preventDefault(); // Prevent the default action of the link

        // Get the data ID and row data from the clicked link's data attributes
        volunteerID = $(this).data("id");
        // Get the DataTables API instance for the table
        const table = $("#kt_table_volunteer").DataTable();

        // Get the closest row element to the clicked link
        const closestRow = $(this).closest("tr");

        // Get the row data from the DataTables API
        const rowData = table.row(closestRow).data();
        // Populate the form fields with the rowData
        if (rowData.title !== null && rowData.title !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='title']").val(
                rowData.title
            );
        }
        if (rowData.description !== null && rowData.description !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='description']").val(
                rowData.description
            );
        }
        if (rowData.scheduled_date !== null && rowData.scheduled_date !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='date']").val(
                rowData.scheduled_date
            );
        }
        if (rowData.scheduled_time !== null && rowData.scheduled_time !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='time']").val(
                rowData.scheduled_time
            );
        }
        if (rowData.required_skills !== null && rowData.required_skills !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='skill']").val(
                rowData.required_skills
            );
        }
        if (rowData.num_volunteers_needed !== null && rowData.num_volunteers_needed !== undefined) {
            $("#kt_modal_edit_volunteer_form [name='vacant']")
                .val(rowData.num_volunteers_needed)
                .trigger("change");
        }

        // Trigger the modal show method here
        $("#kt_modal_edit_volunteer").modal("show");
    };

    const updateVolunteer = () => {
        let t;
        t = document.querySelector("#kt_modal_edit_volunteer_form");
        const submitButton = document.querySelector(
            "[data-kt-edit-volunteer-modal-action='submit']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
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
            var formData = new FormData(t);
            formData.append("volunteerId", volunteerID); // Append the volunteerID to the FormData
            $.ajax({
                url: `/volunteer-management/volunteer/update`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        reloadTableData();
                        t.reset();
                        $("#kt_modal_edit_volunteer").modal("hide");
                        Swal.fire({
                            text: "Volunteer Updated successfully!",
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
        });
    };

    const deleteVolunteer = function (event) {
        event.preventDefault(); // Prevent the default action of the link
        // Get the data ID and row data from the clicked link's data attributes
        volunteerID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const volunteerData = { volunteerID: volunteerID };

        Swal.fire({
            text: "Are you sure you would like to delete this?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yeah sure",
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
                    url: `/volunteer-management/volunteer/delete`,
                    type: "POST",
                    data: JSON.stringify(volunteerData), // Stringify the data
                    contentType: "application/json", // Set content type to JSON
                    success: function (response) {
                        if (response.success) {
                            // Close the modal first
                            reloadTableData();
                            Swal.fire({
                                text: "Volunteer deleted successfully!",
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
        '[data-kt-volunteer-table-filter="edit_row"]',
        editVolunteer
    );

    $(document).on(
        "click",
        '[data-kt-volunteer-table-filter="delete_row"]',
        deleteVolunteer
    );

    // Call the function to fetch data and populate the table
    fetchDataAndPopulateTable();
    addVolunteer();
    updateVolunteer();
});
