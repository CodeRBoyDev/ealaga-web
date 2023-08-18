$(document).ready(function () {
    $(document).ready(function () {
        let tableBody;
        let table;
        const fetchBarangayAndPopulateTable = () => {
            // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
            $.ajax({
                url: "/barangay-report", // Replace '/user-list' with the appropriate route URL
                type: "GET",
                dataType: "json",

                success: function (response) {
                    // Get a reference to the table body
                    tableBody = $("#kt_table_barangay_report tbody");

                    // Clear any existing rows from the table body
                    tableBody.empty();

                    // Loop through the response data and create table rows
                    response.data.forEach((data) => {
                        const barangay = data.barangay || "Unknown";
                        const totalUsers = data.total_users || "None";
                        const totalSchedules = data.total_schedules || "None";
                        const totalComorbidities =
                            data.total_comorbidities || "None";
                        const totalVolunteers = data.total_volunteers || "None";
                        const row = `
                                <tr class="text-center">
                                    <td>${barangay}</td>
                                    <td>${totalUsers}</td>
                                    <td>${totalSchedules}</td>
                                    <td>${totalVolunteers}</td> 
                                    <td>${totalComorbidities}</td>  
                                </tr>`;

                        // Append the row to the table body
                        tableBody.append(row);
                    });

                    // Initialize the DataTable instance
                    table = $("#kt_table_barangay_report").DataTable({
                        // Rest of your DataTable configuration
                        pageLength: 10, // Set the default number of rows per page
                        // Disable sorting for all columns
                        ordering: false,
                    });
                },

                error: function (error) {
                    console.error("Error fetching data:", error);
                },
            });
        };
        fetchBarangayAndPopulateTable();
    });
});
