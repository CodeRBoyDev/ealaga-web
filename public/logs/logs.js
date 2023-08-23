$(document).ready(function () {
    let tableBody;
    let table;

    const fetchLogsAndPopulateTable = () => {
        $.ajax({
            url: "/api-logs",
            type: "GET",
            dataType: "json",
            success: function (response) {
                tableBody = $("#kt_table_users_logs tbody");
                tableBody.empty();

                response.data.forEach((log) => {
                    const row = `
                        <tr>
                            <td class="text-center min-w-70px">
                                <div class="badge badge-light-success">${
                                    log.action
                                }</div>
                            </td>
                            <td class=" text-center min-w-70px">${
                                log.details
                            }</td>
                            <td class=" text-center min-w-70px">
                                ${
                                    log.http_method
                                        ? `<div class="badge badge-light-info">${log.http_method}</div>`
                                        : `<div class="badge badge-light-danger">N/A</div>`
                                }
                            </td>
                            <td class=" text-center min-w-70px">${
                                log.url || "N/A"
                            }</td>
                            <td class="pe-0 text-center min-w-200px">${
                                log.timestamp
                            }</td>
                        </tr>`;

                    tableBody.append(row);
                });

                table = $("#kt_table_users_logs").DataTable({
                    // Rest of your DataTable configuration
                    pageLength: 10,
                    ordering: false,
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    fetchLogsAndPopulateTable();
});
