<?php
include "../include/connect.php";
session_start();

if (!$_SESSION['admin_login']) {
    header("location: index.php");
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
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5">
                                                        <p class="title text-muted"><i class="nc-icon nc-single-02"></i>Admins</p>
                                                    </div>
                                                    <div class="col-md-12 col-lg-7">
                                                        <form class="needs-validation" novalidate="">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="row mytext myForm">
                                                                        <div class="col-md-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-8 col-sm-9 col-md-8 col-lg-9 col-xl-9">
                                                                                    <div class="form-group size-input-search">
                                                                                        <input type="text" class="form-control" placeholder="Search by Email" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-sm-3 col-md-4 col-lg-3 col-xl-3">
                                                                                    <button type="submit" class="btn btn-outline-secondary btn-table">Search</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr />
                                                    </div>

                                                    <div class="container-fluid">
                                                        <div class="row text-center">
                                                            <div class="col-md-12 col-lg-12">
                                                                <div class="d-flex justify-content-center cont">
                                                                    <ul class="nav bg-light" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Admins List</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Add Admin</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Delete Admin</span></a>
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
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Email Address</th>
                                                                                                    <th>Position</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td> Ntavigwa </td>
                                                                                                        <td> Bashombe </td>
                                                                                                        <td> ntavigwabashombe@gmail.com </td>
                                                                                                        <td> Director </td>
                                                                                                        <td><a href="../dean/userDetail.html"><button class="btn btn-sm btn-outline-primary btn-table">Full Details</button></a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane fade" id="step-2" aria-labelledby="step2-tab" role="tabpanel">
                                                                        <div class="innerContent">

                                                                            <form class="needs-validation" novalidate="">
                                                                                <div class="row text-left">
                                                                                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 text-center">
                                                                                        <div class="image-admin">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <img src="../public/images/contractor-1623889__480.jpg">
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
                                                                                                            <input type="text" class="form-control" placeholder="First Name" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your First Name
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="last">Last Name</label>
                                                                                                            <input type="email" class="form-control" placeholder="Last Name" required="">
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
                                                                                                            <input type="phone" class="form-control" placeholder="Phone Number" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your Phone Number
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="exampleInputEmail1">Position</label>
                                                                                                            <Select class="custom-select">
                                                                                                                <option>
                                                                                                                    Dean
                                                                                                                </option>
                                                                                                                <option>
                                                                                                                    Lecturer
                                                                                                                </option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Position
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Username</label>
                                                                                                            <input type="text" class="form-control" placeholder="Username" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please enter your Username
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Password</label>
                                                                                                            <input type="password" class="form-control" placeholder="Password" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your Password
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="confirm">Confirm Password</label>
                                                                                                            <input type="password" class="form-control" placeholder="Confirm Password" required="">
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Confirm Password
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                                        <hr />
                                                                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-fifty">
                                                                                            <i class="nc-icon nc-simple-add"></i>
                                                                                            Add Admin</button>
                                                                                    </div>

                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="step-3" aria-labelledby="step3-tab" role="tabpanel">
                                                                        <div class="innerContent">
                                                                            <div class="content">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-lg-12">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Email Address</th>
                                                                                                    <th>Position</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td> Ntavigwa </td>
                                                                                                        <td> Bashombe </td>
                                                                                                        <td> ntavigwabashombe@gmail.com </td>
                                                                                                        <td> Director </td>
                                                                                                        <td><button class="btn btn-sm btn-outline-danger btn-table" data-toggle="modal" data-target="#block">Delete</button></td>
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

    <div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><span class="title">Confirm Delete</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="title-small text-center">
                        <b>Do you want to Delete this Admin?</b>
                    </p>
                </div>
                <div class="modal-design modal-button-padding">
                    <hr />
                    <button type="button" class="btn btn-primary btn-sm">Confirm</button>
                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../webroot/js/app.js"></script>
    <script src="../webroot/js/final_year.js"></script>
    <script src="../webroot/js/jQuery.min.js"></script>
    <script src="../webroot/js/bootstrap.min.js"></script>
    <script src="../webroot/js/tabulation.js"></script>
</body>

</html>