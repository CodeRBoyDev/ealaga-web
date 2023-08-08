document.addEventListener('DOMContentLoaded', function () {
    // Attach the click event listener to the download button
    document.getElementById('downloadimage').addEventListener('click', function () {
        const ticketDiv = document.getElementById('ticket-container');
        
        // Check if the ticketDiv element is valid
        if (ticketDiv) {
            html2canvas(ticketDiv, { scale: 2, logging: true }).then(function (canvas) {
                const imageData = canvas.toDataURL('image/jpeg', 0.9);
                const downloadLink = document.createElement('a');
                downloadLink.href = imageData;
                downloadLink.download = 'ticket.jpg';
                downloadLink.click();
                console.log('SUCCESS');
            });
        } else {
            console.log("Invalid element: 'ticket-container' not found.");
        }
    });
});