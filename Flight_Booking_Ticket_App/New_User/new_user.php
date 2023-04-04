<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User Account</title>
    <link rel="stylesheet" href="../styles/styles_index.css">
    <style>
    body {
        background-image: url("../img/bg.webp");
    }
    </style>
</head>

<body>
    <div class="section">
        <div class="section-center">
            <div class="booking-form">
                <div class="form-header">
                    <h1>Welcome To Flight Booking Ticket App - Sign Up</h1>
                </div>
                <div id="wrapper">
                    <form class="center_form" action="new_user_form_handler.php" method="POST" id="new_user_from">
                        <?php
                            if(isset($_GET['msg']) && $_GET['msg']=='failed')
                            {
                                echo "<br>
                                <strong style='color:red'>Invalid Username/Password</strong>
                                <br><br>";
                            }
                        ?>

                        <strong class="textLabel">Full Name:</strong>
                        <br>
                        <input class="textBox" type="text" name="name" placeholder="Enter your Full Name" required>
                        <br><br>
                        <strong class="textLabel">Username:</strong>
                        <br>
                        <input class="textBox" type="text" name="username" placeholder="Enter your username" required>
                        <br><br>
                        <strong class="textLabel">Email:</strong>
                        <br>
                        <input class="textBox" type="text" name="email" placeholder="Enter your Email" required>
                        <br><br>
                        <strong class="textLabel">Phone Number:</strong>
                        <br>
                        <input class="textBox" type="text" name="phone_no" placeholder="Enter your Phone Number"
                            required>
                        <br><br>
                        <strong class="textLabel">Address:</strong>
                        <br>
                        <input class="textBox" type="text" name="address" placeholder="Enter your Address" required>
                        <br><br>
                        <strong class="textLabel">Password:</strong>
                        <br>
                        <input class="textBox" type="password" name="password" placeholder="Enter your password"
                            required>
                        <br><br>
                        <div class="form-btn">
                            <button class="submit-btn" value="Submit" name="Submit">Sign Up</button>
                            <a id="textRegister" href="../"> Already have Account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>