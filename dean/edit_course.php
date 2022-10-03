<?php
include "../include/session.php";
include "../include/validation.php";
include "../include/connect.php";

$_id = $_SESSION['c_id'];

$errors = array();

$sql = "SELECT * FROM course WHERE course_id = '$_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


$cn = $cc = $cu = $dep = $lec = $sem = "";

if (isset($_POST['update_c'])) {

    $cn = test_input($_POST['coursename']);
    $cc = test_input($_POST['coursecode']);
    $cu = test_input($_POST['courseunit']);
    $sem = test_input($_POST['semester']);
    $dep = test_input($_POST['department']);
    $lec = test_input($_POST['lecturer']);

    if (count($errors) == 0) {
        $update_course = "UPDATE course SET course_name = '$cn', lecturer = '$lec', course_code = '$cc', course_unit = '$cu', department = '$dep', semester = '$sem' WHERE course_id = '$_id'";
        if (mysqli_query($con, $update_course)) {
            header('location: course.php');
        } else {
            array_push($errors, " Not Update d" . mysqli_error($con));
        }
    }
}

$query_room =  "SELECT * FROM room";
$query_student =  "SELECT * FROM student";
$query_stuff  = "SELECT * FROM  user";
$query_course  = "SELECT * FROM course";

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
                                                <p class="title text-muted"><i class="nc-icon nc-circle-10"></i>Course
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
                                                                                <label>Course Name</label>
                                                                                <input type="text" class="form-control" value="<?php echo $row['course_name']; ?>" name="coursename" placeholder="Course Name" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter Course Name
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Course Code</label>
                                                                                <input type="text" class="form-control" value="<?php echo $row['course_code']; ?>" name="coursecode" placeholder="Course Code" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter Course Code
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Course Unit</label>
                                                                                <input type="text" class="form-control" name="courseunit" value="<?php echo $row['course_unit']; ?>" placeholder="Course Unit" required>
                                                                                <div class="invalid-feedback">
                                                                                    Please Enter Course Unit
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Lecturer: (<?php echo $row['lecturer'] ?>)</label>
                                                                                <Select class="custom-select" name="lecturer" required>
                                                                                    <option value="">Select Lecturer</option>
                                                                                    <?php
                                                                                    $query_lect = "SELECT firstname, lastname FROM user WHERE position = 'Lecturer'";
                                                                                    $lect_result = mysqli_query($con, $query_lect);
                                                                                    while ($rowl = mysqli_fetch_array($lect_result)) :
                                                                                        ?>
                                                                                        <option value="<?php echo $rowl['firstname'] . ' ' . $rowl['lastname']; ?>"><?php echo $rowl['firstname'] . ' ' . $rowl['lastname']; ?></option>
                                                                                    <?php endwhile; ?>
                                                                                </Select>
                                                                                <div class="invalid-feedback">
                                                                                    Please Select Lecturer
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Faculty </label>
                                                                                <Select class="custom-select" id="faculty" name="faculty" required>
                                                                                    <option value="">Select Faculty</option>
                                                                                    <?php
                                                                                    $query_facul = "SELECT faculty_name FROM faculty";
                                                                                    $facul_result = mysqli_query($con, $query_facul);
                                                                                    while ($rowx = mysqli_fetch_array($facul_result)) :
                                                                                        ?>
                                                                                        <option value="<?php echo $rowx['faculty_name']; ?>"><?php echo $rowx['faculty_name']; ?></option>
                                                                                    <?php endwhile; ?>
                                                                                </Select>
                                                                                <div class="invalid-feedback">
                                                                                    Please Select a Faculty
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 dep">
                                                                            <div class="form-group">
                                                                                <label>Department (<?php echo $row['department'] ?>)</label>
                                                                                <Select class="custom-select" name="department" required>
                                                                                    <option value="">Select Department</option>
                                                                                    <?php
                                                                                    $query_dep = "SELECT dep_name FROM department";
                                                                                    $dep_result = mysqli_query($con, $query_dep);
                                                                                    while ($rowd = mysqli_fetch_array($dep_result)) :
                                                                                        ?>
                                                                                        <option value="<?php echo $rowd['dep_name']; ?>"><?php echo $rowd['dep_name']; ?></option>
                                                                                    <?php endwhile; ?>
                                                                                </Select>
                                                                                <div class="invalid-feedback">
                                                                                    Please Select a Department
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 dep">
                                                                            <div class="form-group">
                                                                                <label>Semester (<?php echo $row['semester']; ?>)</label>
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
                                                                                    Please Select Semester
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
                                                            <button type="submit" name="update_c" class="btn btn-sm btn-outline-primary btn-fifty">
                                                                <i class="nc-icon nc-refresh-69"></i>
                                                                Update Course</button>
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
    <script src="js/dean.js"></script>
</body>

</html>