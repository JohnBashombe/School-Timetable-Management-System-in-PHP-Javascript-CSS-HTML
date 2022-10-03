<?php
include "../include/connect.php";
include "../include/validation.php";

session_start();

$errors = array();

if (!$_SESSION['admin_login']) {
    header("location: index.php");
}

$_SESSION['f_id'] = "";
$id = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'deletefac':
            $id = $_REQUEST['id'];
            $sql = "DELETE FROM faculty WHERE fac_id = '$id'";
            if (mysqli_query($con, $sql)) {
                header("location: faculty.php");
            }
    }
}


// Add Faculty

$fac_name = $fac_code = $fac_dean = "";

if (isset($_POST['add_faculty'])) {

    $sql1 = "SELECT faculty_name FROM faculty";
    $result1 = mysqli_query($con, $sql1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $faculty_name = $row['faculty_name'];
    }

    $fac_name = test_input($_POST['faculty_name']);
    $fac_code = test_input($_POST['faculty_code']);
    $fac_dean = test_input($_POST['faculty_dean']);

    if ($faculty_name === $fac_name) {
        array_push($errors, "Faculty Already Exists");
    }

    if (count($errors) === 0) {
        $insert_faculty = "INSERT INTO `faculty`(`fac_id`, `faculty_name`, `faculty_code`, `faculty_dean`) VALUES ('', '$fac_name', '$fac_code', '$fac_dean')";
        if (mysqli_query($con, $insert_faculty)) { } else {
            array_push($errors, "Faculty Not Inserted" . mysqli_error($con));
        }
    }
}

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
                    <a class="navbar-brand mr-auto mr-lg-0 text-small" href=".php"><span class="text-red">TIME TABLE</span><span class="text-black"> MANAGEMENT</span></a>
                    <a class="navbar-right nav-link mr-auto mr-lg-0" href="profile.php"><i class="nc-icon nc-circle-10 text-dark mr-0"></i><span class="text-dark">Gola</span></a>
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
                                                        <p class="title text-muted"><i class="nc-icon nc-hat-3"></i>Faculties</p>
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
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Faculties List</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Add Faculty</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Delete Faculty</span></a>
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

                                                                                            $query1 = "SELECT * FROM Faculty";
                                                                                            $result1 = mysqli_query($con, $query1);

                                                                                            if (mysqli_num_rows($result1) == 0) {
                                                                                                echo '<h3>No Record fund</h3> ';
                                                                                            } else {

                                                                                                ?>


                                                                                                <table class="table table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <th>ID</th>
                                                                                                        <th>Faculty Name</th>
                                                                                                        <th>Faculty Dean</th>
                                                                                                        <th>TimeTables</th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php while ($row = mysqli_fetch_array($result1)) : ?>
                                                                                                            <tr>
                                                                                                                <td> <?php echo $row['fac_id']; ?> </td>
                                                                                                                <td> <?php echo $row['faculty_name']; ?> </td>
                                                                                                                <td> Ntavigwa Bash. </td>
                                                                                                                <td> <a href="#">
                                                                                                                        <button class="btn btn-outline-success btn-table btn-sm">TimeTable</button></a> </td>
                                                                                                            </tr>
                                                                                                        <?php endwhile;
                                                                                                } ?>
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

                                                                            <form class="needs-validation" novalidate="" method="POST" action="#">
                                                                                <div class="row text-left">
                                                                                    <div class="col-md-12">

                                                                                        <div class="row mytext myForm">
                                                                                            <div class="col-md-12 col-lg-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Faculty Name</label>
                                                                                                            <input type="text" name="faculty_name" class="form-control" placeholder="Faculty Name" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Faculty Name
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Faculty Code</label>
                                                                                                            <input type="text" name="faculty_code" class="form-control" placeholder="Faculty Code" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Faculty Code
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label>Faculty Dean</label>
                                                                                                            <select class="custom-select" name="faculty_dean">
                                                                                                                <option>
                                                                                                                    Ntavigwa
                                                                                                                </option>
                                                                                                                <option>John Bash.</option>
                                                                                                            </select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Enter Faculty Dean
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                                        <hr />
                                                                                        <button type="submit" name="add_faculty" class="btn btn-sm btn-outline-secondary btn-fifty">
                                                                                            <i class="nc-icon nc-simple-add"></i>
                                                                                            Add Faculty</button>
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

                                                                                            $query = "SELECT * FROM faculty";
                                                                                            $result = mysqli_query($con, $query);

                                                                                            if (mysqli_num_rows($result) == 0) {
                                                                                                echo '<h3>No Record fund</h3> ';
                                                                                            } else {

                                                                                                ?>
                                                                                                <table class="table table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <th>ID</th>
                                                                                                        <th>Faculty Name</th>
                                                                                                        <th>Faculty Dean</th>
                                                                                                        <th>Operation</th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php while ($rowe = mysqli_fetch_assoc($result)) : ?>
                                                                                                            <tr>
                                                                                                                <td> <?php echo $rowe['fac_id']; ?> </td>
                                                                                                                <td> <?php echo $rowe['faculty_name']; ?> </td>
                                                                                                                <td> Ntavigwa Bas. </td>
                                                                                                                <td><a href="?action=deletefac&id=<?php echo $rowe['fac_id']; ?>" class="btn btn-sm btn-outline-danger btn-table">Delete</a></td>
                                                                                                            </tr>
                                                                                                        <?php endwhile;
                                                                                                } ?>
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
                        <small> © 2019 - IUEA Time Table Management. All Right Reserved </small>
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
                        <b>Do you want to Delete this Faculty?</b>
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