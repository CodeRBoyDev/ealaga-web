$(document).ready(function () {
    $(document).ready(function () {
        let tableBody;
        let table;
        const fetchServicesAndPopulateTable = () => {
            // Make an AJAX request to fetch data (replace 'data.json' with your data source URL)
            $.ajax({
                url: "/services-report", // Replace '/user-list' with the appropriate route URL
                type: "GET",
                dataType: "json",

                success: function (response) {
                    // Get a reference to the table body
                    tableBody = $("#kt_table_services_report tbody");

                    // Clear any existing rows from the table body
                    tableBody.empty();

                    // Loop through the response data and create table rows
                    response.data.forEach((data) => {
                        const service = data.title || "Unknown";
                        const totalUsers =
                            data.total_users_per_service || "None";
                        const totalPending = parseInt(data.total_pending) || 0; // Convert to integer and use 0 as default value for counting
                        const totalAttended =
                            parseInt(data.total_attended) || 0;
                        const totalNotAttended =
                            parseInt(data.total_not_attended) || 0;
                        const totalCancelled =
                            parseInt(data.total_cancelled) || 0;

                        const total =
                            totalPending +
                            totalAttended +
                            totalNotAttended +
                            totalCancelled;

                        const row = `
                                <tr class="text-center">
                                    <td>${service}</td>
                                    <td>${totalUsers}</td> 
                                    <td>${totalPending}</td>
                                    <td>${totalAttended}</td>
                                    <td>${totalNotAttended}</td> 
                                    <td>${totalCancelled}</td>  
                                    <td>${total}</td>  
                                </tr>`;

                        // Append the row to the table body
                        tableBody.append(row);
                    });

                    // Initialize the DataTable instance
                    table = $("#kt_table_services_report").DataTable({
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
        fetchServicesAndPopulateTable();
    });
});
