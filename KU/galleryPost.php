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
    header('Location: index.php');

include 'datatables.php';    

if(isset($_POST['upload'])){

$uploadsDir = "uploads/";
$allowedFileType = array('jpg','png','jpeg');

// Velidate if files exist
if (!empty(array_filter($_FILES['fileUpload']['name']))) {

    $postID = uniqid();

    date_default_timezone_set('Asia/Kolkata'); 
    $uploadDate = date('Y-m-d H:i:s');

    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $uploaded = false;
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM admin WHERE BINARY username = '$username'";
    $data = mysqli_query($connDB,$sql);
    $user = mysqli_fetch_array($data);
    
    $name = $user['name'];
    $alertMsg = "<strong>Failed!</strong> Please provide valid file to upload.";
    $alertType = "alert-danger";

    // Loop through file items
    foreach($_FILES['fileUpload']['name'] as $id=>$val){
        // Get files upload path
        $fileName        = $_FILES['fileUpload']['name'][$id];
        $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
        $targetFilePath  = $uploadsDir . $postID .'_'. $fileName;
        $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        

        if(in_array($fileType, $allowedFileType)){
                if(move_uploaded_file($tempLocation, $targetFilePath)){
                    $sqlVal = "('".$uploadDate."','".$postID."','".$postID.'_'.$fileName."')";
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            
        } else {
            $response = array(
                "status" => "alert-danger",
                "message" => "Only .jpg, .jpeg and .png file formats allowed."
            );
        }
        // Add into MySQL database
        if(!empty($sqlVal)) {
            $insert = $conn->query("INSERT INTO images (uploadDate, postID, filename) VALUES $sqlVal");
            if($insert) {
                $uploaded = true;
            }
        }
    }

    if($uploaded){
        $sql = "INSERT INTO `gallery`(`uploadDate`, `author`, `subject`, `description`, `postID`) 

        VALUES ('$uploadDate','$name','$subject','$description','$postID')";
    
    
        if(mysqli_query($connDB,$sql)){
            $alertMsg = "<strong>Success!</strong> Post has been uploaded.";
            $alertType = "alert-success";
        }
    }

}

    include 'alert.php';
}

else if(isset($_POST['update'])){
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $sql = "UPDATE `gallery` SET subject='$subject', description='$description' WHERE postID='$id'";
    mysqli_query($connDB,$sql);
}
else if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM gallery WHERE BINARY postID='$id'";
    $data = mysqli_query($connDB,$sql);

    $sql = "DELETE FROM images WHERE BINARY postID='$id'";
    $data = mysqli_query($connDB,$sql);
}
?>

<div class="list">
    <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#upload">Create Post</button>
        <h2 class="table-label">Gallery Post List</h2>
        <table id="table" class="table table-striped table-hover dt-responsive">
        
            <thead>
                <tr>
                    <th>SL. No.</th>
                    <th>Date</th>
                    <th>Subject</th>
                    <th>Author</th>
                    <th>View/Edit</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>

<?php
$sql = "SELECT * FROM gallery order by uploadDate desc";
$result = mysqli_query($connDB,$sql);
$i=1;
while($row = $result->fetch_assoc()) {
?> <tr>

        <td><?= $i; ?></td>
        <td><?= date('Y-m-d, h:i a', strtotime($row['uploadDate'])); ?></td>
        <td><?= $row['subject']; ?></td>
        <td><?= $row['author']; ?></td>
        <td> 
            <button type="button" data-toggle="modal" data-target="#staticBackdrop-<?= $i; ?>">
            <img src="img/eye.png" class="icon" alt="menu">
            </button>
        </td> 

        <td>
        <form action="" method="POST">
        <input type="text" name="id" value="<?= $row['postID']; ?>" hidden>
            <button type="submit" class="btn p-0" name="delete" onclick="return confirm('Are you sure to delete this post from the list?')">
                <img src="img/delete.png" class="icon" alt="menu">
            </button>
        </form>
        </td> 


    <!-- Modal for view -->

    <div class="modal fade" id="staticBackdrop-<?= $i; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $row['author']; ?>'s Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" method="POST">
                <input type="text" name="id" value="<?= $row['postID']; ?>" hidden>

                    <div class="form-group">
                    <label class="control-label col-sm-4">Subject:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" value="<?= $row['subject']; ?>" name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" name="description" rows="10"><?= $row['description']; ?></textarea>
                    </div>

                    <div class="imgGallery">
                         <?php
                                $postID = $row['postID']; 
                                $imgQuery = "SELECT * FROM images WHERE postID='$postID'";
                                $images = mysqli_query($connDB,$imgQuery);
                                while($current = $images->fetch_assoc()) {
                                    $imageURL = 'uploads/'.$current['fileName'];
                                ?>
                                    <img src="<?= $imageURL; ?>" alt="" />

                                <?php
                                }
                         ?>
                   </div>    
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="resolve">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
              

 <!-- Modal for crate post -->

 <div class="modal fade" id="upload" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" class="mb-3">

                <div class="form-group">
                <label class="control-label col-sm-4">Subject:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control mb-2" name="subject">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-4">Description:</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control mb-2" name="description" autocomplete="off" rows="10" required></textarea>
                    </div>
                </div>
                
                    <div class="custom-file">
                        <input type="file" accept="image/*" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
                        <label class="custom-file-label" for="chooseFile">Select file</label>
                    </div>  
                     

                    <div class="imgGallery">
                         <!-- image preview -->
                   </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="upload" class="btn btn-primary">
                        Submit
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
                </form>
        </div>
        </div>
    </div>


            </tbody>
        </table>
    </div>
</div>
  



<?php



include 'footer.php';
ob_end_flush();
?>


<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

<script>
  $(function () {
    // Multiple images preview with JavaScript
    var multiImgPreview = function (input, imgPreviewPlaceholder) {

      if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function (event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
          }

          reader.readAsDataURL(input.files[i]);
        }
      }

    };

    $('#chooseFile').on('change', function () {
      multiImgPreview(this, 'div.imgGallery');
    });
  });
</script>

<style>
.imgGallery img {
      padding: 8px;
      max-width: 80px;
    } 
</style>