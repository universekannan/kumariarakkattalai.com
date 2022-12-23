<?php
$page = "Donate Blood";
$msg = "";
include 'header.php';

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

    $sql = "SELECT * FROM donor WHERE trim(mobile)='$mobile'";
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "Dname already exists";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        $msg = "Dname added Successfully";

   $stmt = $conn->prepare("INSERT INTO donor (full_name,age,mobile,email,gender,blood_nmae,postarea_name,address,emergency_contact,emergency_contact_relationship,emergency_mobile,last_onated_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
   $stmt->bind_param("ssssssssssss",$full_name,$age,$mobile,$email,$gender,$blood_nmae,$postarea_name,$address,$emergency_contact,$emergency_contact_relationship,$emergency_mobile,$last_onated_date);
   $stmt->execute()or die($stmt->error);
}
}
?>        

    <div class="maincontainar">
        <div class="needbloodpagecontainar">
            <div class="nbpageinfo">
                <img src="img/2DonateBlood.png" alt="">
                <div class="headtextbox1">
                    <h4>We are happy to support</h4>
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
                    top:35vh;
                    right:15vw;
                    pointer-events: none;
                    }
                    </style>
                    <form action="" method="POST">
                        <div class="requestform_div">
                            <input type="text" name="full_name" class="requestform_input" placeholder="" autocomplete="on" required>
                            <label for="full_name" class="requestform_label"><span class="requestcontent-name">Donor Full Name</span></label>
                        </div>
                        <div class="requestform_div">
                            <input type="number" name="age" class="requestform_input" placeholder="" autocomplete="on" minlength="1" maxlength="3" required>
                            <label for="age" class="requestform_label"><span class="requestcontent-name">Donor Age</span></label>
                        </div>
                        <div class="requestform_div">
                            <input type="tel" name="mobile" class="requestform_input" placeholder="" autocomplete="on" minlength="10" maxlength="14" required>
                            <label for="mobile" class="requestform_label"><span class="requestcontent-name">Donor Mobile No.</span></label>
                        </div>
                        <div class="requestform_div">
                            <input type="email" name="email" class="requestform_input" placeholder="" autocomplete="on">
                            <label for="email" class="requestform_label"><span class="requestcontent-name">Email ID</span></label>
                        </div>
                        <div class="requestform_div">
                            <input list="gender" name="gender" class="requestform_input" required>
                            <datalist id="gender">
                            <option value="Male">
                            <option value="Female">
                            <option value="Other">
                          </datalist>
                            <label for="gender" class="requestform_label"><span class="requestcontent-namenot">Gender</span></label>
                        </div>
                        <div class="requestform_div">
                            <input list="blood_nmae" name="blood_nmae" class="requestform_input" required>
                            <datalist id="blood_nmae">
							

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
                            <label for="blood_nmae" class="requestform_label"><span class="requestcontent-namenot">Blood Group</span></label>
                        </div>
						
                          <div class="requestform_div">
                            <input list="postarea_name" name="postarea_name" class="requestform_input" required>
                            <datalist id="postarea_name">
                <?php
                $sql2 = "select * from ka_postarea";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_array($result2)) {
                ?>
							  <option value="<?php echo $row2['postarea_name']; ?>"></option>
							 <?php } ?>
                          </datalist>
                            <label for="postarea_name" class="requestform_label"><span class="requestcontent-namenot">Postarea Name</span></label>
                        </div>

                        <div class="requestform_div">
                            <textarea type="text" name="address" class="requestform_input" placeholder="" autocomplete="on" cols="30" rows="2" required></textarea>
                            <label for="address" class="requestform_label"><span class="requestcontent-name">Donor Address</span></label>
                        </div>


                        <div class="requestform_div">
                            <input type="text" name="emergency_contact" class="requestform_input" placeholder="" autocomplete="on">
                            <label for="emergency_contact" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Name</span></label>
                        </div>

                        <div class="requestform_div">
                            <input type="text" name="emergency_contact_relationship" class="requestform_input" placeholder="" autocomplete="on">
                            <label for="emergency_contact_relationship" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Relationship</span></label>
                        </div>
                        <div class="requestform_div">
                            <input type="tel" name="emergency_mobile" class="requestform_input" placeholder="" autocomplete="on" minlength="10" maxlength="14">
                            <label for="emergency_mobile" class="requestform_label"><span class="requestcontent-name">Emergency Contact Person Mobile Number</span></label>
                        </div>
                        <div class="requestform_div">
                            <input type="date" name="last_onated_date" class="requestform_input" placeholder="" autocomplete="on">
                            <label for="last_onated_date" class="requestform_label"><span class="requestcontent-namenot">Last Donated Date if</span></label>
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
       
    