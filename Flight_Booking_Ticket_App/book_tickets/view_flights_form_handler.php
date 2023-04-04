<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Flights</title>
    <link rel="stylesheet" href="style_wrapper.css">
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

    <h2>AVAILABLE FLIGHTS</h2>
    <div class="wrapper2">
        <?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='No. of Passengers';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Class';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;
					require_once('../Database Connection file/mysqli_connect.php');
					if($class=="economy")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3 class=\"textColorWhite\">No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"../book_tickets/book_tickets2.php\" method=\"post\">";
							echo "<table class=\"textColorWhite\" cellpadding=\"10\"";
							echo "<tr><th >Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Economy)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
								echo "<tr>
								<td>".$flight_no."</td>
								<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>Rp. ".$price_economy."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
								</tr>";
							}
							echo "</table> <br>";

							echo "<div class=\"form-btn\">";
									echo "<button class=\"submit-btn\" value=\"Select Flight\" name=\"Select\">Select Flight</button>";
							echo "</div>";

							// echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
							echo "</form>";
						}
					}
					else if($class="business")
					{
						$query="SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$departure_time,$arrival_date,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"../book_tickets/book_tickets2.php\" method=\"post\">";
							echo "<table class=\"textColorWhite\" cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
								echo "<tr>
								<td>".$flight_no."</td>
								<td>".$from_city."</td>
								<td>".$to_city."</td>
								<td>".$departure_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_date."</td>
								<td>".$arrival_time."</td>
								<td>Rp. ".$price_business."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=".$flight_no."></td>
								</tr>";
							}
							echo "</table> <br>";

							echo "<div class=\"form-btn\">";
									echo "<button class=\"submit-btn\" value=\"Select Flight\" name=\"Select\">Select Flight</button>";
							echo "</div>";

							// echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
							echo "</form>";
						}
					}	
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
    </div>
</body>

</html>