$(document).ready(function () {
    let tableBody;
    let table;
    const fetchUsersAndPopulateTable = () => {
        // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
        $.ajax({
            url: "/users-report", // Replace '/user-list' with the appropriate route URL
            type: "GET",
            dataType: "json",

            success: function (response) {
                // Get a reference to the table body
                tableBody = $("#kt_table_users_report tbody");

                // Clear any existing rows from the table body
                tableBody.empty();

                // Loop through the response data and create table rows
                response.data.forEach((user) => {
                    const fullName = `
                                   ${user.lastname || ""}
                                    ${user.firstname || ""}
                                    ${user.middlename || ""} 
                                     ${user.suffix || ""}
                                      `;
                    const address = user.barangay || "Unknown";
                    const totalSchedules = user.total_schedules || "None";
                    const totalComorbidities =
                        user.total_comorbidities || "None";

                    const row = `
                                <tr class="text-center">
                                    <td>${fullName}</td>
                                    <td>${address}</td>
                                    <td>${totalSchedules}</td>
                                    <td>${totalComorbidities}</td> 
                                </tr>`;

                    // Append the row to the table body
                    tableBody.append(row);
                });

                // Initialize the DataTable instance
                table = $("#kt_table_users_report").DataTable({
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
    fetchUsersAndPopulateTable();
});
