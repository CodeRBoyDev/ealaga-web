$(document).ready(function () {
    let myChartInstance = null; // To store the chart instance

    const updateChartBasedOnFilter = (selectedOption) => {
        $.ajax({
            url: "/user-statistics",
            type: "GET",
            data: { selectedOption: selectedOption },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    if (myChartInstance) {
                        myChartInstance.destroy(); // Destroy the previous chart instance
                    }
                    generateChart(response.data, response);
                } else {
                    console.log(response.data);
                }
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    const generateChart = (data, response) => {
        const e = document.getElementById("kt_charts_widget_chart");
        const t = parseInt(KTUtil.css(e, "height"));
        const a = KTUtil.getCssVariableValue("--bs-gray-500");
        const o = KTUtil.getCssVariableValue("--bs-gray-400");
        const s = KTUtil.getCssVariableValue("--bs-warning");
        const r = KTUtil.getCssVariableValue("--bs-gray-300");

        const customColors = ["#ED1C24"]; // Define your custom bar colors

        myChartInstance = new ApexCharts(e, {
            series: [
                {
                    name: "User Statistics " + response.message,
                    data: data.map((item) => item.value),
                },
            ],
            chart: {
                fontFamily: "inherit",
                type: "bar",
                height: t,
                toolbar: { show: true },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ["30%"],
                    borderRadius: 4,
                },
            },
            legend: { show: false },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 2, colors: ["transparent"] },
            xaxis: {
                categories: data.map(
                    (item) =>
                        item.label +
                        (response.message === "Age" ? " years old" : " ")
                ), // Append suffix if age filter
                axisBorder: { show: true },
                axisTicks: { show: true },
                labels: { style: { colors: a, fontSize: "12px" } },
            },
            yaxis: {
                labels: { style: { colors: a, fontSize: "12px" } },
            },
            fill: { opacity: 10 },
            states: {
                normal: { filter: { type: "none", value: 0 } },
                hover: { filter: { type: "none", value: 0 } },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: { type: "none", value: 0 },
                },
            },
            tooltip: {
                style: { fontSize: "12px" },
                y: {
                    formatter: function (e) {
                        return e + (e > 1 ? " users" : " user");
                    },
                },
            },
            colors: customColors,
            title: {
                text: "Filtered by " + response.message,
                align: "center",
            },
            grid: {
                borderColor: o,
                strokeDashArray: 4,
                yaxis: { lines: { show: true } },
            },
        });

        myChartInstance.render(); // Render the new chart instance
    };

    const resetChartToDefault = () => {
        // Reset the chart to default (filtered by 'role')
        updateChartBasedOnFilter("barangay");

        // Reset the select dropdown to its default value
        const selectDropdown = document.querySelector("#filterOption");
        selectDropdown.value = "";
        selectDropdown.dispatchEvent(new Event("change")); // Trigger the change event
    };

    // Initial fetch and chart generation with 'role' option
    updateChartBasedOnFilter("barangay");

    $(document).on(
        "click",
        '[data-kt-users-chart-filter="apply"]',
        function () {
            const selectedOption =
                document.querySelector("#filterOption").value;
            updateChartBasedOnFilter(selectedOption);
        }
    );

    $(document).on(
        "click",
        '[data-kt-users-chart-filter="reset"]',
        function () {
            resetChartToDefault();
        }
    );
});
