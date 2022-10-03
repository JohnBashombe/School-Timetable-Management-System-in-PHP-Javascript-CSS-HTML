<?php

include "../include/core_login_admin_extra.php";


?>
<!doctype html>
<html lang="en" data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36">

<head>
    <title>Facult Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootlab">
    <!-- Bootstrap CSS -->
    <link href="../webroot/css/app.css" rel="stylesheet">
    <link href="../webroot/css/bootstrap.min.css" rel="stylesheet">
    <link href="../webroot/css/offcanvas.css" rel="stylesheet">
    <link href="../webroot/css/style.css" rel="stylesheet">
    <link href="../webroot/css/empire-design.css" rel="stylesheet">
    <link href="../webroot/css/my_Icons.css" rel="stylesheet">
    <link href="../dean/css/floating.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- 
    <div class="wrapper">
        <div class="d-flex">


            <div class="main">

                <nav class="navbar fixed-top navbar-dark customized-color" style="color: #FF062038">
                    <a class="navbar-brand mr-auto mr-lg-0 text-small" href="../index.php"><span style="color: red">TIME TABLE </span><span class="text-black"> MANAGEMENT</span></a>
                </nav> -->

    <form class="form-signin border border-danger bg-white" action="#" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center text-danger">ADMIN LOGIN</h1>
        <div class="form-label-group">
            <input type="text" id="inputUsername" name="username" class="form-control rounded-0" placeholder="Username" required autofocus>
            <label for="inputUsername">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control rounded-0" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>
        <button class="btn btn-lg btn-danger btn-block rounded-0" name="login3" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted"><small>&copy; 2019 - IUEA Time Table Management. All Right Reserved</small></p>
    </form>

    <!-- </div>
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
        </div> -->
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="webroot/js/final_year.js"></script>
    <script src="webroot/jQuery.min.js"></script>
    <script src="webroot/bootstrap.min.js"></script>
</body>

</html>