 <?php
include "admin/config.php";
?>        

   <?php include("header.php"); ?>

<!-- Image Gallery area-->
        <div class="maincontainar">
            
            
<?php
    $sql = "SELECT * FROM gallery order by uploadDate desc";
    $result = mysqli_query($connDB,$sql);
    $i=1;
    while($row = $result->fetch_assoc()) {
?> 
           <div class="singulgallerycontainar">
                <section class="gallerytitle">
                    <h3>
                    <?= $row['subject']; ?>
                    </h3>
                    <p>Posted by: <span><?= $row['author']; ?></span></p>
                    <p>On <span><?= date('Y-m-d, h:i a', strtotime($row['uploadDate'])); ?></span></p>
                </section>
                
                <section class="gallerybody">
                    <p>
                    <?= $row['description']; ?>
                    </p>
                </section>
                    <section class="teambody">
                    <div class="row">


                        <div class="igrow">
                            
                        <?php
                                $postID = $row['postID']; 
                                $imgQuery = "SELECT * FROM images WHERE postID='$postID'";
                                $images = mysqli_query($connDB,$imgQuery);
                                while($current = $images->fetch_assoc()) {
                                    $imageURL = 'uploads/'.$current['fileName'];
                                ?>
                                    <div class="igcolumn">
                                        <img src="<?= $imageURL; ?>" onclick="igopenModal(<?= $i; ?>,this);">
                                    </div>

                                <?php
                                $i++;
                                }
                         ?>
                            
                        </div>
                        
                        
    
                    </div>
                </section>
                
            </div>

    <?php
    }
    ?>        
            
            <div id="igmyModal" class="igmodal">
                <span class="igclose igcursor" onclick="igcloseModal()">&times;</span>
                <div class="igmodal-content">
            <?php
            $imgQuery = "SELECT * FROM images order by uploadDate desc";
            $images = mysqli_query($connDB,$imgQuery);
                while($current = $images->fetch_assoc()) {
                        $imageURL = 'uploads/'.$current['fileName'];
                        $size = getimagesize($imageURL);
                        $width = $size[0];
                        $height = $size[1];
                    ?>
                        <div class="igmySlides">
                            <img src="<?= $imageURL; ?>" class="<?php if($height > $width) echo 'portrait'; else echo 'landscape';?>">
                        </div>

                    <?php
                    }
                ?>
            
                <a class="igprev" onclick="igminusSlides()">&#10094;</a>
                <a class="ignext" onclick="igplusSlides()">&#10095;</a>
            
                </div>
            </div>

            
        </div>       
                    
                                        
<?php
include 'footer.php';
?>      