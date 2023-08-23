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
          <td>
          <div class="text-center min-w-100px">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-sm btn-flex btn-primary me-3 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a href="#" class="dropdown-item" id="edit_service" data-edit_service="${services?.id}">Edit</a>
                                            <a href="#" class="dropdown-item" id="delete_service" data-delete_service="${services?.id}">Delete</a>
                                        </div>
                                    </div>
                                </div>
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


     // service management ===============================================================================


     $(document).on("click", "#delete_service", function (event) {
        event.preventDefault();
        var id = $(this).data("delete_service");

        // console.log(id);


        Swal.fire({
            text: "Are you sure you would like to Delete this data?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes",
            cancelButtonText: "No, return",
            customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: "btn btn-active-light",
            },
          }).then(function (result) {
            if (result.isConfirmed) {
              $.ajax({
                url: `/service/delete/${id}`,
                type: "DELETE",
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
                       
                        `,
                        // icon: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                      });
              },
                success: function (data) {
                  
                    Swal.close();
                    loadServiceTable();
                  Swal.fire({
                    text: "Service has been successfully deleted.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Close",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  });
                },
                error: function (xhr, status, error) {
                  console.log(error);
                },
              });
            }
          });


     });

     let serviceId = "";
     
     $(document).on("click", "#edit_service", function (event) {
        event.preventDefault();
        var id = $(this).data("edit_service");
  
        serviceId = id;
        console.log(id); 

        $.ajax({
            url: `/service/edit/${id}`,
            type: "GET",
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
                   
                    `,
                    // icon: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                  });
          },
            success: function (data) {
                Swal.close();
                console.log(data);
                
               
                $("#edit_service_modal").modal("show");

                $("#edit_title").val(data.services?.title);
                $("#edit_description").val(data.services?.description);

                if (data.services?.icon) {
                    const iconUrl = data.services.icon;
                    $(".image-input-wrapper").css("background-image", `url('${iconUrl}')`);
                }
                
            }
            });


     });



     $("#modal_edit_service_form").submit(function (event) {
        event.preventDefault(); // prevent default form submission

        var formData = new FormData();
 
        var selectedICon = $("#edit_icon")[0].files[0];
        
        // console.log(serviceId);
        
        formData.append("edit_icon", selectedICon);
    
        // // Get other field values and append to FormData
        const editTitle = $("#edit_title").val();
        const editDescription = $("#edit_description").val();
    
        formData.append("edit_title", editTitle);
        formData.append("edit_description", editDescription);


        $.ajax({
            url: `/service/update/${serviceId}`,
            type: "POST",
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
                   
                    `,
                    // icon: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                  });
          },
            success: function (data) {
                Swal.close();
                console.log(data);
                
               
                $("#edit_service_modal").modal("hide");
                loadServiceTable();
                Swal.fire({
                    text: "Service has been successfully updated.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Close",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });

            }
            });



     });


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
                                   
                                    `,
                                    // icon: "success",
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                  });
                            },
                            success: function (response) {
                                console.log(response);
                                Swal.close();

                                $("#kt_modal_add_service").modal("hide");
                                loadServiceTable();
                                Swal.fire({
                                    text: "Service has been successfully added.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Close",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
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


    $("#edit_service_modal").on("hide.bs.modal", function () {
      
        $("#edit_title").val("");
        $("#edit_description").val("");
  
  
      });

  
  });
  