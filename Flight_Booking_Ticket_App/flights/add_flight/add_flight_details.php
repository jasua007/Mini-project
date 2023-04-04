<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flight Schedule Details</title>
    <link rel="stylesheet" href="styles_addFlight.css">

    <style>
    body {
        background-image: url("../../img/801367.jpg");
        background-repeat: no-repeat;
        background-position: center top;
        background-size: 100%;
        color: white;
    }
    </style>
</head>

<body>
    <ul>
        <li><a href="../../admin_page/admin_homepage.php"><img src="../../img/plane.png" alt="plane" height="50px"></a>
        </li>
        <li><a href="../../admin_page/admin_view_booked_tickets.php">List of Booked Tickets</a></li>
        <li><a class="active" href="#">Add Flight Schedule</a></li>
        <li><a href="../add_jet/add_jet_details.php">Add Aircrafts</a></li>
        <li><a href="../../logout/logout_handler.php">Logout</a></li>
    </ul>
    <h2 class="textColorWhite">ENTER THE FLIGHT SCHEDULE DETAILS</h2>
    <form action="add_flight_details_form_handler.php" method="post">
        <?php
            if(isset($_GET['msg']) && $_GET['msg']=='success')
            {
                echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong>
                    <br>
                    <br>";
            }
            else if(isset($_GET['msg']) && $_GET['msg']=='failed')
            {
                echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
                    <br>
                    <br>";
            }
        ?>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Flight Number</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="text" name="flight_no"></td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Origin</td>
                <td class="fix_table textColorWhite">Destination</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="text" name="origin"></td>
                <td class="fix_table"><input class="textBox2" type="text" name="destination"></td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Departure Date</td>
                <td class="fix_table textColorWhite">Arrival Date</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="date" name="dep_date"></td>
                <td class="fix_table"><input class="textBox2" type="date" name="arr_date"></td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Departure Time</td>
                <td class="fix_table textColorWhite">Arrival Time</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="time" name="dep_time"></td>
                <td class="fix_table"><input class="textBox2" type="time" name="arr_time"></td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Number of Seats in Economy Class</td>
                <td class="fix_table textColorWhite">Number of Seats in Business Class</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="number" name="seats_eco"></td>
                <td class="fix_table"><input class="textBox2" type="number" name=" seats_bus"></td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Ticket Price(Economy Class)</td>
                <td class="fix_table textColorWhite">Ticket Price(Business Class)</td>
            </tr>
        </table>
        <table cellpadding="5">
            <tr>
                <td class="fix_table">
                    <input class="textBox2" type="number" name="price_eco">
                </td>
                <td class="fix_table">
                    <input class="textBox2" type="number" name="price_bus">
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textColorWhite">Jet ID</td>
            </tr>
            <tr>
                <td class="fix_table">
                    <input class="textBox2" type="text" name="jet_id">
                </td>
            </tr>
        </table>
        <br>
        <div class="form-btn">
            <button class="submit-btn" value="Submit" name="Submit">Submit</button>
            <!-- <a class="submit-btn" href="../../admin_page/admin_homepage.php">Go Home</a> -->

        </div>
    </form>


</body>

</html>