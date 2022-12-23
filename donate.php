<?php
   $page = "Home";
   include 'admin/config.php';
       $full_name = "";
       $age = "";
       $mobile = "";
       $email = "";
       $gender = "";
       $blood_nmae = "";
       $postarea_name = "";
       $address = "";
       $emergency_contact = "";
       $emergency_contact_relationship = "";
       $emergency_mobile = "";
       $last_onated_date = "";
   
   if(isset($_POST['submit'])){
    
       $full_name=$_POST['full_name'];
       $age=$_POST['age'];
       $mobile=$_POST['mobile'];
       $email=$_POST['email'];
       $gender=$_POST['gender'];
       $blood_nmae=$_POST['blood_nmae'];
       $postarea_name=$_POST['postarea_name'];
       $address=$_POST['address'];
       $emergency_contact=$_POST['emergency_contact'];
       $emergency_contact_relationship=$_POST['emergency_contact_relationship'];
       $emergency_mobile=$_POST['emergency_mobile'];
       $last_onated_date=$_POST['last_onated_date'];

       $stmt = $conn->prepare("INSERT INTO donar (full_name,age,mobile,email,gender,blood_nmae,postarea_name,address,emergency_contact,emergency_contact_relationship,emergency_mobile,last_onated_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
       $stmt->bind_param("ssssssssssss",$full_name,$age,$mobile,$email,$gender,$blood_nmae,$postarea_name,$address,$emergency_contact,$emergency_contact_relationship,$emergency_mobile,$last_onated_date);
       $stmt->execute()or die($stmt->error);
       
       }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Donate - Blood Donation - Activism & Campaign HTML5 Template</title>
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
                     Donate
                  </h3>
                  <p class="page-breadcrumb">
                     <a href="#">Home</a> / Donate
                  </p>
               </div>
            </div>
         </div>
      </section>
      <section class="cta-section-2">
         <div class="container">
            <div class="col-md-12 col-sm-12 text-center">
               <h2 class="section-heading"><span>We Are Happy To</span>Support You</h2>
               <p class="section-subheading">Donate blood now as donor and save lives in urgent time</p>
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
                     <h3 class="join-heading">Are You The Type To Save A Life</h3>
                     <div class="row">
                        <form action="#" method="POST">

                           <div class="form-group col-md-8">
                              <input id="full_name" class="form-control" name="full_name" placeholder="Donar Name" type="text">
                           </div>
                           <div class="form-group col-md-4">
                              <input id="age" class="form-control" name="age" placeholder="Age" type="text">
                           </div>
                           <div class="form-group col-md-8">
                              <input id="mobile" class="form-control" name="mobile" placeholder="Donar Mobile Number" type="text">
                           </div>
                           <div class="form-group col-md-4">
                              <div class="select-style">
                                 <select class="form-control" name="gender">
                                    <option>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <div class="select-style">
                                 <select class="form-control" name="blood_nmae">
                                    <?php
                                       $sql = "select * from ka_blood_group order by id";
                                       $result = mysqli_query($conn, $sql);
                                       while ($row = mysqli_fetch_array($result)) {
                                       ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['blood_nmae']; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <div class="select-style">
                                 <select class="form-control" name="postarea_name">
                                    <?php
                                       $sql = "select * from ka_postarea order by id";
                                       $result = mysqli_query($conn, $sql);
                                       while ($row = mysqli_fetch_array($result)) {
                                       ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['postarea_name']; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <input id="email" class="form-control" name="email" placeholder="Email" type="email">
                           </div>
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <textarea id="address" class="form-control" rows="4" name="address" placeholder="Donar Address"></textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <input id="emergency_contact" class="form-control" name="emergency_contact" placeholder="Emergency Contact Person Name" type="text">
                           </div>
                           <div class="form-group col-md-6">
                              <input id="emergency_contact_relationship" class="form-control" name="emergency_contact_relationship" placeholder="Emergency Contact Relationship" type="text">
                           </div>
                           <div class="form-group col-md-6">
                              <input id="emergency_mobile" class="form-control" name="emergency_mobile" placeholder="Emergency Contact Number" type="text">
                           </div>
                           <div class="form-group col-md-6">
                              <input id="last_onated_date" class="form-control" name="last_onated_date" placeholder="DD-MM-YYYY" type="date">
                           </div>
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group text-center">
                                 <input required="required" class="btn btn-info"
                                    type="submit"
                                    name="Submit" value="Submit !"/>
                              </div>
                           </div>
                     </div>
                     </form>
                     <div class="col-lg-2"> </div>
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
                  <a class="btn btn-cta-1" href="volunteers.php">Get In Touch</a>
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