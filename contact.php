<?php
$page = "Home";
include 'admin/config.php';
//get data from form  

if(isset($_POST['submit'])){

    $name   =   $_POST['name'];
    $number =   $_POST['number'];
    $email  =   $_POST['email'];
    $message=   $_POST['message'];
    $contactDate=date("Y-m-d H:i:s");
    $sql = "SELECT * FROM contact WHERE trim(number)='$number'";
     $result = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($result);
     if ($count >= 1) {
         $msg = "Company already in Added";
         $msg_color = "red";
     } else {
             $msg = "contact added successfully";
         }
         
         $stmt = $conn->prepare("INSERT INTO contact (name,number,email,message,contactDate) VALUES (?,?,?,?,?)");
         $stmt->bind_param("sssss", $name,$number,$email,$message,$contactDate);
         $stmt->execute() or die ($stmt->error);
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Contact Us - Blood Donation - Activism & Campaign HTML5 Template</title>
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
        <!--  HEADER -->
        <?php include "header.php"; ?>
  <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3>
                            Contact Us
                        </h3>
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Contact Us
                        </p>
                    </div>
                </div> 
            </div>
        </section> 
        <section class="section-content-block section-contact-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft">
                        <div class="contact-form-block">
                            <h2 class="contact-title">Contact Us</h2>
                            
         <div class="form-group">
         <p class="">For More Information Use The Information Below</p>
         <h2 class="fa fa-phone" style="font-size:22px" class="contact-title">Phone</h2>
         <p class=""> +919042578529 +919042127007,
                   <p>+919042578530 +919042127008,</p> 
                   <p>+919042566447 +919042535761 +919042535762</p>

        </div>
        <div class="form-group">
         <h2 class="fa fa-envelope" style="font-size:22px" class="contact-title">Email</h2>
         <p class="">Kumariarakkattalai@gmail.com</p>
        </div>
        <div class="form-group">
         <h2 class="fa fa-map-marker" style="font-size:24px"class="contact-title">Address</h2>
         <p class="">Maamoodu, Kulasekharam Post,
              Kanyakumari Dt, Tamil Nadu-629161 India.</p>
</div>
                        </div> 
                    </div> 
                    <div class="col-sm-6 wow fadeInRight">
                        <h2 class="contact-title">Our Location</h2>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1606.213890663631!2d77.2981443!3d8.359166400000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1668769670588!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>               
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                        <div class="appointment-form-wrapper text-center clearfix">
                            <h3 class="join-heading">Get In Touch</h3>

                          <div class="row">
                          <img style="position: absolute; margin-left: 115px;" alt="kumari1" src="images/process_4.png" class="center">

                            <div class="col-lg-12 col-md-6 hidden-sm hidden-xs"> 

                            <form action="" method="post">
                        <div class="form-group col-md-8">
                         <input id="name" name="name" class="form-control" placeholder="Enter Name" type="name">
                        </div>

                        <div class="form-group col-md-8">
                         <input id="mobile" class="form-control" name="number" placeholder="Mobile" type="text">
                        </div>
                          
                        <div class="form-group col-md-8">
                         <input id="email" name="email" class="form-control" placeholder="Email" type="text">
                        </div>

                        <div class="form-group col-md-12">
                         <textarea id="message" name="message" class="form-control" rows="4" placeholder="Your Message..."></textarea>
                        </div>    

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <button id="submit" class="btn-submit" type="submit">Submit</button>
                                </div>
                                </form>
                       </div>
                       
                       </div>
                           
                        </div> 
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
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>
</html>