$(document).ready(function () {
    let myChartInstance = null; // To store the chart instance

    const schedulesChart = (dateFrom, dateTo, schedules_status) => {
        const requestData = {
            date_from: dateFrom,
            date_to: dateTo,
            schedules_status: schedules_status,
        };

        $.ajax({
            url: "/schedules-statistics",
            type: "GET",
            dataType: "json",
            data: requestData,
            success: function (response) {
                if (response.success) {
                    if (myChartInstance) {
                        myChartInstance.destroy(); // Destroy the previous chart instance
                    }
                    generateSchedulesChart(response.data, response.message);
                } else {
                    console.log(response.data);
                }
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const generateSchedulesChart = (data, message) => {
        const e = document.getElementById("kt_charts_widget_schedules");
        const customColors = ["#ED1C24", "#1A4798", "#F4C027"]; // Define your custom slice colors

        const chartOptions = {
            series: [
                {
                    name: "Schedules",
                    data: data.map((item) => ({
                        x: new Date(item.schedule_date).getTime(),
                        y: item.count,
                    })),
                },
            ],
            chart: {
                height: 350,
                type: "line",
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2,
                },
            },
            colors: customColors,
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: "straight",
            },
            title: {
                text: "Filtered by " + message,
                align: "left",
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            xaxis: {
                type: "datetime",
            },
        };

        myChartInstance = new ApexCharts(e, chartOptions);
        myChartInstance.render(); // Render the new chart instance
    };

    const resetChartToDefault = () => {
        // Reset the select dropdown to its default value
        const selectDropdown = document.querySelector("#schedules_status");
        selectDropdown.value = "";
        selectDropdown.dispatchEvent(new Event("change")); // Trigger the change event

        // Clear the date inputs
        const dateFromInput = document.querySelector("#date_from");
        const dateToInput = document.querySelector("#date_to");
        dateFromInput.value = "";
        dateToInput.value = "";
    };

    $(document).on(
        "click",
        '[data-kt-schedules-chart-filter="apply"]',
        function () {
            const dateFrom = $("#date_from").val();
            const dateTo = $("#date_to").val();
            const schedulesStatus = parseInt($("#schedules_status").val()); // Convert to integer

            schedulesChart(dateFrom, dateTo, schedulesStatus);
        }
    );

    $(document).on(
        "click",
        '[data-kt-schedules-chart-filter="reset"]',
        function () {
            resetChartToDefault();
            schedulesChart();
        }
    );
    schedulesChart(); // Load initial chart
});
