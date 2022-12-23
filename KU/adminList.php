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

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $sql = "UPDATE admin SET type='Admin' WHERE BINARY username='$username'";
    $data = mysqli_query($connDB,$sql);
}
else if(isset($_POST['delete'])){
    $username = $_POST['username'];
    $sql = "DELETE FROM admin WHERE BINARY username='$username'";
    $data = mysqli_query($connDB,$sql);
}
?>

<div class="maincontainer list">
            <h2 class="table-label">Admin Requests</h2>
        <table data-order='[[ 0, "desc" ]]' id="table" class="table text-center">
        
            <thead>
                <tr>
                    <th>SL. No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Add to Admin</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

<?php
$sql = "SELECT * FROM admin";
$result = mysqli_query($connDB,$sql);
while($row = $result->fetch_assoc()) {
?> <tr>
    
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['username']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['type']; ?></td>

        <?php
        if($row['type']!='Super Admin'){
            ?>
        <td> 
        <form action="" method="POST">
        <input type="text" name="username" value="<?= $row['username']; ?>" hidden>
            <button type="submit" class="btn btn-outline-primary py-0" name="add" onclick="return confirm('Are you sure to make <?= $row['name']; ?> as an Admin?')">
            Add Now
            </button>
        </form> 
        </td> 

        <td>
        <form action="" method="POST">
        <input type="text" name="username" value="<?= $row['username']; ?>" hidden>
            <button type="submit" class="btn p-0" name="delete" onclick="return confirm('Are you sure to delete <?= $row['name']; ?> from the list?')">
            <img src="img/delete.png" class="icon" alt="menu">
            </button>
            </form>  
        </td> 
        <?php
        }
        else{
            ?>
            <td>---</td>
            <td>---</td>
            <?php
        }
        
        ?>
        
    </tr>

<?php

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
