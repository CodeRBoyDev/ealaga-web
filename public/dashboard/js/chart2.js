$(document).ready(function () {
    let myChartInstance = null; // To store the chart instance

    const servicesChart = () => {
        $.ajax({
            url: "/services-statistics",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    if (myChartInstance) {
                        myChartInstance.destroy(); // Destroy the previous chart instance
                    }
                    generateServicesChart(response.data, response);
                } else {
                    console.log(response.data);
                }
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };

    function getRandomColors(count) {
        const initialColors = ["#ED1C24", "#1A4798", "#F4C027"];
        const generatedColors = [...initialColors];

        const generateRandomColor = () => {
            const letters = "0123456789ABCDEF";
            let color = "#";
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        };

        while (generatedColors.length < count) {
            const randomColor = generateRandomColor();
            if (
                !generatedColors.includes(randomColor) &&
                randomColor !== "#FFFFFF"
            ) {
                generatedColors.push(randomColor);
            }
        }

        return generatedColors;
    }

    const generateServicesChart = (data) => {
        const e = document.getElementById("kt_charts_services_chart");

        const customColors = getRandomColors(10);

        myChartInstance = new ApexCharts(e, {
            series: data.map((item) => item.value),
            chart: {
                fontFamily: "inherit",
                type: "donut", // Set the chart type to "donut"
                width: "100%",
                toolbar: { show: true },
            },
            labels: data.map((item) => item.label),
            colors: customColors,
            tooltip: {
                style: { fontSize: "12px" },
                y: {
                    formatter: function (e) {
                        return e + (e > 1 ? " users" : " user");
                    },
                },
            },
            plotOptions: {
                pie: {
                    expandOnClick: true,
                },
                stroke: { show: true, width: 2 },

                donut: {
                    // Set the donut properties
                    size: "65%", // Control the size of the donut hole
                },
            },
            title: {
                text: "Overall Services Trends",
                align: "center",
            },
            legend: {
                position: "bottom", // Place the legend at the bottom
            },
        });

        myChartInstance.render(); // Render the new chart instance
    };

    servicesChart();
});
