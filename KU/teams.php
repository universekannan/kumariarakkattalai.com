 <div class="maincontainar">
            <div id="teamcontainar">
                <section class="teamtitle">
                    <h3>Our Members</h3>
                </section>
                <section class="teambody">
    <div class="container">
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
	     <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="myDIV">	
			 <div class="row">
			  
<?php
$sql = "select * from ka_users ORDER BY id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>		

 <div class="md-3" style="width: 260px; padding: 10px; border: 5px solid gray; margin: 0;">
<center>
                                    <img src="admin/photo/user.jpg" alt="<?php echo $row['full_name']; ?>" title="<?php echo $row['full_name']; ?>" width="200" height="250">
                                    <?php echo $row['full_name']; ?></br>
                                    Reg No : KA<?php echo $row['reg_id']; ?></br>
                                    <a href="tel:<?php echo $row['mobile']; ?>"></br>
									<?php echo $row['mobile']; ?></center>
								</div>
                       <?php } ?>
                    
                    </div>
                    </div>
                </section>
            </div>
        </div><script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>