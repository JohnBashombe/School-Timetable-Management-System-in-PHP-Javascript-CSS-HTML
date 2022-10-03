<?php 

define("SERVER", "localhost");
define("USER", "root");
define("PSWD", "");
define("DB", "timetable");

$con = mysqli_connect(SERVER, USER, PSWD, DB);

if (!$con){
    die("Connection failed: " . mysqli_connect_error());
}

?>