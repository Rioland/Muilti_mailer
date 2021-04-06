<?php
session_start();
//--- --- collecting Data --- ---
if (isset($_POST["password"])) {
    $password = test_input($_POST["password"]);
    $cpassword = "Opeyemis@1";
    if ($password === $cpassword) {
        $_SESSION["password"] = $password;
        header("location:index.php");
        // echo "it is correct sir!!";
    } else {
        echo "<script>alert('You have entered an incorrect password, Please call my doctor!!!');</script>";
        // header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
};



//--- --- for testing the input data --- ---- 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
