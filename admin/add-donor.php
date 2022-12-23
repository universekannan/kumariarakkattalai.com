<?php
session_start();
$page = "Donors";
$page1 = "Add Donor";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Admin") && ($_SESSION['user_type'] != "Staff")) header("location: index.php");

$lastup_date=date('y/m/d');
$msg = "";
$msg_color = "";

$full_name = "";
$father_name = "";
$mother_name = "";
$nationality = "";
$religion = "";
$medium = "";
$blood_group = "";
$gender = "";
$dateof_birth = "";
$employed_unemployed = "";
$physically_handicapped = "";
$phone_number = "";
$email = "";
$course_id = "";
$enrolment_year = "";
$address = "";
$status = 'Active';
$photo = "";

if (isset($_POST['submit'])) {

$full_name = trim($_POST['full_name']);
$register_number = trim($_POST['register_number']);
$father_name = trim($_POST['father_name']);
$mother_name = trim($_POST['mother_name']);
$nationality = trim($_POST['nationality']);
$religion = trim($_POST['religion']);
$medium = trim($_POST['medium']);
$blood_group = trim($_POST['blood_group']);
$gender = trim($_POST['gender']);
$dateof_birth = trim($_POST['dateof_birth']);
$employed_unemployed = trim($_POST['employed_unemployed']);
$physically_handicapped = trim($_POST['physically_handicapped']);
$phone_number = trim($_POST['phone_number']);
$email = trim($_POST['email']);
$course_id = trim($_POST['course_id']);
$enrolment_year =    trim($_POST['enrolment_year']);
$address = trim($_POST['address']);

        $stmt = $conn->prepare("INSERT INTO jiier_student (register_number,centre_id,full_name,father_name,mother_name,nationality,religion,medium,blood_group,gender,dateof_birth,employed_unemployed,physically_handicapped,phone_number,email,course_id,enrolment_year,address,status,user_id,lastup_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssssssssssssssss", $register_number,$centre_id,$full_name,$father_name,$mother_name,$nationality,$religion,$medium,$blood_group,$gender,$dateof_birth,$employed_unemployed,$physically_handicapped,$phone_number,$email,$course_id,$enrolment_year,$address,$status,$user_id,$lastup_date);
        $stmt->execute() or die ($stmt->error);
        $id=$stmt->insert_id;
		
		 $file_name = $_FILES['photo']['name'];
        if (trim($file_name) != "") {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $id . "." . $ext;
            $query = "update jiier_student set photo = '" . $file_name . "' where id=$id";
            mysqli_query($conn, $query);
            $target_path = "uploads/";
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
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

  <title>Add Donor</title>

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
            <h1>Add Donor</h1>
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
            <h3 class="card-title">Add Donor Details</h3>

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
                    <label for="full_name">Full Name *</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required="required" placeholder="Full Name">
                  </div>
               
                  <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="phone_number" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email ID">
                  </div>
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>



			<div class="form-group">
            <label>Select blood_group</label>
                <select name="from_id" class="form-control select2bs4" required="required" >
                <option value="">---Select---</option>
                <?php
                $sql = "select * from ka_blood_group";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['blood_nmae']; ?></option>
                <?php } ?>
                </select>
            </div>  
				  <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control select2bs4" name="gender" style="width: 100%;">
                   
                  <option  selected>Select</option>
					 <option value="Male" >Male</option>
  <option value="Female" >Female</option>
  <option value="Other" >Other</option>
                                               
                  </select>
                </div>
				 
				   <div class="form-group">
                    <label for="dateof_birth">Date Of Birth *</label>
                    <input type="date" class="form-control" id="dateof_birth" name="dateof_birth"  placeholder="MM/DD/YYYY" required="required" >
                  </div>
				  
				   <div class="form-group">
                    <label for="employed_unemployed">Job</label>
					
					<select class="form-control select2bs4"   name="employed_unemployed" style="width: 100%;">
                     <option  selected>Select</option>
					 <option value="Yes" >Yes</option>
                     <option value="No" >No</option>
                  </select>
                  </div>
				  
			    <div class="form-group">
                    <label for="father_name">Father Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name">
                  </div>
				  
				   <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name">
                  </div>
				  <div class="form-group">
                    <label for="mother_name">Address 1</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Address 1">
                  </div>
				  <div class="form-group">
                    <label for="mother_name">Address 2</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Address 2">
                  </div>
				
				<div class="form-group">
                <label> Postarea Name</label>
                <select name="postarea_id" class="form-control select2bs4" required="required" >
                <option value="">---Select Postarea ---</option>
                <?php
                $sql2 = "select * from ka_postarea";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_array($result2)) {
                ?>
                <option value="<?php echo $row2['id']; ?>"><?php echo $row2['postarea_name']; ?></option>
                <?php } ?>
                </select>
            </div>  
				   <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input" name="photo" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
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
