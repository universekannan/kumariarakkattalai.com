<?php
$page = "Volunteers";
include 'header.php';
$msg = "";

if(isset($_POST['volunteer'])){
   
    $name=$_POST['vname'];
    $fname=$_POST['vfname'];
    $bgroup=$_POST['vbgroup'];
    $gender=$_POST['vgender'];
    $age=$_POST['vage'];
    $number=$_POST['vmobileno'];
    $address=$_POST['vaddress'];
    $email=$_POST['vemail'];
    $education=$_POST['veducation'];
    $occupation=$_POST['voccupation'];
    $lastDonated=$_POST['vlastdonationdate'];
    $ePersonName=$_POST['vecpname'];
    $ePersonRel=$_POST['vecpr'];
    $ePersonNo=$_POST['vecpmobileno'];
    $idaadhaar=$_POST['vidaadhaar'];
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
   
<div class="maincontainar">
    <div class="needbloodpagecontainar">
        <div class="nbpageinfo">
            <img src="img/3Savelife.png" alt="">
            <div class="headtextbox1">
                <h4>We are happy to help with you</h4>
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
                        <input type="text" name="vname" class="requestform_input" placeholder="" autocomplete="off" required>
                        <label for="vname" class="requestform_label"><span class="requestcontent-name">Volunteer Name</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="vfname" class="requestform_input" placeholder="" autocomplete="off" required>
                        <label for="vfname" class="requestform_label"><span class="requestcontent-name">Father's Name</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="number" name="vage" class="requestform_input" placeholder="" autocomplete="off" minlength="1" maxlength="3" required>
                        <label for="vage" class="requestform_label"><span class="requestcontent-name">Volunteer Age</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="tel" name="vmobileno" class="requestform_input" placeholder="" autocomplete="off" minlength="10" maxlength="14" required>
                        <label for="vmobileno" class="requestform_label"><span class="requestcontent-name">Volunteer Mobile No.</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="email" name="vemail" class="requestform_input" placeholder="" autocomplete="on">
                        <label for="vemail" class="requestform_label"><span class="requestcontent-name">Email ID</span></label>
                    </div>
                    <div class="requestform_div">
                        <input list="vGender" name="vgender" class="requestform_input" required>
                        <datalist id="vGender">
                            <option value="Male">
                            <option value="Female">
                            <option value="Other">
                          </datalist>
                        <label for="vGender" class="requestform_label"><span class="requestcontent-namenot">Gender</span></label>
                    </div>
                    <div class="requestform_div">
                        <input list="vbloodgroup" name="vbgroup" class="requestform_input" required>
                        <datalist id="vbloodgroup">
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
                        <label for="vbloodgroup" class="requestform_label"><span class="requestcontent-namenot">Blood Group</span></label>
                    </div>
                    <div class="requestform_div">
                        <textarea type="text" name="vaddress" class="requestform_input" placeholder="" autocomplete="off" cols="30" rows="2" required></textarea>
                        <label for="vaddress" class="requestform_label"><span class="requestcontent-name">Volunteer Address</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="veducation" class="requestform_input" placeholder="" autocomplete="on">
                        <label for="veducation" class="requestform_label"><span class="requestcontent-name">Education</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="voccupation" class="requestform_input" placeholder="" autocomplete="on">
                        <label for="voccupation" class="requestform_label"><span class="requestcontent-name">Occupation</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="number" name="vidaadhaar" class="requestform_input" placeholder="" autocomplete="on" minlength="10" maxlength="14" >
                        <label for="vidaadhaar" class="requestform_label"><span class="requestcontent-name">Aadhaar ID No.</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="vecpname" class="requestform_input" placeholder="" autocomplete="on" >
                        <label for="vecpname" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Name</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="text" name="vecpr" class="requestform_input" placeholder="" autocomplete="on" >
                        <label for="vecpr" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Relationship</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="tel" name="vecpmobileno" class="requestform_input" placeholder="" autocomplete="on" minlength="10" maxlength="14" >
                        <label for="vecpmobileno" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Mobile Number</span></label>
                    </div>
                    <div class="requestform_div">
                        <input type="date" name="vlastdonationdate" class="requestform_input" placeholder="" autocomplete="on">
                        <label for="vlastdonationdate" class="requestform_label"><span class="requestcontent-namenot">Last Blood Donated Date if</span></label>
                    </div>
                    <button type="submit" name="volunteer" class="form_button">Submit</button>
                    <button type="reset" class="form_button">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>        
   