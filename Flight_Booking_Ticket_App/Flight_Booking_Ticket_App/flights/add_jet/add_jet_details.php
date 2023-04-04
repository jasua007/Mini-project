<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Aircraft Details</title>
    <link rel="stylesheet" href="styles_addjet.css">
    <style>
    body {
        background-image: url("../../img/987916.jpg");
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
        <li><a href="../add_flight/add_flight_details.php">Add Flight Schedule</a></li>
        <li><a class="active" href="#">Add Aircrafts</a></li>
        <li><a href="../../logout/logout_handler.php">Logout</a></li>
    </ul>
    <h2>ENTER THE AIRCRAFTS DETAILS</h2>
    <form action="add_jet_details_form_handler.php" method="post">
        <div>
            <?php
                if(isset($_GET['msg']) && $_GET['msg']=='success')
                {
                    echo "<strong style='color: green'>The Aircraft has been successfully added.</strong>
                        <br><br>";
                }
                else if(isset($_GET['msg']) && $_GET['msg']=='failed')
                {
                    echo "<strong style='color:red'>*Jet ID already exists, please enter a new Jet ID.</strong>
                        <br><br>";
                }
            ?>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table textColorWhite">Enter a valid Jet ID</td>
                </tr>
                <tr>
                    <td class="fix_table"><input class="textBox2" type="text" name="jet_id" required></td>
                </tr>
            </table>
            <br>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table textColorWhite">Enter the Jet Type/Model</td>
                </tr>
                <tr>
                    <td class="fix_table"><input class="textBox2" type="text" name="jet_type" required></td>
                </tr>
            </table>
            <br>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table textColorWhite">Enter the total capacity of the Jet</td>
                </tr>
                <tr>
                    <td class="fix_table"><input class="textBox2" type="number" name="jet_capacity" required></td>
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