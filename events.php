<?php
$page = "Events";
include 'admin/config.php';
?>   

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
   <head> 
        <meta charset="utf-8">
        <title>Events Arakkattalai - குமரி அறக்கட்டளை</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Kumari Arakkattalai">
        <meta name="author" content="Kumari Arakkattalai">
        <link rel="shortcut icon" href="images/favicon.png" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- The styles -->
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
        <!--  HEADER -->
        <?php include "header.php"; ?>
        
		  <section class="page-header">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">

                        <h3>
                            Events
                        </h3>

                        <p class="page-breadcrumb">
                            <a href="index.php">Home</a> / Events
                        </p>


                    </div>


                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->
      <section class="main-content">

            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12">
	
<?php
  $sql = "select a.*,b.photo from ka_events a,ka_images b where a.id=b.event_id and b.serial_no='1' order by a.date desc limit 10";
  $result = mysqli_query($conn, $sql);
   while ($row = mysqli_fetch_assoc($result)) {
 ?> 		
                        <article class="post single-post">

                            <div class="single-post-content">

                                <a title="" href="events-details.php?id=<?php echo $row['id']; ?>">
                                    <img alt="" src="admin/photo/<?php echo $row['photo']; ?>" />
                                </a>

                            </div> <!-- end .bd-view  -->

                            <div class="single-post-title">

                                <h2>
                                    <a href="events-details.php?id=<?php echo $row['id']; ?>">
                                        <?php echo $row['subject']; ?>
                                    </a>
                                </h2> <!--  end blog-post-title  -->

                                <p class="single-post-meta">                           

                                    <i class="fa fa-user"></i>
                                    &nbsp;Deborah Beck

                                    &nbsp;<i class="fa fa-book"></i>
                                    &nbsp;<a title="View all posts" href="events-details.php?id=<?php echo $row['id']; ?>"> Relation </a>

                                    &nbsp;<i class="fa fa-calendar"></i>
                                    &nbsp;<?php echo $row['date']; ?>

                                </p>
                              
                            </div> 

                        </article>
 <?php }  ?>
						</div> 
						
						 <div class="col-md-4 col-sm-12">

                        <div class="widget site-sidebar">

                            <h2 class="widget-title">Search</h2>

                            <form action="https://templates.bwlthemes.com/blood_donation/index.html" id="search-form" class="search-form" role="form" method="get">

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search....">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                </div>

                                <input type="hidden" value="submit" />

                            </form> <!-- end #search-form  -->

                        </div> <!--  end .widget -->            


                        <div class="widget site-sidebar">

                            <h2 class="widget-title">Categories</h2>

                            <ul class="widget-post-category clearfix">
                                <li>
                                    <a title="View all posts filed under Environment" href="#">Blood Relation</a>
                                    <span class="pull-right badge">42</span>
                                </li>
                                <li>
                                    <a title="View all posts filed under Technology" href="#">AB- Blood donor</a>
                                    <span class="pull-right badge">40</span>
                                </li>
                                <li>
                                    <a title="View all posts filed under Health" href="#">Keep Safe Blood</a>
                                    <span class="pull-right badge">32</span>
                                </li>
                                <li>
                                    <a title="View all posts filed under Disaster" href="#">Preserve Blood</a>
                                    <span class="pull-right badge">26</span>
                                </li>
                                <li>
                                    <a title="View all posts filed under Environment Right" href="#">Donation center</a>
                                    <span class="pull-right badge">18</span>
                                </li>
                                <li>
                                    <a title="View all posts filed under Education" href="#">Proper Education</a>
                                    <span class="pull-right badge">12</span>
                                </li>
                            </ul>

                        </div> <!--  end .widget -->

                        <div class="widget site-sidebar">

                            <h2 class="widget-title">Recent Posts</h2>

                            <div class="single-recent-post">
                                <a href="#">Zomato Commits to Making Food Delivery</a>
                                <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 19, 2017</span>
                            </div>

                            <div class="single-recent-post">
                                <a href="#">Make Kalam's House A Knowledge Centre</a>
                                <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 18, 2017</span>
                            </div>

                            <div class="single-recent-post">
                                <a href="#">Central Government Retracts Proposal</a>
                                <span><i class="fa fa-calendar icon-color"></i>&nbsp; April 17, 2017</span>
                            </div>

                        </div> <!--  end .widget -->

                        <div class="widget site-sidebar">

                            <h2 class="widget-title">Tags</h2>

                            <ul class="widget-recent-tags clearfix">

                                <li>
                                    <a href="#" title=""> claycold</a> 
                                </li>

                                <li>
                                    <a href="#" title=""> crushing</a> 
                                </li>

                                <li>
                                    <a href="#" title=""> chattels</a> 
                                </li>

                                <li>
                                    <a href="#" title=""> dinarchy</a> 
                                </li>

                                <li>
                                    <a href="#" title=""> cienaga</a> 
                                </li>

                                <li>
                                    <a href="#" title=""> doolie</a> 
                                </li>

                            </ul><!--  end .widget-recent-tags -->

                        </div> <!--  end .widget -->

                    </div> 
						</div> 
		
						</div> 
						</section>

        <?php include "footer.php"; ?>
        <!-- END FOOTER  -->
        <!-- Back To Top Button  -->
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