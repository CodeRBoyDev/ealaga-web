$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    let otpForm = document.querySelector("#kt_sing_in_two_steps_form");
    const otpInputs = document.querySelectorAll('input[name="otp[]"]');

    otpInputs.forEach((input, index) => {
        input.addEventListener("input", function () {
            const currentValue = input.value.trim();

            if (currentValue !== "") {
                // Move focus to the next input field if available
                if (index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            }
        });

        // Handle backspace key to move focus to the previous input field
        input.addEventListener("keydown", function (event) {
            const currentValue = input.value.trim();

            if (event.key === "Backspace" && currentValue === "") {
                // Move focus to the previous input field if available
                if (index > 0) {
                    otpInputs[index - 1].focus();
                }
            }
        });
    });

    const confirmOTP = () => {
        let t;
        t = document.querySelector("#kt_sing_in_two_steps_form");
        const submitButton = document.querySelector(
            "[kt_sing_in_two_steps-action='submit']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
            let userEmailElement = document.getElementById("userEmail");
            let userEmail = " ";
            userEmail = userEmailElement.textContent; // Get the text content of the element

            // Check if any of the OTP input fields are empty
            const otpInputs = t.querySelectorAll('input[name="otp[]"]');
            let hasEmptyField = false;
            otpInputs.forEach((input) => {
                if (input.value.trim() === "") {
                    hasEmptyField = true;
                }
            });

            if (hasEmptyField) {
                // Show an error message to the user
                Swal.fire({
                    text: "Please fill in all OTP digits.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
                return;
            }

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
            let otp = "";
            otpInputs.forEach((input) => {
                otp += input.value;
            });
            // Append the OTP to FormData
            var formData = new FormData(t);
            formData.append("otp", otp);
            formData.append("userEmail", userEmail);
            $.ajax({
                url: `/register/confirm-otp`,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        otpForm.reset();
                        Swal.fire({
                            text: "User Created successfully!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        }).then(function () {
                            // Redirect to the login page
                            window.location.href = "/login"; // Change the URL as needed
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

    const resendOTP = () => {
        const submitButton = document.querySelector(
            "[kt_sing_in_two_steps-action='resend']"
        );
        submitButton.addEventListener("click", function (event) {
            event.preventDefault();
            let userEmailElement = document.getElementById("userEmail");
            let userEmail = " ";
            userEmail = userEmailElement.textContent; // Get the text content of the element

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
            let data = { userEmail: userEmail };
            $.ajax({
                url: `/register/resend-otp`,
                type: "POST",
                data: JSON.stringify(data), // Stringify the data
                contentType: "application/json", // Set content type to JSON
                success: function (response) {
                    if (response.success) {
                        // Close the modal first
                        otpForm.reset();

                        Swal.fire({
                            text: "OTP Resend successfully!",
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

    confirmOTP();
    resendOTP();
});
