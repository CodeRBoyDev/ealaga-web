"use strict";
var KTSigninGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"),
                i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email address is required"
                                },
                                emailAddress: {
                                    message: "The value is not a valid email address"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row"
                        })
                    }
                }), e.addEventListener("click", function(event) {
                    event.preventDefault();
                    i.validate().then(function(status) {
                        if (status === "Valid") {
                            event.target.setAttribute("data-kt-indicator", "on");
                            event.target.disabled = true;

                            // Get the form data
                            var formData = new FormData(t);

                            // Make an AJAX request
                            fetch('/login', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Login success, show success message
                                    // Swal.fire({
                                    //     text: "You have successfully logged in!",
                                    //     icon: "success",
                                    //     buttonsStyling: false,
                                    //     confirmButtonText: "Ok, got it!",
                                    //     customClass: {
                                    //         confirmButton: "btn btn-primary"
                                    //     }
                                    // }).then(function(result) {
                                    //     if (result.isConfirmed) {
                                    //         // Clear form fields after successful login
                                    //         t.querySelector('[name="email"]').value = "";
                                    //         t.querySelector('[name="password"]').value = "";
                                    //     }
                                    // });
                                      // Login success, redirect to 'clientHome' route
                                      window.location.href = '/client-home';

                                } else {
                                    // Login failed, show error message
                                    Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            })
                            .catch(error => {
                                // Handle any errors that occurred during the AJAX request
                                console.error('Error:', error);
                            })
                            .finally(function() {
                                // Reset the button state after the AJAX request is complete
                                event.target.removeAttribute("data-kt-indicator");
                                event.target.disabled = false;
                            });
                        }
                    });
                });
        }
    }
}();
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init()
});
