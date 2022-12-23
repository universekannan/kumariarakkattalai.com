<?php
$page = "Evencs";
include 'header.php';
?>        
   
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="reset.css"> 
<link rel="stylesheet" type="text/css" href="style.css"> 
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<main>
 <div class="maincontainar">
        <div id="banner">
            <div class="banner1">
                <img src="img/banner1.jfif" alt="">
            </div>
            <div class="banner2">
                <img src="img/banner2.jpg" alt="">
            </div>
            <div class="banner3">
                <img src="img/banner3.jfif" alt="">
            </div>
        </div>
    </div>
     
    <!-- action to form page area-->
    <div class="maincontainar">
        <div class="actioncontainer">
<?php
$sql = "select a.*,b.photo from ka_events a,ka_images b where a.id=b.event_id and b.serial_no='1' order by a.date desc";
  $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
 ?> 

            <div class="actionareaholder">
                <div class="actionheader">
				 	<a href="events-details.php?id=<?php echo $row['id']; ?>" />
                    <div class="actiontitle">
                        <p><?php echo $row['date']; ?></p>
                    </div>
                    <div><center><img src="admin/photo/<?php echo $row['photo']; ?>" alt="" width="270" height="170"></center></div>
                    <div class="actionmsg">
                        <p><?php echo $row['subject']; ?></span></p>
                    </div>
								</a>

<style>
.styled {
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(220, 0, 0, 1);
   
}
</style>
                   
                </div>
            </div>
	<?php } ?>	
			
			
        </div>
    </div>
</main>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</html>
<?php
include 'footer.php';
?>       