<?php
$page = "Home";
include 'admin/config.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $bgroup=$_POST['bgroup'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $education=$_POST['education'];
    $occupation=$_POST['occupation'];
    $lastDonated=$_POST['lastDonated'];
    $ePersonName=$_POST['ePersonName'];
    $ePersonRel=$_POST['ePersonRel'];
    $ePersonNo=$_POST['ePersonNo'];
    $idaadhaar=$_POST['idaadhaar'];
    $regDate=date("Y-m-d H:i:s");
	
   $sql = "SELECT * FROM volunteer WHERE trim(number)='$number'";
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "volunteer already exists";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        $msg = "volunteer added Successfully";


        $stmt = $conn->prepare("INSERT INTO volunteer (name,fname,bgroup,gender,age,number,address,email,education,occupation,lastDonated,regDate,ePersonName,ePersonRel,ePersonNo,idaadhaar) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssssssssss",$name,$fname,$bgroup,$gender,$age,$number,$address,$email,$education,$occupation,$lastDonated,$regDate,$ePersonName,$ePersonRel,$ePersonNo,$idaadhaar);
        $stmt->execute()or die($stmt->error);
    }
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
        <meta charset="utf-8">
        <title>Volunteers - Blood Donation - Activism & Campaign HTML5 Template</title>
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
                            Volunteers
                        </h3>
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Volunteers
                        </p>
                    </div>
                </div> 
            </div> 
        </section> 

		<section class="cta-section-2">
                 <div class="container">
                 <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading"><span>We Are Happy To</span>Support You</h2>
                        <p class="section-subheading">Our volunteer team help you to get the blood on time as possible</p>
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
                            <h3 class="join-heading">Our Volunteers</h3>
                                <div class="row">

                                <form action="" method="POST">
                        <div class="form-group col-md-4">
                          <input id="name" class="form-control" name="name" placeholder="Volunteer Name" type="text">
                        </div>

                        <div class="form-group col-md-4">
                          <input id="fname" class="form-control" name="fname" placeholder="Father's Name" type="text">
                        </div>

                        <div class="form-group col-md-4">
                          <input id="age" class="form-control" name="age" placeholder="Volunteer Age" type="text">
                        </div>

                        <div class="form-group col-md-4">
                          <input id="number" class="form-control" name="number" placeholder="Volunteer Mobile" type="text">
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
                           

                                <div class="form-group col-md-4">
                                <div class="select-style">                                    
                                <select class="form-control" name="bgroup">

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

             <div class="form-group col-md-12">
             <input id="email" class="form-control" name="email" placeholder="Email" type="text">
             </div>

             <div class="form-group col-md-6 col-sm-12 col-xs-12">
             <textarea id="address" class="form-control" rows="4" name="address" placeholder="Volunteer Address"></textarea>
             </div>

             <div class="form-group col-md-6">
             <input id="education" class="form-control" name="education" placeholder="Education" type="text">
             </div>

             <div class="form-group col-md-6">
             <input id="occupation" class="form-control" name="occupation" placeholder="Occupation" type="text">
             </div>
    </div>

             <div class="form-group col-md-6">
             <input id="idaadhaar" class="form-control" name="idaadhaar" placeholder="Aadhaar" type="number">
             </div>

             <div class="form-group col-md-6">
             <input id="ePersonName" class="form-control"  name="ePersonName" placeholder="Emergency Contact Person Name" type="text">
             </div>

             <div class="form-group col-md-12">
             <input id="ePersonRel" class="form-control" name="ePersonRel" placeholder="Emergency Contact Person RelationShip" type="text">
             </div>

             <div class="form-group col-md-6">
             <input id="ePersonNo" class="form-control" name="ePersonNo" placeholder="Emergency Contact Person Number" type="text">
             </div>

             <div class="form-group col-md-6">
             <input id="lastDonated" class="form-control" name="lastDonated" placeholder="DD-MM-YYYY" type="date">
             </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group text-center">
                                            <input required="required" class="btn btn-info"
                                                   type="submit"
                                                   name="submit" value="Submit !"/>
                                        </div>                                </div>

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
                        <a class="btn btn-cta-1" href="members.php">Get In Touch</a>
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