<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Flight Booking Ticket App</title>
    <link rel="stylesheet" href="styles/styles_index.css">
    <style>
    body {
        background-image: url("img/bg.webp");
    }
    </style>
</head>

<body>
    <div class="section">
        <div class="section-center">
            <div class="booking-form">
                <div class="form-header">
                    <h1>Welcome To Flight Booking Ticket App</h1>
                </div>
                <div id="wrapper">
                    <form class="float_form" style="padding-left: 40px" action="index_handler.php" method="POST">
                        <?php
                            if(isset($_GET['msg']) && $_GET['msg']=='failed')
                            {
                                echo "<br>
                                <strong style='color:red'>Invalid Username/Password</strong>
                                <br><br>";
                            }
                        ?>
                        <strong class="textLabel">Username:</strong>
                        <br>
                        <input class="textBox" type="text" name="username" placeholder="Enter your username" required>
                        <br><br>
                        <strong class="textLabel">Password:</strong>
                        <br>
                        <input class="textBox" type="password" name="password" placeholder="Enter your password"
                            required>
                        <br><br>
                        <strong class="textLabel">User Type:</strong>
                        <br><br>
                        <div class="form-checkbox">
                            <label for="Customer">
                                <input type="radio" id="Customer" name='user_type' value='Customer' checked>
                                <span></span>Customer
                            </label>
                            <label for="Administrator">
                                <input type="radio" id="Administrator" name='user_type' value='Administrator'>
                                <span></span>Administrator
                            </label>
                        </div>
                        <br>

                        <!-- <input type="submit" name="Login" value="Login"> -->
                        <div class="form-btn">
                            <button class="submit-btn" name="Login">Login</button>
                        </div>
                        <a id="textRegister" href="./New_User/new_user.php"> Create New User Account?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>