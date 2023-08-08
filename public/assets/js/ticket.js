document.getElementById('downloadButton').addEventListener('click', function () {
    const ticketDiv = document.getElementById('ticket');
  
    // Now capture the "ticket" div as an image
    html2canvas(ticketDiv, { scale: 2, logging: true }).then(function (canvas) {
    const imageData = canvas.toDataURL('image/jpeg', 0.9); // 0.9 represents 90% quality
    const downloadLink = document.createElement('a');
    downloadLink.href = imageData;
    downloadLink.download = 'ticket.jpg';
    downloadLink.click();
  });
});