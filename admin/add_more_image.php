<?php
session_start();
$page = "Events";
$page1 = "View Events";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Admin") && ($_SESSION['user_type'] != "Staff")) header("location: index.php");
$event_id = $_GET['id'];
 
$photo = "";
$serial_no = "";
$status = "Active";

if (isset($_POST['submit'])) {

	   $serial_no = trim($_POST['serial_no']);
	   
        $stmt = $conn->prepare("INSERT INTO ka_images (event_id,serial_no,status) VALUES (?,?,?)");
        $stmt->bind_param("sss", $event_id,$serial_no,$status);
        $stmt->execute() or die ($stmt->error);
        $id=$stmt->insert_id;
		
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
        header("location:add_more_image.php?id=$event_id");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Event More Images</title>
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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
          <div class="col-sm-12">
            <h1>Add Event More Images</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                    <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                         <tr style="background-color: #2a6b90;color:white">
                            <th>S No</th>
							<th>Event Id</th>
							<th>Photo</th>
							<th>Status</th>
							<th width="30px" style="text-align:right">Delete</th>
                                        </tr>
                                    </thead>
                                       <tbody>
                        <?php
                       $event_id = $_GET['id'];

                            $sql = "select * from ka_images where event_id=$event_id";
                        
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr> 
                                 <td><?php echo $row['id']; ?> </td>
								 <td> <?php echo $row['event_id']; ?></td>
					             <td><img src="photo/<?php echo $row['photo']; ?>" width="25" height="25"> </td>
       
								 <td><?php echo $row['status']; ?> </td>
								<td> <a class="btn btn-info" href="delete_image.php?id=<?php echo $row['id']; ?>" title="Delete">Delete</a></td>
								 
								 
                          </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                                        </tbody>
									</table>
									<!-- /.box -->
 </div>
          <!-- /.col (right) -->
        </div>
		  <div class="col-md-12">
                    <div class="box-body">
                       <form method="post" action="" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                       
                         <div class="form-group">
                          <label for="serial_no required" class="control-label required">Serial NO</label>
                          <input required="required" type="text"maxlength="50" name="serial_no" id="serial_no" class="form-control" placeholder="">
                            </div>

						<div class="form-group">
						  <label for="photo"
						 class="control-label">Photo</label>
						  <input accept="image/x-png,image/gif,image/jpeg" type="file"
							name="photo" id="photo" class="form-control">
						   </div>
					<div class="form-group">
						<div class="form-group text-center">
							<input required="required" class="btn btn-info" type="submit" name="submit" value="Save"/>
						</div>
					</div>
                                </div>
                            </div>
                        </form>
 </div>
          <!-- /.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	
	
	
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