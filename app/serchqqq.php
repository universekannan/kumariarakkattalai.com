
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
  <center>
                    <h3>let's Start!</h3>
<form>
<select id="ka_blood_group" onchange="load_ka_postarea()" style="width:200px">
	<option value="0">Select Blood Group</option>
<?php
	$sql = "select * from ka_blood_group order by id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['blood_nmae'] . '</option>';
	}
?>
</select>
<br>
<select id="srh_districts" onchange="load_srh_postarea()" style="width:200px">
	<option value="0">Select Postarea</option>
</select>
<br>
<select id="srh_postarea"  onchange="load_srh_business()"  style="width:200px">
	<option value="0">Select Matching Blood</option>
</select>
<br>
<button type="button" class="btn btn-large btn-success pull-center" onclick="search_web()">Serch Donors- - -  </button>
</form>
                   
</center>
  </div>



<script>
 
 	function load_srh_districts(){
 		var srh_states = $("#srh_states").val();
 		$.ajax({
            url: "serch.php",
            type: "post",
            data: {load_srh_districts: "1", srh_states: srh_states},
            success: function (html) {
                $('#srh_districts').html(html);
            }
        });
 	}

 	function load_srh_postarea(){
 		var srh_states = $("#srh_states").val();
 		var srh_districts = $("#srh_districts").val();
 		$.ajax({
            url: "serch.php",
            type: "post",
            data: {"load_srh_postarea": "1", srh_states: srh_states,srh_districts: srh_districts },
            success: function (html) {
                $('#srh_postarea').html(html);
            }
        });
 	}

 	function load_srh_business(){
 		var srh_states = $("#srh_states").val();
 		var srh_districts = $("#srh_districts").val();
 		var srh_postarea = $("#srh_postarea").val(); 		
 		$.ajax({
            url: "serch.php",
            type: "post",
            data: {"load_srh_business": "1", srh_states: srh_states,srh_districts: srh_districts,srh_postarea: srh_postarea },
            success: function (html) {
                $('#srh_business').html(html);
            }
        });
 	}

 	function load_srh_centers(){
 		var srh_states = $("#srh_states").val();
 		var srh_districts = $("#srh_districts").val();
 		var srh_postarea = $("#srh_postarea").val(); 		
 		var srh_business = $("#srh_business").val(); 	
 		$.ajax({
            url: "serch.php",
            type: "post",
            data: {"load_srh_centers": "1", srh_states: srh_states,srh_districts: srh_districts,srh_postarea: srh_postarea,srh_business: srh_business },
            success: function (html) {
                $('#srh_centers').html(html);
            }
        });
 	}

 	function search_web(){
 		var srh_centers = $("#srh_centers option:selected").val();
 		var url = "contact-us.php?id_centers="+srh_centers+"&sa=Search";
 		window.location.href = url;
 	}
</script>
</body>
</html>





