  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    $("#add_schedule_link").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")


      $.ajax({
        url: "/client/home",
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
        console.log(data);

        if(data.user?.status === null) {

          Swal.fire({
            title: 'Please upload your senior id',
            html: 
              `<div style="display: flex; flex-direction: column; gap: 10px;">
                <p style="font-size: 1rem; text-align: justify; text-indent: 20px;">
                We encourage you to please upload your senior ID to your account. Verifying your senior status can provide you with access to exclusive features and benefits on our platform. 
                Your cooperation in this matter is greatly appreciated, and we look forward to enhancing your experience within our community.
                </p>
              </div>`,
            confirmButtonColor: '#EF3A47',
            footer: '<a href="/profile-page" style="color: red;" id="view-status-link">View Account Status</a>',
            allowOutsideClick: false,
            allowEscapeKey: false,
          });

        }else if(data.user?.status === 0){
          
          Swal.fire({
            title: 'Pending id verfication',
            html: 
              `<div style="display: flex; flex-direction: column; gap: 10px;">
                <p style="font-size: 1rem; text-align: justify; text-indent: 20px;">
                We appreciate your effort in providing your ID for verification. Kindly note that the verification process may take some time as we ensure accuracy and security. Please wait patiently while we verify your ID, and we'll notify you as soon as the process is complete.
                </p>
                <p style="font-size: 1rem; text-align: justify; text-indent: 20px;">
                Thank you for your understanding and cooperation.
                </p>
              </div>`,
            confirmButtonColor: '#EF3A47',
            footer: '<a href="/profile-page" style="color: red;" id="view-status-link">View Account Status</a>',
            allowOutsideClick: false,
            allowEscapeKey: false,
          });
          
        }
        else{

          if(data.user?.is_restricted === 1){
            
            Swal.fire({
              title: 'Your account has been restricted',
              html: 
                `<div style="display: flex; flex-direction: column; gap: 10px;">
                  <p style="font-size: 1rem; text-align: justify; text-indent: 20px;">
                    We regret to inform you that your account has been temporarily restricted due to repeated instances of not attending to your bookings.
                    As a result, you will not be able to access certain features of our platform for the next 7 days.
                  </p>
                  <p>Expected Reactivation: ${new Date(data.user?.restrictionExpiration).toLocaleDateString()}</p>
                </div>`,
              confirmButtonColor: '#EF3A47',
              footer: '<a href="/profile-page" style="color: red;" id="view-status-link">View Account Status</a>',
              allowOutsideClick: false,
              allowEscapeKey: false,
            });
            
            
            
            document.getElementById('view-status-link').addEventListener('click', function() {
              Swal.close();
            });

          }else{

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
                  <span id="redirectText">Redirect you to schedule page...</span>
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
                window.location.href = "/client/schedule";
              }, 1000); // Adjust the delay as needed
              setTimeout(function () {
                Swal.close();
              }, 2000);
              
          }

                 


        }

        }

      });


    
    });


    $("#list_schedule_link").click(function (event) {
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
            <span id="redirectText">Redirect you to my schedule page...</span>
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
          window.location.href = "/client/schedule/list";
        }, 1000); // Adjust the delay as needed
        setTimeout(function () {
          Swal.close();
        }, 2000);

    });

    $("#history_schedule_link").click(function (event) {
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
            <span id="redirectText">Redirect you to my history page...</span>
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
          window.location.href = "/client/schedule/history";
        }, 1000); // Adjust the delay as needed
        setTimeout(function () {
          Swal.close();
        }, 2000);

    });

    
    $("#volunteer_link").click(function (event) {
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
            <span id="redirectText">Redirect you to my history page...</span>
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
            window.location.href = "/client/volunteer";
          }, 1000); // Adjust the delay as needed
          setTimeout(function () {
            Swal.close();
          }, 2000);

    });


  });
