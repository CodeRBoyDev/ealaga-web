"use strict";
var KTUsersUpdatePassword = (function () {
    const t = document.getElementById("kt_modal_update_password"),
        e = t.querySelector("#kt_modal_update_password_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        current_password: {
                            validators: {
                                notEmpty: {
                                    message: "Current password is required",
                                },
                            },
                        },
                        new_password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                                callback: {
                                    message: "Please enter valid password",
                                    callback: function (t) {
                                        if (t.value.length > 0)
                                            return validatePassword();
                                    },
                                },
                            },
                        },
                        confirm_password: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "The password confirmation is required",
                                },
                                identical: {
                                    compare: function () {
                                        return e.querySelector(
                                            '[name="new_password"]'
                                        ).value;
                                    },
                                    message:
                                        "The password and its confirm are not the same",
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
                });

                const a = t.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );
                a.addEventListener("click", function (t) {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                if (t === "Valid") {
                                    a.setAttribute("data-kt-indicator", "on");
                                    a.disabled = true;

                                    // Perform AJAX call using jQuery $.ajax
                                    $.ajax({
                                        url: "/profile-password", // Replace with the appropriate route URL
                                        type: "POST",
                                        data: new FormData(e),
                                        processData: false,
                                        contentType: false,
                                        dataType: "json",
                                        success: function (response) {
                                            a.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            a.disabled = false;
                                            if (response.success) {
                                                // Show success message using SweetAlert
                                                Swal.fire({
                                                    text: "Form has been successfully submitted!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText:
                                                        "Ok, got it!",
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-primary",
                                                    },
                                                }).then(function (
                                                    swalResponse
                                                ) {
                                                    if (
                                                        swalResponse.isConfirmed
                                                    ) {
                                                        n.hide();
                                                        location.reload();
                                                    }
                                                });
                                            } else {
                                                Swal.fire({
                                                    text: response.message,
                                                    icon: "error",
                                                    buttonsStyling: false,
                                                    confirmButtonText:
                                                        "Ok, got it!",
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-primary",
                                                    },
                                                });
                                            }
                                        },
                                        error: function (error) {
                                            console.error(error);
                                            a.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            a.disabled = false;

                                            // Show error message using SweetAlert
                                            Swal.fire({
                                                text: "An error occurred while submitting the form.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        },
                                    });
                                }
                            });
                });
            })();
        },
    };
})();

var KTUsersUpdateEmail = (function () {
    const t = document.getElementById("kt_modal_update_email"),
        e = t.querySelector("#kt_modal_update_email_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        profile_email: {
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
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                });
                t
                    .querySelector('[data-kt-users-modal-action="close"]')
                    .addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light",
                                },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({
                                          text: "Your form has not been cancelled!.",
                                          icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton: "btn btn-primary",
                                          },
                                      });
                            });
                    }),
                    t
                        .querySelector('[data-kt-users-modal-action="cancel"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                        cancelButton: "btn btn-active-light",
                                    },
                                }).then(function (t) {
                                    t.value
                                        ? (e.reset(), n.hide())
                                        : "cancel" === t.dismiss &&
                                          Swal.fire({
                                              text: "Your form has not been cancelled!.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                                });
                        });
                const i = t.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );
                i.addEventListener("click", function (t) {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                if (t === "Valid") {
                                    i.setAttribute("data-kt-indicator", "on");
                                    i.disabled = true;

                                    // Assuming you have the necessary data to send to the server
                                    const formData = new FormData(e);

                                    // Perform AJAX call using jQuery $.ajax
                                    $.ajax({
                                        url: "/profile-email", // Replace with the appropriate route URL
                                        type: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: "json",
                                        success: function (data) {
                                            console.log(data);
                                            i.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            i.disabled = false;

                                            // Show success message using SweetAlert
                                            Swal.fire({
                                                text: "Form has been successfully submitted!",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            }).then(function (swalResponse) {
                                                if (swalResponse.isConfirmed) {
                                                    n.hide();
                                                    location.reload();
                                                }
                                            });
                                        },
                                        error: function (error) {
                                            console.error(error);
                                            i.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            i.disabled = false;

                                            // Show error message using SweetAlert
                                            Swal.fire({
                                                text: "An error occurred while submitting the form.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        },
                                    });
                                }
                            });
                });
            })();
        },
    };
})();

var KTUsersUpdateUsername = (function () {
    const t = document.getElementById("kt_modal_update_username"),
        e = t.querySelector("#kt_modal_update_username_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        profile_username: {
                            validators: {
                                notEmpty: {
                                    message: "Username is required",
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
                });
                t
                    .querySelector('[data-kt-users-modal-action="close"]')
                    .addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light",
                                },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({
                                          text: "Your form has not been cancelled!.",
                                          icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton: "btn btn-primary",
                                          },
                                      });
                            });
                    }),
                    t
                        .querySelector('[data-kt-users-modal-action="cancel"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                                Swal.fire({
                                    text: "Are you sure you would like to cancel?",
                                    icon: "warning",
                                    showCancelButton: !0,
                                    buttonsStyling: !1,
                                    confirmButtonText: "Yes, cancel it!",
                                    cancelButtonText: "No, return",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                        cancelButton: "btn btn-active-light",
                                    },
                                }).then(function (t) {
                                    t.value
                                        ? (e.reset(), n.hide())
                                        : "cancel" === t.dismiss &&
                                          Swal.fire({
                                              text: "Your form has not been cancelled!.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                                });
                        });
                const i = t.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );
                i.addEventListener("click", function (t) {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                if (t === "Valid") {
                                    i.setAttribute("data-kt-indicator", "on");
                                    i.disabled = true;

                                    // Assuming you have the necessary data to send to the server
                                    const formData = new FormData(e);

                                    // Perform AJAX call using jQuery $.ajax
                                    $.ajax({
                                        url: "/profile-username", // Replace with the appropriate route URL
                                        type: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: "json",
                                        success: function (data) {
                                            i.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            i.disabled = false;
                                            e.reset();
                                            n.hide();
                                            // Show success message using SweetAlert
                                            Swal.fire({
                                                text: "Username has been successfully submitted!",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            }).then(function (swalResponse) {
                                                if (swalResponse.isConfirmed) {
                                                    n.hide();
                                                    location.reload();
                                                }
                                            });
                                        },
                                        error: function (error) {
                                            console.error(error);
                                            i.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            i.disabled = false;

                                            // Show error message using SweetAlert
                                            Swal.fire({
                                                text: "An error occurred while submitting the form.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText:
                                                    "Ok, got it!",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        },
                                    });
                                }
                            });
                });
            })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateEmail.init();
});
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePassword.init();
});
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateUsername.init();
});
