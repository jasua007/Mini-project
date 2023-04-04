<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Administrator</title>
    <link rel="stylesheet" href="styles_admin.css">
    <style>
    body {
        background-image: url("../img/bg.webp");
        color: white;
    }
    </style>
</head>

<body>
    <ul>
        <li><a class="active" href="#"><img src="../img/plane.png" alt="plane" height="50px"></a></li>
        <li><a href="admin_view_booked_tickets.php">List of Booked Tickets</a></li>
        <li><a href="../flights/add_flight/add_flight_details.php">Add Flight Schedule</a></li>
        <li><a href="../flights/add_jet/add_jet_details.php">Add Aircrafts</a></li>
        <li><a href="../logout/logout_handler.php">Logout</a></li>
    </ul>
    <h2>Welcome Administrator! in Flight Booking Ticket App</h2>
</body>

</html>