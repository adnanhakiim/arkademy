<?php
include("includes/config.php");
session_start();
if (!isset($_SESSION['nama_lengkap'])) {
  echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pendukung Keputusan</title>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.toastmessage.css"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="assets/css/sweetalert.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <div class="container">
