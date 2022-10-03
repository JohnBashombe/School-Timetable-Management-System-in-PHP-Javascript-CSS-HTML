<?php
include "../include/connect.php" ;
// include "../include/validation.php" ;
$_SESSION['dep_id'] = "";


$m00 = $m01 = $m10 = $m11 =$m20 = $m21 = $m30 = $m31 = $m40 = $m41 = $m50 = $m51 = $m60 = $m61 = $m70 = $m71 = $m80 = $m81 = "";
$t00 = $t01 = $t10 = $t11 =$t20 = $t21 = $t30 = $t31 = $t40 = $t41 = $t50 = $t51 = $t60 = $t61 = $t70 = $t71 = $t80 = $t81 = "";
$w00 = $w01 = $w10 = $w11 =$w20 = $w21 = $w30 = $w31 = $w40 = $w41 = $w50 = $w51 = $w60 = $w61 = $w70 = $w71 = $w80 = $w81 = "";
$th00 = $th01 = $th10 = $th11 =$th20 = $th21 = $th30 = $th31 = $th40 = $th41 = $th50 = $th51 = $th60 = $th61 = $th70 = $th71 = $th80 = $th81 = "";
$f00 = $f01 = $f10 = $f11 =$f20 = $f21 = $f30 = $f31 = $f40 = $f41 = $f50 = $f51 = $f60 = $f61 = $f70 = $f71 = $f80 = $f81 = "";
$s00 = $s01 = $s10 = $s11 =$s20 = $s21 = $s30 = $s31 = $s40 = $s41 = $s50 = $s51 = $s60 = $s61 = $s70 = $s71 = $s80 = $s81 = "";

$h1 = $h2 = $h3 = $h4 = $h5 = $h6 = $h8 = $h9 = '';

$last_id = "";

