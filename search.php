<?php

include ("admin/config.php");
if(isset($_POST['input'])){
  $input = $_POST['input'];
  $sql = "select * from ka_users where full_name like '{$input}%'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) { ?>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

     <div class="col-lg-3 col-md-offset-0 col-md-2 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 row">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="#" title="<?php echo $row['full_name']; ?>">
                           <img src="admin/photo/users/<?php echo $row['photo']; ?>" alt="<?php echo $row['full_name']; ?>" width="400" height="250"/>
                           </a>
                        </figure>
                        <article class="team-info">
                           <h3><?php echo $row['full_name']; ?></h3>
                           <h4>Reg No : KA<?php echo $row['reg_id']; ?></h4>
                           <h4><a style="color : whitesmoke;" href="tel:<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a></h4>
                        </article>
                        <div class="team-content">
                           <div class="team-social-share text-center clearfix">
                              <a class="fa fa-facebook rectangle" href="#" title="Facebook"></a>
                              <a class="fa fa-twitter rectangle" href="#" title="Twitter"></a>
                              <a class="fa fa-google-plus rectangle" href="#" title="Google Plus"></a>
                              <a class="fa fa-linkedin rectangle" href="#" title="Linkedin"></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
      <?php
  }else{

        echo "<h5 style='color : black' class='text-danger'>No data found</h5>";
  }


}
?>