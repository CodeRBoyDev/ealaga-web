$(document).ready(function () {
    let tableBody;
    let table;
    const fetchComorbiditiesAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/comorbidities-report", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",

            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_comorbidities_report tbody");

                // Clear any existing rows from the table body
                tableBody.empty();

                // Loop through the response data and create table rows
                response.data.forEach((data) => {
                    const row = `
                                <tr class="text-center">
                                    <td>${data.name}</td>
                                    <td>${data.description}</td>
                                    <td>${data.total_users_per_comorbidity}</td> 
                                </tr>`;

                    // Append the row to the table body
                    tableBody.append(row);
                });

                // Initialize the DataTable instance
                table = $("#kt_table_comorbidities_report").DataTable({
                    // Rest of your DataTable configuration
                    pageLength: 10, // Set the default number of rows per page
                    // Disable sorting for all columns
                    ordering: false,
                });
                $("#kt_view_users_tab").addClass("active");
            },

            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };
    fetchComorbiditiesAndPopulateTable();
});
