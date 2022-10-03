<?php

include "../include/session.php";
include "../include/connect.php";

if (!$_SESSION['a_id']) {
    header("location: admin.php");
}
if (!$_SESSION['admin_login']) {
    header("location: index.php");
}

$id = "";
$id = $_SESSION['a_id'];

$query = "SELECT * FROM user WHERE user_id = '$id' AND position = 'DEAN'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$_id = $action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'delete':
            $_id = $_REQUEST['id'];
            // archive_user($con, $id);
            $sql = "DELETE FROM user WHERE user_id = '$_id'";
            if (mysqli_query($con, $sql)) {
                header("location: home.php");
            } else {
                array_push($errors, "Error: " . mysqli_connect_error($db));
            }
            break;
        case 'edit':
            header('location:edit_admin.php');
            break;
    }
}

// $query_room = "SELECT * FROM room";
// $query_student = "SELECT * FROM student";
// $query_stuff = "SELECT * FROM user";
// $query_course = "SELECT * FROM course";

// $room_result = mysqli_query($con, $query_room);
// $student_result = mysqli_query($con, $query_student);
// $stuff_result = mysqli_query($con, $query_stuff);
// $course_result = mysqli_query($con, $query_course);

// $room_number = mysqli_num_rows($room_result);
// $student_number = mysqli_num_rows($student_result);
// $stuff_number = mysqli_num_rows($stuff_result);
// $course_number = mysqli_num_rows($course_result);


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
                    <a class="navbar-brand mr-auto mr-lg-0 text-small" href="home.php"><span class="text-red">TIME TABLE</span><span class="text-black"> MANAGEMENT</span></a>
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
                                        <a href="home.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-map-big"></i>
                                                    Time Tables
                                                    <span class="pull-right"> 18 </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="faculty.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-sound-wave"></i>
                                                    Faculty
                                                    <span class="pull-right"> 5 </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="department.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-shop"></i>
                                                    Department
                                                    <span class="pull-right"> 13 </span>
                                                </span>
                                            </p>
                                        </a>
                                        <hr />
                                        <a href="admin.php">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <i class="nc-icon nc-circle-10"></i>
                                                    Admin
                                                    <span class="pull-right"> 8 </span>
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
                                        <a href="logout.php">
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
                                                    Dean Details
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
                                                            First Name : <span class="pull-right"> <?php echo $row['firstname']; ?> </span>
                                                        </p>
                                                        <hr />
                                                        <p class="text-muted title-small">
                                                            Last Name : <span class="pull-right"> <?php echo $row['lastname']; ?> </span>
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
                                                            Password: <span class="pull-right"><?php echo $row['password']; ?></span>
                                                        </p>
                                                    </div>
                                                    <?php  ?>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <a href="?action=delete&id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-outline-danger">
                                                            <i class="nc-icon nc-scissors"></i> Remove Dean</a>
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-">
                                                        <a href="?action=edit&id=<?php echo $row['user_id']; ?>"><button class="btn btn-sm btn-outline-primary pull-right">
                                                                <i class="nc-icon nc-ruler-pencil"></i> Edit Dean</button></a>
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