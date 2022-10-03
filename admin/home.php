<?php

// include "../include/connect.php";
include "../include/validation.php";
session_start();
$_SESSION['dep'] = "";
$_SESSION['sem'] = "";
if (!$_SESSION['admin_login']) {
    header("location: index.php");
}

$dep = $sem = "";


if (isset($_POST['loadT'])) {
    $_SESSION['dep'] = test_input($_POST['department']);
    $_SESSION['sem'] = test_input($_POST['semester']);
    $dep = $_SESSION['dep'];
    $sem = $_SESSION['sem'];
}
include "timetable.core.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IUEA MAintenance Website">
    <meta name="author" content="Bootlab">
    <title>IUEA Time Table Management</title>
    <link href="../webroot/css/app.css" rel="stylesheet">
    <link href="../webroot/css/bootstrap.min.css" rel="stylesheet">
    <link href="../webroot/css/offcanvas.css" rel="stylesheet">
    <link href="../webroot/css/style.css" rel="stylesheet">
    <link href="../webroot/css/empire-design.css" rel="stylesheet">
    <link href="../webroot/css/my_Icons.css" rel="stylesheet">
    <link href="../webroot/css/tabulation.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="d-flex">
            <div class="main">

                <nav class="navbar fixed-top navbar-dark customized-color">
                    <div class="container-fluid">
                        <a class="navbar-brand mr-auto mr-lg-0 text-small" href="home.php"><span class="text-red">TIME TABLE</span><span class="text-black"> MANAGEMENT</span></a>

                        <a class="nav-item title-small text-dark nav-link active" href="home.php">Timetable <span class="sr-only">(current)</span></a>
                        <a class="nav-item title-small text-dark nav-link" href="faculty.php">Faculty</a>
                        <a class="nav-link title-small nav-item text-dark" href="department.php">Department</a>
                        <a class="nav-link title-small nav-item text-dark" href="admin.php">Admin</a>
                        <a class="nav-link title-small nav-item text-dark" href="profile.php">Profile</a>
                        <a class="nav-link title-small nav-item text-dark" href="logout.php">Logout</a>

                    </div>
                </nav>

                <main class="content">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">

                                        <div class="card admin-card-padding manage_labels">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <form method="POST" action="#" class="needs-validation" novalidate="">
                                                            <div class="row">
                                                                <div class="col-md-5 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Department</label>
                                                                        <select name="department" class="form-control custom-select" required="">
                                                                            <option value="">Select Department</option>
                                                                            <?php
                                                                            $query = "SELECT dep_name FROM department";
                                                                            $result = mysqli_query($con, $query);
                                                                            while ($row = mysqli_fetch_array($result)) :
                                                                                ?>
                                                                                <option value="<?php echo $row['dep_name']; ?>"><?php echo $row['dep_name']; ?></option>
                                                                            <?php endwhile; ?>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please Select a Department
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Semester</label>
                                                                        <select name="semester" class="form-control custom-select" required="">
                                                                            <option value="">Select Semester</option>
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                            <option>6</option>
                                                                            <option>7</option>
                                                                            <option>8</option>
                                                                            <option>9</option>
                                                                            <option>10</option>
                                                                        </select>
                                                                        <div class="invalid-feedback">
                                                                            Please Select a Semester
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12 text-right">
                                                                    <div class="form-group">
                                                                        <!-- <label>Option</label> --><br />
                                                                        <button type="submit" name="loadT" class="btn btn-outline-success">Load
                                                                            Timetable</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br />
                                                        </form>

                                                        <?php
                                                        $dep = $sem = "";

                                                        if (isset($_POST['loadT'])) {
                                                            $dep = test_input($_POST['department']);
                                                            $sem = test_input($_POST['semester']);
                                                        }
                                                        ?>

                                                        <p class="title text-center"><?php echo $dep . " Semester " . $sem; ?></p>

                                                        <form method="POST" action="#">

                                                            <div class="table-responsive table-margin">
                                                                <table class="table table-striped table-hover text-center">
                                                                    <thead>
                                                                        <th>Time</th>
                                                                        <th>Monday</th>
                                                                        <th>Tuesday</th>
                                                                        <th>Wednesday</th>
                                                                        <th>Thursday</th>
                                                                        <th>Friday</th>
                                                                        <th>Saturday</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> 8-9:00 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_code, course_name FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>
                                                                                                <option value="<?php echo $row['course_code'];  ?> " selected title="<?php echo $row['course_name']; ?>"> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s00" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s01" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td> 9-10:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s10" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s11" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> 10-11:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s20" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s21" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> 11-12:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s30" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s31" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table class="table bg-secondary break_manage">

                                                                    <tbody>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>B</td>
                                                                            <td>R</td>
                                                                            <td>E</td>
                                                                            <td>A</td>
                                                                            <td>K</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-striped table-hover text-center">

                                                                    <tbody>
                                                                        <tr>
                                                                            <td> 1-2:00 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s40" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s41" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> 2-3:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    } ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>
                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s50" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s51" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> 3-4:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s60" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s61" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> 4-5:0 </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s70" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s71" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5-6:00</td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="m80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="m81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="t80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="t81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="w80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="w81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="th80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="th81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="f80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="f81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <select name="s80" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php
                                                                                        if (isset($_POST['loadT'])) {
                                                                                            $dep = test_input($_POST['department']);
                                                                                            $sem = test_input($_POST['semester']);

                                                                                            $course_query = "SELECT course_name, course_code FROM course WHERE department = '$dep' AND semester = '$sem'";
                                                                                            $course_result = mysqli_query($con, $course_query);
                                                                                            while ($row = mysqli_fetch_array($course_result)) :
                                                                                                ?>

                                                                                                <option selected title="<?php echo $row['course_name']; ?>" value="<?php echo $row['course_code']; ?> "> <?php echo $row['course_code']; ?>
                                                                                                </option> ';
                                                                                            <?php endwhile;
                                                                                    }
                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                                <br />
                                                                                <div class="form-group">
                                                                                    <select name="s81" class="form-control input-sm">
                                                                                        <option value=""> </option>
                                                                                        <?php

                                                                                        $course_query = "SELECT room_name FROM room";
                                                                                        $course_result = mysqli_query($con, $course_query);
                                                                                        while ($row = mysqli_fetch_array($course_result)) :
                                                                                            ?>

                                                                                            <option selected value="<?php echo $row['room_name']; ?> "> <?php echo $row['room_name']; ?>
                                                                                            </option> ';
                                                                                        <?php endwhile;

                                                                                    ?>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <br />
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <br />
                                                                    <button type="submit" class="btn btn-outline-success btn-lg" name="generate">Generate Timetable </button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="card">
                                            <div class="paddings">
                                                <div class="content">

                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="title text-muted">Time table Generated</p>
                                                        <?php
                                                        $dep = $sem = "";

                                                        if (isset($_POST['loadT'])) {
                                                            $dep = test_input($_POST['department']);
                                                            $sem = test_input($_POST['semester']);
                                                        }
                                                        ?>

                                                        <p class="text-muted"><?php echo $dep . " Semester " . $sem; ?></p>

                                                        <?php
                                                        $result_fetch_id = '';
                                                        $query_table = "SELECT `timetable_id` FROM `timetable` WHERE `department` = '$dep' AND `semester` = '$sem'";
                                                        
                                                        $result_fetch = mysqli_query($con, $query_table);

                                                        while($row_id = mysqli_fetch_array($result_fetch)){
                                                            $result_fetch_id = $row_id['timetable_id'];
                                                        }

                                                        $query_read = "SELECT * FROM `timetable_row` WHERE `timetable_id` = '$result_fetch_id'";
                                                         
                                                        $result_read = mysqli_query($con, $query_read);

                                                        if(mysqli_num_rows($result_read) == 0){
                                                            echo '<p class="title text-center">No Timetable Available</p>';
                                                        }else{

                                                        ?>

                                                        <div class="table-responsive tbl-custom">
                                                            <table class="table table-striped table-hover">
                                                                <thead>
                                                                    <th>Time</th>
                                                                    <th>Monday</th>
                                                                    <th>Tuesday</th>
                                                                    <th>Wednesday</th>
                                                                    <th>Thursday</th>
                                                                    <th>Friday</th>
                                                                    <th>Saturday</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        $i = 0; 
                                                                        while($row = mysqli_fetch_array($result_read)):?>
                                                                    <tr>
                                                                        <td><?php echo $row['timeslot'];?></td>
                                                                        <td><b><?php echo $row['mon1']; ?></b><br /><?php echo $row['mon2']; ?></td>
                                                                        <td><b><?php echo $row['tue1']; ?></b><br /><?php echo $row['tue2']; ?></td>
                                                                        <td><b><?php echo $row['wed1']; ?></b><br /><?php echo $row['wed2']; ?></td>
                                                                        <td><b><?php echo $row['thus1']; ?></b><br /><?php echo $row['thus2']; ?></td>
                                                                        <td><b><?php echo $row['fri1']; ?></b><br /><?php echo $row['fri2']; ?></td>
                                                                        <td><b><?php echo $row['sat1']; ?></b><br /><?php echo $row['sat2']; ?></td>
                                                                    </tr>
                                                                    <?php 

                                                                        if($i == 4){
                                                                            echo '<tr class="break">
                                                                        <td>01:00 - 02:00</td>
                                                                        <td></td>
                                                                        <td><b>B</b></td>
                                                                        <td><b>R</b></td>
                                                                        <td><b>E</b></td>
                                                                        <td><b>A</b></td>
                                                                        <td><b>K</b></td>
                                                                    </tr>';
                                                                        }
                                                                        $i++;
                                                                    endwhile;?>
                                                                </tbody>
                                                            </table>

                                                            <div class="text-center">
                                                                <hr />
                                                                <button class="btn btn-sm btn-outline-secondary" type="submit">Print Timetable</button>
                                                            </div>
                                                                <?php } ?>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                        <div class="card">

                                            <div class="paddings">
                                                <div class="content">
                                                    <p class="title-small"><i class="nc-icon nc-key-25"></i>KEY</p>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12">

                                                            <div class="table-responsive tbl-custom">
                                                                <?php
                                                                $dep = $sem = "";

                                                                if (isset($_POST['loadT'])) {
                                                                    $dep = test_input($_POST['department']);
                                                                    $sem = test_input($_POST['semester']);


                                                                    $query_cour = "SELECT `course_id`, `course_name`, `course_code`, `course_unit`, `department`, `semester`, `lecturer` FROM `course` WHERE `semester` = '$sem' AND  `department` = '$dep'";
                                                                    $result_cour = mysqli_query($con, $query_cour);

                                                                    ?>
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <th>Course Code</th>
                                                                            <th>Course Name</th>
                                                                            <th>Course Lecturer</th>
                                                                            <th>Course Unit</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            if (mysqli_num_rows($result_cour) > 0) {

                                                                                while ($rowex = mysqli_fetch_array($result_cour)) :
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $rowex['course_code']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowex['course_name']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowex['lecturer']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowex['course_unit']; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php endwhile;
                                                                        } else {
                                                                            echo '<tr><td colspan="4"><p class="title">No Course Available</p></td></tr>';
                                                                        }
                                                                    } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                </main>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-12 text-center">
                    <p>
                        <small>� 2019 - IUEA Time Table Management. All Right Reserved</small>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../webroot/js/app.js"></script>
    <script src="../webroot/js/final_year.js"></script>
    <script src="../webroot/js/jQuery.min.js"></script>
    <script src="../webroot/js/bootstrap.min.js"></script>
    <script src="../webroot/js/tabulation.js"></script>
</body>

</html>