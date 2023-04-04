<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booked Tickets</title>
    <link rel="stylesheet" href="styles_admin.css">
    <style>
    body {
        background-image: url("../img/598918.jpg");
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100%;
    }
    </style>
</head>

<body>
    <ul>
        <li><a href="admin_homepage.php"><img src="../img/plane.png" alt="plane" height="50px"></a></li>
        <li><a class="active" href="#">List of Booked Tickets</a></li>
        <li><a href="../flights/add_flight/add_flight_details.php">Add Flight Schedule</a></li>
        <li><a href="../flights/add_jet/add_jet_details.php">Add Aircrafts</a></li>
        <li><a href="../logout/logout_handler.php">Logout</a></li>
    </ul>
    <h2>LIST OF BOOKED TICKETS FOR A FLIGHT</h2>
    <form action="admin_view_booked_tickets_form_handler.php" method="post">
        <div>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table textLabel2">Enter the Flight No.</td>
                    <td class="fix_table textLabel2">Enter the Departure Date</td>
                </tr>
                <tr>
                    <td class="fix_table"><input class="textBox2" type="text" name="flight_no" required>
                    </td>
                    <td class="fix_table"><input class="textBox2" type="date" name="departure_date" required></td>
                </tr>
            </table>
            <br>
            <br>
            <div class="form-btn">
                <button class="submit-btn" value="Submit" name="Submit">Submit</button>
            </div>
        </div>
    </form>


</body>

</html>