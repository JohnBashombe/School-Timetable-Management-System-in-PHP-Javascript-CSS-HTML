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
                                        <a href="../login.php">
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

                                                    <div class="container-fluid">
                                                        <div class="row text-center">
                                                            <div class="col-md-12"></div>
                                                            <div class="col-md-12 col-lg-12">

                                                                <div class="d-flex justify-content-center con">
                                                                    <ul class="nav bg-light" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Sem 1</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Sem 2</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Sem 3</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-4" id="step4-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>sem 4</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-5" id="step5-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Sem 5</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-6" id="step6-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>sem 6</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-7" id="step7-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Sem 7</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-8" id="step8-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>sem 8</span></a>
                                                                        </li>
                                                                        <div class="panel rounded hidden-custom"></div>
                                                                    </ul>
                                                                </div>
                                                                <div class="tab-content">

                                                                    <div class="tab-pane fade show active" id="step-1" aria-labelledby="step1-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester I
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane fade show" id="step-2" aria-labelledby="step2-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester II
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="step-3" aria-labelledby="step3-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester III
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="step-4" aria-labelledby="step4-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester IV
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="step-5" aria-labelledby="step5-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester V
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="step-6" aria-labelledby="step6-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester VI
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="step-7" aria-labelledby="step7-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester VII
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="step-8" aria-labelledby="step8-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <hr />
                                                                                        <p class="title text-left">
                                                                                            Year I Semester VIII
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p><button class="btn btn-outline-secondary">Generate Time Table</button></p>
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