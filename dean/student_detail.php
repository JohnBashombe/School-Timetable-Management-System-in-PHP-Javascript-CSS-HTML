<?php

include "../include/session.php";
include "../include/connect.php";

if (!$_SESSION['s_id']) {
    header("location: student.php");
}
if (!$_SESSION['user_login']) {
    header("location: index.php");
}

$id = "";
$id = $_SESSION['s_id'];

$query = "SELECT * FROM student WHERE student_id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$_id = $action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'deletestd':
            $_id = $_REQUEST['id'];
            // archive_user($con, $id);
            $sql = "DELETE FROM student WHERE student_id = '$_id'";
            if (mysqli_query($con, $sql)) {
                header("location: student.php");
            } else {
                array_push($errors, "Error: " . mysqli_connect_error($db));
            }
            break;
        case 'editstd':
            header('location:edit_student.php');
            break;
    }
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
                                        <a href="department.html">
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
                                        <a href="../logout.php">
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
                                <div class="card admin-card-padding">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">

                                                <p class="title text-muted">
                                                    <i class="nc-icon nc-bullet-list-67"></i>
                                                    User Details
                                                </p>
                                                <hr />

                                                <div class="row">

                                                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 text-center">
                                                        <div class="image-admin">
                                                            <img src="../images/unnamed.png">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-7 col-md-8 col-lg-9 col-xl-9">
                                                        <p class="text-muted title-small">
                                                            First Name : <span class="pull-right"> <?php echo $row['fisrtname']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Last Name : <span class="pull-right"> <?php echo $row['lastname']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Username : <span class="pull-right"> <?php echo $row['username']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Username : <span class="pull-right"> <?php echo $row['email']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Phone Number : <span class="pull-right"> <?php echo $row['phone']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Faculty : <span class="pull-right"> <?php echo $row['faculty']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Department : <span class="pull-right"> <?php echo $row['department']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Account Created on : <span class="pull-right"><i>comng soon</i></span>
                                                        </p>
                                                    </div>
                                                    <?php  ?>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <a href="?action=deletestd&id=<?php echo $row['student_id']; ?>" class="btn btn-sm btn-outline-danger">
                                                            <i class="nc-icon nc-scissors"></i> Remove Student</a>
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-">
                                                        <a href="?action=editstd&id=<?php echo $row['student_id']; ?>"><button class="btn btn-sm btn-outline-primary pull-right">
                                                                <i class="nc-icon nc-ruler-pencil"></i> Edit Student</button></a>
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

<?php




?>