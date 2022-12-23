 <?php
session_start();
$page = "Users";
$page1 = "Add User";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$user_id = $_SESSION['user_id'];
$msg = "";
$msg_color = "";
$lastup_date = date('y/m/d');
$full_name = "";
$email = "";
$password = "";
$mobile = "";
$address = "";
$user_type = "Admin";
$status = "Active";
$photo = "";
   
if (isset($_POST['submit'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);

    $sql = "SELECT * FROM ka_users WHERE trim(email)='$email'";
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "User already exists";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        $msg = "Centre added Successfully";

        $stmt = $conn->prepare("INSERT INTO ka_users (full_name,email,password,mobile,user_type,address,status,user_id,lastup_date) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$full_name,$email,$password,$mobile, $user_type,$address,$status,$user_id,$lastup_date);
        $stmt->execute() or die($stmt->error);
        $id = $stmt->insert_id;

        $file_name = $_FILES['photo']['name'];
        if (trim($file_name) != "") {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $id . "." . $ext;
            $query = "update ka_users set photo = '" . $file_name . "' where id=$id";
            mysqli_query($conn, $query) or die(mysqli_errno($conn));
            $target_path = "uploads/users/";
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
        }

        header("location: users.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Add User</title>

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
								 <center><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span> </center>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add User</h1>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add User Details</h3>

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
                                            <input maxlength="50" type="text" class="form-control"  required="required" name="full_name" placeholder="Full Name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input required="required" type="email" name="email" class="form-control" placeholder="Email address">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input required="required" type="text" name="password" class="form-control" id="password"
                                                   placeholder="Password">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input required="required" type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea required="required" class="form-control" name="address" rows="3" placeholder="Enter ..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input accept="image/x-png,image/gif,image/jpeg"  type="file" class="custom-file-input" name="photo"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
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
                    </div>
                    <!-- /.container-fluid -->
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

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>


</body>
</html>
