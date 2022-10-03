<?php
session_start();
include "connect.php";
include "validation.php";
$_SESSION['u_id'] = "";


$errors = array();

// Manupilating users informations;
$id = $action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
            // user details
        case 'detail':
            $id = $_REQUEST['id'];
            $_SESSION['u_id'] = $id;
            // header("location: ../dean/user_detail.php?id=$id");
            header("location: ../dean/user_detail.php");
            break;
        case 'deleteuser':
            $id = $_REQUEST['id'];
            // archive_user($con, $id);
            $sql = "DELETE FROM user WHERE user_id = '$id'";
            if (mysqli_query($con, $sql)) { } else {
                array_push($errors, "Error: " . mysqli_connect_error($db));
            }
            header("location: ../dean/user.php");
            break;
    }
}


// Add DELETED user in Archived user table function

function archive_user($db, $id)
{
    $fn = $user_id = $ln = $pn = $em  = $pos  = $pswd = $username_user = "";
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        $fn = $row['firstname'] . " " . $row['lastname'];
        $pn = $row['phone'];
        $em = $row['email'];
        $pos = $row['position'];
        $username_user = $row['username'];
        $pswd = $row['password'];
    }

    $sql1 = "INSERT INTO user_archive VALUES ('', '$user_id', '$fn', '$pn', '$em', '$pos', 
    '$username_user', '$pswd')";
    if (mysqli_query($db, $sql1)) { } else { }
}


// Register User 

$fn = $ln = $pn = $em  = $pos  = $pswd = $username_user = "";

if (isset($_POST['add_user'])) {

    $sql1 = "SELECT username FROM user";
    $result1 = mysqli_query($con, $sql1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $username = $row['username'];
    }

    $fn = test_input($_POST['firstname']);
    $ln = test_input($_POST['lastname']);
    $pn = test_input($_POST['phone']);
    $em = test_input($_POST['email']);
    $pos = test_input($_POST['position']);
    $pswd = test_input($_POST['password']);
    $username_user = $fn . "." . $ln;

    if ($username === $username_user) {
        array_push($errors, "Username Already Exists");
    }


    if (count($errors) == 0) {
        $insert_user = "INSERT INTO user VALUES ('', '$fn', '$ln', '$pn', '$em', '$pos', '$username_user', '$pswd')";
        if (mysqli_query($con, $insert_user)) { } else {
            array_push($errors, "Not Inserted" . mysqli_error($con));
        }
    }
}


















?>