<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome Customer</title>
    <link rel="stylesheet" href="styles_customer.css">
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
        <li><a href="../book_tickets/book_tickets.php">Book Ticket</a></li>
        <li><a href="../ticket/view_booked_tickets.php">My Schedule</a></li>
        <li><a href="../logout/logout_handler.php">Logout</a></li>
    </ul>
    <?php
        echo "<h2>Welcome ".$_SESSION['login_user']." to Flight Booking Ticket App</h2>";
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
</body>


</html>