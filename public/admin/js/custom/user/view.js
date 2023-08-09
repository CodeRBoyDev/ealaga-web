$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let userId = document
        .getElementById("kt_modal_is_active")
        .getAttribute("data-user-id");

    const setupDataTableFiltering = () => {
        const dataTable = $("#kt_table_schedules").DataTable({
            pageLength: 5,
            paging: true,
            lengthMenu: [5, 10, 15],
            deferRender: true,
        });

        function filterTable() {
            const selectedService = $("#kt_user_table_filter_service").val();
            const selectedStatus = $("#kt_user_table_filter_status").val();

            dataTable
                .columns(1) // Assuming services are in the second column
                .search(selectedService)
                .columns(4) // Assuming status is in the fifth column
                .search(selectedStatus)
                .draw();
        }

        // $('[data-kt-schedule-table-filter="service"]')
        //     .select2()
        //     .on("change", function () {
        //         filterTable();
        //     });

        // $("#kt_user_table_filter_status")
        //     .select2()
        //     .on("change", function () {
        //         filterTable();
        //     });

        $('[data-kt-schedule-table-filter="filter"]').on("click", function () {
            filterTable();
        });

        $('[data-kt-schedule-table-filter="reset"]').on("click", function () {
            $('[data-kt-schedule-table-filter="service"]')
                .val("")
                .trigger("change");
            $("#kt_user_table_filter_status").val("").trigger("change");
            filterTable();
        });
    };

    const handleCheckboxChange = () => {
        const checkbox = document.getElementById("kt_modal_is_active");
        const userStatusText = document.getElementById("userStatusText");

        const userStatusDescription = document.getElementById(
            "userStatusDescription"
        );

        checkbox.addEventListener("change", function () {
            userId = this.getAttribute("data-user-id");
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
        let data = {
            is_active: isActive,
        };

        $.ajax({
            url: `/user-management/users/${userId}/is-active`,
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

    const updateUserComobidity = () => {
        let t;
        t = document.querySelector("#kt_users_comorbidity_form");
        const submitButton = document.querySelector(
            "[data-kt-comorbidity-action='submit']"
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
                url: `/user-management/users/${userId}/comorbidity`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
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
        });
    };

    handleCheckboxChange();
    setupDataTableFiltering();
    updateUserComobidity();
});
