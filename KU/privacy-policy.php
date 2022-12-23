<?php
$page = "About Us";

include 'header.php';
?>        
    <main>
        <!-- welcome message and Achievements area-->
        <div class="maincontainar">
            <div class="bodycontainar">
                <div id="container">
                    <section class="wlcmsg">
                        <h1 class="tittle">
                            Kumari Arakattalai welcomes you!
                            </h1>
                        <p class="msgbody"> Supporting each other in unity irrespective of caste, religion, race and language.
                        <br>
                        India is on the cusp of change. The country is marching into the 21st century, and yet, 
                        we're weighed down by devastating inequalities, by a huge population that remains untouched 
                        by well- meaning acts like the basic need for living healthily, and a large wealth inequality. 
                        At Kumari Arakkattalai, we want to make a difference in the lives of the millions
                         who are not yet fulfilled by day to day life needs.
                        </p>
                    </section>
                    <section class="Achieve">
                    <img src="img/logo.png" alt="">
                    <h2 class="tittle">
                        Kumari Arakattalai's Achievements
                    </h2>
                   <div class="achievebody">
<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
            $notification_count++;
        }
    
	?>
                        <div class="donated">
                            <h3>Donated Blood</h3>
                            <div class="Donatedblood">
                                <h3><?php echo $notification_count; ?></h3>
                                <p>Units</p>
                            </div>
                        </div>
<?php
    $notification_count=0;
    $notification_sql = "select * from patient";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
      
            $notification_count++;
        }
    
	?>
                        <div class="benefited">
                            <h3>Benefited Lives</h3>
                            <div class="Donatedblood">
                                <h3><?php echo $notification_count; ?></h3>
                                <p>Lifes</p>
                            </div>
                        </div>
<?php
    $notification_count=0;
    $notification_sql = "select * from volunteer";
      $notification_result = mysqli_query($conn, $notification_sql);
        while ($notification_row = mysqli_fetch_assoc($notification_result)) {
      
            $notification_count++;
        }
    
	?>
                        <div class="ourvoluntee">
                            <h3>Our Volunteers</h3>
                            <div class="Donatedblood">
                                <h3><?php echo $notification_count; ?></h3>
                                <p>Hearts</p>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>     
        </div>
        
    <!-- vision area-->
        <div class="maincontainar">
            <div id="visioncontainar">
                <section class="visiontitle">
			<div class="bglogo"> <img src="img/newlogo.png" alt=""></div>
                    <style>   
                    .bglogo img {
                    height: 350px;
                    opacity: 0.1;
                    width: auto;
                    position: absolute;
                    top:15vh;
                    right:1vw;
                    pointer-events: none;
                    }
                    </style>
                    <h3>Our Vission</h3>
                </section>
                <section class="visionbody">
                    <p>- To bring 24 hour blood donation service center in Kumari district.
                        <br>
                        - To provide ambulance facilities in emergencies for the needy people even in rural society.
                        <br>
                    </p>
                </section>
                
            </div>
        </div>
    <!-- Mission area-->
        <div class="maincontainar">
            <div id="visioncontainar">
                <section class="visiontitle">
                    <h3>Our Mission</h3>
                </section>
                <section class="visionbody">
                    <p>- To bring the 24 hours blood bank to hospital in delivery all in kanyakumari district.
                        <br>
                        - To help the poor students to graduate or pursue higher education in Kumari district.
                        <br>
                        - To establish a free coaching center for preparing UPSC and TNPSC exams in Kumari.
                        <br>
                        - To establish a care taker center and old age home for homeless destitute in Kumari.</p>
                </section>
            </div>
        </div>
        
    <!-- action to form page area-->
        <div class="maincontainar">
            <div class="actioncontainer">
                <div class="actionareaholder">
                    <div class="actionheader">
                        <div class="actiontitle"><p>Donate Blood</p></div> 
                        <div class="actionimg"><img src="img/2DonateBlood.png" alt=""></div>            
                        <div class="actionmsg"><p>Donate blood now as donor and save lives in urgent time</span></p></div>
                        <div class="actioncardbtn"><a href="donateblood.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                    </div>
                </div>
                <div class="actionareaholder">
                    <div class="actionheader">
                        <div class="actiontitle"><p>Need Blood</p></div> 
                        <div class="actionimg"><img src="img/1NeedBlood.png" alt=""></div>            
                        <div class="actionmsg"><p>Donate blood now as donor and save lives in urgent time</span></p></div>
                        <div class="actioncardbtn"><a href="needblood.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                    </div>
                </div>
                <div class="actionareaholder">
                    <div class="actionheader">
                        <div class="actiontitle"><p>Join with us</p></div> 
                        <div class="actionimg"><img src="img/3Savelife.png" alt=""></div>            
                        <div class="actionmsg"><p>Donate blood now as donor and save lives in urgent time</span></p></div>
                        <div class="actioncardbtn"><a href="newvolunteer.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
<?php
include 'our-team.php';
include 'footer.php';
?>