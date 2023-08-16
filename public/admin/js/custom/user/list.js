$(document).ready(function () {
    // Function to fetch data from the server and populate the table
    // Declare the originalData and selectedRole variables outside the function to make them accessible
    let originalData;
    let selectedRole = ""; // Initialize selectedRole with an empty string
    let table;
    let tableBody;
    let data;
    let addForm = document.getElementById("kt_modal_add_user_form");
    let editForm = document.getElementById("kt_modal_edit_user_form");

    let userID;
    const fetchDataAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/user-list", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_users tbody");
                // Store the original data for filtering
                data = response.data;
                originalData = data.slice();

                // Create a DataTable instance with initial options
                table = $("#kt_table_users").DataTable({
                    data: data,
                    columns: [
                        // Define your column configurations here
                        {
                            data: null,
                            render: function (data, type, row) {
                                // This column is for displaying the user details (firstname and lastname)
                                const imgPath = row.img_path
                                    ? `/${row.img_path}`
                                    : "/admin/media/avatars/blank.png";
                                const name = `${row.firstname} ${row.lastname}`;
                                const emailOrUsername = row.email
                                    ? row.email
                                    : row.username;

                                return `
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3"> 
                                            <div class="symbol-label">
                                                <img src="${imgPath}" alt="${name}" class="w-100" />
                                            </div> 
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="/user-management/users/view/${row.id}" "class="text-gray-800 text-hover-primary mb-1">${name}</a>
                                            <span>${emailOrUsername}</span>
                                        </div>
                                    </div>
                                `;
                            },
                        },

                        {
                            data: null,
                            render: function (data, type, row) {
                                // This column is for displaying the role
                                return ` 
                                    ${
                                        row.role === 0
                                            ? "Admin"
                                            : row.role === 1
                                            ? "Personnel"
                                            : row.role === 2
                                            ? "Client"
                                            : `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                    } 
                            `;
                            },
                        },
                        {
                            data: "birthday",
                            render: function (data, type, row) {
                                // This column is for displaying the age
                                return `
                                    ${
                                        row.birthday === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : `<div class="badge badge-light fw-bolder" style="color: black;">${moment(
                                                  row.birthday
                                              ).format("DD MMM YYYY ")}</div>`
                                    }
                            `;
                            },
                        },
                        {
                            data: "contact_number",
                            render: function (data, type, row) {
                                // This column is for displaying the contact number
                                return ` 
                                    ${
                                        row.contact_number === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : row.contact_number
                                    } 
                            `;
                            },
                        },
                        {
                            data: "barangay",
                            render: function (data, type, row) {
                                // This column is for displaying the personal address
                                return ` 
                                    ${
                                        row.barangay === null
                                            ? `<div class="badge badge-light-danger fw-bolder">Not Indicated</div>`
                                            : `<div class="badge badge-light fw-bolder" style="color: black; max-width: 150px; word-wrap: break-word; white-space: pre-wrap;">${row.barangay}</div`
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
                                                Verified
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
                                     <button type="button"  data-id="${row.id}" data-kt-users-table-filter="edit_row" class="btn btn-sm btn-flex btn-primary me-3" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_personal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <rect opacity="0.3" x="4" y="11" width="12" height="2"
                                                    rx="1" fill="black" />

                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        Edit
                                    </button>
                            `;
                            },
                        },
                    ],
                    // Set default number of rows per page
                    pageLength: 10,
                    // Disable sorting for all columns
                    ordering: false,
                });

                // Function to filter the table by search term
                const filterBySearchTerm = (searchTerm) => {
                    if (searchTerm === "") {
                        // If the search term is empty, restore the original data
                        data = originalData.slice();
                    } else {
                        // Filter the rows based on the search term
                        data = originalData.filter((row) => {
                            const fullName =
                                `${row.firstname} ${row.lastname}`.toLowerCase();
                            const email = row.email
                                ? row.email.toLowerCase()
                                : row.username.toLowerCase();
                            return (
                                fullName.includes(searchTerm) ||
                                email.includes(searchTerm)
                            );
                        });
                    }
                    // Re-render the table with the filtered data
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the search input
                const searchInput = document.querySelector(
                    '[data-kt-user-table-filter="search"]'
                );
                searchInput.addEventListener("input", () => {
                    const searchTerm = searchInput.value.trim().toLowerCase();
                    filterBySearchTerm(searchTerm);
                });

                // Function to filter the table by role and/or barangay
                const filterTable = () => {
                    // Check if Role filter is also applied
                    const roleFilter = document.querySelector(
                        '[data-kt-user-table-filter="role"]'
                    );
                    const selectedRole = roleFilter.value;

                    // Check if Barangay filter is also applied
                    const barangayFilter = document.querySelector(
                        '[data-kt-user-table-filter="barangay"]'
                    );
                    const selectedBarangay = barangayFilter.value
                        .trim()
                        .toLowerCase();

                    if (selectedRole === "" && selectedBarangay === "") {
                        // If no role and barangay are selected, restore the original data
                        data = originalData.slice();
                    } else {
                        // Filter the rows based on the selected role and/or barangay
                        data = originalData.filter((row) => {
                            const roleMatch =
                                selectedRole === "" ||
                                row.role.toString() === selectedRole;
                            const barangayMatch =
                                selectedBarangay === "" ||
                                (row.barangay &&
                                    row.barangay
                                        .toLowerCase()
                                        .includes(selectedBarangay));
                            return roleMatch && barangayMatch;
                        });
                    }
                    // Re-render the table with the filtered data
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the "Apply" button click for Role filter
                const applyRoleButton = document.querySelector(
                    '[data-kt-user-table-filter="filter"]'
                );
                applyRoleButton.addEventListener("click", () => {
                    filterTable();
                });

                // Function to reset the filters
                const resetFilters = () => {
                    // Reset the selectedRole and selectedBarangay to empty strings
                    const roleFilter = document.querySelector(
                        '[data-kt-user-table-filter="role"]'
                    );
                    const barangayFilter = document.querySelector(
                        '[data-kt-user-table-filter="barangay"]'
                    );
                    roleFilter.value = "";
                    barangayFilter.value = "";

                    // Re-render the table with the original data
                    data = originalData.slice();
                    table.clear().rows.add(data).draw();
                };

                // Add an event listener for the "Reset" button click
                const resetButton = document.querySelector(
                    '[data-kt-user-table-filter="reset"]'
                );
                resetButton.addEventListener("click", () => {
                    resetFilters();
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };
    const fetchBarangay = () => {
        // Make an AJAX request to fetch the JSON data
        $.ajax({
            url: "/data/barangay.json",
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Populate the select dropdown with the JSON data
                const selectElement = document.querySelector(
                    '[data-kt-user-table-filter="barangay"]'
                );
                const selectElement2 =
                    document.querySelector('[name="brgyId"]');
                const barangayUpdate =
                    document.querySelector('[name="barangay"]');

                response.forEach((barangay) => {
                    const option = new Option(barangay, barangay);
                    selectElement.add(option);
                });

                response.forEach((barangay) => {
                    const option = new Option(barangay, barangay);
                    selectElement2.add(option);
                });

                response.forEach((barangay) => {
                    const option = new Option(barangay, barangay);
                    barangayUpdate.add(option);
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const reloadTableData = () => {
        $.ajax({
            url: "/user-list", // Replace '/user-list' with the appropriate route URL
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
    const KTModalAddUserForm = (() => {
        let t, e;

        const init = () => {
            // Your existing code for form validation here...
            t = document.querySelector("#kt_modal_add_user_form");
            e = FormValidation.formValidation(t, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "First name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "First name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    middle_name: {
                        validators: {
                            notEmpty: {
                                message: "Middle name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "Middle name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "Last name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "Last name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    user_email: {
                        validators: {
                            // notEmpty: {
                            //     message: "Email address is required",
                            // },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                    }),
                },
            });

            // Add event listener to the submit button
            const submitButton = document.querySelector(
                "[data-kt-users-modal-action='submit']"
            );
            submitButton.addEventListener("click", function (event) {
                event.preventDefault();
                e.validate().then(function (status) {
                    if (status === "Valid") {
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
                            url: "/user-management/users/add",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success) {
                                    // Close the modal first
                                    // Reload the DataTables table with the latest data
                                    reloadTableData();
                                    addForm.reset();
                                    const attachmentPreview =
                                        document.querySelector(
                                            ".attachment-preview"
                                        );

                                    const removeAllButton =
                                        document.getElementById(
                                            "removeAllButton"
                                        );
                                    attachmentPreview.innerHTML = ""; // Clear all previews
                                    attachmentPreview.style.display = "none"; // Hide the attachment preview div
                                    removeAllButton.style.display = "none";
                                    $("#kt_modal_add_user").modal("hide");
                                    Swal.fire({
                                        text: "User Created successfully!",
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
            });

            // Get the middle name input element
            const middleNameInput = document.querySelector(
                "input[name='middle_name']"
            );
            // Get the "No Middle Name?" checkbox element
            const noMiddleNameCheckbox = document.getElementById(
                "no_middle_name_checkbox"
            );

            // Add event listener to the "No Middle Name?" checkbox
            // Add event listener to the "No Middle Name?" checkbox
            noMiddleNameCheckbox.addEventListener("change", function () {
                if (noMiddleNameCheckbox.checked) {
                    // If the checkbox is checked, clear the middle name value
                    middleNameInput.value = "";
                    // Disable the middle name input
                    middleNameInput.disabled = true;
                    // Remove the "is-invalid" class for validation styling
                    middleNameInput.classList.remove("is-invalid");
                    // Remove the validation message
                    const formGroup = middleNameInput.closest(".fv-row");
                    const messageContainer = formGroup.querySelector(
                        ".validation-message"
                    );
                    if (messageContainer) {
                        messageContainer.innerHTML = "";
                    }

                    // Mark the middle name field as valid since it's not required anymore
                    e.updateFieldStatus("middle_name", "Valid");
                } else {
                    // If the checkbox is unchecked, enable the middle name input
                    middleNameInput.disabled = false;

                    // Trigger revalidation of the middle name field
                    e.revalidateField("middle_name");
                }
            });

            // Listen for validation events and update the messages
            e.on("core.form.validated", function (e) {
                const elements = e.elements;
                elements.forEach(function (element) {
                    const formGroup = element.closest(".fv-row");
                    let messageContainer = formGroup.querySelector(
                        ".validation-message"
                    );
                    if (!messageContainer) {
                        messageContainer = document.createElement("div");
                        messageContainer.classList.add("validation-message");
                        formGroup.appendChild(messageContainer);
                    }

                    const message = element.validationMessage || ""; // Set the message to an empty string if undefined
                    if (element.validity.valid) {
                        formGroup.classList.remove("is-invalid");
                        messageContainer.innerHTML = "";
                    } else {
                        formGroup.classList.add("is-invalid");
                        messageContainer.innerHTML = message;
                    }
                });
            });
        };

        return {
            init: init,
        };
    })();

    const handleEditClick = function (event) {
        event.preventDefault(); // Prevent the default action of the link

        // Get the data ID and row data from the clicked link's data attributes
        userID = $(this).data("id");
        // Get the DataTables API instance for the table
        const table = $("#kt_table_users").DataTable();

        // Get the closest row element to the clicked link
        const closestRow = $(this).closest("tr");

        // Get the row data from the DataTables API
        const rowData = table.row(closestRow).data();
        // Populate the form fields with the rowData
        // Assuming you have the image URL in the 'rowData.avatar' property
        if (rowData.img_path !== null && rowData.img_path !== undefined) {
            // Set the background image of the image input preview
            $("#editImageWrapper").css(
                "background-image",
                `url("/${rowData.img_path}")`
            );
        } else {
            $("#editImageWrapper").css(
                "background-image",
                `url("/admin/media/avatars/blank.png")`
            );
        }

        if (rowData.firstname !== null && rowData.firstname !== undefined) {
            $("#kt_modal_edit_user_form [name='first_name']").val(
                rowData.firstname
            );
        }
        if (rowData.middlename !== null && rowData.middlename !== undefined) {
            $("#kt_modal_edit_user_form [name='middle_name']").val(
                rowData.middlename
            );
        }
        if (rowData.lastname !== null && rowData.lastname !== undefined) {
            $("#kt_modal_edit_user_form [name='last_name']").val(
                rowData.lastname
            );
        }
        if (rowData.suffix !== null && rowData.suffix !== undefined) {
            $("#kt_modal_edit_user_form [name='suffix']")
                .val(rowData.suffix)
                .trigger("change");
        }

        if (
            rowData.contact_number !== null &&
            rowData.contact_number !== undefined
        ) {
            $("#kt_modal_edit_user_form [name='contact_number']").val(
                rowData.contact_number
            );
        }
        if (rowData.birthday !== null && rowData.birthday !== undefined) {
            $("#kt_modal_edit_user_form [name='birthday']").val(
                rowData.birthday
            );
        }
        if (rowData.username !== null && rowData.username !== undefined) {
            $("#kt_modal_edit_user_form [name='username']").val(
                rowData.username
            );
        }
        if (rowData.email !== null && rowData.email !== undefined) {
            $("#kt_modal_edit_user_form [name='user_email']").val(
                rowData.email
            );
        }
        if (rowData.role !== null && rowData.role !== undefined) {
            $("#kt_modal_edit_user_form [name='user_role']")
                .filter("[value='" + rowData.role + "']")
                .prop("checked", true);
        }
        if (
            rowData.access_level !== null &&
            rowData.access_level !== undefined
        ) {
            $("#kt_modal_edit_user_form [name='access_level']")
                .filter("[value='" + rowData.access_level + "']")
                .prop("checked", true);
        }
        if (rowData.barangay !== null && rowData.barangay !== undefined) {
            $("#kt_modal_edit_user_form [name='barangay']")
                .val(rowData.barangay)
                .trigger("change");
        }
        if (rowData.unitNo !== null && rowData.unitNo !== undefined) {
            $("#kt_modal_edit_user_form [name='unitNo']").val(rowData.unitNo);
        }
        if (rowData.houseNo !== null && rowData.houseNo !== undefined) {
            $("#kt_modal_edit_user_form [name='houseNo']").val(rowData.houseNo);
        }
        if (rowData.street !== null && rowData.street !== undefined) {
            $("#kt_modal_edit_user_form [name='street']").val(rowData.street);
        }
        if (rowData.village !== null && rowData.village !== undefined) {
            $("#kt_modal_edit_user_form [name='village']").val(rowData.village);
        }

        // Assuming the 'valid_id' property in rowData is a serialized string
        if (rowData.valid_id !== null && rowData.valid_id !== undefined) {
            const validIdArray = JSON.parse(rowData.valid_id);

            // Clear existing previews before populating new ones
            $("#valid-id-preview").empty();

            // Loop through the validIdArray and create HTML elements for each valid ID
            validIdArray.forEach((validIdPath) => {
                const colDiv = document.createElement("div");
                colDiv.classList.add("col-md-6"); // Add the Bootstrap column class for medium-sized screens and larger

                const validIdPreview = document.createElement("a"); // Wrap the image with an anchor tag for the lightbox effect
                validIdPreview.href = "/" + validIdPath; // Set the anchor href to the image URL
                validIdPreview.classList.add("valid-id-image"); // Add the class for Fancybox functionality
                validIdPreview.setAttribute(
                    "data-fslightbox",
                    "valid-id-gallery"
                ); // Set the data-fslightbox attribute for the gallery identifier
                validIdPreview.style.maxWidth = "100%";
                validIdPreview.style.display = "flex"; // Use flexbox to center the image horizontally
                validIdPreview.style.justifyContent = "center"; // Center the image horizontally
                colDiv.style.border = "1px dashed red"; // Add the dashed border
                const image = document.createElement("img");
                image.src = "/" + validIdPath;
                image.style.width = "100%"; // Set the image width to fill the column
                image.style.height = "150px"; // Set the fixed height for the image
                image.style.objectFit = "cover"; // To make sure the image maintains aspect ratio and covers the whole container
                image.style.borderRadius = "5px";

                validIdPreview.appendChild(image);
                colDiv.appendChild(validIdPreview);
                $("#valid-id-preview").append(colDiv);
            });

            // Initialize Fancybox for the images
            $(".valid-id-image").fancybox({
                loop: true,
                buttons: [
                    "slideShow", // Enable the slideshow button
                    "thumbs",
                    "close",
                ],
                thumbs: {
                    autoStart: false,
                    axis: "x",
                },
            });
        } else {
            // If no valid IDs are available, display the message "No Uploaded Valid Id"
            $("#valid-id-preview").html(
                "<div class='col-md-12 text-center'>No Uploaded Valid Id</div>"
            );
        }

        if (rowData.status !== null && rowData.status !== undefined) {
            console.log(rowData.status);
            $("#kt_modal_edit_user_form [name='status']")
                .val(rowData.status)
                .trigger("change");
        }

        // Trigger the modal show method here
        $("#kt_modal_edit_user").modal("show");
    };

    const KTModalEditUserForm = (() => {
        let t, e;

        const init = () => {
            // Your existing code for form validation here...
            t = document.querySelector("#kt_modal_edit_user_form");
            e = FormValidation.formValidation(t, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "First name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "First name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    middle_name: {
                        validators: {
                            notEmpty: {
                                message: "Middle name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "Middle name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "Last name is required",
                            },
                            regexp: {
                                regexp: /^[^\s].*[^\s]$/, // Regex to disallow leading/trailing spaces
                                message:
                                    "Last name cannot have leading or trailing spaces",
                            },
                        },
                    },
                    user_email: {
                        validators: {
                            // notEmpty: {
                            //     message: "Email address is required",
                            // },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required",
                            },
                        },
                    },
                    contact_number: {
                        validators: {
                            notEmpty: {
                                message: "Contact number is required",
                            },
                            stringLength: {
                                min: 11,
                                message:
                                    "Contact number must be at least 11 characters",
                            },
                        },
                    },
                    birthday: {
                        validators: {
                            notEmpty: {
                                message: "Birthday is required",
                            },
                            date: {
                                format: "YYYY-MM-DD",
                                message:
                                    "The value is not a valid date (YYYY-MM-DD)",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                    }),
                },
            });

            // Add event listener to the submit button
            const submitButton = document.querySelector(
                "[data-kt-users-edit-modal-action='submit']"
            );
            submitButton.addEventListener("click", function (event) {
                event.preventDefault();
                e.validate().then(function (status) {
                    if (status === "Valid") {
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
                            url: "/user-management/users/" + userID,
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success) {
                                    // Close the modal first
                                    // Reload the DataTables table with the latest data
                                    reloadTableData();
                                    editForm.reset();
                                    const attachmentPreview =
                                        document.querySelector(
                                            ".edit_attachment-preview"
                                        );
                                    attachmentPreview.innerHTML = ""; // Clear all previews
                                    attachmentPreview.style.display = "none"; // Hide the attachment preview div
                                    const removeAllButton =
                                        document.getElementById(
                                            "edit_removeAllButton"
                                        );
                                    removeAllButton.style.display = "none";
                                    $("#kt_modal_edit_user").modal("hide");
                                    Swal.fire({
                                        text: "User Updated successfully!",
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
            });

            // Get the middle name input element
            const middleNameInput = document.querySelector(
                "#kt_modal_edit_user_form [name='middle_name']"
            );

            // Get the "No Middle Name?" checkbox element
            const noMiddleNameCheckbox = document.getElementById(
                "no_middle_name_checkbox_edit"
            );

            // Add event listener to the "No Middle Name?" checkbox
            // Add event listener to the "No Middle Name?" checkbox
            noMiddleNameCheckbox.addEventListener("change", function () {
                if (noMiddleNameCheckbox.checked) {
                    // If the checkbox is checked, clear the middle name value
                    middleNameInput.value = "";
                    // Disable the middle name input
                    middleNameInput.disabled = true;
                    // Remove the "is-invalid" class for validation styling
                    middleNameInput.classList.remove("is-invalid");
                    // Remove the validation message
                    const formGroup = middleNameInput.closest(".fv-row");
                    const messageContainer = formGroup.querySelector(
                        ".validation-message"
                    );
                    if (messageContainer) {
                        messageContainer.innerHTML = "";
                    }

                    // Mark the middle name field as valid since it's not required anymore
                    e.updateFieldStatus("middle_name", "Valid");
                } else {
                    // If the checkbox is unchecked, enable the middle name input
                    middleNameInput.disabled = false;

                    // Trigger revalidation of the middle name field
                    e.revalidateField("middle_name");
                }
            });

            // Listen for validation events and update the messages
            e.on("core.form.validated", function (e) {
                const elements = e.elements;
                elements.forEach(function (element) {
                    const formGroup = element.closest(".fv-row");
                    let messageContainer = formGroup.querySelector(
                        ".validation-message"
                    );
                    if (!messageContainer) {
                        messageContainer = document.createElement("div");
                        messageContainer.classList.add("validation-message");
                        formGroup.appendChild(messageContainer);
                    }

                    const message = element.validationMessage || ""; // Set the message to an empty string if undefined
                    if (element.validity.valid) {
                        formGroup.classList.remove("is-invalid");
                        messageContainer.innerHTML = "";
                    } else {
                        formGroup.classList.add("is-invalid");
                        messageContainer.innerHTML = message;
                    }
                });
            });
        };

        return {
            init: init,
        };
    })();
    // Initialize the form validation when the DOM content is loaded
    KTUtil.onDOMContentLoaded(function () {
        KTModalAddUserForm.init();
    });
    // Initialize the form validation when the DOM content is loaded
    KTUtil.onDOMContentLoaded(function () {
        KTModalEditUserForm.init();
    });
    // Call the function to fetch data and populate the table
    fetchDataAndPopulateTable();
    fetchBarangay();

    // Add an event listener to the document to handle clicks on the "Edit" link
    $(document).on(
        "click",
        '[data-kt-users-table-filter="edit_row"]',
        handleEditClick
    );
});
