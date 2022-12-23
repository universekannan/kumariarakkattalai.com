<?php
session_start();
$page = "Profile";
$page1 = "Change Password";
include "timeout.php";
include "config.php";
$page="Profile";
$user_id = $_SESSION['user_id'];
$msg="";
$color="green";

if (isset($_POST['submit'])) {
  $old_password = trim($_POST['old_password']);
  $new_password = trim($_POST['new_password']);
  $confirm_password = trim($_POST['confirm_password']);

  $flag=false;
  $sql = "SELECT * FROM ka_users WHERE id=$user_id and password='$old_password'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  while($row = mysqli_fetch_array($result)){
    $flag=true;
  }

  if($flag==false){
    $msg="Invalid old password";
    $color="red";
  }else{
    if($new_password!=$confirm_password) {
      $msg = "Passwords does not match";
      $color = "red";
    }else{
      $stmt = $conn->prepare("update ka_users set password=? where id=?");
      $stmt->bind_param("ss", $new_password, $user_id);
      $stmt->execute();
      $stmt->close();
      $msg = "Password changed successfully";
      $color = "green";
	  header("location: dashboard.php");

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Change Password</title>

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

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
          </div>
        </div>
          <div class="row">
    <div class="col-md-6 text-center">
      <div class="login-panel panel panel-default">
        <div class="panel-heading text-center">
          <br><span style="color:<?php echo $color; ?>"><?php echo $msg; ?></span>
        </div>
        <form method="post" action="">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <input type="text" name="old_password" required="required" class="form-control" placeholder="Old Password">
                </div>
                <div class="form-group">
                  <input type="text" name="new_password" required="required" class="form-control" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" name="confirm_password" required="required" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="col-md-offset-5 col-md-2 text-center">
                  <input required="required" class="btn btn-success"
                         type="submit"
                         name="submit" value="Change"/>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
 <?php include("footer.php"); ?>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
