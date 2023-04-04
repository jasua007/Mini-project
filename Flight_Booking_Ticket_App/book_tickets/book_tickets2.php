<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Travel/Ticket Details</title>
    <link rel="stylesheet" href="styles_Booked.css">
    <link rel="stylesheet" href="style_wrapper.css">
    <style>
    body {
        background-image: url("../img/1022696.jpg");
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
    <h2>PASSENGERS DETAILS</h2>
    <div class="wrapper2">
        <?php
		$no_of_pass=$_SESSION['no_of_pass'];
		$class=$_SESSION['class'];
		$count=$_SESSION['count'];
		$flight_no=$_POST['select_flight'];
		$_SESSION['flight_no']=$flight_no;
		//$pass_name=array();
		echo "<form action=\"../ticket/add_ticket_details_form_handler.php\" method=\"post\">";
		while($count<=$no_of_pass)
		{
				echo "<p><strong class=\"textColorWhite\">PASSENGER ".$count."<strong></p>";
				echo "<table cellpadding=\"0\">";
				echo "<tr>";
				echo "<td class=\"fix_table_short textLabel2\">Passenger's Name</td>";
				echo "<td class=\"fix_table_short textLabel2\">Passenger's Age</td>";
				echo "<td class=\"fix_table_short textLabel2\">Passenger's Gender</td>";
				echo "<td class=\"fix_table_short textLabel2\">Passenger's Inflight Meal</td>";
				echo "<td class=\"fix_table_short textLabel2\">Passenger's Frequent Flier ID (if applicable)</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\"><input class=\"textBox2\" type=\"text\" name=\"pass_name[]\" required></td>";
				echo "<td class=\"fix_table_short\"><input class=\"textBox2\" type=\"number\" name=\"pass_age[]\" required></td>";
				echo "<td class=\"fix_table_short\">";
				echo "<select name=\"pass_gender[]\">";
				echo "<option value=\"male\">Male</option>";
				echo "<option value=\"female\">Female</option>";
				echo "<option value=\"other\">Other</option>";
				echo "</select>";
				echo "</td>";					  
				echo "<td class=\"fix_table_short\">";
				echo "<select name=\"pass_meal[]\">";
				echo "<option value=\"yes\">Yes</option>";
				echo "<option value=\"no\">No</option>";
				echo "</select>";
				echo "</td>";
				echo "<td class=\"fix_table_short\"><input class=\"textBox2\" type=\"text\" name=\"pass_ff_id[]\"></td>";
				echo "</tr>";
				echo "</table>";
				echo "<br><hr>";
				$count=$count+1;
			}
			echo "<br><h2>ENTER TRAVEL DETAILS</h2>";
			echo "<table cellpadding=\"5\">";
			echo "<tr>";
			echo "<td class=\"fix_table_short\">Do you want access to our Premium Lounge?</td>";
			echo "<td class=\"fix_table_short\">Do you want to opt for Priority Checkin?</td>";
			echo "<td class=\"fix_table_short\">Do you want to purchase Travel Insurance?</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td class=\"fix_table\">";
			echo "Yes <input type='radio' name='lounge_access' value='yes' checked/> No <input type='radio' name='lounge_access' value='no'/>";
			echo "</td>";
			echo "<td class=\"fix_table\">";
			echo "Yes <input type='radio' name='priority_checkin' value='yes' checked/> No <input type='radio' name='priority_checkin' value='no'/>";
			echo "</td>";
			echo "<td class=\"fix_table\">";
			echo "Yes <input type='radio' name='insurance' value='yes' checked/> No <input type='radio' name='insurance' value='no'/>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";

			echo "<div class=\"form-btn\">";
					echo "<button class=\"submit-btn\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">Submit Travel/Ticket Details</button>";
			echo "</div>";

			// echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
			echo "</form>";
	?>
    </div>

</body>

</html>