<?php
$page = "Home";
include 'admin/config.php';
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
                            About Us
                        </h3>
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / About Us
                        </p>
                    </div>
                </div> 
            </div> 
        </section> 
        <section class="section-content-block">
 
                <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading"><span>Who We </span> Are ?</h2>
                </br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="">Supporting each other in unity irrespective of caste, religion, race and language.India is on the cusp of change. The country is marching into the 21st century, and yet, we're weighed down by devastating inequalities, by a huge population that remains untouched by well- meaning acts like the basic need for living healthily, and a large wealth inequality. At Kumari Arakkattalai, we want to make a difference in the lives of the millions who are not yet fulfilled by day to day life needs.</p>
</br>
               </div>               
               </div>              
               </div> 
               <div class="row">
     
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
             
              <div class="about-us-container theme-custom-box-shadow">
                 <div class="about-details"> 
 
                    <div class="col-lg-12 col-md-12 col-sm-12 text-left no-img-separator">
</br>
                         <h2><strong>Our Vission</strong></h2>
                         <span class="heading-separator heading-separator-horizontal"></span>
                     </div> 
                     <ul class="custom-bullet-list">
                         <li>- To bring 24 hour blood donation service center in Kumari district.</li>
                         <li>- To provide ambulance facilities in emergencies for the needy people even in rural society.</li>
                     </ul>
</br>
                      <div class="col-lg-12 col-md-12 col-sm-12 text-left no-img-separator">
                         <h2><strong>Our Mission</strong></h2>
                         <span class="heading-separator heading-separator-horizontal"></span>
                     </div> 
                     <ul class="custom-bullet-list">
                         <li>- To bring the 24 hours blood bank to hospital in delivery all in kanyakumari district.</li>
                         <li>- To help the poor students to graduate or pursue higher education in Kumari district.</li>
                         <li>- To establish a free coaching center for preparing UPSC and TNPSC exams in Kumari.</li>
                         <li>- To establish a care taker center and old age home for homeless destitute in Kumari.</li>
                     </ul>
                 </div> 
             </div>
         </div> 
         
                   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <div style="text-align: center;">
                   <img alt="kumari1" src="images/kumari1.png" class="center">
                   <h2>Kumari Arakkattalai Achive's</h2>
                   <span class="heading-separator heading-separator-horizontal"></span>
                 
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="counter-block-1 text-center">
<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
    
	?>
                            <i class="fa fa-heartbeat icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Donated Blood</h4>

                        </div>

                    </div> <!--  end .col-lg-3  -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                        <div class="counter-block-1 text-center">
<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
	?>
                            <i class="fa fa-stethoscope icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Benefited Lives</h4>

                        </div>

                    </div> <!--  end .col-lg-3  -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="counter-block-1 text-center">
<?php
    $notification_count=0;
    $notification_sql = "select * from volunteer";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
	?>
                            <i class="fa fa-users icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Our Volunteers</h4>

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
                        <h2>We are helping people from 4 years</h2>
                        <p>
                            You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="btn btn-cta-1" href="donate.php">Get In Touch</a>
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