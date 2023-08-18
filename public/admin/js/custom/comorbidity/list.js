$(document).ready(function () {
    // Function to fetch data from the server and populate the table
    let originalData;
    let table;
    let tableBody;
    let data;
    let comorbidityID;
    const fetchDataAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/comorbidity-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_comorbidity tbody");
                // Store the original data for filtering
                data = response.data;
                originalData = data.slice();

                // Create a DataTable instance with initial options
                table = $("#kt_table_comorbidity").DataTable({
                    data: data,
                    columns: [
                        // Define your column configurations here

                        {
                            data: "name",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.name === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.name
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
                                            : `<div class="badge badge-light fw-bolder" style="color: black;  word-wrap: break-word; white-space: pre-wrap;">${row.description}</div`
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
                                            <a href="#" class="dropdown-item" data-id="${row.id}"  data-kt-comorbidity-table-filter="edit_row">Edit</a>
                                            <a href="#" class="dropdown-item" data-id="${row.id}" data-kt-comorbidity-table-filter="delete_row">Delete</a>
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
                            const Name = `${row.name}`.toLowerCase();
                            const Description = row.description.toLowerCase();
                            return (
                                Name.includes(searchTerm) ||
                                Description.includes(searchTerm)
                            );
                        });
                    }
                    // Re-render the table with the filtered data
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the search input
                const searchInput = document.querySelector(
                    '[ data-kt-comorbidity-filter="search"]'
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
            url: "/comorbidity-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Update the DataTable with the new data
                data = response.data;
                originalData = data.slice();
                table.clear().rows.add(data).draw();
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };
    const addComorbidity = () => {
        let t;
        t = document.querySelector("#kt_modal_add_comorbidity_form");
        const submitButton = document.querySelector(
            "[data-kt-comorbidity-modal-action='submit']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
            Swal.fire({
                html: ` <div class="fv-row mb-7">
                                    <div style="margin-top: 10px;" class="loader">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    </div>
                                                                                </div>
                                    <div id="successMessage">
                                        <span id="redirectText">Please wait while we process your request</span>
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
            // Alternatively, you can submit the form here using AJAX if needed
            var formData = new FormData(t);
            $.ajax({
                url: `/comorbidity-management/comorbidity/add`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        reloadTableData();
                        t.reset();
                        $("#kt_modal_add_comorbidity").modal("hide");
                        Swal.fire({
                            text: "Comorbidity Created successfully!",
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

    const deleteComorbidity = function (event) {
        event.preventDefault(); // Prevent the default action of the link
        // Get the data ID and row data from the clicked link's data attributes
        comorbidityID = $(this).data("id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const comorbidityData = { comorbidityID: comorbidityID };

        Swal.fire({
            html: ` <div class="fv-row mb-7">
                                    <div style="margin-top: 10px;" class="loader">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    </div>
                                                                                </div>
                                    <div id="successMessage">
                                        <span id="redirectText">Please wait while we process your request</span>
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
        // Alternatively, you can submit the form here using AJAX if needed
        $.ajax({
            url: `/comorbidity-management/comorbidity/delete`,
            type: "POST",
            data: JSON.stringify(comorbidityData), // Stringify the data
            contentType: "application/json", // Set content type to JSON
            success: function (response) {
                if (response.success) {
                    // Close the modal first
                    reloadTableData();
                    Swal.fire({
                        text: "Comorbidity deleted successfully!",
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
    };

    const editComorbidity = function (event) {
        event.preventDefault(); // Prevent the default action of the link

        // Get the data ID and row data from the clicked link's data attributes
        comorbidityID = $(this).data("id");
        // Get the DataTables API instance for the table
        const table = $("#kt_table_comorbidity").DataTable();

        // Get the closest row element to the clicked link
        const closestRow = $(this).closest("tr");

        // Get the row data from the DataTables API
        const rowData = table.row(closestRow).data();
        // Populate the form fields with the rowData
        if (rowData.name !== null && rowData.name !== undefined) {
            $("#kt_modal_edit_comorbidity_form [name='comorbidity']").val(
                rowData.name
            );
        }
        if (rowData.description !== null && rowData.description !== undefined) {
            $("#kt_modal_edit_comorbidity_form [name='description']").val(
                rowData.description
            );
        }
        // Trigger the modal show method here
        $("#kt_modal_edit_comorbidity").modal("show");
    };

    const updateComorbidity = () => {
        let t;
        t = document.querySelector("#kt_modal_edit_comorbidity_form");
        const submitButton = document.querySelector(
            "[data-kt-edit-comorbidity-modal-action='submit']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
            Swal.fire({
                html: ` <div class="fv-row mb-7">
                                    <div style="margin-top: 10px;" class="loader">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    </div>
                                                                                </div>
                                    <div id="successMessage">
                                        <span id="redirectText">Please wait while we process your request</span>
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

            // Alternatively, you can submit the form here using AJAX if needed
            var formData = new FormData(t);
            formData.append("comorbidityId", comorbidityID); // Append the comorbidityId to the FormData
            $.ajax({
                url: `/comorbidity-management/comorbidity/update`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        reloadTableData();
                        t.reset();
                        $("#kt_modal_edit_comorbidity").modal("hide");
                        Swal.fire({
                            text: "Comorbidity Updated successfully!",
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

    $(document).on(
        "click",
        '[data-kt-comorbidity-table-filter="delete_row"]',
        deleteComorbidity
    );
    $(document).on(
        "click",
        '[data-kt-comorbidity-table-filter="edit_row"]',
        editComorbidity
    );
    // Call the function to fetch data and populate the table
    fetchDataAndPopulateTable();
    addComorbidity();
    updateComorbidity();
});
