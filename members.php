<?php
   $page = "Home";
   include 'admin/config.php';
   ?>   
<!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="utf-8">
         <title>Members Arakkattalai - குமரி அறக்கட்டளை</title>
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
         <meta name="description" content="Kumari Arakkattalai">
         <meta name="author" content="Kumari Arakkattalai">
         <link rel="shortcut icon" href="images/favicon.png" />
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
         <link href="css/animate.css" rel="stylesheet" type="text/css" >
         <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
         <link href="css/venobox.css" rel="stylesheet" type="text/css" >
         <link rel="stylesheet" href="css/styles.css" />
      <body>
         <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
         </div>
         <?php include "header.php"; ?>
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3>
                            Members
                        </h3>
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Members
                        </p>
                    </div>
                </div> 
            </div> 
        </section> 
		
         <section class="cta-section-2">
            <div class="container">
               <form role="form">
               <div class="form-group col-md-4"></div>   <div class="form-group col-md-4">      <div class="form-group col-md-4"></div> 
                           <input class="form-control" autocomplete="off" placeholder="Search Name..." type="text" id="live_search">
                         </div>
                      </form>

                      <div class="col-md-12 col-sm-12 text-center">
                        <br>
                      <div id="search_result"></div>
                   </div>

               <div class="row">
                  <div class="col-md-12 col-sm-12 text-center">
                     <h2 class="section-heading"><span>We Are Happy </span> To Support You</h2>
                     <p class="section-subheading">Donate Join with us to support our initiative and save lives in urgent time</p>
                  </div>
                 
               </div>
               <div class="row">
<?php
     $sql = "select * from ka_users ORDER BY id limit 16";
     $result = mysqli_query($conn, $sql);
     while ($row = mysqli_fetch_assoc($result)) {
?>	
                  <div class="col-lg-3 col-md-offset-0 col-md-2 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 field_error">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="#" title="<?php echo $row['full_name']; ?>">
                           <img src="admin/photo/users/<?php echo $row['photo']; ?>" alt="<?php echo $row['full_name']; ?>" width="500" height="250"/>
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

         </section>
		    <section class="cta-section-1">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        You can give blood at any of our blood donation venues all over the world. 
                        We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <a class="btn btn-cta-1" href="all-members.php">READ MORE</a>
                  </div>
               </div>
            </div>
         </section>
         <?php include "footer.php"; ?>
         <a id="backTop">Back To Top</a>
         <script src="js/jquery.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/wow.min.js"></script>
         <script src="js/jquery.backTop.min.js"></script>
         <script src="js/waypoints.min.js"></script>
         <script src="js/waypoints-sticky.min.js"></script>
         <script src="js/owl.carousel.min.js"></script>
         <script src="js/jquery.stellar.min.js"></script>
         <script src="js/jquery.counterup.min.js"></script>
         <script src="js/venobox.min.js"></script>
         <script src="js/custom-scripts.js"></script>
         <script src="js/typeahead.js"></script>

      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script type="text/javascript">

$(document).ready(function(){
      $("#live_search").keyup(function(){

         var input = $(this).val();
         //alert(input);
        if (input != ""){
         $.ajax({
           
           url:"search.php",
           method:"POST",
           data:{input:input},

           success:function(data){
            $("#search_result").html(data);
            $("#search_result").css("display","block");
            $('.field_error').hide();
           }
         });
      }else{
         $("#search_result").css("display","none");
         $('.field_error').css("display","block");

        } 

      });
        
    });
</script>
    
   </body>
      
   </html>