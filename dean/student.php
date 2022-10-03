<?php
include "../include/server.php";
include "../include/session.php";
$_SESSION['s_id'] = "";

if (!$_SESSION['user_login']) {
    header("location:index.php");
}

$id = $action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
            // user details
        case 'std_detail':
            $id = $_REQUEST['id'];
            $_SESSION['s_id'] = $id;
            // header("location: ../dean/user_detail.php?id=$id");
            header("location: student_detail.php");
            break;
        case 'std_delete':
            $id = $_REQUEST['id'];
            // archive_user($con, $id);
            $sql = "DELETE FROM student WHERE student_id = '$id'";
            if (mysqli_query($con, $sql)) { 
                header("location: student.php");
            } else {
                array_push($errors, "Error: " . mysqli_connect_error($db));
            }
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
    <link href="css/dean.css" rel="stylesheet">
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
                                        <a href="#">
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
                                                        <p class="title text-muted"><i class="nc-icon nc-single-02"></i>Students</p>
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
                                                                                        <input type="text" class="form-control" placeholder="Search by Name" required>
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
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Students List</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Add Student</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Delete Student</span></a>
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


                                                                                            <?php

                                                                                            $query1 = "SELECT * FROM student";
                                                                                            $result1 = mysqli_query($con, $query1);


                                                                                            ?>

                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Username</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    <?php while ($row1 = mysqli_fetch_assoc($result1)) : ?>

                                                                                                        <tr>
                                                                                                            <td> <?php echo $row1['fisrtname']; ?> </td>
                                                                                                            <td> <?php echo $row1['lastname']; ?> </td>
                                                                                                            <td> <?php echo $row1['username']; ?> </td>
                                                                                                            <td><a href="?action=std_detail&id=<?php echo $row1['student_id'] ?>"><button class="btn btn-sm btn-outline-success btn-table">Full Details</button></a></td>
                                                                                                        </tr>
                                                                                                    <?php endwhile; ?>
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

                                                                            <form class="needs-validation" action="#" method="POST" novalidate="">
                                                                                <div class="row text-left">
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
                                                                                                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your First Name
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Last Name</label>
                                                                                                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
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
                                                                                                            <input type="phone" class="form-control" name="phone" placeholder="Phone Number" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your Phone Number
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="exampleInputEmail1">Email address</label>
                                                                                                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your Email Address
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Faculty</label>
                                                                                                            <Select class="custom-select" onchange="display_dep();" id="faculty" name="faculty" required>
                                                                                                                <option value="">Select faculty</option>
                                                                                                                <option value="Science and Technology">Science and Technology</option>
                                                                                                                <option value="Business">Business</option>
                                                                                                                <option value="Engineering">Engineering</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Faculty
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-6 dep">
                                                                                                        <div class="form-group">
                                                                                                            <label>Department</label>
                                                                                                            <Select class="custom-select" name="department" required>
                                                                                                                <option>Select Department</option>
                                                                                                                <option value="Computer Science">Computer Science</option>
                                                                                                                <option value="IT">IT</option>
                                                                                                                <option value="Software Engineering">Software Enginnering</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Department
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="col-md-6 dep">
                                                                                                        <div class="form-group">
                                                                                                            <label>Department</label>
                                                                                                            <Select class="custom-select" name="department" required>
                                                                                                                <option>Select Department</option>
                                                                                                                <option value="Procurement">Procurement</option>
                                                                                                                <option value="Marketing">Marketing</option>
                                                                                                                <option value="Logistic">Logistic</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Department
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="col-md-6 dep">
                                                                                                        <div class="form-group">
                                                                                                            <label>Department</label>
                                                                                                            <Select class="custom-select" name="department" required>
                                                                                                                <option>Select Department</option>
                                                                                                                <option value="Petrolium">Petrolium</option>
                                                                                                                <option value="Architecture">Architecture</option>
                                                                                                                <option value="Mobile And Telecommunication">Mobile And Telecommunication</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Department
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Year</label>
                                                                                                            <Select class="custom-select" name="year" required>
                                                                                                                <option>Select Year</option>
                                                                                                                <option value="1">1</option>
                                                                                                                <option value="2">2</option>
                                                                                                                <option value="3">3</option>
                                                                                                                <option value="4">4</option>
                                                                                                                <option value="5">5</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Year
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group" required>
                                                                                                            <label>Semester</label>
                                                                                                            <Select class="custom-select" name="semester" required>
                                                                                                                <option>Select Semester</option>
                                                                                                                <option value="1">1</option>
                                                                                                                <option value="2">2</option>
                                                                                                                <option value="3">3</option>
                                                                                                                <option value="4">4</option>
                                                                                                                <option value="5">5</option>
                                                                                                                <option value="6">6</option>
                                                                                                                <option value="7">7</option>
                                                                                                                <option value="8">8</option>
                                                                                                                <option value="9">9</option>
                                                                                                                <option value="10">10</option>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Semester
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Password</label>
                                                                                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter your Password
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="confirm">Confirm Password</label>
                                                                                                            <input type="password" name="password_conf" class="form-control" placeholder="Confirm Password" required="">
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
                                                                                        <button type="submit" name="add_student" class="btn btn-sm btn-outline-secondary btn-fifty">
                                                                                            <i class="nc-icon nc-simple-add"></i>
                                                                                            Add User</button>
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
                                                                                            <?php

                                                                                            $query = "SELECT * FROM student";
                                                                                            $result = mysqli_query($con, $query);

                                                                                            ?>
                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>First Name</th>
                                                                                                    <th>Last Name</th>
                                                                                                    <th>Email Address</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                                                                                                        <tr>
                                                                                                            <td> <?php echo $row['fisrtname']; ?> </td>
                                                                                                            <td> <?php echo $row['lastname']; ?> </td>
                                                                                                            <td> <?php echo $row['email']; ?></td>
                                                                                                            <td><a href="?action=std_delete&id=<?php echo $row['student_id'] ?>" class="btn btn-sm btn-outline-danger btn-table">Delete</a></td>
                                                                                                        </tr>
                                                                                                    <?php
                                                                                                endwhile;
                                                                                                ?>
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
    <!-- <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-12 text-center">
                    <p>
                        <small>© 2019 - IUEA Time Table Management. All Right Reserved</small>
                    </p>
                </div>
            </div>
        </div>
    </footer> -->


    <script src="../webroot/js/app.js"></script>
    <script src="../webroot/js/final_year.js"></script>
    <script src="../webroot/js/jQuery.min.js"></script>
    <script src="../webroot/js/bootstrap.min.js"></script>
    <script src="../webroot/js/tabulation.js"></script>
    <script src="js/dean.js"></script>
</body>

</html>