if(isset($_POST['generate'])){


    $h1 = '08:00 - 09:00'; $h2 = '09:00 - 10:00'; $h3 = '10:00 - 11:00'; $h4 = '11:00 - 12:00'; $h5 = '12:00 - 01:00';
    $h6 = '02:00 - 03:00'; $h7 = '03:00 - 04:00'; $h8 = '04:00 - 05:00'; $h9 = '05:00 - 06:00';

    $insert_tmtb = "INSERT INTO `timetable`(`timetable_id`, `department`, `semester`) VALUES ('', '$dep', '$sem')";
    if(mysqli_query($con, $insert_tmtb) === TRUE){
        $last_id = mysqli_insert_id($con);
    }

    $m00 = test_input($_POST['m00']); $m01 = test_input($_POST['m01']); $m10 = test_input($_POST['m10']); $m11 = test_input($_POST['m11']); $m20 = test_input($_POST['m20']); $m21 = test_input($_POST['m21']); $m30 = test_input($_POST['m30']); $m31 = test_input($_POST['m31']); $m40 = test_input($_POST['m40']); 
    $m41 = test_input($_POST['m41']); $m50 = test_input($_POST['m50']); $m51 = test_input($_POST['m51']); $m60 = test_input($_POST['m60']); $m61 = test_input($_POST['m61']); $m70 = test_input($_POST['m70']); $m71 = test_input($_POST['m71']); $m80 = test_input($_POST['m80']); $m81 = test_input($_POST['m81']);
    $t00 = test_input($_POST['t00']); $t01 = test_input($_POST['t01']); $t10 = test_input($_POST['t10']); $t11 = test_input($_POST['t11']); $t20 = test_input($_POST['t20']); $t21 = test_input($_POST['t21']); $t30 = test_input($_POST['t30']); $t31 = test_input($_POST['t31']); $t40 = test_input($_POST['t40']); 
    $t41 = test_input($_POST['t41']); $t50 = test_input($_POST['t50']); $t51 = test_input($_POST['t51']); $t60 = test_input($_POST['t60']); $t61 = test_input($_POST['t61']); $t70 = test_input($_POST['t70']); $t71 = test_input($_POST['t71']); $t80 = test_input($_POST['t80']); $t81 = test_input($_POST['t81']);
    $w00 = test_input($_POST['w00']); $w01 = test_input($_POST['w01']); $w10 = test_input($_POST['w10']); $w11 = test_input($_POST['w11']); $w20 = test_input($_POST['w20']); $w21 = test_input($_POST['w21']); $w30 = test_input($_POST['w30']); $w31 = test_input($_POST['w31']); $w40 = test_input($_POST['w40']);
    $w41 = test_input($_POST['w41']); $w50 = test_input($_POST['w50']); $w51 = test_input($_POST['w51']); $w60 = test_input($_POST['w60']); $w61 = test_input($_POST['w61']); $w70 = test_input($_POST['w70']); $w71 = test_input($_POST['w71']); $w80 = test_input($_POST['w80']); $w81 = test_input($_POST['w81']);
    $f00 = test_input($_POST['f00']); $f01 = test_input($_POST['f01']); $f10 = test_input($_POST['f10']); $f11 = test_input($_POST['f11']); $f20 = test_input($_POST['f20']); $f21 = test_input($_POST['f21']); $f30 = test_input($_POST['f30']); $f31 = test_input($_POST['f31']); $f40 = test_input($_POST['f40']); 
    $f41 = test_input($_POST['f41']); $f50 = test_input($_POST['f50']); $f51 = test_input($_POST['f51']); $f60 = test_input($_POST['f60']); $f61 = test_input($_POST['f61']); $f70 = test_input($_POST['f70']); $f71 = test_input($_POST['f71']); $f80 = test_input($_POST['f80']); $f81 = test_input($_POST['f81']);
    $s00 = test_input($_POST['s00']); $s01 = test_input($_POST['s01']); $s10 = test_input($_POST['s10']); $s11 = test_input($_POST['s11']); $s20 = test_input($_POST['s20']); $s21 = test_input($_POST['s21']); $s30 = test_input($_POST['s30']); $s31 = test_input($_POST['s31']); $s40 = test_input($_POST['s40']); 
    $s41 = test_input($_POST['s41']); $s50 = test_input($_POST['s50']); $s51 = test_input($_POST['s51']); $s60 = test_input($_POST['s60']); $s61 = test_input($_POST['s61']); $s70 = test_input($_POST['s70']); $s71 = test_input($_POST['s71']); $s80 = test_input($_POST['s80']); $s81 = test_input($_POST['s81']);
    $th00 = test_input($_POST['th00']); $th01 = test_input($_POST['th01']); $th10 = test_input($_POST['th40']); $th11 = test_input($_POST['th11']); $th20 = test_input($_POST['th20']); $th21 = test_input($_POST['th21']); $th30 = test_input($_POST['th30']); $th31 = test_input($_POST['th31']); $th40 = test_input($_POST['th40']); 
    $th41 = test_input($_POST['th41']); $th50 = test_input($_POST['th50']); $th51 = test_input($_POST['th51']); $th60 = test_input($_POST['th60']); $th61 = test_input($_POST['th61']); $th70 = test_input($_POST['th70']); $th71 = test_input($_POST['th71']); $th80 = test_input($_POST['th80']); $th81 = test_input($_POST['th81']);

    $sql  = "INSERT INTO timetable_row VALUES 
    ('', '$h1', '$m00', '$m01', '$t00', '$t01', '$w00', '$w01', '$th00', '$th01', '$f00', '$f01', '$s00', '$s01', '$last_id'),
    ('', '$h2', '$m10', '$m11', '$t10', '$t11', '$w10', '$w11', '$th10', '$th11', '$f10', '$f11', '$s10', '$s11', '$last_id'),
    ('', '$h3', '$m20', '$m21', '$t20', '$t21', '$w20', '$w21', '$th20', '$th21', '$f20', '$f21', '$s20', '$s21', '$last_id'),
    ('', '$h4', '$m30', '$m31', '$t30', '$t31', '$w30', '$w31', '$th30', '$th31', '$f30', '$f31', '$s30', '$s31', '$last_id'),
    ('', '$h5', '$m40', '$m41', '$t40', '$t41', '$w40', '$w41', '$th40', '$th41', '$f40', '$f41', '$s40', '$s41', '$last_id'),
    ('', '$h6', '$m50', '$m51', '$t50', '$t51', '$w50', '$w51', '$th50', '$th51', '$f50', '$f51', '$s50', '$s51', '$last_id'),
    ('', '$h7', '$m60', '$m61', '$t60', '$t61', '$w60', '$w61', '$th60', '$th61', '$f60', '$f61', '$s60', '$s61', '$last_id'),
    ('', '$h8', '$m70', '$m71', '$t70', '$t71', '$w70', '$w71', '$th70', '$th71', '$f70', '$f01', '$s70', '$s71', '$last_id'),
    ('', '$h9', '$m80', '$m81', '$t80', '$t81', '$w80', '$w81', '$th80', '$th81', '$f80', '$f81', '$s80', '$s81', '$last_id')";

    if (mysqli_multi_query($con, $sql)){
        header("location: admin.php");
    }else {
        echo "Timetable not inserted! Error: " . mysqli_connect_error($con);
    }
    
}






















?>