<?php
ob_start();
include 'header.php';
if(!isset($_SESSION['username']))
    header('Location: login.php');

$username = $_SESSION['username'];
 if(isset($_POST['saveChanges'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "UPDATE admin SET name='$name', password='$password', email='$email' WHERE BINARY username='$username' ";

    if(mysqli_query($connDB,$sql)){
        $alertMsg = "<strong>Success!</strong> Profile has been updated.";
        $alertType = "alert-success";
    }
    else{
        $alertMsg = "<strong>Failed!</strong> Please provide valid information to update.";
        $alertType = "alert-danger";
    }
    include 'alert.php';
}
else{
    $sql = "SELECT * FROM admin WHERE BINARY username = '$username'";
    $data = mysqli_query($connDB,$sql);
    $user = mysqli_fetch_array($data);
    
    $name = $user['name'];
    $password = $user['password'];
    $email = $user['email'];
}
?>
<div class="maincontainar">
    <div class="needbloodpagecontainar">
        <div class="nbpageinfo">
            <img src="img/admin.png" alt="">
            <div class="headtextbox1">
                <h4>My Profile</h4>
            </div>
        </div>
        <div class="nbform">
            <div class="form">
                <form action="" method="post">
                    <div class="requestform_div">
                        <input type="text" name="name" class="requestform_input" value="<?= $name; ?>" required>
                        <label for="vname" class="requestform_label"><span class="requestcontent-name">Full Name</span></label>
                    </div>

                    <div class="requestform_div">
                        <input type="text" id="username" name="username" class="requestform_input" value="<?= $username; ?>">
                        <label for="vname" class="requestform_label"><span class="requestcontent-name">UserName</span></label>
                    </div>

                    <div class="requestform_div">
                        <input type="email" name="email" class="requestform_input" value="<?= $email; ?>" required>
                        <label for="vemail" class="requestform_label"><span class="requestcontent-name">Email ID</span></label>
                    </div>

                    <div class="requestform_div">
                        <input type="text" name="password" class="requestform_input" value="<?= $password; ?>" required>
                        <label for="vname" class="requestform_label"><span class="requestcontent-name">Password</span></label>
                    </div>

                    <button type="submit" name="saveChanges" class="form_button">Save Changes</button>
                    <button type="reset" class="form_button">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('username').addEventListener('click', e =>{
        alert('This field cannot be changed');
    });
</script>
<?php
include 'footer.php';
ob_end_flush();
?>        
   
