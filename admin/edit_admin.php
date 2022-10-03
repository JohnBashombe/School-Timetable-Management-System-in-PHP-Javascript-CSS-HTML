<?php
include "../include/session.php";
include "../include/validation.php";
include "../include/connect.php";

if (!$_SESSION['admin_login']) {
    header("location: index.php");
}

$_id = $_SESSION['a_id'];

$errors = array();

$sql = "SELECT * FROM user WHERE user_id = '$_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$fn = $ln = $pn = $em  = $pos  = $pswd = $username_user = "";

if (isset($_POST['update_d'])) {

    $fn = test_input($_POST['firstname']);
    $ln = test_input($_POST['lastname']);
    $pn = test_input($_POST['phone']);
    $em = test_input($_POST['email']);
    // $pos = test_input($_POST['position']);
    $pswd = test_input($_POST['password']);
    $username_user = $fn . "." . $ln;

    if (count($errors) == 0) {
        $update_user = "UPDATE user SET firstname = '$fn', lastname = '$ln', phone = '$pn', email = '$em', username = '$username_user', password ='$pswd' WHERE user_id = '$_id' ";
        if (mysqli_query($con, $update_user)) {
            header('location: admin.php');
        } else {
            array_push($errors, "Not Updated" . mysqli_error($con));
        }
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
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">

                                        <div class="card admin-card-padding">
                                            <div class="content">
                                                <p class="title text-muted"><i class="nc-icon nc-circle-10"></i>Profile
                                                </p>
                                                <hr />

                                                <form class="needs-validation" novalidate="" action="#" method="POST">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 text-center">
                                                            <div class="image-admin">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <img src="../images/contractor-1623889__480.jpg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-7 col-md-8 col-lg-9 col-xl-9">

                                                            <div class="row mytext myForm">
                                                                <div class="col-md-12 col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter your First Name
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter your Last Name
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Phone Number</label>
                                                                                <input type="phone" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $row['phone']; ?>" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter your Phone Number
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Email address</label>
                                                                                <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $row['email']; ?>" required="">
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter your Email Address
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Username</label>
                                                                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please enter your Username
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Password</label>
                                                                                <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter your Password
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="confirm">Confirm Password</label>
                                                                                <input type="text" class="form-control" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required="">
                                                                                <div class="invalid-feedback">
                                                                                    Please Confirm Password
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                            <hr />
                                                            <button type="submit" name="update_d" class="btn btn-sm btn-outline-primary btn-fifty">
                                                                <i class="nc-icon nc-refresh-69"></i>
                                                                Update Dean</button>
                                                        </div>
                                                    </div>
                                                </form>
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
</body>

</html>