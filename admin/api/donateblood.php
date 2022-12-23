<?php
include "../config.php";

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
