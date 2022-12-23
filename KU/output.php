 <div class="maincontainar">
            <div id="teamcontainar">
                <section class="teamtitle">
                    <h3>Our Members</h3>
                </section>
                <section class="teambody">
				 <div class="row">
        <div class="col-md-4"></div>
           <div class="col-md-4">
              <form method="post" action="output-member.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required="required" maxlength="50" placeholder="Enter Full Name">
					<button type="submit" name="submit" class="btn btn-primary" style="float : right">Save</button>
                  </div>
              </form>
        </div>
	  <div class="col-md-4"></div>
     </div>
       <div class="col-md-12">
			 <div class="row">
<?php

$full_name = "";

if (isset($_POST['submit'])) {
  $full_name = trim($_POST['full_name']);
}
  $sql = "select * from ka_users where full_name = '$full_name'";
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
					<center><a class="favorite styled"
        type="button" href="member.php"> More Events</a></center>
                </section>
                
            </div>
        </div>


