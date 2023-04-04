<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking Successful</title>
    <link rel="stylesheet" href="styles_Schedule.css">
    <style>
    body {
        background-image: url("../img/157399542-gi-hr-hbt-airport-terminal.jpg");
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100%;
        color: white;
    }
    </style>
</head>

<body>
    <ul>
        <li><a href="../customer_page/customer_homepage.php"><img src="../img/plane.png" alt="plane" height="50px"></a>
        </li>
        <li><a class="active" href="#">Book Ticket</a></li>
        <li><a href="../ticket/view_booked_tickets.php">My Schedule</a></li>
        <li><a href="../logout/logout_handler.php">Logout</a></li>
    </ul>

    <h2>BOOKING SUCCESSFUL</h2>
    <h3 class="textColorWhite">Your payment of Rp. <?php echo $_SESSION['total_amount']; ?> has
        been received.<br><br>
        Your PNR is
        <strong><?php echo $_SESSION['pnr'];?></strong>. Your tickets have been booked successfully.
    </h3>
</body>

</html>