<?php
include "connect.php";
include "validation.php";
session_start();
$_SESSION['user_login'] = "";
$_SESSION['user_pos'] = "";



$errors = array();
$username1 = $password1 = "";

if (isset($_POST['login1'])) {

    $username1 = test_input($_POST['username1']);
    $password1 = test_input($_POST['password1']);

    $sql = "SELECT student_id, username, password FROM student WHERE username = '$username1' AND password =  '$password1' LIMIT 1";
    $result = mysqli_query($con, $sql);

    $user_count = mysqli_num_rows($result);

    if (count($user_count) == 1) {
        while($row = mysqli_fetch_array($result)){
            $_SESSION['user_login'] = $username1;
            header("location: timetable.php");
        }
    }

}
?>