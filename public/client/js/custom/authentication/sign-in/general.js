"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "Email address or Username is required",
                                },
                                // emailAddress: {
                                //     message:
                                //         "The value is not a valid email address",
                                // },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
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
                })),
                e.addEventListener("click", function (event) {
                    event.preventDefault();
                    i.validate().then(function (status) {
                        if (status === "Valid") {
                            event.target.setAttribute(
                                "data-kt-indicator",
                                "on"
                            );
                            event.target.disabled = true;

                            // Get the form data
                            var formData = new FormData(t);

                            // Make an AJAX request
                            fetch("/login", {
                                method: "POST",
                                body: formData,
                            })
                                .then((response) => response.json())
                                .then((data) => {
                                    if (data.success) {
                                        // Login success, redirect to the appropriate route based on the user role
                                        if (data.data === "dashboard") {
                                            window.location.href =
                                                "/osca-dashboard"; // Replace 'dashboard' with the actual URL for the admin dashboard
                                        } else if (data.data === "ClientHome") {
                                            window.location.href =
                                                "/client/home"; // Replace 'client-home' with the actual URL for the client dashboard
                                        } else {
                                            // Handle other cases if needed
                                        }
                                    } else {
                                        // Login failed, show error message
                                        Swal.fire({
                                            text: data.message,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                                    }
                                })
                                .catch((error) => {
                                    // Handle any errors that occurred during the AJAX request
                                    console.error("Error:", error);
                                })
                                .finally(function () {
                                    // Reset the button state after the AJAX request is complete
                                    event.target.removeAttribute(
                                        "data-kt-indicator"
                                    );
                                    event.target.disabled = false;
                                });
                        }
                    });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
