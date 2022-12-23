<?php
ob_start();
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/3.4.bootstrap.min.js"></script>

<?php
ob_start();
include 'header.php';

if(!isset($_SESSION['username']))
    header('Location: login.php');

include 'datatables.php';


if(isset($_POST['fill'])){
    $username = $_SESSION['username'];
    $sql = "SELECT name FROM admin WHERE BINARY username='$username'";
    $data = mysqli_query($connDB,$sql);
    $name = $data->fetch_assoc();
    $filledBy = $name['name'];

    $id = $_POST['id'];
    $sql = "UPDATE patient SET fulfilledBy='$filledBy', status='Completed' WHERE BINARY id='$id'";
    $data = mysqli_query($connDB,$sql);
}
else if(isset($_POST['reject'])){
    $username = $_SESSION['username'];
    $sql = "SELECT name FROM admin WHERE BINARY username='$username'";
    $data = mysqli_query($connDB,$sql);
    $name = $data->fetch_assoc();
    $filledBy = $name['name'];

    $id = $_POST['id'];
    $sql = "UPDATE patient SET fulfilledBy='$filledBy', status='Rejected' WHERE BINARY id='$id'";
    $data = mysqli_query($connDB,$sql);
}
else if(isset($_POST['update'])){
    $id = $_POST['id'];
     $name=$_POST['nbpatientname'];
     $bgroup=$_POST['nbgroup'];
     $patientType=$_POST['nbpatienttype'];
     $disease=$_POST['nbbenefit'];
     $gender=$_POST['nbgender'];
     $age=$_POST['nbpatientage'];
     $agegroup=$_POST['nbagegrp'];
     $address=$_POST['nbpatientaddress'];
     $units=$_POST['givenunits'];
     $needunits=$_POST['nbunits'];
     $hospitalName=$_POST['nbhospitalname'];
     $hospitalAddress=$_POST['nbhospitaladdress'];
     $attenderName=$_POST['nbattendername'];
     $attenderNo=$_POST['nbattendermobileno'];
     $needDate=$_POST['nbbloodneeddate'];
     $PAdminRemark=$_POST['padminrmk'];
    
    $sql = "UPDATE `patient` SET name='$name',bgroup='$bgroup',patientType='$patientType',disease='$disease',
    gender='$gender',age='$age',agegroup='$agegroup',address='$address',units='$units',needunits='$needunits',hospital='$hospitalName',hospitalAddress='$hospitalAddress',
    needDate='$needDate',attenderName='$attenderName',attenderNo='$attenderNo',PAdminRemark='$PAdminRemark' WHERE id='$id'";
     mysqli_query($connDB,$sql);
 }
?>

<div class="maincontainer list">
<h2 class="table-label">Blood Request List</h2>
        <table id="table" class="table text-center">
            <thead>
                <tr>
                    <th>SL. No.</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>View/edit</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Served By</th>
                </tr>
            </thead>
            <tbody>

<?php
$sql = "SELECT * FROM patient order by postedDate desc";
$result = mysqli_query($connDB,$sql);
$i=1;
while($row = $result->fetch_assoc()) {
 $status = $row['status'];  
?> <tr>
        <td><?= $i; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['age']; ?></td>
        <td><?= $row['gender']; ?></td>
        <td><?= $row['bgroup']; ?></td>

        <td> 
        <form action="patientProfile.php" method="POST">
        <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
            <button type="button" data-toggle="modal" data-target="#staticBackdrop-<?= $i; ?>">
            <img src="img/editProfile.png" class="icon" alt="menu">
            </button>
            </form>
        </td> 

        <?php 
        if($status=="Pending"){
            ?>
            
            <td>
            <form action="" method="POST">
            <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
                <button type="submit" class="btn btn-success btn-sm py-0" name="fill" onclick="return confirm('Are you sure to Fulfill this request?')">
                Fill Now
                </button> <br>
                <button type="submit" class="btn btn-danger btn-sm py-0" name="reject" onclick="return confirm('Are you sure to Reject this request?')">
                Reject
                </button>
                </form>
            </td>
            
            <?php 
        }
        else{
            ?>
                <td>...</td> 
            <?php
        }
        ?>
            <td><?= $status; ?></td>
            <td><?= $row['fulfilledBy']; ?></td>

        <!-- Modal -->
    <div class="modal fade" id="staticBackdrop-<?= $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Patient Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form class="form-horizontal" action="" method="POST">
            <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
                <div class="form-group">
                <label class="control-label col-sm-4">Patient Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['name']; ?>" name="nbpatientname">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Patient Age:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['age']; ?>" name="nbpatientage">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Age Group:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="nbagegrp">
                            <option value="<?= $row['agegroup']; ?>" selected><?= $row['agegroup']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="nbgender">
                            <option value="<?= $row['gender']; ?>" selected><?= $row['gender']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Blood Group:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="nbgroup">
                            <option value="<?= $row['bgroup']; ?>" selected><?= $row['bgroup']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Patient Type:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="nbpatienttype">
                            <option value="<?= $row['patientType']; ?>" selected><?= $row['patientType']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Disease/Benefit:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['disease']; ?>" name="nbbenefit">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Patient Address:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['address']; ?>" name="nbpatientaddress">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Need Blood Units:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['needunits']; ?>" name="nbunits">
                    </div>
                </div>
                
                <div class="form-group">
                <label class="control-label col-sm-4">Arranged Blood Units:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['units']; ?>" name="givenunits">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Need On:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control form-control-sm" value="<?= $row['needDate']; ?>" name="nbbloodneeddate">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Hospital Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['hospital']; ?>" name="nbhospitalname">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Hospital Address:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['hospitalAddress']; ?>" name="nbhospitaladdress">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Attender Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['attenderName']; ?>" name="nbattendername">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Attender No.:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['attenderNo']; ?>" name="nbattendermobileno">
                    </div>
                </div>
               
               <div class="form-group">
                <label class="control-label col-sm-4">Admin Remark:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['PAdminRemark']; ?>" name="padminrmk">
                    </div>
                </div>
            
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
        </div>
    </div>
        
   
    </tr>

<?php
$i++;
}
?>
              
            </tbody>
        </table>
    </div>
    </div>

<?php
include 'footer.php';
ob_end_flush();
?>
