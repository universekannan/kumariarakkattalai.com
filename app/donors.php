<?php
include "../admin/config.php";
$blood_group_id=$_GET['blood_group_id'];
$city_id=$_GET['city_id'];
?>

<!DOCTYPE html>
<!-- saved from url=(0062)#test -->
<html lang="en">
<title>Kumari Arakkattalai</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
   <style>
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<style type="text/css">
        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px
            ;min-width: 35px;
            text-align: center;
        }
        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            }
        .qty .minus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial,sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }
        </style>

		<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 4px;
  text-align: left;
}

.header {

  position: fixed;
   left: 0;
   yop: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}
.content {
  padding: 16px;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.sticky + .content {
  padding-top: 102px;
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
<body>
<div class="header">
  <!--<a class="btn btn-info" onclick="goBack()">Go Back</a>-->
  
  <p>Kumari Arakkattalai Donors</p>
</div>	
<div class="top-container">
 <div style="min-height: 52px" id="1"></div> 
 <div class="w3-content" >
<div class="w3-black" >

			<?php
            $sql = "select a.*,b.blood_nmae,c.city_name from donor a,ka_blood_group b,ka_city c where a.blood_group_id=b.id and a.city_id=c.id and a.blood_group_id='$blood_group_id' and a.city_id='$city_id'";
               // $sql = "select * from donor where blood_group_id='$blood_group_id' and city_id='$city_id'";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
             ?>

    <div class="w3-container w3-content w3-padding-64" style="max-width:400px">    
      <div class="w3-padding-20 w3-ul quantity_span " style="margin-bottom: 5px">
        <img src="../admin/photo/<?php echo $row['photo']; ?>" alt="Image" class="w3-left w3-margin-right" style="width:40px; border-radius: 8px;" data-toggle="modal" data-target="#exampleModalLong<?php echo $row['id']; ?>">
		
        <span class="w3-large"><?php echo $row['full_name']; ?>
		
		<a class="w3-large pull-right" href='tel:<?php echo $row['mobile']; ?>'><img src="https://galaxytechnologypark.com/data/call.png" style="width:30px;"></a>
		 
		<a class="w3-large pull-right" href='https://api.whatsapp.com/send?phone=91<?php echo $row['mobile']; ?>'><img src="https://galaxytechnologypark.com/data/w1.jpg" style="width:30px;"></a>
</span>
		<!--<span class="w3-large pull-right"> <?php echo $row['blood_nmae']; ?></span>-->
		<hr>
        <!--<div class="add_button_span" >
        <div class="add_button_span" >		          
		<span  class="w3-large pull-right"><i class="fa fa-eye" data-toggle="modal" data-target="#exampleModalLong<?php echo $row['id']; ?>"></i>&nbsp; &nbsp; &nbsp; <a class="w3-large pull-right" href='tel:<?php echo $row['mobile']; ?>'>  <i class="fa fa-phone"></i></a> 
</span>

          </div>
		  
      </div>-->
    </div>  

  </div>
  
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
  color: white;
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

<!-- Modal -->
<div class="modal fade" id="exampleModalLong<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['full_name']; ?></h5></center>

      </div>
      <div class="modal-body" style="background-color: #240a0a;">
         <center> <img src="../admin/photo/<?php echo $row['photo']; ?>" alt="Image" style="width:100px; border-radius: 8px;" ></br>
    	
		<table>
  <tr>
    <td>CityName</td>
    <td><?php echo $row['city_name']; ?></td>
  </tr>
  <tr>
    <td>BloodGroup</td>
    <td><?php echo $row['blood_nmae']; ?></td>
  </tr>
  <tr>
    <td>LastDate</td>
    <td><?php echo $row['lastup_date']; ?></td>
  </tr>  <tr>
    <td>Mobile</td>
    <td><?php echo $row['mobile']; ?></td>
  </tr>  <tr>
    <td><?php echo $row['address_1']; ?> <?php echo $row['address_2']; ?></td>
  </tr>
</table></center>
      </div>
	  
      <div class="modal-footer">
       <center> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


   <?php } ?>
</div>

<div class="footer">
<style>
.whatapp {
   position: fixed;
   left: 20px;
   bottom: 5px;
  
   z-index:9999;
   color: white;
   text-align: center;
   width:50px;
   height:50px;
}
.whatapps {
   position: fixed;
   right: 20px;
   bottom: 5px;
  
   z-index:9999;
   color: white;
   text-align: center;
   width:50px;
   height:50px;
}
.center {
   position: fixed;
   center: 20px;
   bottom: 5px;
  
   z-index:9999;
   color: white;
   text-align: center;
   width:50px;
   height:50px;
}
</style> 
<div class="whatapp">
  <a  href="https://api.whatsapp.com/send?phone=919042127007&text=Hi" class="whatapp">
  <img src="https://galaxytechnologypark.com/data/whats.png" class="whatapp"></a> 
</div>
  <a href="more.php">
  <img src="https://galaxytechnologypark.com/data/more.png" class="center"></a> 
  
    <a href="whatsapp://send?text=https://hindustandeal.com/" data-action="share/whatsapp/share" target="_blank">
	<img src="https://galaxytechnologypark.com/data/share.png" class="whatapps"></a> 
	</a>  </div>	
</div>	


</body></html>

<!-- Page content -->


<script src="js/jquery-2.1.4.min.js"></script>  
<script src="js/bootstrap.min.js"></script>  
<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>
