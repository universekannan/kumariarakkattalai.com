<?php
$page = "Login";
session_start();
include "admin/config.php";
include 'header.php';

$error = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM ka_users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['timestamp'] = time();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['user_type'] = $row['user_type'];
         if($row['user_type']=="Admin" )
            header("location: admin/dashboard.php");
        else
            header("location: admin/dashboard.php");
        } else {
        $error = "Your User Name or Password is invalid";
        }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
<div class="hero">
    <div class="form-box">
        <div class="button-box">
            <div id="btn">

            </div>
            <button type="button" class="toggle-btn" onclick="login()">Login</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <!-- <div class="social-icons">
            <img src="" alt="">
        </div> -->
        <form id="login" action="" class="input-group" method="POST">
            <input type="text" class="input-field" name="email" placeholder="Email.d" required>
            <input type="text" class="input-field" name="password" placeholder="Password" required>
            <input type="checkbox" class="check-box" name="remember"><span>Remember Password</span>
            <button type="submit" name="login" class="submit-btn">Log In</button>
        </form>

        <form id="register" action="" class="input-group" method="POST">
            <input type="text" class="input-field" name="name" placeholder="Fullname" required>
            <input type="text" class="input-field" name="username" placeholder="Username" required>
            <input type="email" class="input-field" name="email" placeholder="Email" required>
            <input type="text" class="input-field" name="password" placeholder="Password" required>
            <input type="checkbox" class="check-box" name=""><span>I agree to the terms & conditions</span>
            <button type="submit" name="register" class="submit-btn">Register</button>
        </form>
    </div>

</div>

<script>
    var x = document.getElementById('login');
    var y = document.getElementById('register');
    var z = document.getElementById('btn');

    function register() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
    }
</script>
<link rel="stylesheet" type="text/css" href="style.css">

<?php

include 'footer.php';
ob_end_flush();
?>
