"use strict";
var KTSignupGeneral = (function () {
    var e, t, a, s;

    var r = function () {
        return 100 === s.getScore();
    };

    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            s = KTPasswordMeter.getInstance(
                e.querySelector('[data-kt-password-meter="true"]')
            );

            a = FormValidation.formValidation(e, {
                fields: {
                    "first-name": {
                        validators: {
                            notEmpty: { message: "First Name is required" },
                        },
                    },
                    "last-name": {
                        validators: {
                            notEmpty: { message: "Last Name is required" },
                        },
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required",
                            },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required",
                            },
                            callback: {
                                message: "Please enter valid password",
                                // callback: function (e) {
                                //     if (e.value.length > 0) return r();
                                // },
                            },
                        },
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message:
                                    "The password confirmation is required",
                            },
                            identical: {
                                compare: function () {
                                    return e.querySelector('[name="password"]')
                                        .value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                        },
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message:
                                    "You must accept the terms and conditions",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: { password: false },
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });
            t.addEventListener("click", function (r) {
                r.preventDefault();
                a.revalidateField("password");
                a.validate().then(function (a) {
                    if ("Valid" == a) {
                        t.setAttribute("data-kt-indicator", "on");
                        t.disabled = true;
                        let formData = new FormData(e);
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
                        // Make an AJAX request
                        fetch("/register", {
                            method: "POST",
                            body: formData,
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    e.reset();
                                    s.reset();
                                    Swal.close();
                                    window.location.href =
                                        "/register/email-otp";
                                } else {
                                    // Login failed, show error message
                                    Swal.fire({
                                        text: data.message,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    });
                                }
                            })
                            .catch((error) => {
                                // Handle any errors that occurred during the AJAX request
                                console.error("Error:", error);
                                Swal.close();
                            })
                            .finally(function () {
                                // Reset the button state after the AJAX request is complete
                                t.removeAttribute("data-kt-indicator");
                                t.disabled = false;
                            });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            });

            e.querySelector('input[name="password"]').addEventListener(
                "input",
                function () {
                    if (this.value.length > 0) {
                        a.updateFieldStatus("password", "NotValidated");
                    }
                }
            );
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
