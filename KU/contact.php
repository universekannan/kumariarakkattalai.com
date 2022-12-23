<?php
$page = "Contact Us";
include "admin/config.php";
 include("header.php");
if(isset($_POST['submit'])){
   $name=$_POST['name'];
   $number=$_POST['mobileno'];
   $email=$_POST['email'];
   $message=$_POST['message'];
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
                            <br><span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>
<div class="maincontainar">
            <div class="contactcontainar">
                
                    <div class="newcontactform">
                        <div class="contactinfo">
                            <div>
                                <h2>Contact Info</h2>
                                <ul class="info">
                                    <li>
                                        <span><img src="img/address1.png" alt=""></span>
                                        <span>Maamoodu, Kulasekharam Post, <br>
                                        Kanyakumari Dt, Tamil Nadu <br>
                                    - 629161 India </span>
                                    </li>
                                    <li>
                                        <span><img src="img/email1.png" alt=""></span>
                                        <span>help@kumariarakattalai.com</span>
                                    </li>
                                    <li>
                                        <span><img src="img/phone1.png" alt=""></span>
                                      <span><a href="tel:9042127007">  +91 904 212 7007 / 08</a> <br>
                                               <a href="tel:9042535761">  +91 904 253 5761 / 62</a><br></span>
                                    </li>
					<li>
                                        <span><img src="img/address1.png" alt=""></span>
                                        <span><a href="https://www.google.com/maps/dir//8.3602087,77.2994143/@8.3591664,77.2981443,369m/data=!3m1!1e3!4m2!4m1!3e0?hl=en">Click Here for Office Location</a></span>
                                    </li>
                                </ul>
                            </div>
                                <ul class="sci">
                                    <li><a href=""><img src="img/46-facebook" alt=""></a></li>
                                    <li><a href=""><img src="img/43-twitter" alt=""></a></li>
                                    <li><a href=""><img src="img/38-instagram" alt=""></a></li>
                                </ul>
                        </div>
                        <div class="contactformsend">
                            <h2>Send a message</h2>
                            <div class="formboxsend">
				
                            <form action="" method="POST">
                                <div class="form_div">
                                    <input type="text" name="name" class="form_input" placeholder="" autocomplete="on" required>
                                    <label for="name" class="form_label"><span class="content-name">Name</span></label>
                                </div>
                                <div class="form_div">
                                    <input type="tel" name="mobileno" class="form_input" placeholder="" autocomplete="on" required>
                                    <label for="mobileno" class="form_label"><span class="content-name">Mobile No.</span></label>
                                </div>
                                <div class="form_div">
                                    <input type="email" name="email" class="form_input" placeholder="" autocomplete="on" required>
                                    <label for="email" class="form_label"><span class="content-name">E-Mail Address</span></label>
                                </div>
                                <div class="form_div">
                                    <textarea type="text" name="message" class="form_input" placeholder="" autocomplete="on" cols="30" rows="2" required></textarea>
                                    <label for="message" class="form_label"><span class="content-name">Your message to us</span></label>
                                </div>
                                <button type="submit" name="submit" class="form_button">Submit</button>
                            </form>   
			<div class="bglogo"> <img src="img/newlogo.png" alt=""></div>
                    <style>   
                    .bglogo img {
                    height: 350px;
                    opacity: 0.1;
                    width: auto;
                    position: absolute;
                    top:15vh;
                    right:5vw;
                    pointer-events: none;
                    }
                    </style> 
                            </div>
                        </div>
                    </div>
                
            </div>     
        </div>
        <!-- Our Team area-->
        
        
       
<?php
include 'our-team.php';
include 'footer.php';
ob_end_flush();
?>