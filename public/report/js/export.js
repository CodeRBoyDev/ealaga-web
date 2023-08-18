$(document).ready(function () {
    const handleFormSubmit = (event) => {
        event.preventDefault(); // Prevent the form from actually submitting

        const form = document.getElementById("kt_modal_export_users_form");
        const selectElement = form.querySelector('select[name="export"]');
        const selectedValue = selectElement.value;
        Swal.fire({
            html: ` <div class="fv-row mb-7">
                                    <div style="margin-top: 10px;" class="loader">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    </div>
                                                                                </div>
                                    <div id="successMessage">
                                        <span id="redirectText">Please wait while we process your request</span>
                                    </div>
                                    `,
            // icon: "success",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            didOpen: () => {
                animateText();
            },
        });
        console.log("Selected Value:", selectedValue);
        $.ajax({
            url: "/generate-pdf", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            data: {
                selectedValue: selectedValue,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (response) {
                Swal.close();
                $("#kt_modal_export_users").modal("hide");
                var pdfUrl = response.pdfUrl;
                window.open(pdfUrl, "_blank");
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error Response:", xhr.responseText);
                Swal.close();
            },
        });
    };

    const form = document.getElementById("kt_modal_export_users_form");
    form.addEventListener("submit", handleFormSubmit);

    $(document).on(
        "click",
        '[ data-kt-export-modal-action="cancel"]',
        $("#kt_modal_export_users").modal("hide")
    );
});
