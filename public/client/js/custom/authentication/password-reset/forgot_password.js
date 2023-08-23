$(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

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
    

    var submit_forgot_password_form = FormValidation.formValidation(
        document.getElementById("forgot_password_form"),
        {
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: "Email field required.",
                        },
                        emailAddress: {
                            message: "Please enter a valid email address.",
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
        }
    );

    var submit_otp_form = FormValidation.formValidation(
        document.getElementById("otp_form"),
        {
            fields: {
                "otp": {
                    validators: {
                        notEmpty: {
                            message: "OTP field required.",
                        },
                        between: {
                            min: 100000, // Minimum 6-digit number
                            max: 999999, // Maximum 6-digit number
                            message: "Please enter a 6-digit OTP.",
                        },
                    },
                },
                new_password: {
                    validators: {
                        notEmpty: {
                            message: "New password field required.",
                        },
                    },
                },
                "confirm_new_password": {
                    validators: {
                        notEmpty: {
                            message: "Confirm password field required.",
                        },
                        identical: {
                            compare: function () {
                                return document.getElementById("new_password").value;
                            },
                            message: "The passwords do not match.",
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
        }
    );
    
    
    
    
    $("#forgot_password_email_form").show();
    $("#forgot_password_otp").hide();

    let user_email = ""
    $("#forgot_password_form").submit(function (event) {
        event.preventDefault(); // prevent default form submission
 
        submit_forgot_password_form.validate().then(function (status) {
            if (status === "Valid") {
              
                var formData = new FormData();
                formData.append("email", $("#email").val());

                $.ajax({
                    type: "POST",
                    url: "/forgot-password/email-otp",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        Swal.fire({
                            html: `
                            <div class="fv-row mb-7">
                            <div style="margin-top: 10px;" class="loader">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            </div>
                                              </div>
                              <div id="successMessage">
                                <span id="redirectText">Sending an OTP...</span>
                              </div>
                            `,
                            // icon: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                          });
                    },
                    success: function (response) {

                        Swal.close();
                        console.log(response);
                        user_email = response.user_data?.email;
                        $('#userEmail').text(response.user_data?.email);

                        $("#forgot_password_email_form").hide();
                        $("#forgot_password_otp").show();
                        
                    },
                    error: function (response) {
                        // Handle error response from server
                        console.log(response);
                    },
                });
                

            } else {
                // if form is invalid, display an error message
                Swal.close();
                Swal.fire({
                    text: "Please fill in all required fields.",
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

    $("#otp_form").submit(function (event) {
        event.preventDefault(); // prevent default form submission
    
        console.log("hi");
    
        submit_otp_form.validate().then(function (status) {
            if (status === "Valid") {
              
                console.log(user_email);

                var formData = new FormData();
                formData.append("email", user_email);
                formData.append("password", $("#new_password").val());
                formData.append("otp", $("#otp").val());

                $.ajax({
                    type: "POST",
                    url: "/forgot-password/confirm-otp",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        Swal.fire({
                            html: `
                            <div class="fv-row mb-7">
                            <div style="margin-top: 10px;" class="loader">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            </div>
                                              </div>
                              <div id="successMessage">
                                <span id="redirectText">loading...</span>
                              </div>
                            `,
                            // icon: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                          });
                    },
                    success: function (response) {

                        Swal.close();
                        console.log(response);

                        if (response.message === 'otp_not_match') {

                     var otpFieldContainer = $("#otp").closest(".fv-row"); // Select the 'otp' field's container
        
                        // Find the error message element within the 'otp' field's container
                        var errorMessageElement = otpFieldContainer.find(".fv-plugins-message-container");
                        
                        // Update the error message content
                        errorMessageElement.html('<div class="fv-help-block">OTP does not match.</div>');
                        
                        // Optionally, you can add a class to style the error message appearance
                        errorMessageElement.addClass("text-danger");
                        }else{
                        
        
                            // Add a delay before showing the success SweetAlert
                         
                            Swal.fire({
                              html: `
                                <div id="successMessage">
                                <div style="margin-top: 10px;" class="loader">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                </div>
                                  <span id="redirectText">Redirect you to login...</span>
                                </div>
                              `,
                              icon: "success",
                              showCancelButton: false,
                              showConfirmButton: false,
                              allowOutsideClick: false,
                              didOpen: () => {
                                animateText();
                              }
                            });
                
                            function animateText() {
                              const redirectText = document.getElementById('redirectText');
                              redirectText.style.animation = 'waveAnimation 2s infinite';
                            }
                        
                             // Redirect to the home page after a short delay
                              setTimeout(function () {
                                window.location.href = "/login";
                              }, 1000); // Adjust the delay as needed
                              setTimeout(function () {
                                          Swal.close();
                              }, 2000); // Adjust the delay as needed


                        }
                        
                    },
                    error: function (response) {
                        // Handle error response from server
                        console.log(response);
                    },
                });
                
                

            } else {
                // if form is invalid, display an error message
                Swal.close();
                Swal.fire({
                    text: "Please fill in all required fields.",
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


    $("#resend_otp").click(function (event) {
        event.preventDefault(); // prevent default form submission
 
        submit_forgot_password_form.validate().then(function (status) {
            if (status === "Valid") {
              


                Swal.fire({
                    text: "Are you sure you would like to resend?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, resend it!",
                    cancelButtonText: "No, return",
                    customClass: {
                      confirmButton: "btn btn-primary",
                      cancelButton: "btn btn-active-light",
                    },
                  }).then(function (result) {
                    if (result.isConfirmed) {
                     

                        var formData = new FormData();
                        formData.append("email", user_email);
        
                        $.ajax({
                            type: "POST",
                            url: "/forgot-password/resend-otp",
                            data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                Swal.fire({
                                    html: `
                                    <div class="fv-row mb-7">
                                    <div style="margin-top: 10px;" class="loader">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    </div>
                                                      </div>
                                      <div id="successMessage">
                                        <span id="redirectText">Sending an OTP...</span>
                                      </div>
                                    `,
                                    // icon: "success",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                  });
                            },
                            success: function (response) {
        
                                Swal.close();
                                console.log(response);

                                Swal.fire({
                                    html: `
                                      <div id="successMessage">
                                        <span id="redirectText">"We've resent the OTP code to your email – please check your inbox or spam.</span>
                                      </div>
                                    `,
                                    icon: "success",
                                  });

                                user_email = response.user_data?.email;
                                $('#userEmail').text(response.user_data?.email);
        
                                $("#forgot_password_email_form").hide();
                                $("#forgot_password_otp").show();
                                
                            },
                            error: function (response) {
                                // Handle error response from server
                                console.log(response);
                            },
                        });


                    }
                  });


            } else {
                // if form is invalid, display an error message
                Swal.close();
                Swal.fire({
                    text: "Please fill in all required fields.",
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

  
  });
  