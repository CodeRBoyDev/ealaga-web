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
														<span
															class="spinner-border spinner-border-lg align-middle ms-2"></span>
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
          Swal.close();
        }, 2000); // Adjust the delay as needed

    });


    $("#list_schedule_link").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")

      Swal.fire({
        html: `
        <div class="fv-row mb-7">
														<span
															class="spinner-border spinner-border-lg align-middle ms-2"></span>
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
          Swal.close();
        }, 2000); // Adjust the delay as needed

    });

    $("#history_schedule_link").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")

      Swal.fire({
        html: `
        <div class="fv-row mb-7">
														<span
															class="spinner-border spinner-border-lg align-middle ms-2"></span>
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
          Swal.close();
        }, 2000); // Adjust the delay as needed

    });

    
    $("#volunteer_link").click(function (event) {
      event.preventDefault(); // Prevent the default link behavior (e.g., navigating to "#")

      Swal.fire({
        html: `
        <div class="fv-row mb-7">
														<span
															class="spinner-border spinner-border-lg align-middle ms-2"></span>
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
          Swal.close();
        }, 2000); // Adjust the delay as needed

    });


  });
