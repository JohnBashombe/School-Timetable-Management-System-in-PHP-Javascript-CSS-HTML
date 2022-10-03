<?php
include "core.php";
session_start();

if (!$_SESSION['admin_login']) {
    header("location: index.php");
}

$_SESSION['a_id'] = "";
$id = $action = "";
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
    switch($action){
        case 'detail':
            $id = $_REQUEST['id'];
            $_SESSION['a_id'] = $id;
            header("location: admin_detail.php");
            break;
        case 'deleteuser':
            $id = $_REQUEST['id'];
            $sql = "DELETE FROM user WHERE position = 'Dean' AND user_id = '$id'";
            if(mysqli_query($con, $sql)){
                header("location: admin.php");
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
                                                                                    <button type="submit" class="btn btn-outline-danger btn-table">Search</button>
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
                                                                            <a href="#step-1" id="step1-tab" class="nav-link active" aria-selected="true" data-toggle="tab" role="tab"><span>Deans List</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-2" id="step2-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Add Dean</span></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="#step-3" id="step3-tab" class="nav-link" aria-selected="false" data-toggle="tab" role="tab"><span>Delete Dean</span></a>
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

                                                                                            $query1 = "SELECT * FROM user WHERE position = 'Dean' ";
                                                                                            $result1 = mysqli_query($con, $query1);

                                                                                            if (mysqli_num_rows($result1) == 0) {
                                                                                                echo '<h3>No Record fund</h3> ';
                                                                                            } else {

                                                                                                ?>

                                                                                                <table class="table table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <th>First Name</th>
                                                                                                        <th>Last Name</th>
                                                                                                        <th>Email Address</th>
                                                                                                        <th>Position</th>
                                                                                                        <th>Operation</th>
                                                                                                    </thead>
                                                                                                    <tbody>

                                                                                                        <?php while ($row = mysqli_fetch_array($result1)) : ?>

                                                                                                            <tr>
                                                                                                                <td> <?php echo $row['firstname']; ?> </td>
                                                                                                                <td> <?php echo $row['lastname']; ?> </td>
                                                                                                                <td> <?php echo $row['email']; ?> </td>
                                                                                                                <td> <?php echo $row['position']; ?> </td>
                                                                                                                <td><a href="?action=detail&id=<?php echo $row['user_id']; ?>"><button class="btn btn-sm btn-outline-primary btn-table">Full Details</button></a></td>
                                                                                                            </tr>
                                                                                                        <?php endwhile;  ?>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            <?php } ?>
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

                                                                                            <?php
                                                                                            ?>

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
                                                                                                            <label>Faculty</label>
                                                                                                            <Select class="custom-select" id="faculty" name="faculty" required>
                                                                                                                <option value="">Select faculty</option>
                                                                                                                <?php
                                                                                                                $query = "SELECT faculty_name FROM faculty";
                                                                                                                $result = mysqli_query($con, $query);
                                                                                                                while ($row = mysqli_fetch_array($result)) :
                                                                                                                    ?>
                                                                                                                    <option value="<?php echo $row['faculty_name']; ?>"><?php echo $row['faculty_name']; ?></option>
                                                                                                                <?php endwhile; ?>
                                                                                                            </Select>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please Select a Faculty
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Email</label>
                                                                                                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                                                                                                            <div class="invalid-feedback">
                                                                                                                Please enter your Email
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
                                                                                        <button type="submit" name="add_dean" class="btn btn-sm btn-outline-secondary btn-fifty">
                                                                                            <i class="nc-icon nc-simple-add"></i>
                                                                                            Add Dean</button>
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

                                                                                            $query = "SELECT * FROM user WHERE position = 'Dean'";
                                                                                            $result = mysqli_query($con, $query);

                                                                                            if (mysqli_num_rows($result) == 0) {
                                                                                                echo '<h3>No Record fund</h3> ';
                                                                                            } else {

                                                                                                ?>

                                                                                                <table class="table table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <th>First Name</th>
                                                                                                        <th>Last Name</th>
                                                                                                        <th>Email Address</th>
                                                                                                        <th>Username</th>
                                                                                                        <th>Operation</th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        while ($rowe = mysqli_fetch_assoc($result)) :
                                                                                                            ?>
                                                                                                            <tr>
                                                                                                                <td> <?php
                                                                                                                        echo $rowe['firstname'];
                                                                                                                        ?> </td>
                                                                                                                <td> <?php
                                                                                                                        echo $rowe['lastname'];
                                                                                                                        ?> </td>
                                                                                                                <td> <?php
                                                                                                                        echo $rowe['email'];
                                                                                                                        ?> </td>
                                                                                                                <td> <?php
                                                                                                                        echo $rowe['username'];
                                                                                                                        ?> </td>
                                                                                                                <td><a href="?action=deleteuser&id=<?php echo $rowe['user_id']; ?>"><button class="btn btn-sm btn-outline-danger btn-table">Delete</button></a></td>
                                                                                                            </tr>

                                                                                                            <?php
                                                                                                            endwhile ;
                                                                                                            ?>

                                                                                                        </tbody>
                                                                                                    </table>

                                                                                                        <?php }
                                                                                                    ?>
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

            <script src="../webroot/js/app.js"></script>
            <script src="../webroot/js/final_year.js"></script>
            <script src="../webroot/js/jQuery.min.js"></script>
            <script src="../webroot/js/bootstrap.min.js"></script>
            <script src="../webroot/js/tabulation.js"></script>
            <script src="../dean/js/dean.js"></script>
        </body>

</html>