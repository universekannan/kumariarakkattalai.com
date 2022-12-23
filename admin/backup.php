<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$page = "Backup";
$page1 = "Backup";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin")) header("location: index.php");
$msg = "";
$msg_color = "";
$date = date("Y-m-d");
$backup = dirname(__FILE__) . "/backup/$date.sql";
$download = "backup/$date.sql";
exec("rm *.sql");
exec("mysqldump --user={$mysql_user} --password={$mysql_password} --host={$mysql_hostname} {$mysql_database} --result-file={$backup} 2>&1", $output);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Database Backup</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
   <?php include("header.php"); ?>

  <?php include("menu.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
<div class="row">
<div class="col-md-12 text-center" >
<h1><a download="<?php echo $download; ?>" href="<?php echo $download; ?>" class="btn btn-info">Download Database Backup</a></h1>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
