<?php
$page = "Home";
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
    <!-- Emergency blood needed card area-->
    <div class="maincontainar">
        <div class="cardcontainer">
<?php
$sql = "select * from patient ORDER BY postedDate DESC limit 4";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="cardholer">
                <div class="card">
                    <div class="title">
                        <p class="heart"><?php echo $row['bgroup']; ?></p>
                    </div>
                    <div class="headmsg">
                        <p>Urgent blood needs for</p>
                    </div>
                    <div class="postdate">
                        <p>Posted Date: <span><?php echo $row['postedDate']; ?></span></p>
                    </div>
                       
                    <ul>
					    <li>Blood Grp: <span> <?php echo $row['bgroup']; ?></span></li>
                        <li>Units/Bags: <span> <?php echo $row['needunits']; ?></span></li>
                        <li>Need: <span> <?php echo $row['needDate']; ?></span></li>
                        <li>P Name: <span> <?php echo $row['name']; ?></span></li>
                        <li>Pt Age: <span> <?php echo $row['age']; ?></span></li>
                    </ul>
                <div class="cardbtn">
                    <button type="button" data-toggle="modal" data-target="#staticBackdrop-<?php echo $row['id']; ?>">Details</button>
                </div>
                </div>
            </div>
			
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop-<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Patient Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <!-- <div class="mx-auto text-center"> -->
            <table class="table table-sm table-hover text-center ">
                <tr>
                <th scope="col">Pt Name:</th>
                <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                <th scope="col">Patient Age:</th>
                <td><?php echo $row['age']; ?></td>
                </tr>
                <tr>
                <th scope="col">Patient Gender:</th>
                <td><?php echo $row['gender']; ?></td>
                </tr>
                
                <tr>
                <th scope="col">Blood Group:</th>
                <td><?php echo $row['bgroup']; ?></td>
                </tr>
                <tr>
                <th scope="col">Patient Type:</th>
                <td><?php echo $row['patientType']; ?></td>
                </tr>
                <tr>
                <th scope="col">Disease:</th>
                <td><?php echo $row['disease']; ?></td>
                </tr>
                <tr>
                <th scope="col">Pt Address:</th>
                <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                <th scope="col">Need Blood Units:</th>
                <td><?php echo $row['units']; ?></td>
                </tr>
                <tr>
                <th scope="col">Need on:</th>
                <td><?php echo $row['needDate']; ?></td>
                </tr>
                <tr>
                <th scope="col">Hospital Name:</th>
                <td><?php echo $row['hospital']; ?></td>
                </tr>
                <tr>
                <th scope="col">Blood Bank Adrs:</th>
                <td><?php echo $row['hospitalAddress']; ?></td>
                </tr>
                <tr>
                <th scope="col">Attender Name:</th>
                <td><?php echo $row['attenderName']; ?></td>
                </tr>
                <tr>
                <th scope="col">Attender No:</th>
                <td><?php echo $row['attenderNo']; ?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
        </div>
        </div>
    </div>
    <?php } ?>
        </div>
    </div>
    <!-- welcome message and Achievements area-->
    <div class="maincontainar">
        <div class="bodycontainar">
            <div id="container">
                <section class="wlcmsg">
                    <h1 class="tittle">
                        Kumari Arakattalai welcomes you!
                    </h1>
                    <p class="msgbody"> <b> Supporting each other in unity irrespective of caste, religion, race and language.
                        <br> </b>
                        India is on the cusp of change. The country is marching into the 21st century, and yet, 
                        we're weighed down by devastating inequalities, by a huge population that remains untouched 
                        by well- meaning acts like the basic need for living healthily, and a large wealth inequality. 
                        At Kumari Arakkattalai, we want to make a difference in the lives of the millions
                         who are not yet fulfilled by day to day life needs.</p>
                </section>
			<div class="bglogo"> <img src="img/newlogo.png" alt=""></div>
                    <style>   
                    .bglogo img {
                    height: 350px;
                    opacity: 0.1;
                    width: auto;
                    position: absolute;
                    top:15vh;
                    right:5vw;
                    pointer-events: none;
                    }
                    </style>
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
                <h3>Our Vission</h3>
            </section>
            <section class="visionbody">
                <p>- To bring 24 hour blood donation service center in Kumari district.
                        <br>
                        - To provide ambulance facilities in emergencies for the needy people even in rural society.
                        <br>
                        - To bring the 24 hours blood bank to hospital in delivery all in kanyakumari district.
                        <br>
                        - To help the poor students to graduate or pursue higher education in Kumari district.
                        <br>
                        - To establish a free coaching center for preparing UPSC and TNPSC exams in Kumari.
                        <br>
                        - To establish a care taker center and old age home for homeless destitute in Kumari.
                        </p>
            </section>
        </div>
    </div>
    

    <!-- action to form page area-->
    <div class="maincontainar">
        <div class="actioncontainer">
            <div class="actionareaholder">
                <div class="actionheader">
                    <div class="actiontitle">
                        <p>Donate Blood</p>
                    </div>
                    <div class="actionimg"><img src="img/2DonateBlood.png" alt=""></div>
                    <div class="actionmsg">
                        <p>Donate blood now as donor and save lives in urgent time</span></p>
                    </div>
                    <div class="actioncardbtn"><a href="donateblood.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                </div>
            </div>
            <div class="actionareaholder">
                <div class="actionheader">
                    <div class="actiontitle">
                        <p>Need Blood</p>
                    </div>
                    <div class="actionimg"><img src="img/1NeedBlood.png" alt=""></div>
                    <div class="actionmsg">
                        <p>Our volunteer team help you to get the blood on time as possible</span>
                        </p>
                    </div>
                    <div class="actioncardbtn"><a href="needblood.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                </div>
            </div>
            <div class="actionareaholder">
                <div class="actionheader">
                    <div class="actiontitle">
                        <p>Join with us</p>
                    </div>
                    <div class="actionimg"><img src="img/3Savelife.png" alt=""></div>
                    <div class="actionmsg">
                        <p>Donate Join with us to support our initiative and save lives in urgent time</span>
                        </p>
                    </div>
                    <div class="actioncardbtn"><a href="newvolunteer.php">CLICK HERE TO FILL THE FORM NOW</a></div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
</html>
<?php
include 'our-team.php';
include 'footer.php';
?>       