  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    $("#add_schedule_link").click(function (event) {
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
