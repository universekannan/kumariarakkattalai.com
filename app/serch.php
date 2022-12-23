 <?php
include "admin/config.php";

$blood_group_id = "";
$postarea_id = "";
    
if (isset($_POST['submit'])) {
    $blood_group_id = trim($_POST['blood_group_id']);
    $postarea_id = trim($_POST['postarea_id']);

        header("location: donors.php?blood_group_id=$blood_group_id&postarea_id=$postarea_id");
    }
?>

<!DOCTYPE html>
<!-- saved from url=(0062)#test -->
<html lang="en" class=" js cssanimations csstransitions"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script async="" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?_=1579416174831"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Services</title>
<meta name="Description" content="Services">
<meta name="Keywords" content="Services">
        <!-- Load Roboto font position: fixed; -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">


				  <style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  text-align: center;
  top: 0;
  width: 100%;

}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 150px; /* Used in this example to enable scrolling */
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}
</style>
</head>
<body style="background: #7198C1;" >

<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
</div>

<div class="main">

 <center>
                               <img src="images/logo.png" width="100" height="100" alt="project 1" />

                    <h3>let's Start!</h3>
     <form method="post" action="">

<select name="postarea_id" style="width:200px">
	<option value="0">Select Postarea </option>
<?php
	$sql = "select * from ka_postarea order by id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['postarea_name'] . '</option>';
	}
?>
</select>
<br>
<select name="blood_group_id" style="width:200px">
	<option value="0">Select Blood Group</option>
<?php
	$sql = "select * from ka_blood_group order by id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo '<option value="' . $row['id'] . '">' . $row['blood_nmae'] . '</option>';
	}
?></select>
<br>
<br>
<button  type="submit" name="submit" class="btn btn-large btn-success pull-center">Serch Donors . . .  </button>
</form>
                   
</center>
</div>
<div class="footer">
  <p>Footer</p>
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

</body></html>