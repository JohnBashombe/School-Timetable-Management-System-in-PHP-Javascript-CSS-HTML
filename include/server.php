<?php
include "validation.php";
include "connect.php";


//User (student and lecturer login)

$errors = array();



     



    // Register student

    $fn = $ln = $pn = $em = $fac = $dep = $year = $sem = $pswd = $username_std = $username = "";

    if(isset($_POST['add_student'])){

        $sql1 = "SELECT username FROM student";
        $result1 = mysqli_query($con, $sql1);

        while($row = mysqli_fetch_assoc($result1)){
            $username = $row['username'];
        }

        $fn = test_input($_POST['firstname']);
        $ln = test_input($_POST['lastname']);
        $pn = test_input($_POST['phone']);
        $em = test_input($_POST['email']);
        $fac = test_input($_POST['faculty']);
        $dep = test_input($_POST['department']);
        $year = test_input($_POST['year']);
        $sem = test_input($_POST[ 'semester']);
        $pswd = test_input($_POST['password']);
        $username_std = $fn . "." . $ln;

        if($username === $username_std){
            array_push($errors, "Username Already Exists");
        }

        if(count($errors) === 0){
            $insert_student = "INSERT INTO student VALUES ('', '$fn', '$ln', '$em', '$pn', '$fac', '$dep', '$year', '$sem', 
            '$username_std', '$pswd')";
            if(mysqli_query($con, $insert_student)) {}else {
                array_push($errors, "Not Inserted" . mysqli_error($con));
            }
        }

    }





// Register Course

$cn = $cc = $cu = $dep = $lec = $sem = "";

if(isset($_POST['add_course'])){

    $cn = test_input($_POST['coursename']);
    $cc = test_input($_POST['coursecode']);
    $cu = test_input($_POST['courseunit']);
    $sem = test_input($_POST['semester']);
    $dep = test_input($_POST['department']);
    $lec = test_input($_POST['lecturer']);
    
    $insert_course = "INSERT INTO course VALUES ('', '$cn', '$cc', '$cu', '$dep', '$sem', '$lec')";
    if(mysqli_query($con, $insert_course)){} else {
        array_push($errors, "Not Inserted" . mysqli_error($con));
    }

}


// Add room
$rm = "";
if(isset($_POST['add_room'])){

    $rm = test_input($_POST['room']);

    $insert_room = "INSERT INTO room VALUES ('', '$rm')";
    if(mysqli_query($con, $insert_room)){
        
    }else {
        array_push($errors, "Not Inserted" . mysqli_error($con));
    }
}

