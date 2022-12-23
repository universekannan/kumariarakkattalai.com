<?php
   $page = "Home";
   include 'admin/config.php';
   ?>   
<!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="utf-8">
         <title>Kumari Arakkattalai - குமரி அறக்கட்டளை</title>
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
         <section class="section-banner">
            <div class="container wow fadeInUp">
               <div class="row">
                  <div class="col-md-12 col-sm-12 text-center">
                     <div class="banner-content">
                        <h2>
                           Donate blood and get real blessings.
                        </h2>
                        <h3>Blood is the most precious gift that anyone can give to another person.<br>
                           Donating blood not only saves the life also save donor's lives.
                        </h3>
                        <a href="donate.php" class="btn btn-slider">GET IN TOUCH</a>   
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="cta-section-1">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                     <h2>We are helping people from 4 years</h2>
                     <p>
                        You can give blood at any of our blood donation venues all over the world. 
                        We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                     </p>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <a class="btn btn-cta-1" href="donate.php">Get In Touch</a>
                  </div>
               </div>
            </div>
         </section>
		 
         <section class="section-counter"  data-stellar-background-ratio="0.3">
            <div class="container wow fadeInUp">
               <div class="row">
<?php
$sql = "select * from patient ORDER BY postedDate DESC limit 4";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                     <div class="counter-block-1 text-center">
                        <h2>
                          <?php echo $row['bgroup']; ?>
                        </h2>
                        <h4>
                           <div class="headmsg">
                              <p>Urgent blood needs for</p> 
                           </div>
                           <div class="postdate">
                             <p>Posted Date: <span><?php echo $row['postedDate']; ?></span></p>
                           </div>
                           <div class="postdate">
								<p>Blood Grp: <span> <?php echo $row['bgroup']; ?></span></p>
								<p>Units/Bags: <span> <?php echo $row['needunits']; ?></span></p>
								<p>Need: <span> <?php echo $row['needDate']; ?></span></p>
								<p>P Name: <span> <?php echo $row['name']; ?></span></p>
								<p>Pt Age: <span> <?php echo $row['age']; ?></span></p>
                           </div> 
                        </h4>
                        <a href="needblood.php" class="btn btn-load-more">- Load More -</a>
                     </div>
                  </div>
    <?php } ?>
               </div>
            </div>
            </div> 
         </section>
         <style>
            .about-img a {
            color: rgb(239, 61, 50);
            font-size: 40px;
            height: 100px;
            left: 50%;
            line-height: 70px;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 100px;
            margin-left: -50px;
            margin-top: -50px;
            background: rgba(0, 0, 0, 0.5);
            border-width: 5px;
            border-style: solid;
            border-color: rgb(230, 230, 230);
            border-image: initial;
            border-radius: 100%;
            padding: 10px;
            }
            .about-img a:hover {
            color: rgb(230, 230, 230);
            background: rgba(0, 0, 0, 0.8);
            border-width: 5px;
            border-style: solid;
            border-color: rgb(239, 61, 50);
            border-image: initial;
            }
            .fa {
            display: inline-block;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            font: normal normal normal normal normal normal normal 1 FontAwesome;
            }
            element.style {
            visibility: visible;
            animation-name: bounceIn;
            }
         </style>
         <section class="section-content-block">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12 text-center">
                     <h2 class="section-heading"><span>Who We </span> Are ?</h2>
                     </br>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="">Supporting each other in unity irrespective of caste, religion, race and language.India is on the cusp of change. The country is marching into the 21st century, and yet, we're weighed down by devastating inequalities, by a huge population that remains untouched by well- meaning acts like the basic need for living healthily, and a large wealth inequality. At Kumari Arakkattalai, we want to make a difference in the lives of the millions who are not yet fulfilled by day to day life needs.</p>
                     </div>
                  </div>
               </div>
			   <br>
               <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                     <div class="about-us-container theme-custom-box-shadow">
                        <div class="about-details">
                           <div class="col-lg-12 col-md-12 col-sm-12 text-left no-img-separator">
                              <h2><strong>Our Vission</strong></h2>
                              <span class="heading-separator heading-separator-horizontal"></span>
                           </div>
                           <ul class="custom-bullet-list">
                              <li>- To bring 24 hour blood donation service center in Kumari district.</li>
                              <li>- To provide ambulance facilities in emergencies for the needy people even in rural society.</li>
                           </ul>
						    <br>
                           <div class="col-lg-12 col-md-12 col-sm-12 text-left no-img-separator">
                              <h2><strong>Our Mission</strong></h2>
                              <span class="heading-separator heading-separator-horizontal"></span>
                           </div>
                           <ul class="custom-bullet-list">
                              <li>- To bring the 24 hours blood bank to hospital in delivery all in kanyakumari district.</li>
                              <li>- To help the poor students to graduate or pursue higher education in Kumari district.</li>
                              <li>- To establish a free coaching center for preparing UPSC and TNPSC exams in Kumari.</li>
                              <li>- To establish a care taker center and old age home for homeless destitute in Kumari.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                     <figure class="about-img theme-custom-box-shadow">
                        <a class="venobox wow bounceIn" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=nrJtHemSPW4"><i class="fa fa-play"></i></a>                                
                        <img src="images/about.png" alt="about" />
                     </figure>
                  </div>
               </div>
            </div>
         </section>

