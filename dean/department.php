<?php
include "../include/connect.php";
session_start();
if (!$_SESSION['user_login']) {
    header("location: index.php");
}

$query_room = "SELECT * FROM room";
$query_student = "SELECT * FROM student";
$query_stuff = "SELECT * FROM user";
$query_course = "SELECT * FROM course";

$room_result = mysqli_query($con, $query_room);
$student_result = mysqli_query($con, $query_student);
$stuff_result = mysqli_query($con, $query_stuff);
$course_result = mysqli_query($con, $query_course);

$room_number = mysqli_num_rows($room_result);
$student_number = mysqli_num_rows($student_result);
$stuff_number = mysqli_num_rows($stuff_result);
$course_number = mysqli_num_rows($course_result);


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
                    <a class="navbar-brand mr-auto mr-lg-0 text-small" href="../index.php"><span class="text-red">TIME TABLE</span><span class="text-black"> MANAGEMENT</span></a>
                </nav>

                <main class="content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                                <div class="card admin-card-padding">
                                    <div class="content">

                                        <a>
                                            <p class="title text-red text-center">
                                                Dashboard</p>
                                        </a>
                                        <hr />
                                        <a href="department.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-sound-wave"></i>
                                                    Generate
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="student.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-single-02"></i>
                                                    Students
                                                    <span class="pull-right"> <?php echo $student_number; ?> </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="user.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-circle-10"></i>
                                                    Stuff
                                                    <span class="pull-right"> <?php echo $stuff_number; ?> </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="room.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-istanbul"></i>
                                                    Rooms
                                                    <span class="pull-right"> <?php echo $room_number; ?> </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="course.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-hat-3"></i>
                                                    Courses
                                                    <span class="pull-right"> <?php echo $course_number; ?> </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="notification.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-email-85"></i>
                                                    Messages
                                                    <span class="pull-right"> 60 </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="profile.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-satisfied"></i>
                                                    My Profile
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="../index.php">
                                            <p class="text-muted">
                                                <span class="title-small text-danger">
                                                    <i class="nc-icon nc-button-power"></i>
                                                    Logout
                                                </span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-9">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">

                                        <div class="card admin-card-padding">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <p class="title"><i class="nc-icon nc-shop"></i>Departments</p>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <thead>
                                                                    <th>ID</th>
                                                                    <th>Department Name</th>
                                                                    <th>Department Code</th>
                                                                    <th>Operation</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> 1 </td>
                                                                        <td> Information Technology </td>
                                                                        <td> IT </td>
                                                                        <td><a href="../Main/generate.html"><button class="btn btn-outline-secondary btn-sm">Generate</button></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> 1 </td>
                                                                        <td> Computer Science </td>
                                                                        <td> CS </td>
                                                                        <td><a href="../Main/generate.html"><button class="btn btn-outline-secondary btn-sm">Generate</button></a></td>
                                                                    </tr>
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
                        <small>© 2019 - IUEA Time Table Management. All Right Reserved</small>
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