<?php
include "../include/connect.php";
include "../include/validation.php";

// add dean 
$errors = array();

$fn = $ln = $pn = $em  = $pos = $fac  = $pswd = $username_user = "";

if (isset($_POST['add_dean'])) {

    $sql1 = "SELECT username, fac_name FROM user";
    $result1 = mysqli_query($con, $sql1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $username = $row['username'];
        $fac_name = $row['fac_name'];
    }

    $fn = test_input($_POST['firstname']);
    $ln = test_input($_POST['lastname']);
    $pn = test_input($_POST['phone']);
    $em = test_input($_POST['email']);
    $fac = test_input($_POST['faculty']);
    $pos = "Dean";
    $pswd = test_input($_POST['password']);
    $username_user = $fn . "." . $ln;

    if ($username === $username_user) {
        array_push($errors, "Username Already Exists");
    }
    if ($fac_name === $fac) {
        array_push($errors, "Username Already Exists");
    }


    if (count($errors) == 0) {
        $insert_user = "INSERT INTO user VALUES ('', '$fn', '$ln', '$pn', '$em', '$pos', '$username_user', '$pswd', '$fac_name')";
        if (mysqli_query($con, $insert_user)) {
            header("location: admin.php");
         } else {
            array_push($errors, "Not Inserted" . mysqli_error($con));
        }
    }
}






?>