<!-- Section End -->         
		
        <!--  SECTION COUNTER   -->

        <section class="section-counter">

            <div class="container wow fadeInUp">

                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                        <div class="counter-block-1 text-center">

<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
    
	?>
                            <i class="fa fa-heartbeat icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Donated Blood</h4>
                          <a href="donate.php" class="btn btn-load-more">- Read More -</a>
                        </div>

                    </div> <!--  end .col-lg-3  -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                        <div class="counter-block-1 text-center">
<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
	?>
                            <i class="fa fa-stethoscope icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Benefited Lives</h4>
                            <a href="events.php" class="btn btn-load-more">- Read More -</a>
                        </div>

                    </div> <!--  end .col-lg-3  -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="counter-block-1 text-center">
<?php
    $notification_count=0;
    $notification_sql = "select * from volunteer";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
	?>
                            <i class="fa fa-users icon"></i>
                            <span class="counter"><?php echo $notification_count; ?></span>
                            <h4>Our Volunteers</h4>
                            <a href="volunteers.php" class="btn btn-load-more">- Read More -</a>
                        </div>

                    </div> <!--  end .col-lg-3  -->

                   
                </div> <!-- end row  -->

            </div> <!--  end .container  -->

        </section> <!--  end .section-counter -->


         <section class="cta-section-2">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12 text-center">
                     <h2 class="section-heading"><span>Our Core</span> Energetic Team</h2>
                     <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-3 col-md-offset-0 col-md-2 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="" title="Kumari Rajendran">
                           <img src="images/Ragendran New3.jpeg" alt="Kumari Rajendran"/>
                           </a>
                        </figure>
                        <article class="team-info">
                           <h3>Kumari Rajendran</h3>
                           <h4>President</h4>
                           <h4>844 842 5409</h4>
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
                  <div class="col-lg-3 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="#" title="Aneesh Singh">
                           <img src="images/Aneesh.jpg" alt="Aneesh Singh" />
                           </a>
                        </figure>
                        <article class="team-info">
                           <h3>Aneesh Singh</h3>
                           <h4>Vice President</h4>
                           <h4>995 253 8403</h4>
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
                  <div class="col-lg-3 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="#" title="Sibin">
                           <img src="images/Sibin1.jpg" alt="Sibin" />
                           </a>                               
                        </figure>
                        <article class="team-info">
                           <h3>Sibin</h3>
                           <h4>Secretary</h4>
                           <h4>975 078 7151</h4>
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
                  <div class="col-lg-3 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="team-layout-1">
                        <figure class="team-member">
                           <a href="#" title="Mahammed Nabeel">
                           <img src="images/MahammedNabeel1.jpg" alt="Mahammed Nabeel" />
                           </a>                               
                        </figure>
                        <article class="team-info">
                           <h3>Mahammed Nabeel</h3>
                           <h4>Vice Secretary</h4>
                           <h4>759 871 8050</h4>
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
         </section>
         <section class="section-content-block section-secondary-bg section-our-team">
         <div class="container wow fadeInUp">
         <div class="row section-heading-wrapper">
         </div>
         <div class="row">
         <div class="col-lg-4 col-md-offset-0 col-md-2 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
         <div class="team-layout-1">       
         <figure class="team-member">
         <a href="#" title="Manoj">
         <img src="images/Manoj1.jpg" alt="Manoj"/>
         </a>
         </figure>
         <article class="team-info">
         <h3>Manoj</h3>                                   
         <h4>Treasurer</h4>
         <h4>740 202 3509</h4>
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
         <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
         <div class="team-layout-1">       
         <figure class="team-member">
         <a href="#" title="Prakash">
         <img src="images/Prakash3.jpg" alt="Prakash" />
         </a>
         </figure>
         <article class="team-info">
         <h3>Prakash</h3>                                   
         <h4>Coordinator</h4>
         <h4>965 586 7931</h4>
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
         <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
         <div class="team-layout-1">       
         <figure class="team-member">
         <a href="#" title="Akash">
         <img src="images/Akash1.jpg" alt="Akash" />
         </a>                               
         </figure> 
         <article class="team-info">
         <h3>Akash</h3>                                   
         <h4>Vice Co-Ordinator</h4>
         <h4>944 245 7739</h4>
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
         </div>  
         </div>
         </div> 
         </div>
         </section> 
         <section class="cta-section-2">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                     <h2>We are helping people from 4 years</h2>
                     <p>
                        You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                     </p>
                     <a class="btn btn-cta-2" href="https://play.google.com/store/apps/details?id=com.kumariarakkattalai.kumariblooddonors">Play Store</a>
                  </div>
               </div>
            </div>
         </section>
         
         <section class="section-appointment">
            <div class="container wow fadeInUp">
               <div class="row">
                  <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
                     <figure class="appointment-img">
                        <img src="images/appointment.jpg" alt="appointment image">
                     </figure>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="appointment-form-wrapper text-center clearfix">
                        <h3 class="join-heading">Give The Gift Of Life</h3>
                   
                        <div class="row">
                          <img style="position: absolute; margin-left: 115px;" alt="kumari1" src="images/process_4.png" class="center">

                            <div class="col-lg-12 col-md-6 hidden-sm hidden-xs"> 

                            <form action="" method="post">
                        <div class="form-group col-md-8">
                         <input id="name" name="name" class="form-control" placeholder="Enter Name" type="name">
                        </div>

                        <div class="form-group col-md-8">
                         <input id="mobile" class="form-control" name="number" placeholder="Mobile" type="text">
                        </div>
                          
                        <div class="form-group col-md-8">
                         <input id="email" name="email" class="form-control" placeholder="Email" type="text">
                        </div>

                        <div class="form-group col-md-12">
                         <textarea id="message" name="message" class="form-control" rows="4" placeholder="Your Message..."></textarea>
                        </div>    

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <button id="btn_submit" class="btn-submit" type="submit">Submit</button>
                                </div>
                                </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="section-content-block section-home-blog section-pure-white-bg">
            <div class="container wow fadeInUp">
               <div class="row section-heading-wrapper">
                  <div class="col-md-12 col-sm-12 text-center">
                     <h2 class="section-heading">Recent Blog</h2>
                     <p class="section-subheading">
                        Latest news and statements regarding giving blood, blood processing and supply.
                     </p>
                  </div>
               </div>
               <div class="row">
<?php
$sql = "select a.*,b.photo from ka_events a,ka_images b where a.id=b.event_id and b.serial_no='1' order by a.date desc limit 3";
  $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
 ?> 

 <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
                     <div class="latest-news-container">
                        <a href="events-details.php?id=<?php echo $row['id']; ?>">
                           <figure>
                              <img src="admin/photo/<?php echo $row['photo']; ?>" alt="<?php echo $row['subject']; ?>">
                           </figure>
                        </a>
                        <div class="news-content">
                           <h3>
                              <a href="events-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></a>
                           </h3>
                           <div class="news-meta-info">
                              <i class="fa fa-clock-o"></i> <?php echo $row['date']; ?>
                              &nbsp; <i class="fa fa-comment-o"></i> <?php echo $row['id']; ?> Comments
                           </div>
                         <!--  <div class="update-details">                                     
                              In many countries, demand exceeds supply, and blood services face the challenge of making blood available for patient. 
                           </div>-->
                        </div>
                     </div>
                  </div>
   <?php } ?>
                 
				 
               </div>
               <div class="row">
                  <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                     <a href="events.php" class="btn btn-load-more">- Load More Blog -</a>
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
      </body>
   </html>