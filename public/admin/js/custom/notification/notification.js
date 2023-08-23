$(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
  
    function loadNotification() {
        $.ajax({
          url: "/notification",
          type: "GET",
          success: function (data) {
            console.log(data.notifications);

            let total_notification = "";
            if(data.notificationsTotal?.length){
                total_notification += `
                <span class="h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
                <span id="notification-badge" class="badge badge-danger badge-counter fs-7">
                ${data.notificationsTotal.length}
                </span>
                    </span>
                `
            }
           
            $("#notification_total_div").html(total_notification);
         
            let notification_list = "";

            if (data.notifications?.length > 0) {
             
            $.each(data.notifications, function (i, notification) {
             
                console.log(notification?.is_read);
                notification_list += `
                <div class="d-flex align-items-center mb-8">
                <!--begin::Bullet-->
                <span class="bullet bullet-vertical h-60px ${notification?.is_read == 0 ? 'bg-success' : 'bg-secondary'}"></span>
                <!--end::Bullet-->
                <!--begin::Checkbox-->
                <div class="form-check form-check-custom form-check-solid mx-2">
                
                </div>
                <!--end::Checkbox-->
                <!--begin::Description-->
                <div class="flex-grow-1">
                    <a href="#" class="${notification?.is_read == 0 ? 'text-dark' : 'text-muted'} text-hover-primary fw-bolder fs-6">${notification?.title}</a>
                    <div class="fs-7 ${notification.is_read == 0 ? '' : 'text-muted'}"> ${notification.message.length > 20 ? notification.message.substr(0, 30) + '...' : notification.message}
                    </div>
                    <div class="fs-7 text-muted"> 
                    ${moment(notification.timestamp).format('MMMM DD, YYYY HH:mm')}
                     
                    </div>
                </div>
                <!--end::Description-->
        
                <a href="#" class="btn btn-light bnt-active-light-primary btn-sm" id="view_notification" data-view_notification="${notification?.id}">View</a>

            </div>
                  `;
                 
            
            });
       

        } else {
            notification_list += `
                <div class="d-flex flex-stack position-relative mb-7">
         
                        <p class="fs-5 fw-bold text-dark text-hover-primary">No notification</p>
                
                </div>
            `;
          
        }

        $("#notification_list_div").html(notification_list);
            
          }
        });
      }

      
      loadNotification();


      $(document).on("click", "#view_notification", function (event) {
        event.preventDefault();
        var id = $(this).data("view_notification");
            console.log(id);

          
            $.ajax({
                url: `/notification/update/${id}`,
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
                        didOpen: () => {
                          animateText();
                        }
                      });
                },
                success: function (data) {
                    loadNotification();
                    Swal.close();
                    $("#modal_notification").modal("show");
                    console.log(data?.notification?.message);
                    
                    const formattedMessage = data?.notification?.message.replace(/(\.|!)/g, "$1<br><br>");
                    
                    const html = `
                    <!--begin::Content-->
                    <div class="d-flex align-items-center">
                        <!--begin::Title-->
                        <label class="text-dark fs-3 me-3 fw-bold">${data?.notification?.title}</label>
                        <!--end::Title-->
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <span class="text-muted fw-bold fs-7">${moment(data?.notification?.timestamp).format('MMMM DD, YYYY HH:mm')}</span>
                    </div>
                    <br>
                    <span class=" fw-bold fs-6">${formattedMessage}</span>

                    ${
                      data?.notification?.title == "Welcome to Center for the Elderly App!"
                      ?
                       `
                       <a class="btn btn-sm btn-light btn-active-light-danger" 
                       href="/profile-page"
                       >
                       View Account Status
                       </a>  
                      `
                      :
                      ""
                  }

                  ${
                    data?.notification?.title == "Schedule Reminder"
                    ?
                     `
                     <a class="btn btn-sm btn-light btn-active-light-danger" 
                     href="/client/schedule/list"
                     >
                     View Schedule
                     </a>  
                    `
                    :
                    ""
                }

                  

                `;
    
                // Use the correct selector (id in this case)
                $("#view_schedule_display").html(html);
                }
            });
      });
      
      
});
  