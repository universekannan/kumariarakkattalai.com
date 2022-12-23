<?php
session_start();
include "timeout.php";
include "config.php";
$id=$_GET['id'];   
if (($_SESSION['user_type'] != "Admin") && ($_SESSION['user_type'] != "Staff")) header("location: index.php");
 else{
    $sql = "delete from ka_images where id=$id";
    mysqli_query($conn, $sql);
    header("location: events.php");
}