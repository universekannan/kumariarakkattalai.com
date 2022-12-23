<?php
ob_start();
include 'header.php';
if(!isset($_SESSION['username']))
    header('Location: login.php');

    $sql = "SELECT * FROM patient ORDER BY postedDate DESC";
    $result = mysqli_query($connDB,$sql);
   
    $sql = "SELECT COUNT(*) as count, SUM(units) as sum FROM patient WHERE status='Completed'";
    $data = mysqli_query($connDB,$sql);
    $row = $data->fetch_assoc();
    
    $lifes=$row['count'];
    $units=$row['sum'];
    if(empty($units))
        $units=0;
    $sql = "SELECT * FROM volunteer WHERE status='Added'";
   $data = mysqli_query($connDB,$sql);
   
   $hearts = mysqli_num_rows($data);   
?>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminPanel.css">

    <div class="dashboard row d-flex justify-content-around">
        <div class="col col-lg-3">
        Total Units of Blood Donated <br>
        <p><?= $units; ?></p>
        </div>
        <div class="col col-lg-3">
        Total Benefited Persons <br>
        <p><?= $lifes; ?></p>
        </div>
        <div class="col col-lg-3">
        Total Volunteers <br>
        <p><?= $hearts; ?></p>
        </div>
    </div>

    <div class="boxes d-flex">
                <a href="requestList.php" class="box themed-grid-col">
                    <img src="img/blood.png" class="mx-auto d-block" alt="">
                    <h6>Blood Request List</h6>
                </a>
                <a href="donorList.php" class="box themed-grid-col">
                    <img src="img/update.png" class="mx-auto d-block" alt="">
                    <h6>Donor List</h6>
                </a>

                <a href="volunteerList.php" class="box themed-grid-col">
                    <img src="img/list.png" class="mx-auto d-block" alt="">
                    <h6>Volunteer List</h6>
                </a>
                <a href="contactList.php" class="box themed-grid-col">
                    <img src="img/email.png" class="mx-auto d-block" alt="">
                    <h6>Requested Messages</h6>
                </a>
            </div>
       

        <link rel="stylesheet" type="text/css" href="reset.css"> 
        <link rel="stylesheet" type="text/css" href="style.css"> 

<?php
include 'footer.php';
ob_end_flush();
?>