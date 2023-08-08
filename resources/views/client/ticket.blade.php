<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="{{asset('assets/css/ticket.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <title>Document</title>
</head>
<body>
  <button id="openModalButton">Open Ticket Modal</
  <div class="ticket-container">
    <div class="ticket" id="ticket">
      <div class="left">
        <div class="image" style="background-image:url('assets/media/ticket/qr.png')">
          <div class="ticket-number">
            <p>
              ticket no.20030220
            </p>
          </div>
        </div>
        <div class="ticket-info">
          <p class="date">
            <span>MONDAY</span>
            <span class="day">AUGUST 15</span>
            <span>2023</span>
          </p>
          <div class="show-name">
            <h1>CENTER FOR THE ELDERLY</h1>
            <p>Services: Yoga, Gym, Ballroom</p>
          </div>
          <div class="time">
            <p>8:00 PM - 11:00 PM</p>
          </div>
          <p class="location"><span>13, 1639 Ipil-Ipil Street North Signal Village, Taguig City.</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <button id="downloadButton">Download Ticket as Image</button>
  <script src="{{asset('assets/js/ticket.js')}}"></script>
</body>
</html>