<?php
include "include/session.php";
if (!$_SESSION['user_login']) {
    header("location: index.php");
}
include "include/server.php";

$user = $_SESSION['user_login'];

$sql = "SELECT * FROM student WHERE username = '$user' LIMIT 1";
$result = mysqli_query($con, $sql);
$rowx = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en" data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootlab">
    <title>IUEA Time Table Management</title>
    <link href="webroot/css/app.css" rel="stylesheet">
    <link href="webroot/css/bootstrap.min.css" rel="stylesheet">
    <link href="webroot/css/offcanvas.css" rel="stylesheet">
    <link href="webroot/css/style.css" rel="stylesheet">
    <link href="webroot/css/empire-design.css" rel="stylesheet">
    <link href="webroot/css/my_Icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="d-flex">

            <div class="main">

                <nav class="navbar fixed-top navbar-dark customized-color">
                    <a class="navbar-brand mr-auto mr-lg-0 text-small" href="index.php"><span style="color: red">TIME TABLE </span><span class="text-black"> MANAGEMENT</span></a>
                </nav>
                <main class="content">
                    <div class="container-fluid">

                        <div class="card">

                            <div class="paddings">
                                <div class="content">
                                    <p class="title">
                                        <i class="nc-icon nc-layout-11"></i>IUEA TIMETABLE</p>
                                    <hr /><br />
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3 col-lg-3">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <?php echo $rowx['fisrtname'] . ' ' . $rowx['lastname']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-lg-3">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <?php echo $rowx['username']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-lg-3">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <?php echo 'Semester ' . $rowx['semester']; ?>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-lg-3">
                                            <p class="text-muted">
                                                <span class="title-small text-black">
                                                    <?php echo $rowx['department']; ?></span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <hr />
                                            <p><a href="logout.php"><button class="btn btn-outline-danger btn-sm">Logout</button></a></p>
                                            <br />
                                        </div>

                                        <div class="col-md-12 col-lg-12">

                                            <?php

                                            $depart = $rowx['department'];
                                            $semester = $rowx['semester'];

                                            $result_fetch_id = '';
                                            $query_table = "SELECT `timetable_id` FROM `timetable` WHERE `department` = '$depart' AND `semester` = '$semester'";

                                            $result_fetch = mysqli_query($con, $query_table);

                                            while ($row_id = mysqli_fetch_array($result_fetch)) {
                                                $result_fetch_id = $row_id['timetable_id'];
                                            }

                                            $query_read = "SELECT * FROM `timetable_row` WHERE `timetable_id` = '$result_fetch_id'";

                                            $result_read = mysqli_query($con, $query_read);

                                            if (mysqli_num_rows($result_read) == 0) {
                                                echo '<p class="title text-center">No Timetable Available</p>';
                                            } else {

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
                                                            while ($row = mysqli_fetch_array($result_read)) : ?>
                                                                <tr>
                                                                    <td><?php echo $row['timeslot']; ?></td>
                                                                    <td><b><?php echo $row['mon1']; ?></b><br /><?php echo $row['mon2']; ?></td>
                                                                    <td><b><?php echo $row['tue1']; ?></b><br /><?php echo $row['tue2']; ?></td>
                                                                    <td><b><?php echo $row['wed1']; ?></b><br /><?php echo $row['wed2']; ?></td>
                                                                    <td><b><?php echo $row['thus1']; ?></b><br /><?php echo $row['thus2']; ?></td>
                                                                    <td><b><?php echo $row['fri1']; ?></b><br /><?php echo $row['fri2']; ?></td>
                                                                    <td><b><?php echo $row['sat1']; ?></b><br /><?php echo $row['sat2']; ?></td>
                                                                </tr>
                                                                <?php

                                                                if ($i == 4) {
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
                                                            endwhile; ?>
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

                        </div>


                        <div class="card">

                            <div class="paddings">
                                <div class="content">
                                    <p class="title-small"><i class="nc-icon nc-key-25"></i>KEY</p>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">


                                            <div class="table-responsive tbl-custom">

                                                <?php


                                                

                                                $depart_std = $sem_std = "";

                                                $depart_std = $rowx['department'];
                                                $sem_std = $rowx['semester'];


                                                $query_course = "SELECT * FROM course WHERE semester = '$sem_std' AND  department = '$depart_std'";
                                                $result_course = mysqli_query($con, $query_course);
                                                            // echo $depart_std . ' ' . $sem_std;
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
                                                        if (mysqli_num_rows($result_course) > 0) {

                                                            while ($rowex = mysqli_fetch_array($result_course)) :
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
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>


                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="card">

                            <div class="paddings">
                                <div class="content">
                                    <p class="title-small">Feedback Section</p>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">

                                            <form class="needs-validation" novalidate="">

                                                <div class="mb-3">
                                                    <label for="report"><small>Feedback</small></label>
                                                    <textarea type="text" class="form-control" id="report" value="" required=""></textarea>
                                                    <div class="invalid-feedback">
                                                        Please Type your Feedback Here
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button class="btn btn-sm btn-outline-info" type="submit">Send Feedback</button>
                                                </div>
                                            </form>
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


    <script src="webroot/js/app.js"></script>
    <script src="webroot/js/final_year.js"></script>
    <script src="webroot/jQuery.min.js"></script>
    <script src="webroot/bootstrap.min.js"></script>
</body>

</html>