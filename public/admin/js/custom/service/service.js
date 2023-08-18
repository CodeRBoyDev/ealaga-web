$(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });


//  let scanner = new Instascan.Scanner({ video: document.getElementById('qrScanner') });
        
//     Instascan.Camera.getCameras().then(cameras => {
//         if (cameras.length > 0) {
//             cameras.forEach(camera => {
//                 $('#cameraSelect').append($('<option>').text(camera.name).attr('value', camera.id));
//             });
//             scanner.start(cameras[0]);
//         } else {
//             console.error('No cameras found.');
//         }
//     }).catch(error => {
    
//       if (error && error.message && error.message.includes('NotAllowedError')) {
//         console.log("hii");
//     }
//     });

//     // Add listener for QR code detection
//     scanner.addListener('scan', content => {
//         // Handle the scanned QR code content (e.g., book schedule)
//         console.log('Scanned:', content);
//         // You can send the scanned content to the server using AJAX or perform other actions.
//     });
    
    function loadServiceTable() {
      var tbody = $("#service_table tbody");
      tbody.html(
        '<tr id="loading-row"><td colspan="7" class="text-center">Loading...</td></tr>'
      );
  
      $.ajax({
        url: "/service",
        type: "GET",
        success: function (data) {
        console.log(data);
        $("#loading-row").remove();
        var tbody = $("#service_table tbody");
  
       
        $.each(data?.services, function (i, services) { 
          
          var tr = $("<tr>");
          tr.append(`
            <td>
              ${services?.id}
            </td>
            <td>
              ${services?.title}
            </td>
            <td>
            ${services?.description}
          </td>
           
          `);
          tbody.append(tr);
         
        })
        $("#service_table").DataTable();
        },
        error: function (xhr, status, error) {
          $("#loading-row").remove();
          console.error(error);
        },
      });
     
    }
  
    // $('[data-kt-user-table-filter="search"]').on("keyup", function () {
    //   $("#admin_leaves_table").DataTable().search($(this).val()).draw();
    // });
    loadServiceTable();


        // initialize form validation
        var submit_add_services_form = FormValidation.formValidation(
            document.getElementById("modal_add_service_form"),
            {
                fields: {
                    add_icon: {
                        validators: {
                            notEmpty: {
                                message: "Icon field required.",
                            },
                        },
                    },
                    add_title: {
                        validators: {
                            notEmpty: {
                                message: "Title field required.",
                            },
                        },
                    },
                    add_description: {
                        validators: {
                            notEmpty: {
                                message: "Description field required.",
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


    $("#modal_add_service_form").submit(function (event) {
        event.preventDefault(); // prevent default form submission

        console.log("hii");


        submit_add_services_form.validate().then(function (status) {
            if (status === "Valid") {
             
                var selectedICon = $("#add_icon")[0].files[0];


                var formData = new FormData();
                formData.append("icon", selectedICon);
                formData.append("title", $("#title").val());
                formData.append("description", $("#description").val());

                console.log(selectedICon);


                Swal.fire({
                    text: "Are you sure you would like to submit?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, submit it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "/service/add",
                            data: formData,
                            contentType: false,
                            processData: false,
                            // beforeSend: function () {
                            //     Swal.fire({
                            //         text: "Loading.....",
                            //         showCancelButton: false,
                            //         showConfirmButton: false,
                            //         allowOutsideClick: false, // Disable clicking outside the modal to close it
                            //     });
                            // },
                            success: function (response) {
                                console.log(response);
                                // Swal.close();
                                // loadScheduleList();
                                // $("#client_feedback_view_modal").modal("hide");
                                // Swal.fire({
                                //     text: "Review has been successfully sent.",
                                //     icon: "success",
                                //     buttonsStyling: false,
                                //     confirmButtonText: "Close",
                                //     customClass: {
                                //         confirmButton: "btn btn-primary",
                                //     },
                                // });
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
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            }
        });


    });









  //   const e = "#kt_modal_upload_dropzone",
  //   t = $(e),
  //   o = t.find(".dropzone-item");
  // o.attr("id", "");
  // const n = o.parent().html();
  // o.remove();
  // const r = new Dropzone(e, {
  //   url: "path/to/your/server",
  //   parallelUploads: 10,
  //   previewTemplate: n,
  //   maxFilesize: 1,
  //   autoProcessQueue: false,
  //   autoQueue: false,
  //   previewsContainer: e + " .dropzone-items",
  //   clickable: e + " .dropzone-select",
  // });
  // r.on("addedfile", function (o) {
  //   $(o.previewElement)
  //     .find(e + " .dropzone-start")
  //     .click(function () {
  //       const e = o.previewElement.querySelector(".progress-bar");
  //       e.style.opacity = "1";
  //       let t = 1;
  //       const n = setInterval(function () {
  //         t >= 100
  //           ? (r.emit("success", o), r.emit("complete", o), clearInterval(n))
  //           : (t++, (e.style.width = t + "%"));
  //       }, 20);
  //     });
  //     r.files.forEach((e) => {
  //       const t = $(e.previewElement).find(".progress-bar");
  //       t.css("opacity", "1");
  //       let o = 1;
  //       const n = setInterval(function () {
  //         if (o >= 100) {
  //           r.emit("success", e);
  //           r.emit("complete", e);
  //           clearInterval(n);
  //           // Check if there are no more uploading files and queued files
  //           if (
  //             r.getUploadingFiles().length === 0 &&
  //             r.getQueuedFiles().length === 0
  //           ) {
  //             r.emit("queuecomplete");
  //           }
  //         } else {
  //           o++;
  //           t.css("width", o + "%");
  //         }
  //       }, 20);
  //     });
  //   t.find(".dropzone-item").css("display", "");
  //   // t.find(".dropzone-upload").css("display", "inline-block");
  //   t.find(".dropzone-remove-all").css("display", "inline-block");
  // });
  // r.on("complete", function (e) {
  //   const o = t.find(".dz-complete");
  //   setTimeout(function () {
  //     o.each(function () {
  //       $(this).find(".progress-bar").css("opacity", "0");
  //       $(this).find(".progress").css("opacity", "0");
  //       $(this).find(".dropzone-start").css("opacity", "0");
  //     });
  //   }, 300);
  // });
  // t.find(".dropzone-upload").on("click", function () {
  //   // console.log("hi");
  //   r.files.forEach((e) => {
  //     const t = $(e.previewElement).find(".progress-bar");
  //     t.css("opacity", "1");
  //     let o = 1;
  //     const n = setInterval(function () {
  //       if (o >= 100) {
  //         r.emit("success", e);
  //         r.emit("complete", e);
  //         clearInterval(n);
  //         // Check if there are no more uploading files and queued files
  //         if (
  //           r.getUploadingFiles().length === 0 &&
  //           r.getQueuedFiles().length === 0
  //         ) {
  //           r.emit("queuecomplete");
  //         }
  //       } else {
  //         o++;
  //         t.css("width", o + "%");
  //       }
  //     }, 20);
  //   });
  // });
  // t.find(".dropzone-remove-all").on("click", function () {
  //   Swal.fire({
  //     text: "Are you sure you would like to remove all files?",
  //     icon: "warning",
  //     showCancelButton: true,
  //     buttonsStyling: false,
  //     confirmButtonText: "Yes, remove it!",
  //     cancelButtonText: "No, return",
  //     customClass: {
  //       confirmButton: "btn btn-primary",
  //       cancelButton: "btn btn-active-light",
  //     },
  //   }).then(function (e) {
  //     if (e.value) {
  //       // t.find(".dropzone-upload").css("display", "none");
  //       t.find(".dropzone-remove-all").css("display", "none");
  //       r.removeAllFiles(true);
  //     } else if (e.dismiss === "cancel") {
  //       Swal.fire({
  //         text: "Your files were not removed!",
  //         icon: "error",
  //         buttonsStyling: false,
  //         confirmButtonText: "Ok, got it!",
  //         customClass: { confirmButton: "btn btn-primary" },
  //       });
  //     }
  //   });
  // });
  // r.on("queuecomplete", function (e) {
  //   // console.log(r.files.map(file => file));
  //   // t.find(".dropzone-upload").css("display", "none");

  //   // var formData = new FormData();
  //   // r.files.forEach(function(file) {
  //   //   // console.log(file);
  //   //   formData.append('files[]', file);
  //   // });

  //   // $.ajax({
  //   //   url: "/employee/leave/attachment",
  //   //   method: "POST",
  //   //   data: formData,
  //   //   contentType: false,
  //   //   processData: false,
  //   //   success: function (response) {
  //   //     console.log(response);
  //   //   },
  //   //   error: function (xhr, status, error) {
  //   //     console.log(error);
  //   //   }
  //   // });
  // });
  // r.on("removedfile", function (e) {
  //   // console.log("removeeeeeeeeeeee");
  //   if (r.files.length < 1) {
  //     t.find(".dropzone-upload").css("display", "none");
  //     t.find(".dropzone-remove-all").css("display", "none");
  //   }
  // });



  
    /// closing modal function =================================================================================
    $("#kt_modal_add_service").on("hide.bs.modal", function () {
      
      $("#title").val("");
      $("#description").val("");


    });

  
  });
  