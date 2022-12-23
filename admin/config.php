<?php
    date_default_timezone_set("Asia/Kolkata");

    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "kumariarakkattalai";
    
    $conn = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
