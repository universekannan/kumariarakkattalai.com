<?php
   $page = "Need Blood";
   include 'admin/config.php';
   $blood_group_id = "";
   $city_id = "";
       
   if (isset($_POST['submit'])) {
       $blood_group_id = trim($_POST['blood_group_id']);
       $city_id = trim($_POST['city_id']);
   	
         header("location: needbloods.php?blood_group_id=$blood_group_id&city_id=$city_id");
       }
   
   if (isset($_POST['submits'])) {

           $name=$_POST['nbpatientname'];
           $bgroup=$_POST['nbgroup'];
           $patientType=$_POST['nbpatienttype'];
           $disease=$_POST['nbbenefit'];
           $gender=$_POST['nbgender'];
           $age=$_POST['nbpatientage'];
           $agegroup=$_POST['nbagegrp'];
           $address=$_POST['nbpatientaddress'];
           $needunits=$_POST['needunits'];
           $hospitalName=$_POST['nbhospitalname'];
           $hospitalAddress=$_POST['nbhospitaladdress'];
           $attenderName=$_POST['nbattendername'];
           $attenderNo=$_POST['nbattendermobileno'];
           $needDate=$_POST['nbbloodneeddate'];
           $postedDate=date("Y-m-d H:i:s");
       
          $sql = "SELECT * FROM patient WHERE trim(attenderNo)='$attenderNo'";
           $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
           $count = mysqli_num_rows($result);
       
           if ($count >= 1) {
               $msg = "patient already exists";
               $msg_color = "red";
           } else {
               $msg_color = "green";
               $msg = "patient added Successfully";
       
       
               $stmt = $conn->prepare("INSERT INTO patient (name,bgroup,patientType,disease,gender,age,agegroup,address,needunits,hospital,hospitalAddress,postedDate,needDate,attenderName,attenderNo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
               $stmt->bind_param("sssssssssssssss",$name,$bgroup,$patientType,$disease,$gender,$age,$agegroup,$address,$needunits,$hospital,$hospitalAddress,$postedDate,$needDate,$attenderName,$attenderNo);
               $stmt->execute()or die($stmt->error);
               $msg = "User added successfully";
           }
       }
       ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Need Blood - Blood Donation - Activism & Campaign HTML5 Template</title>
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
      <section class="cta-section-2">
         <div class="container">
            <div class="col-md-12 col-sm-12 text-center">
               <h2 class="section-heading"><span>We Are Happy To</span>Support You</h2>
               <p class="section-subheading">Please fill the below form and submit the details. Our Team will review and get back to you at the earliest possible.</p>
            </div>
            <div class="col-lg-2">  
            </div>
			 <form action="" method="post">
            <div class="col-lg-3">
               <div class="form-group">
                  <div class="select-style">
                     <select class="form-control" name="city_id">
                        <?php 
                           $sql = "select * from ka_city order by id";
                           $result = mysqli_query($conn, $sql);
                           while ($row = mysqli_fetch_array($result)) {
                           ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['city_name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="form-group">
                  <div class="select-style">
                     <select class="form-control" name="blood_group_id">
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
            </div>
            <div class="col-lg-2">
               <div class="form-group">
                  <div class="form-group text-center">
                     <input required="required" class="btn btn-info"
                        type="submit"
                        name="submit" value="Search Blood !"/>
                  </div>
               </div>
               <div class="col-lg-2"> 
               </div>
            </div>
			</form>
         </div>
      </section>
      <section class="section-appointment">
         <div class="container wow fadeInUp">
               <div class="row">
            <div class="col-lg-5"> 
            </div> 
            </div> 
            <div class="row">
            <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 
            <figure class="appointment-img">
            <img src="images/appointment.jpg" alt="appointment image">
            </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
            <div class="appointment-form-wrapper text-center clearfix">
            <h3 class="join-heading">Help Save A Life +</h3>
            <form method="post" action="">
            <div class="row">
            <div class="form-group col-md-4">
            <input id="nbpatientname" class="form-control" name="nbpatientname"  placeholder="Patient Name" type="name">
            </div>
            <div class="form-group col-md-4">
            <input id="nbpatientage" class="form-control" name="nbpatientage"  placeholder="Age" type="number">
            </div>
            <div class="form-group col-md-4">
            <div class="select-style">                                    
            <select class="form-control" name="nbagegrp">
            <option>Age Group</option>
            <option value="Adult">Adult</option>
            <option value="Infant">Infant</option>
            <option value="Others">Others</option>
            </select>
            </div>
            </div>
            <div class="form-group col-md-4">
            <div class="select-style">                                    
            <select class="form-control" name="nbgender">
            <option>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
            </select>
            </div>
            </div>
            <div class="form-group col-md-4">
            <div class="select-style">                                    
            <select class="form-control" name="nbgroup">
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
            <div class="form-group col-md-4">
            <input id="needunits" class="form-control" name="needunits" placeholder="NumberOfUnits" type="number">
            </div> 
            <div class="form-group col-md-6">
            <div class="select-style">                                    
            <select class="form-control" name="nbpatienttype">
            <option>Patient Type</option>  
            <option value="(IP)-In Patient">(IP)-In Patient</option>
            <option value="(OP)-Out Patient">(OP)-Out Patient</option>
            </select>   
            </div>
            </div>
            <div class="form-group col-md-6">
            <input id="nbbenefit" class="form-control"name="nbbenefit" placeholder="Disease" type="text">
            </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
            <textarea id="nbpatientaddress" class="form-control" rows="4" name="nbpatientaddress" placeholder="Patient Address"></textarea>
            </div>
            <div class="form-group col-md-6">
            <input id="nbhospitalname" class="form-control" name="nbhospitalname" placeholder="Hospital Name & Adrs" type="text">
            </div>
            <div class="form-group col-md-6">
            <input id="nbhospitaladdress" class="form-control" name="nbhospitaladdress" placeholder="Blood Bank Name & Adrs" type="text">
            </div>
               </div>
            <div class="form-group col-md-4">
            <input id="nbattendername" class="form-control" name="nbattendername" placeholder="Attender Name" type="name">
            </div>
            <div class="form-group col-md-4">
            <input id="nbattendermobileno" class="form-control" name="nbattendermobileno" placeholder="Attender Mobile" type="text">
            </div>
            <div class="form-group col-md-4">
            <input id="nbbloodneeddate" class="form-control" name="nbbloodneeddate" placeholder="DD-MM-YYYY" type="date">
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="form-group text-center">
            <input required="required" class="btn btn-info"
               type="submit"
               name="submits" value="Submit !"/>
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
                  <h2>We Are Helping People From 4 Years</h2>
                  <p>
                     You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                  </p>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <a class="btn btn-cta-1" href="contact.php">Get In Touch</a>
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