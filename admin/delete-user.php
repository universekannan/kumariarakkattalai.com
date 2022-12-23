<?php
session_start();
include "timeout.php";
include "config.php";
$id=$_GET['id'];   
if ($_SESSION['user_type'] != "Admin") header("location: index.php");
 else{
    $sql = "delete from ka_users where id=$id";
    mysqli_query($conn, $sql);
    header("location: members.php");
}
