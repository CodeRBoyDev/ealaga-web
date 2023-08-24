$(document).ready(function () {
    let editForm = document.getElementById("kt_modal_edit_personal_form");
    const handleEditClick = function (event) {
        event.preventDefault(); // Prevent the default action of the link
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
        $.ajax({
            url: "/profile-edit", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    Swal.close();
                    // Get a reference to the table body
                    const rowData = response.data;
                    if (
                        rowData.img_path !== null &&
                        rowData.img_path !== undefined
                    ) {
                        // Set the background image of the image input preview
                        $("#editprofileImageWrapper").css(
                            "background-image",
                            `url("/${rowData.img_path}")`
                        );
                    } else {
                        $("#editprofileImageWrapper").css(
                            "background-image",
                            `url("/admin/media/avatars/blank.png")`
                        );
                    }

                    if (
                        rowData.firstname !== null &&
                        rowData.firstname !== undefined
                    ) {
                        $(
                            "#kt_modal_edit_personal_form [name='first_name']"
                        ).val(rowData.firstname);
                    }
                    if (
                        rowData.middlename !== null &&
                        rowData.middlename !== undefined
                    ) {
                        $(
                            "#kt_modal_edit_personal_form [name='middle_name']"
                        ).val(rowData.middlename);
                    }
                    if (
                        rowData.lastname !== null &&
                        rowData.lastname !== undefined
                    ) {
                        $(
                            "#kt_modal_edit_personal_form [name='last_name']"
                        ).val(rowData.lastname);
                    }
                    if (
                        rowData.suffix !== null &&
                        rowData.suffix !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='suffix']")
                            .val(rowData.suffix)
                            .trigger("change");
                    }

                    if (
                        rowData.gender !== null &&
                        rowData.gender !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='gender']")
                            .val(rowData.gender)
                            .trigger("change");
                    }

                    if (
                        rowData.contact_number !== null &&
                        rowData.contact_number !== undefined
                    ) {
                        $(
                            "#kt_modal_edit_personal_form [name='contact_number']"
                        ).val(rowData.contact_number);
                    }
                    if (
                        rowData.birthday !== null &&
                        rowData.birthday !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='birthday']").val(
                            rowData.birthday
                        );
                    }
                    if (
                        rowData.username !== null &&
                        rowData.username !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='username']").val(
                            rowData.username
                        );
                    }
                    if (rowData.email !== null && rowData.email !== undefined) {
                        $(
                            "#kt_modal_edit_personal_form [name='user_email']"
                        ).val(rowData.email);
                    }
                    if (rowData.role !== null && rowData.role !== undefined) {
                        $("#kt_modal_edit_personal_form [name='user_role']")
                            .filter("[value='" + rowData.role + "']")
                            .prop("checked", true);
                    }
                    if (
                        rowData.access_level !== null &&
                        rowData.access_level !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='access_level']")
                            .filter("[value='" + rowData.access_level + "']")
                            .prop("checked", true);
                    }
                    if (
                        rowData.barangay !== null &&
                        rowData.barangay !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='barangay']")
                            .val(rowData.barangay)
                            .trigger("change");
                    }
                    if (
                        rowData.unitNo !== null &&
                        rowData.unitNo !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='unitNo']").val(
                            rowData.unitNo
                        );
                    }
                    if (
                        rowData.houseNo !== null &&
                        rowData.houseNo !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='houseNo']").val(
                            rowData.houseNo
                        );
                    }
                    if (
                        rowData.street !== null &&
                        rowData.street !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='street']").val(
                            rowData.street
                        );
                    }
                    if (
                        rowData.village !== null &&
                        rowData.village !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='village']").val(
                            rowData.village
                        );
                    }

                    // Assuming the 'valid_id' property in rowData is a serialized string
                    if (
                        rowData.valid_id !== null &&
                        rowData.valid_id !== undefined
                    ) {
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

                    if (
                        rowData.status !== null &&
                        rowData.status !== undefined
                    ) {
                        $("#kt_modal_edit_personal_form [name='status']")
                            .val(rowData.status)
                            .trigger("change");
                    }

                    // Open the modal after populating the data
                    $("#kt_modal_edit_personal").modal("show");
                } else {
                    Swal.fire({
                        text: response.data,
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

                response.forEach((barangay) => {
                    const option = new Option(barangay, barangay);
                    selectElement.add(option);
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const initializeEditAttachment = () => {
        const editAttachmentInput = document.getElementById(
            "edit_attachmentInput"
        );
        const editAttachmentPreview = document.querySelector(
            ".edit_attachment-preview"
        );
        const editRemoveAllButton = document.getElementById(
            "edit_personal_removeAllButton"
        );
        let selectedEditFilesArray = []; // Array to store selected files

        function handleEditFileInputChange(event) {
            const files = event.target.files;
            editAttachmentPreview.innerHTML = ""; // Clear existing previews
            selectedEditFilesArray = []; // Reset the selected files array

            if (files.length > 0) {
                // Show the attachment preview div and Remove All button if files are selected
                editAttachmentPreview.style.display = "flex";
                editRemoveAllButton.style.display = "block";
            } else {
                // Hide the attachment preview div and Remove All button if no files are selected
                editAttachmentPreview.style.display = "none";
                editRemoveAllButton.style.display = "none";
            }

            for (const file of files) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const filePreview = document.createElement("div");
                    filePreview.classList.add("file-preview-item");

                    const imagePreview = document.createElement("img");
                    imagePreview.src = e.target.result;
                    imagePreview.classList.add("attachment-image");
                    imagePreview.style.maxWidth = "100px"; // Adjust image max-width
                    imagePreview.style.maxHeight = "100px"; // Adjust image max-height

                    const fileName = document.createElement("span");
                    fileName.textContent = file.name;
                    fileName.style.textAlign = "center"; // Center the file name

                    filePreview.appendChild(imagePreview);
                    filePreview.appendChild(fileName);

                    // Adjust file preview item styles
                    filePreview.style.display = "flex";
                    filePreview.style.flexDirection = "column";
                    filePreview.style.alignItems = "left";
                    filePreview.style.gap = "5px";

                    editAttachmentPreview.appendChild(filePreview);
                    selectedEditFilesArray.push(file);

                    // Check if the number of selected files exceeds the limit
                    const maxFiles = 2;
                    if (selectedEditFilesArray.length > maxFiles) {
                        // Show SweetAlert error
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "You can only select up to two files.",
                        });
                        // Clear the selected files
                        removemaxFilesEditPreviews(); // Call the function by using parentheses
                    }
                };

                reader.readAsDataURL(file);
            }
        }
        function removemaxFilesEditPreviews() {
            // event.preventDefault(); // Prevent the default button behavior
            editAttachmentPreview.innerHTML = ""; // Clear all previews
            editAttachmentPreview.style.display = "none"; // Hide the attachment preview div
            editRemoveAllButton.style.display = "none"; // Hide the Remove All button
            editAttachmentInput.value = ""; // Clear the file input value (optional, to reset the input)
            selectedEditFilesArray = []; // Reset the selected files array
            updateEditAttachmentInput();
        }
        function removeAllEditPreviews(event) {
            event.preventDefault(); // Prevent the default button behavior
            editAttachmentPreview.innerHTML = ""; // Clear all previews
            editAttachmentPreview.style.display = "none"; // Hide the attachment preview div
            editRemoveAllButton.style.display = "none"; // Hide the Remove All button
            editAttachmentInput.value = ""; // Clear the file input value (optional, to reset the input)
            selectedEditFilesArray = []; // Reset the selected files array
            updateEditAttachmentInput();
        }

        function updateEditAttachmentInput() {
            const dataTransfer = new DataTransfer();
            for (const file of selectedEditFilesArray) {
                dataTransfer.items.add(file);
            }
            editAttachmentInput.files = dataTransfer.files;
        }

        editAttachmentInput.addEventListener(
            "change",
            handleEditFileInputChange
        );
        editRemoveAllButton.addEventListener("click", removeAllEditPreviews);
    };

    const KTModalEditUserForm = (() => {
        let t, e;

        const init = () => {
            // Your existing code for form validation here...
            t = document.querySelector("#kt_modal_edit_personal_form");
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
                "[kt_modal_edit_personal-modal-action='submit']"
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
                            url: "/profile-update",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success) {
                                    // editForm.reset();
                                    // const attachmentPreview =
                                    //     document.querySelector(
                                    //         ".edit_attachment-preview"
                                    //     );
                                    // attachmentPreview.innerHTML = ""; // Clear all previews
                                    // attachmentPreview.style.display = "none"; // Hide the attachment preview div
                                    // const removeAllButton =
                                    //     document.getElementById(
                                    //         "edit_personal_removeAllButton"
                                    //     );
                                    // removeAllButton.style.display = "none";
                                    $("#kt_modal_edit_personal").modal("hide");
                                    Swal.fire({
                                        text: "Profile Updated successfully!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    }).then(() => {
                                        // Reload the page after the user clicks the "Ok, got it!" button
                                        location.reload();
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
                "#kt_modal_edit_personal_form [name='middle_name']"
            );

            // Get the "No Middle Name?" checkbox element
            const noMiddleNameCheckbox = document.getElementById(
                "no_middle_name_checkbox_edit"
            );

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

    const profileComorbidity = () => {
        let t;
        t = document.querySelector("#kt_users_comorbidity_form");
        const submitButton = document.querySelector(
            "[data-kt-comorbidity-action='submit']"
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
                url: `/profile-comorbidty`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        Swal.fire({
                            text: "Updated successfully!",
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


    const handleCheckboxChange = () => {
        const checkbox = document.getElementById("kt_modal_is_active");
        const userStatusText = document.getElementById("userStatusText");

        const userStatusDescription = document.getElementById(
            "userStatusDescription"
        );

        checkbox.addEventListener("change", function () {
            let userId = this.getAttribute("data-user-id");
            
            const isActive = this.checked ? 1 : 0;

            // Make an AJAX request to update the user's is_active status
            updateUserStatus(userId, isActive);
            // Update user status text and description
            userStatusText.textContent =
                isActive === 1 ? "Activated" : "Deactivated";
            userStatusDescription.textContent =
                isActive === 1
                    ? "Account is currently active and usable"
                    : "Account has been deactivated and is not currently usable";
        });
    };

    const updateUserStatus = (userId, isActive) => {

        console.log(userId);
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
        });
        let data = {
            is_active: isActive,
        };

        $.ajax({
            url: `/profile/${userId}/is-active`,
            type: "POST",
            data: JSON.stringify(data), // Stringify the data
            contentType: "application/json", // Set content type to JSON
            success: function (response) {
                if (response.success) {
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
    };

    // Add an event listener to the document to handle clicks on the "Edit" link
    $(document).on(
        "click",
        '[data-kt-users-table-filter="edit_personal"]',
        handleEditClick,
        fetchBarangay(),
        initializeEditAttachment()
    );

    // Initialize the form validation when the DOM content is loaded
    KTUtil.onDOMContentLoaded(function () {
        KTModalEditUserForm.init();
    });
    profileComorbidity();

    handleCheckboxChange();
});
