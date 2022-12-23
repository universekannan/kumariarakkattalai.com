<?php
$page = "Members";
include 'header.php';

$found = false;
$full_name = "";

if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $sql = "select * from ka_users where full_name='$full_name'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {
        $found = true;
    }
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
	print_r($result);die;

}
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
    <!-- Emergency blood needed card area-->
  
  
</main>


 <div class="maincontainar">
            <div id="teamcontainar">
                <section class="teamtitle">
                    <h3>Our Members</h3>
                </section>
                <section class="teambody">
    <div class="container">
       <div class="col-md-12">
			 <div class="row">

<?php
$sql = "select * from ka_users where full_name LIKE 'a%'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>					
 <div class="md-3">
                        <div class="columnrespontv">
                            <div class="our-team">
                                <div class="photo">
                                    <img src="admin/photo/users/<?php echo $row['photo']; ?>" alt="">
                                </div>
                                <div class="team-cnt">
                                    <h3 class="tle"><?php echo $row['full_name']; ?></h3>
                                    <h3 class="tle">Reg No : KA<?php echo $row['reg_id']; ?></h3>
                                    <span class="kapost"><?php echo $row['address']; ?></span>
                                    <a href="tel:<?php echo $row['mobile']; ?>"><h3 class="kamobile"><?php echo $row['mobile']; ?></h3></a>
                                </div>
                                <ul class="social1">
                                    <li><a href="" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
					</div>
                       <?php } ?>
                    </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
<?php
include 'footer.php';
?>       
</html>