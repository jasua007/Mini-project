<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="styles_Booked.css">
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
    <h2>Payment Summary</h2>
    <form action="payment_details_form_handler.php" method="post">

        <?php
			$flight_no=$_SESSION['flight_no'];
			$journey_date=$_SESSION['journey_date'];
			$no_of_pass=$_SESSION['no_of_pass'];
			$total_no_of_meals=$_SESSION['total_no_of_meals'];
			$payment_id=rand(100000000,999999999);
			$pnr=$_SESSION['pnr'];
			$_SESSION['payment_id']=$payment_id;
			$payment_date=date('Y-m-d'); 
			$_SESSION['payment_date']=$payment_date;


			require_once('../Database Connection file/mysqli_connect.php');
			if($_SESSION['class']=='economy')
			{	
				$query="SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$ticket_price);
				mysqli_stmt_fetch($stmt);
			}
			else if($_SESSION['class']=='business')
			{
				$query="SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt,$ticket_price);
				mysqli_stmt_fetch($stmt);
			}
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
			$total_ticket_price=$no_of_pass*$ticket_price;
			$total_meal_price=250*$total_no_of_meals;
			if($_SESSION['insurance']=='yes')
			{
				$total_insurance_fee=100*$no_of_pass;
			}
			else
			{
				$total_insurance_fee=0;
			}
			if($_SESSION['priority_checkin']=='yes')
			{
				$total_priority_checkin_fee=200*$no_of_pass;
			}
			else
			{
				$total_priority_checkin_fee=0;
			}
			if($_SESSION['lounge_access']=='yes')
			{
				$total_lounge_access_fee=300*$no_of_pass;
			}
			else
			{
				$total_lounge_access_fee=0;
			}
			$total_discount=0;
			$total_amount=$total_ticket_price+$total_meal_price+$total_insurance_fee+$total_priority_checkin_fee+$total_lounge_access_fee+$total_discount;
			$_SESSION['total_amount']=$total_amount;

			echo "<table cellpadding=\"5\"	style='margin-left: 50px'>";
			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_ticket_price."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Meal Combo Charges:</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_meal_price."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Priority Checkin Fees:</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_priority_checkin_fee."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Lounge Access Fees:</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_lounge_access_fee."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Insurance Fees:</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_insurance_fee."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td class=\"fix_table textLabel2\">Discount:</td>";
			echo "<td class=\"fix_table textLabel2\">Rp ".$total_discount."</td>";
			echo "</tr>";

			echo "</table>";

			echo "<hr style='margin-right:900px; margin-left: 50px'>";
			echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
			echo "<tr>";
			echo "<td class=\"fix_table\"><strong class=\"textColorWhite\">Total:</strong></td>";
			echo "<td class=\"fix_table textLabel\">Rp ".$total_amount."</td>";
			echo "</tr>";
			echo "</table>";
			echo "<hr style='margin-right:900px; margin-left: 50px'>";
			echo "<br>";
			echo "<p style=\"margin-left:50px\" class=\"textLabe3 textColorWhite\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
			echo "<br>";
		?>
        <table cellpadding="5" style='margin-left: 50px'>
            <tr>
                <td class="fix_table"><strong class="textColorWhite">Enter the Payment Mode:</strong>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-checkbox">
                        <label for="credit card">
                            <input type="radio" id="credit card" name="payment_mode" value="credit card" checked>
                            <span></span>credit card
                        </label>
                        <label for="debit card">
                            <input type="radio" id="debit card" name="payment_mode" value="debit card">
                            <span></span>debit card
                        </label>
                        <label for="net banking">
                            <input type="radio" id="net banking" name="payment_mode" value="net banking">
                            <span></span>net banking
                        </label>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <div class="form-btn">
            <button class="submit-btn" value="Pay Now" name="Pay_Now">Pay Now</button>
        </div>
    </form>

</body>

</html>