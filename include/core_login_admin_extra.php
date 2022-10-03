<?php
include "connect.php";
include "validation.php";
session_start();
$_SESSION['admin_login'] = "";
$_SESSION['user_pos'] = "";



$errors = array();
$username1 = $password1 = "";


if (isset($_POST['login3'])) {

    $username1 = test_input($_POST['username']);
    $password1 = test_input($_POST['password']);

    $sql1 = "SELECT * FROM admin WHERE username = '$username1' AND password =  '$password1' LIMIT 1";
    $result1 = mysqli_query($con, $sql1);

    $user_count1 = mysqli_num_rows($result1);

    if (count($user_count1) == 1) {
        while ($row1 = mysqli_fetch_array($result1)) {

            header("location: home.php");
            $_SESSION['admin_login'] = $username1;
        
        }
    }else{
        echo "Could not logged in";
    }
}
