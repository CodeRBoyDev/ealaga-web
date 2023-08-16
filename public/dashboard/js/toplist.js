$(document).ready(function () {
    const $bulletColors = [
        "bg-success",
        "bg-primary",
        "bg-warning",
        "bg-info",
        "bg-danger",
    ];
    const $badgeColors = [
        "badge-light-success",
        "badge-light-primary",
        "badge-light-warning",
        "badge-light-info",
        "badge-light-danger",
    ];

    const renderTopList = (topList) => {
        const $topListDiv = $("#topListDiv");
        $topListDiv.empty(); // Clear previous content

        topList.forEach((top, index) => {
            const bulletColor = $bulletColors[index % $bulletColors.length];
            const badgeColor = $badgeColors[index % $badgeColors.length];
            const $item = `
                <div class="d-flex align-items-center mb-8">
                    <span class="bullet bullet-vertical h-40px ${bulletColor}"></span>
                    <div class="form-check form-check-custom form-check-solid mx-5">
                        <span class="text-gray-800 text-hover-primary fw-bolder fs-6">${top.label}</span>
                    </div> 
                    <div class="flex-grow-1">
                    </div>
                    <span class="badge ${badgeColor} fs-8 fw-bolder">
                        ${top.value} Total
                    </span>
                </div>`;

            $topListDiv.append($item);
        });
    };

    // Load default content (Services)
    const defaulttoplist = () => {
        $.ajax({
            url: "/top-list",
            type: "GET",
            data: { menu: "Services" },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    const topList = response.data; // Assuming the response structure
                    renderTopList(topList);
                } else {
                    console.log(response.data);
                }
            },
            error: function (error) {
                console.error("Error fetching default data:", error);
            },
        });
    };

    const handleMenuItemClick = (event) => {
        event.preventDefault();
        const menuItem = $(event.currentTarget).data("menu-item");
        $.ajax({
            url: "/top-list",
            type: "GET",
            data: { menu: menuItem },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    const topList = response.data; // Assuming the response structure
                    renderTopList(topList);
                    // Update the header text based on the clicked menu item
                    if (menuItem === "Services") {
                        $("#topListHeader").text("Top Services");
                    } else if (menuItem === "Barangay") {
                        $("#topListHeader").text("Top Barangay with Schedules");
                    } else if (menuItem === "Client") {
                        $("#topListHeader").text("Top Clients with Schedules");
                    }
                } else {
                    console.log(response.data);
                }
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    };
    defaulttoplist();
    $(".menu-item-link").click(handleMenuItemClick);
});
