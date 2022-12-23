 <?php
include "../admin/config.php";

$blood_group_id = "";
$city_id = "";
    
if (isset($_POST['submit'])) {
    $blood_group_id = trim($_POST['blood_group_id']);
    $city_id = trim($_POST['city_id']);

        header("location: donors.php?blood_group_id=$blood_group_id&city_id=$city_id");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kumari Arakkattalai</title>
  <meta name="apple-mobile-web-app-capable" content="Kumari Arakkattalai">
  <meta name="apple-mobile-web-app-status-bar-style" content="Kumari Arakkattalai">
  <meta name="apple-mobile-web-app-title" content="Kumari Arakkattalai">
  <meta name="description" content="Kumari Arakkattalai" />
<style>
.img-fluid {
max-width: 100%;
height: auto; 
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: bold;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<!--<a href="menu.php?center_id=2">-->

<img src="images/2.jpeg" style="width:100%;" class="img-fluid" alt="">
  <div class="hero-text">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
    <h1>Kumari BloodDonors</h1>
    <h3><button id="myBtn" style="border-radius: 8px; background-color: #5cb85c;">Go to Blood !</button></h3>
	   Emergency Blood Need
		<h3><a href='tel:8448425409' /><br> 8448425409 </a></h3>
  </div>


<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>

      <h2>Welcome !</h2>
    </div>
    <div class="modal-body">
     <form method="post" action="">
<div class="container">
    <div class="form-group">
<select name="city_id" class="form-control">
	<option value="0">Select City </option>
<?php
	$sql = "select * from ka_city order by id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['city_name'] . '</option>';
	}
?>
</select>
    </div>
    <div class="form-group">
      <select name="blood_group_id" class="form-control">
	<option value="0">Select Blood Group</option>
<?php
	$sql = "select * from ka_blood_group order by id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['blood_nmae'] . '</option>';
	}
?></select>
    </div>

<div class="form-group">
                                        <div class="form-group text-center">
                                            <input required="required" class="btn btn-info"
                                                   type="submit"
                                                   name="submit" value="Start !"/>
                                        </div>
                                    </div> 
								
</div>
   </form>
   


    </div>
	      

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>





