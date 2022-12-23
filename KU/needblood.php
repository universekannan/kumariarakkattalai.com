<?php
$page = "Need Blood";
$msg = "";
include 'header.php';
if(isset($_POST['submit'])){
   
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
        $stmt->bind_param("sssssssssssssss",$name,$bgroup,$patientType,$disease,$gender,$age,$agegroup,$address,$needunits,$hospitalName,$hospitalAddress,$postedDate,$needDate,$attenderName,$attenderNo);
        $stmt->execute()or die($stmt->error);
		$msg = "User added successfully";
        header("location: successmsg.php");

 }
 }
?>        
   
<!-- Need Blood form page -->
                            <br><span><?php echo $msg; ?></span>

<div class="maincontainar">
    <div class="needbloodpagecontainar">
        <div class="nbpageinfo">
            <img src="img/1NeedBlood.png" alt="">
            <div class="headtextbox1">
                <h4>We are happy to support you</h4>
                <p>Please fill the below form and submit the details. Our Team will review and get back to you at the earliest possible</p>
            </div>
        </div>
        <div class="nbform">
	<center><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span> </center>

            <div class="form">
		<div class="bglogo"> <img src="img/newlogo.png" alt=""></div>
                    <style>   
                    .bglogo img {
                    height: 350px;
                    opacity: 0.1;
                    width: auto;
                    position: absolute;
                    top:25vh;
                    right:1vw;
                    pointer-events: none;
                    }
                    </style>
                <form action="" method="post">
                    <div class="requestform_div">
                        <input type="text" name="nbpatientname" class="requestform_input" placeholder="" autocomplete="on" required>
                        <label for="nbpatientname" class="requestform_label"><span class="requestcontent-name">Patient Name</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="number" name="nbpatientage" class="requestform_input" placeholder="" autocomplete="on" minlength="1" maxlength="3" required>
                        <label for="nbpatientage" class="requestform_label"><span class="requestcontent-name">Patient Age</span></label>
                    </div>
                    
                    
                    <div class="requestform_div">
                        <input list="nbageGrps" name="nbagegrp" class="requestform_input" required>
                        <datalist id="nbageGrps">
                            <option value="Adult">
                            <option value="Infant">
                            <option value="Other">
                          </datalist>
                        <label for="nbageGrps" class="requestform_label"><span class="requestcontent-namenot">Age Group</span></label>
                    </div>
                    <div class="requestform_div">
                        <input list="nbGender" name="nbgender" class="requestform_input" required>
                        <datalist id="nbGender">
                            <option value="Male">
                            <option value="Female">
                            <option value="Other">
                          </datalist>
                        <label for="nbGender" class="requestform_label"><span class="requestcontent-namenot">Gender</span></label>
                    </div>
                    <div class="requestform_div">
                        <input list="nbbloodgroup" name="nbgroup" class="requestform_input" required>
                        <datalist id="nbbloodgroup">
						 <?php
                $sql = "select * from ka_blood_group";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>

                            <option value="<?php echo $row['blood_nmae']; ?>">
							 <?php } ?>
							 
                            <option value="Bombay Group">
                            <option value="Other">
                          </datalist>
                        <label for="nbbloodgroup" class="requestform_label"><span class="requestcontent-namenot">Blood Group</span></label>
                    </div>
                    <div class="requestform_div">
                        <input list="nbpatienttype" name="nbpatienttype" class="requestform_input" required>
                        <datalist id="nbpatienttype">
                            <option value="(IP) - In Patient">
                            <option value="(OP) - Out Patient">
                          </datalist>
                        <label for="nbpatienttype" class="requestform_label"><span class="requestcontent-namenot">Patient Type</span></label>
                    </div>
                    
                    <div class="requestform_div">
                        <input type="text" name="nbbenefit" class="requestform_input" placeholder="" autocomplete="on" required>
                        <label for="nbbenefit" class="requestform_label"><span class="requestcontent-name">Benefit/Disease</span></label>
                    </div>
                    <div class="requestform_div">
                        <textarea type="text" name="nbpatientaddress" class="requestform_input" placeholder="" autocomplete="on" cols="30" rows="2" required></textarea>
                        <label for="nbpatientaddress" class="requestform_label"><span class="requestcontent-name">Patient Address</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="number" name="needunits" class="requestform_input" placeholder="" autocomplete="on" minlength="1" maxlength="3" required>
                        <label for="needunits" class="requestform_label"><span class="requestcontent-name">Number Of Units</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="nbhospitalname" class="requestform_input" placeholder="" autocomplete="on" required>
                        <label for="nbhospitalname" class="requestform_label"><span class="requestcontent-name">Hospital Name & adrs</span></label>
                    </div>
                    <div class="requestform_div">
                        <textarea type="text" name="nbhospitaladdress" class="requestform_input" placeholder="" autocomplete="on" cols="30" rows="2" required></textarea>
                        <label for="nbhospitaladdress" class="requestform_label"><span class="requestcontent-name">Blood Bank Name & adrs</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="nbattendername" class="requestform_input" placeholder="" autocomplete="on">
                        <label for="nbattendername" class="requestform_label"><span class="requestcontent-name">Attender Name</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="tel" name="nbattendermobileno" class="requestform_input" placeholder="" autocomplete="off" minlength="10" maxlength="14">
                        <label for="nbattendermobileno" class="requestform_label"><span class="requestcontent-name">Attender Mobile number</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="date" name="nbbloodneeddate" class="requestform_input" placeholder="" autocomplete="off" required>
                        <label for="nbbloodneeddate" class="requestform_label"><span class="requestcontent-namenot">Blood Need Date</span></label>
                    </div>
                    <button type="submit" name="submit" class="form_button">Submit</button>
                    <button type="reset" class="form_button">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>        
   