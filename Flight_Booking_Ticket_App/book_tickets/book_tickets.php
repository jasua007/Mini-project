<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
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

    <?php
        echo "<h1>Welcome ".$_SESSION['login_user']."</h1>";
        require_once('../Database Connection file/mysqli_connect.php');
        $query="SELECT count(*),frequent_flier_no,mileage FROM Frequent_Flier_Details WHERE customer_id=?";
        $stmt=mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"s",$_SESSION['login_user']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$cnt,$frequent_flier_no,$mileage);
        mysqli_stmt_fetch($stmt);
        if($cnt==1)
        {
            echo "<h4 style='padding-left: 20px;'>Frequent Flier No.: ".$frequent_flier_no."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Mileage: ".$mileage." points</h4><br>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    ?>



    <form action="view_flights_form_handler.php" method="post">
        <table cellpadding="5">
            <h4>SEARCH FOR AVAILABLE FLIGHTS</h4>
            <tr>
                <td class="fix_table textLabel2">Enter the Origin</td>
                <td class="fix_table textLabel2">Enter the Destination</td>
            </tr>
            <tr>
                <td class="fix_table">
                    <input class="textBox2" list="origins" name="origin" placeholder="From" required>
                    <datalist id="origins">
                        <option value="Banda Aceh">
                        <option value="Medan">
                        <option value="Jakarta">
                    </datalist>
                </td>
                <td class="fix_table">
                    <input class="textBox2" list="destinations" name="destination" placeholder="To" required>
                    <datalist id="destinations">
                        <option value="Banda Aceh">
                        <option value="Medan">
                        <option value="Jakarta">
                    </datalist>
                </td>
            </tr>
        </table>
        <br>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textLabel2">Enter the Departure Date</td>
                <td class="fix_table textLabel2">Enter the No. of Passengers</td>
            </tr>
            <tr>
                <td class="fix_table"><input class="textBox2" type="date" name="dep_date" min=<?php 
											$todays_date=date('Y-m-d'); 
											echo $todays_date;
										?> max=<?php 
											$max_date=date_create(date('Y-m-d'));
											date_add($max_date,date_interval_create_from_date_string("90 days")); 
											echo date_format($max_date,"Y-m-d");
										?> required></td>
                <td class="fix_table"><input class="textBox2" type="number" name="no_of_pass" placeholder="Eg. 5"
                        required></td>
            </tr>
        </table>
        <br>
        <table cellpadding="5">
            <tr>
                <td class="fix_table textLabel2">Enter the Class</td>
            </tr>
            <tr>
                <td class="fix_table">
                    <select name="class">
                        <option value="economy">Economy</option>
                        <option value="business">Business</option>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <div class="form-btn">
            <button class="submit-btn" value="Search for Available Flights" name="Search">Search for
                Available Flights</button>

        </div>
    </form>
</body>

</html>