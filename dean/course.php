<?php

include "../include/server.php";
session_start();
if (!$_SESSION['user_login']) {
    header("location: index.php");
}

$_SESSION['c_id'] = "";
$id = $action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
            // user details
        case 'coursedetail':
            $id = $_REQUEST['id'];
            $_SESSION['c_id'] = $id;
            // header("location: ../dean/user_detail.php?id=$id");
            header("location: course_detail.php");
            break;
        case 'coursedelete':
            $id = $_REQUEST['id'];
            // archive_user($con, $id);
            $sql = "DELETE FROM course WHERE course_id = '$id'";
            if (mysqli_query($con, $sql)) {
                header("location: course.php");
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
    <link href="../webroot/css/bootstrap.min.css" rel="stylesheet">
    <link href="../webroot/css/app.css" rel="stylesheet">
    <link href="../webroot/css/offcanvas.css" rel="stylesheet">
    <link href="../webroot/css/style.css" rel="stylesheet">
    <link href="../webroot/css/empire-design.css" rel="stylesheet">
    <link href="../webroot/css/my_Icons.css" rel="stylesheet">
    <link href="../webroot/css/tabulation.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/dean.css"> -->
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
                                                        <p class="title text-muted"><i class="nc-icon nc-hat-3"></i>Courses</p>
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
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Courses List</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Add Course</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Delete Course</span></a>
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


                                                                                            $query = "SELECT * FROM course";
                                                                                            $result = mysqli_query($con, $query);

                                                                                            ?>


                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>N<sup><u>o</u></sup></th>
                                                                                                    <th>Course Name</th>
                                                                                                    <th>Course Code</th>
                                                                                                    <th>Course Unit</th>
                                                                                                    <th>Lecturer</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    $i = 0;
                                                                                                    while ($row = mysqli_fetch_assoc($result)) :
                                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td> <?php echo $i; ?> </td>
                                                                                                            <td> <?php echo $row['course_name']; ?> </td>
                                                                                                            <td> <?php echo $row['course_code']; ?> </td>
                                                                                                            <td> <?php echo $row['course_unit']; ?> </td>
                                                                                                            <td> <?php echo $row['lecturer']; ?> </td>
                                                                                                            <td><a href="?action=coursedetail&id=<?php echo $row['course_id']; ?>"><button class="btn btn-sm btn-outline-primary btn-table">Full Details</button></a></td>
                                                                                                        </tr>
                                                                                                        <?php $i++;
                                                                                                    endwhile; ?>
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
                                                                                    <div class="col-md-12">

                                                                                        <div class="row mytext myForm">
                                                                                            <div class="col-md-12 col-lg-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Course Name</label>
                                                                                                            <input type="text" class="form-control" name="coursename" placeholder="Course Name" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Course Name
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Course Code</label>
                                                                                                            <input type="text" class="form-control" name="coursecode" placeholder="Course Code" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Course Code
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Course Unit</label>
                                                                                                            <input type="text" class="form-control" name="courseunit" placeholder="Course Unit" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Course Unit
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Faculty</label>
                                                                                                            <Select class="custom-select" id="faculty" name="faculty" required>
                                                                                                                <option value="">Select Faculty</option>
                                                                                                                <?php
                                                                                                                $query_facul = "SELECT faculty_name FROM faculty";
                                                                                                                $facul_result = mysqli_query($con, $query_facul);
                                                                                                                while ($row = mysqli_fetch_array($facul_result)) :
                                                                                                                    ?>
                                                                                                                    <option value="<?php echo $row['faculty_name']; ?>"><?php echo $row['faculty_name']; ?></option>
                                                                                                                <?php endwhile; ?>
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
                                                                                                                <option value="">Select Department</option>
                                                                                                                <?php
                                                                                                                $query_dep = "SELECT dep_name FROM department";
                                                                                                                $dep_result = mysqli_query($con, $query_dep);
                                                                                                                while ($row = mysqli_fetch_array($dep_result)) :
                                                                                                                    ?>
                                                                                                                    <option value="<?php echo $row['dep_name']; ?>"><?php echo $row['dep_name']; ?></option>
                                                                                                                <?php endwhile; ?>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Department
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>



                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Semester</label>
                                                                                                            <Select class="custom-select" name="semester" required>
                                                                                                                <option value="">Select Semester</option>
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
                                                                                                                Please Select Semester
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Lecturer</label>
                                                                                                            <Select class="custom-select" name="lecturer" required>
                                                                                                                <option value="">Select Lecturer</option>
                                                                                                                <?php
                                                                                                                $query_lect = "SELECT firstname, lastname FROM user WHERE position = 'Lecturer'";
                                                                                                                $lect_result = mysqli_query($con, $query_lect);
                                                                                                                while ($row = mysqli_fetch_array($lect_result)) :
                                                                                                                    ?>
                                                                                                                    <option value="<?php echo $row['firstname'] . ' ' . $row['lastname']; ?>"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></option>
                                                                                                                <?php endwhile; ?>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select Lecturer
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                                        <hr />
                                                                                        <button type="submit" name="add_course" class="btn btn-sm btn-outline-secondary btn-fifty">
                                                                                            <i class="nc-icon nc-simple-add"></i>
                                                                                            Add Course</button>
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


                                                                                            $query = "SELECT * FROM course";
                                                                                            $result = mysqli_query($con, $query);

                                                                                            ?>


                                                                                            <table class="table table-striped table-hover">
                                                                                                <thead>
                                                                                                    <th>N<sup><u>o</u></sup></th>
                                                                                                    <th>Course Name</th>
                                                                                                    <th>Course Code</th>
                                                                                                    <th>Course Unit</th>
                                                                                                    <th>Operation</th>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    <?php
                                                                                                    $i = 0;
                                                                                                    while ($row = mysqli_fetch_assoc($result)) :
                                                                                                        ?>

                                                                                                        <tr>
                                                                                                            <td> <?php echo $i; ?></td>
                                                                                                            <td> <?php echo $row['course_name']; ?> </td>
                                                                                                            <td> <?php echo $row['course_code']; ?> </td>
                                                                                                            <td> <?php echo $row['course_unit']; ?> </td>
                                                                                                            <td><a href="?action=coursedelete&id=<?php echo $row['course_id']; ?>" class="btn btn-sm btn-outline-danger btn-table">Delete</button></td>
                                                                                                        </tr>
                                                                                                        <?php $i++;
                                                                                                    endwhile; ?>
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

    <div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><span class="title">Confirm Delete</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="title-small text-center">
                        <b>Do you want to Delete this Course?</b>
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
    <script src="js/dean.js"></script>
</body>

</html>