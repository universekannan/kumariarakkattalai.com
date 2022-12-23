<?php
$page = "Home";
include 'admin/config.php';
$blood_group_id=$_GET['blood_group_id'];
$city_id=$_GET['city_id'];
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
        <meta charset="utf-8">
        <title>About Us - Blood Donation - Activism & Campaign HTML5 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/favicon.png" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
    <body> 
        <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
        </div>
        <?php include "header.php"; ?>
 <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3>
                            Need Blood
                        </h3>
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Need Blood
                        </p>
                    </div>
                </div> 
            </div> 
        </section> 

		 <section class="section-appointment">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 
                        <figure class="appointment-img">
                            <img src="images/appointment.jpg" alt="appointment image">
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="overflow: scroll;"> 
                        <div class="appointment-form-wrapper text-center clearfix">
                            <h3 class="join-heading">Request Appointment</h3>


			 <style>
#table-scroll {
  height:400px;
  overflow:auto;  
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
 </style>
<div id="table-wrapper">
  <div id="table-scroll">
   <table>
  <tr>
    <th>#</th>
    <th>Full Name</th>
    <th>Blood</th>
    <th>Acteu</th>
  </tr>
			<?php
            $sql = "select a.*,b.blood_nmae,c.city_name from donor a,ka_blood_group b,ka_city c where a.blood_group_id=b.id and a.city_id=c.id and a.blood_group_id='$blood_group_id' and a.city_id='$city_id'";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
             ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['blood_nmae']; ?></td>
    <td><a href="https://api.whatsapp.com/send?phone=91<?php echo $row['mobile']; ?>&text=Hi"><?php echo $row['mobile']; ?> </a></td>
  </tr>
   <?php } ?>
</table>
  </div>
</div>
						   
                        </div> 
                    </div>
                </div> 
            </div> 
        </section>  
		
		
        <section class="cta-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2>We are helping people from 40 years</h2>
                        <p>
                            You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="#">Request Appointment</a>
                    </div> 
                </div> 
            </div>
        </section> 
        <?php include "footer.php"; ?>
        <a id="backTop">Back To Top</a>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>
</html>