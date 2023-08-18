$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#camera_block_error").hide();

    let scanner;

    $("#camera_management").change(function () {
        if ($(this).is(":checked")) {
            $(".form-check-label").text("Open");
            console.log("hi");

            startCamera();
        } else {
            $(".form-check-label").text("Close");
            console.log("low");

            stopCamera();
        }
    });

    function startCamera() {
        Instascan.Camera.getCameras()
            .then((cameras) => {
                $("#camera_block_error").hide();

                if (cameras.length > 0) {
                    scanner = new Instascan.Scanner({
                        video: document.getElementById("qrScanner"),
                    });
                    cameras.forEach((camera) => {
                        $("#cameraSelect").append(
                            $("<option>")
                                .text(camera.name)
                                .attr("value", camera.id)
                        );
                    });
                    scanner.start(cameras[0]);

                    // Add listener for QR code detection
                    scanner.addListener("scan", (content) => {
                        // Handle the scanned QR code content (e.g., book schedule)
                        const scannedData = JSON.parse(content);

                        // Get the schedule_id
                        const scheduleId = scannedData.schedule_id;

                        $.ajax({
                            url: `/schedule/accept/${scheduleId}`,
                            type: "POST",
                            // data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                Swal.fire({
                                    text: "Loading.....",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    allowOutsideClick: false, // Disable clicking outside the modal to close it
                                });
                            },
                            success: function (data) {
                                Swal.close();

                                // console.log(data);

                                if (data.result == "not_found") {
                                    console.log("not found huhu");
                                } else {
                                    if (data.result == "not_today") {
                                        Swal.fire({
                                            text: "Your schedule is not today",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Close",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                                    } else {
                                        if (data.result == "attended") {
                                            Swal.fire({
                                                text: "You have already attended.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Close",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        } else if (
                                            data.result == "not_attended"
                                        ) {
                                            Swal.fire({
                                                text: "You have already not attended.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Close",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        } else if (data.result == "cancelled") {
                                            Swal.fire({
                                                text: "You have already cancelled the schedule",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Close",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });
                                        } else {
                                            $("#qr_code_title").hide();

                                            Swal.fire({
                                                text: "Attendees has been successfully attended.",
                                                icon: "success",
                                                buttonsStyling: false,
                                                confirmButtonText: "Close",
                                                customClass: {
                                                    confirmButton:
                                                        "btn btn-primary",
                                                },
                                            });

                                            // Split the input string into an array
                                            var servicesArray =
                                                data?.schedule?.services.split(
                                                    ","
                                                );

                                            // Create a formatted numbered list with <br> tags
                                            var formattedList = servicesArray
                                                ?.map(function (
                                                    service,
                                                    index
                                                ) {
                                                    return (
                                                        index +
                                                        1 +
                                                        ". " +
                                                        service +
                                                        "<br>"
                                                    );
                                                })
                                                .join("");

                                            const html = `
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">${
                                    data?.schedule?.firstname +
                                    " " +
                                    data?.schedule?.lastname
                                }</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6">${
                                    data?.schedule?.email
                                }</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Barangay</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bolder fs-6 text-gray-800 me-2">${
                                    data?.schedule?.barangay
                                }
                                    935</span>
                              
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Date</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a href="#"
                                    class="fw-bold fs-6 text-gray-800 text-hover-primary">${moment(
                                        data?.schedule?.schedule_date
                                    ).format("MMMM DD, YYYY")}</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Time</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">
                                ${
                                    (data?.schedule?.schedule_time == "0"
                                        ? '<div class="badge badge-light-primary fw-bold mb-1">' +
                                          "MORNING" +
                                          "</div>"
                                        : "") +
                                    (data?.schedule?.schedule_time == "1"
                                        ? '<div class="badge badge-light-warning fw-bold mb-1">' +
                                          "AFTERNOON" +
                                          "</div>"
                                        : "")
                                }
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Status</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                               ${
                                   (data?.schedule?.status == "0"
                                       ? '<div class="badge badge-light-warning fw-bold mb-1">' +
                                         "Pending" +
                                         "</div>"
                                       : "") +
                                   (data?.schedule?.status == "1"
                                       ? '<div class="badge badge-light-success fw-bold mb-1">' +
                                         "Attended" +
                                         "</div>"
                                       : "") +
                                   (data?.schedule?.status == "2"
                                       ? '<div class="badge badge-light-danger fw-bold mb-1">' +
                                         "Not Attended" +
                                         "</div>"
                                       : "") +
                                   (data?.schedule?.status == "3"
                                       ? '<div class="badge badge-light-primary fw-bold mb-1">' +
                                         "Cancelled" +
                                         "</div>"
                                       : "")
                               }
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Services</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">${formattedList}</span>
                            </div>
                            <!--begin::Label-->
                        </div>
            
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Processed by</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">${
                                    data?.processed_by?.firstname
                                        ? data?.processed_by?.firstname +
                                          " " +
                                          data?.processed_by?.lastname
                                        : "Not yet approved"
                                }</span>
                            </div>
                            <!--begin::Label-->
                        </div>
            
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Processed on </label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">${
                                    data?.processed_by?.firstname
                                        ? moment(
                                              data?.schedule?.processed_date
                                          ).format("MMM DD, YYYY h:mm A")
                                        : "Not yet approved"
                                }</span>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <!--end::Input group-->
                        `;

                                            $("#qr_content").html(html);

                                            setTimeout(function () {
                                                $("#qr_content").hide();
                                                $("#qr_code_title").show();
                                            }, 10000);
                                        }
                                    }
                                }
                            },
                        });
                    });
                } else {
                    console.error("No cameras found.");
                }
            })
            .catch((error) => {
                if (
                    error &&
                    error.message &&
                    error.message.includes("NotAllowedError")
                ) {
                    $("#camera_block_error").show();
                    $("#camera_block_error")
                        .find(".fw-semibold")
                        .html(
                            "Camera access blocked. Please allow site access and reload"
                        );
                }
            });
    }

    function stopCamera() {
      $("#cameraSelect").hide();
      
        if (scanner) {
            scanner.stop();
            $("#cameraSelect").empty();
           
        }
    }

    // Initial camera start
    startCamera();





    $("#table_link").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")
  
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
              <span id="redirectText">Redirect you to qr code scanner page...</span>
            </div>
          `,
          // icon: "success",
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
            window.location.href = "/schedule";
          }, 1000); // Adjust the delay as needed
          setTimeout(function () {
            Swal.close();
          }, 2000);
  
      });

});
