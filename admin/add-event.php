<?php
session_start();
$page = "Events";
$page1 = "Add Event";
include "timeout.php";
include "config.php";
$author=$_SESSION['full_name'];
$subject = "";
$description = "";
$status = "inactive";
$date = "";
$photo = "";
$serial_no = "1";
if (isset($_POST['submit'])) {
   
    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);
	
        $stmt = $conn->prepare("INSERT INTO ka_events (subject,author,description,status,date) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $subject,$author,$description,$status,$date);
        $stmt->execute() or die ($stmt->error);
		$event_id=$stmt->insert_id;
        $stmt1 = $conn->prepare("INSERT INTO ka_images (event_id,serial_no,status) VALUES (?,?,?)");
        $stmt1->bind_param("sss", $event_id,$serial_no,$status);
        $stmt1->execute() or die ($stmt1->error);
		$id=$stmt1->insert_id;
		
        if($_SESSION['user_type']=="Admin"){
            $sql="update ka_events set status='Active' where id=$event_id";
            mysqli_query($conn,$sql);
        }else if($_SESSION['user_type']=="Stoff"){
            $sql="update ka_events set status='inactive' where id=$event_id";
            mysqli_query($conn,$sql);
        }
		
		$file_name = $_FILES['photo']['name'];
        if (trim($file_name) != "") {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $id . "." . $ext;
            $query = "update ka_images set photo = '" . $file_name . "' where id=$id";
            mysqli_query($conn, $query);
            $target_path = "photo/";
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
        }
        header("location: events.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Add Event Name</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Event Name </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Event  Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                        <form method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
<div class="form-group">
								<label for="subject required" class="control-label required">Subject</label>
								<input required="required" type="text" maxlength="100" name="subject" id="subject" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<label for="date" class="control-label required">Event Eate</label>
								<input required="required" type="date" maxlength="100" name="date" id="date" class="form-control" placeholder="">
							</div>
 		
        <div class="form-group">
            <label for="description" class="control-label required">Event Description</label>
            <textarea value="" rows="4" required="required" type="text" maxlength="5000" name="description" id="description" class="form-control" placeholder="Event Description"></textarea>
        </div> 
							
									 <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input accept="image/x-png,image/gif,image/jpeg"  type="file" class="custom-file-input" name="photo"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                </div>
			
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
			  
          <!-- /.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
 <?php include("footer.php"); ?>

</div>
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>


</body>
</html>
