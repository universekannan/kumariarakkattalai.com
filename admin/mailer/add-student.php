<?php
session_start();
$page = "Dashboard";
$page1 = "Dashboard1";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$msg = "";

$name = "";
$father = "";
$mother = "";
$nationality = "";
$religion = "";
$medium = "";
$blood = "";
$gender = "";
$dob = "";
$employed = "";
$physically = "";
$phone = "";
$course = "";
$discipline = "";
$enrolment = "";
$address = "";
if (isset($_POST['submit'])) {



$name = trim($_POST['name']);
$father = trim($_POST['father']);
$mother = trim($_POST['mother']);
$nationality = trim($_POST['nationality']);
$religion = trim($_POST['religion']);
$medium = trim($_POST['medium']);
$blood = trim($_POST['blood']);
$gender = trim($_POST['gender']);
$dob = trim($_POST['dob']);
$employed = trim($_POST['employed']);
$physically = trim($_POST['physically']);
$phone = trim($_POST['phone']);
$course = trim($_POST['course']);
$discipline = trim($_POST['discipline']);
$enrolment =    trim($_POST['enrolment']);

    $address = trim($_POST['address']);

        $stmt = $conn->prepare("INSERT INTO jiier_studentenquiry (name,father,mother,nationality,religion,medium,blood,gender,dob,employed,physically,phone,course,discipline,enrolment,address) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("ssssssssssssssss", $name,$father,$mother,$nationality,$religion,$medium,$blood,$gender,$dob,$employed,$physically,$phone,$course,$discipline,$enrolment,$address);

        $stmt->execute() or die ($stmt->error);

        $id=$stmt->insert_id;
		
		
		 if($_SESSION['user_type']=="Superadmin"){
            $sql="update jiier_users set centre_id=$centre_id where id=$id";
            mysqli_query($conn,$sql);
        }else if($_SESSION['user_type']=="Admin"){
            $sql="update jiier_users set centre_id=$centre_id, user_type='Staff' where id=$id";
            mysqli_query($conn,$sql);
        }

        header("location: students.php");

    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard JIIER</title>

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
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
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
            <h3 class="card-title">User</h3>

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
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                  </div>
               
			    <div class="form-group">
                    <label for="father">Father Name</label>
                    <input type="text" class="form-control" id="father" name="father" placeholder="Father Name">
                  </div>
				  
				   <div class="form-group">
                    <label for="mother">Mother Name</label>
                    <input type="text" class="form-control" id="mother" name="mother" placeholder="Mother Name">
                  </div>
				  
				   <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality">
                  </div>
				  
				   <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                  </div>
				  
				   <div class="form-group">
                    <label for="medium">Medium</label>
                    <input type="text" class="form-control" id="medium" name="medium" placeholder="Medium">
                  </div>
				  
				   <div class="form-group">
                    <label for="blood">Blood Group</label>
                  <!--  <input type="text" class="form-control" id="blood" name="blood" placeholder="Blood Group">-->
					
					<select name="blood" class="form-control" id="blood"> 
					
  <option value="A+" selected>A+</option>
  <option value="A-" selected>A-</option>
  <option value="B+" selected>B+</option>
  <option value="B-" selected>B-</option>
  <option value="B+" selected>AB+</option>
  <option value="B-" selected>AB-</option>
  <option value="O+" selected>O+</option>
  <option value="O-" selected>O-</option>
<option value="" selected>Select</option>
 	</select>
					
                  </div>
				  
				   <div class="form-group">
                    <label for="gender">Gender</label>
                   <select name="gender" class="form-control" id="gender"> 
					
  <option value="Male" selected>Male</option>
  <option value="Female" selected>Female</option>
  <option value="Other" selected>Other</option>
<option value="" selected>Select</option>

 	</select>
                  </div>
				  
				   <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth">
                  </div>
				  
				   <div class="form-group">
                    <label for="employed">Employed / Un-Employed</label>
                    <select name="employed" class="form-control" id="employed"> 
					
  <option value="Yes" selected>Yes</option>
  <option value="No" selected>No</option>

<option value="" selected>Select</option>

 	</select>
                  </div>
				  
				   <div class="form-group">
                    <label for="physically">Physically Handicapped</label>
                    <select name="physically" class="form-control" id="physically"> 
					
  <option value="Yes" selected>Yes</option>
  <option value="No" selected>No</option>
  
<option value="" selected>Select</option>

 	</select>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="course">Course</label>
                    <input type="course" name="course" class="form-control" id="course" placeholder="Course">
                  </div>
				 
				
				 <div class="form-group">
                    <label for="discipline">Discipline</label>
                    <input type="discipline" name="discipline" class="form-control" id="discipline" placeholder="Discipline">
                  </div>
				
				
				 <div class="form-group">
                    <label for="enrolment">Enrolment Year</label>
                    <input type="enrolment" name="enrolment" class="form-control" id="enrolment" placeholder="Enrolment Year">
                  </div>
				  
				  
				 <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" name="address" class="form-control" id="address" placeholder="Address">
                  </div>
				
				
                </div>
			
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

 
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>



</body>
</html>
