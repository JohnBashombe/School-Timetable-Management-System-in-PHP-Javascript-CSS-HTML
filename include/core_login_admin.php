<?php
include "connect.php";
include "validation.php";
session_start();
$_SESSION['user_login'] = "";
$_SESSION['user_pos'] = "";



$errors = array();
$username1 = $password1 = "";


if (isset($_POST['login2'])) {

    $username1 = test_input($_POST['username']);
    $password1 = test_input($_POST['password']);

    $sql1 = "SELECT user_id, username, password, position FROM user WHERE username = '$username1' AND password =  '$password1' LIMIT 1";
    $result1 = mysqli_query($con, $sql1);

    $user_count1 = mysqli_num_rows($result1);

    if (count($user_count1) == 1) {
        while ($row1 = mysqli_fetch_array($result1)) {

            if($row1['position'] === 'lecturer'){
                header('location: ../timetable.php');
            }else if(row1['position'] != 'lecturer'){
                header('location: ../dean/department.php');
            }

            $_SESSION['user_login'] = $username1;
            $_SESSION['user_pos'] = $row['position'];
        }
    } 
}
