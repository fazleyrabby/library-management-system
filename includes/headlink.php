<!DOCTYPE html>
<html>
<head>
    <?php $baseurl = "http://localhost/library_management";?>
    <title><?php echo "$title";?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/DataTables/datatables.css">
    <link rel="stylesheet" href="assets/datepicker/css/bootstrap-datepicker.css">


</head>


<?php
include "database/config.php";
session_start();

if (!isset($_SESSION["user"]))
{
   $_SESSION['alert'] = "Enter Username and Password!";
   header("location: login.php");
    // echo "<script>window.location.replace('login.php'); alert('Cannot Access Without Login');</script>";
}
?>