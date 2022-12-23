<?php
$page = "Events";
include 'header.php';
$event_id = $_GET['id'];

?>        

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
<main>

<div class="container">

<?php
   $sql = "select * from ka_events where id=$event_id";
   $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
   ?>
   <h3><?php echo $row['subject']; ?></h3>
  <div class="row">
   <div class="col-md-8"> 
   
<?php $sql2 = "select * from ka_images where event_id=$event_id";
 $result2 = mysqli_query($conn, $sql2);
 while ($row2 = mysqli_fetch_assoc($result2)) { ?>
   <img class="mySlides" src="admin/photo/<?php echo $row2['photo']; ?>" style="max-width:600px">
 <?php } ?>

<div class="w3-center">
<?php $sql3 = "select * from ka_images where event_id=$event_id";
 $result3 = mysqli_query($conn, $sql3);
 while ($row3 = mysqli_fetch_assoc($result3)) { ?>
  <button class="button" onclick="currentDiv(<?php echo $row3['serial_no']; ?>)"><img src="admin/photo/<?php echo $row3['photo']; ?>" width="100" height="100"></button> 
 <?php } ?>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>
 <h4><?php echo $row['date']; ?> , Author : <?php echo $row['author']; ?></h4></br>
<?php echo $row['description']; ?>

</div>
   <?php } ?>




	<div class="container">

  
<?php
$sql = "select a.*,b.photo from ka_events a,ka_images b where a.id=b.event_id and b.serial_no='1' order by a.date desc limit 2";
  $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
 ?> 
 
 <div class="col-md-3">
                <div class="actionheader">
                    <div class="actiontitle">
                        <p><?php echo $row['date']; ?></p>
                    </div>
                    <div><img src="admin/photo/<?php echo $row['photo']; ?>" alt="" width="270" height="170"></div>
                    <div class="actionmsg">
                        <p><?php echo $row['subject']; ?></span></p>
                    </div>
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
                   <a class="favorite styled"
        type="button" href="events-details.php?id=<?php echo $row['id']; ?>">Read More</a>
</a>
                </div>
           </br>
			</br>
			</br>
			</br>
			</br>
			
    </div>
			
	<?php } ?>	
	
	
  </div>
  </div>
</div>

</main>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</html>
<?php
include 'footer.php';
?>       