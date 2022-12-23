<?php
ob_start();
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/3.4.bootstrap.min.js"></script>

<?php

include 'header.php';
if(!isset($_SESSION['username']))
    header('Location: login.php');

include 'datatables.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM donor WHERE BINARY id='$id'";
    $data = mysqli_query($connDB,$sql);
}
else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name=$_POST['dname'];
    $bgroup=$_POST['dbgroup'];
    $gender=$_POST['dgender'];
    $age=$_POST['dage'];
    $number=$_POST['dmobileno'];
    $address=$_POST['daddress'];
    $email=$_POST['demail'];
    $lastDonated=$_POST['dlastdonationdate'];
    $ePersonName=$_POST['decpname'];
    $ePersonRel=$_POST['decpr'];
    $ePersonNo=$_POST['decpmobileno'];
    $DAdminRemark=$_POST['dadminrmk'];
    $reviewed=$_POST['reviewed'];
    
    $sql = "UPDATE `donor` SET name='$name',bgroup='$bgroup',gender='$gender',
    age='$age',number='$number',address='$address',email='$email',lastDonated='$lastDonated',
    ePersonName='$ePersonName',ePersonRel='$ePersonRel',ePersonNo='$ePersonNo',DAdminRemark='$DAdminRemark',reviewed='$reviewed' WHERE id='$id'";
     mysqli_query($connDB,$sql);
       
 }

?>

<div class="maincontainer list">
<h2 class="table-label">Donor List</h2>
        <table id="table" class="table text-center">
            <thead>
                <tr>
                    <th>SL.No.</th>
                    <th>Donor Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Reviewed</th>
                    <th>Status</th>
                    <th>View/Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>

<?php
$sql = "SELECT * FROM donor order by regDate desc";
$result = mysqli_query($connDB,$sql);
$i=1;
while($row = $result->fetch_assoc()) {
    $lastDonated = $row['lastDonated'];
    $current=date("Y/m/d");
    $month=((strtotime($current) - strtotime($lastDonated))/60/60/24)/30;
    $status = $month<3.0? "Inactive":"Active";
?> <tr>
    
        <td><?= $i; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['age']; ?></td>
        <td><?= $row['gender']; ?></td>
        <td><?= $row['bgroup']; ?></td>
        <td><?= $row['reviewed']; ?></td>
        <td><?= $status; ?></td>
        <td>
            <input type="text" name="id" value="<?= $row['id']; ?>" hidden> 
            <button type="button" data-toggle="modal" data-target="#staticBackdrop-<?= $i; ?>">
            <img src="img/editProfile.png" class="icon" alt="menu">
            </button>
        </td> 

        <td>
        <form action="" method="POST">
            <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
            <button type="button" class="btn p-0" name="delete" onclick="return confirm('Are you sure to delete <?= $row['name']; ?> from the list?')">
            <img src="img/delete.png" class="icon" alt="menu">
            </button>
        </form>  
        </td> 


      <!-- Modal -->
    <div class="modal fade" id="staticBackdrop-<?= $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Donor Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form class="form-horizontal" action="" method="POST">
            <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
                <div class="form-group">
                <label class="control-label col-sm-4">Donor Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['name']; ?>" name="dname">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Donor Age:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['age']; ?>" name="dage">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Contact No.:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['number']; ?>" name="dmobileno">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Email:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['email']; ?>" name="demail">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="dgender">
                            <option value="<?= $row['gender']; ?>" selected><?= $row['gender']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Blood Group:</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" name="dbgroup">
                            <option value="<?= $row['bgroup']; ?>" selected><?= $row['bgroup']; ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Address:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['address']; ?>" name="daddress">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Emmergency Person Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['ePersonName']; ?>" name="decpname">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Emmergency Person Relation:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['ePersonRel']; ?>" name="decpr">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Emmergency Person No.:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['ePersonNo']; ?>" name="decpmobileno">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Last Donated:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control form-control-sm" value="<?= $row['lastDonated']; ?>" name="dlastdonationdate">
                    </div>
                </div>
                
                <div class="form-group">
                <label class="control-label col-sm-4">Reviewed:</label>
                    <div class="col-sm-8">
                    <select id="reviewed" class="form-control form-control-sm" name="reviewed">
                        <option value="Yes">Yes, Data Reviewed</option>
                        <option value="No" selected>No, Data not Reviewed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Admin Remark:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?= $row['DAdminRemark']; ?>" name="dadminrmk">
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
