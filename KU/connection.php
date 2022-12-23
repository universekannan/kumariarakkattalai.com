<?php


$servername = 'localhost:3306';
$username = 'gekmeqxk_kumari';
$password = 'Rajendran@KuMari$2021';
$dbname = 'gekmeqxk_kumari1';
$conn = new mysqli($servername,$username,$password);
$connDB;

if(mysqli_select_db($conn, $dbname)){
    $connDB = new mysqli($servername,$username,$password,$dbname);
}


function createTable($connDB){
    
    if(!mysqli_query($connDB,"DESCRIBE `admin`")) {

        $sql = "CREATE TABLE admin (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(50) NOT NULL,
            username VARCHAR(30) UNIQUE,
            email VARCHAR(30) DEFAULT NULL,
            password VARCHAR(30) NOT NULL,
            type VARCHAR(30) DEFAULT 'User'
            )ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

        mysqli_query($connDB, $sql);

        $currAdmin = "SELECT * FROM admin";
        $data = mysqli_query($connDB,$currAdmin);

        if(mysqli_num_rows($data) == 0){
            $default = "INSERT INTO admin (name,username,password,type) VALUES ('Admin','admin','admin','Super Admin')";
            mysqli_query($connDB, $default);
        }

     } 

    if(!mysqli_query($connDB,"DESCRIBE `donor`")) {

        $sql = "CREATE TABLE `donor` (
            `id` varchar(20) NOT NULL,
            `name` varchar(30) DEFAULT NULL,
            `bgroup` varchar(10) DEFAULT NULL,
            `gender` varchar(10) DEFAULT NULL,
            `age` int(5) DEFAULT NULL,
            `number` varchar(20) DEFAULT NULL,
            `address` varchar(40) DEFAULT NULL,
            `email` varchar(30) PRIMARY KEY,
            `lastDonated` date DEFAULT NULL,
            `ePersonName` varchar(30) DEFAULT NULL,
            `ePersonRel` varchar(30) DEFAULT NULL,
            `ePersonNo` varchar(30) DEFAULT NULL,
            `DAdminRemark` varchar(500) DEFAULT NULL,
            `reviewed` varchar(30) DEFAULT 'No'
          )";

        mysqli_query($connDB, $sql);
     }    
     
     if(!mysqli_query($connDB,"DESCRIBE `patient`")) {

        $sql = "CREATE TABLE `patient` (
            `id` varchar(20) NOT NULL PRIMARY KEY,
            `name` text NOT NULL,
            `bgroup` varchar(5) NOT NULL,
            `patientType` varchar(20) NOT NULL,
            `disease` VARCHAR(20) NOT NULL,
            `gender` text NOT NULL,
            `age` int(5) NOT NULL,
            `agegroup` varchar(20) NOT NULL,
            `address` varchar(40) NOT NULL,
            `units` int(5) NOT NULL,
            `needunits` int(5) NOT NULL,
            `hospital` varchar(20) NOT NULL,
            `hospitalAddress` varchar(50) NOT NULL,
            `postedDate` datetime DEFAULT NULL,
            `needDate` date DEFAULT NULL,
            `attenderName` varchar(30) NOT NULL,
            `attenderNo` varchar(30) NOT NULL,
            `reviewed` varchar(30) DEFAULT 'No',
            `PAdminRemark` varchar(500) DEFAULT NULL,
        `status` varchar(30) DEFAULT 'Pending',
        `fulfilledBy` varchar(30) DEFAULT NULL
          )";

        mysqli_query($connDB, $sql);
     } 
}
if(!mysqli_query($connDB,"DESCRIBE `volunteer`")) {

    $sql = "CREATE TABLE `volunteer` (
        `id` varchar(200) NOT NULL PRIMARY KEY,
        `name` varchar(30) DEFAULT NULL,
        `fname` varchar(30) DEFAULT NULL,
        `bgroup` varchar(10) DEFAULT NULL,
        `gender` varchar(10) DEFAULT NULL,
        `age` int(5) DEFAULT NULL,
        `number` varchar(20) DEFAULT NULL,
        `address` varchar(40) DEFAULT NULL,
        `email` varchar(30) DEFAULT NULL,
        `education` varchar(30) DEFAULT NULL,
        `occupation` varchar(30) DEFAULT NULL,
        `lastDonated` date DEFAULT NULL,
        `regDate` datetime DEFAULT NULL,
        `ePersonName` varchar(30) DEFAULT NULL,
        `ePersonRel` varchar(30) DEFAULT NULL,
        `ePersonNo` varchar(30) DEFAULT NULL,
        `idaadhaar` varchar(30) DEFAULT NULL,
        `reviewed` varchar(30) DEFAULT 'No',
        `status` varchar(30) DEFAULT 'Pending'
      )";

    mysqli_query($connDB, $sql);
 } 
 if(!mysqli_query($connDB,"DESCRIBE `contact`")) {

    $sql = "CREATE TABLE `contact` (
        `id` varchar(200) NOT NULL PRIMARY KEY,
        `name` varchar(40) DEFAULT NULL,
        `number` varchar(20) DEFAULT NULL,
        `email` varchar(30) DEFAULT NULL,
        `message` varchar(100) DEFAULT NULL,
        `contactDate` datetime DEFAULT NULL,
        `reviewed` varchar(30) DEFAULT 'No',
        `status` varchar(30) DEFAULT 'Pending'
      )";

    mysqli_query($connDB, $sql);
 }

 if(!mysqli_query($connDB,"DESCRIBE `gallery`")) {

    $sql = "CREATE TABLE `gallery` (
        `uploadDate` datetime DEFAULT NULL,
        `author` varchar(40) DEFAULT NULL,
        `subject` varchar(500) DEFAULT NULL,
        `description` longtext DEFAULT NULL,
        `postID` varchar(300) NOT NULL PRIMARY KEY
      )";

    mysqli_query($connDB, $sql);
 }

 if(!mysqli_query($connDB,"DESCRIBE `images`")) {

  $sql = "CREATE TABLE `images` (
    `uploadDate` datetime DEFAULT NULL,
      `postID` varchar(200) NOT NULL,
      `fileName` varchar(200) NOT NULL
    )";

  mysqli_query($connDB, $sql);
}

if(mysqli_select_db($conn, $dbname)){
    createTable($connDB);
}
else{
    $sql = "CREATE DATABASE $dbname";
    mysqli_query($conn,$sql);
    $connDB = new mysqli($servername,$username,$password,$dbname);
    createTable($connDB);
}

?>