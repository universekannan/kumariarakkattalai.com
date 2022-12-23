<?php
include "../config.php";
$blood_group_id=$_GET['blood_group_id'];
$city_id=$_GET['city_id'];
    //fetch table rows from mysql db
    //$sql = "select * from ka_city";
    //$sql = "select a.*,b.blood_nmae,c.city_name from donor a,ka_blood_group b,ka_city c where a.blood_group_id=b.id and a.city_id=c.id and a.blood_group_id='$blood_group_id' and a.city_id='$city_id'";
  //$sql = 'SELECT ka_city.*, donor.* FROM ka_city LEFT JOIN donor ON ka_city.id = donor.city_id';
  
  $sql = "SELECT d.full_name, d.gender, d.age, d.mobile, d.address, d.email, d.last_onated_date, d.emergency_contact, d.emergency_contact_relationship, d.emergency_mobile, d.photo, c.city_name, bg.blood_nmae FROM donor d, ka_city c, ka_blood_group bg WHERE d.city_id = c.id AND d.blood_group_id = bg.id  AND c.id = '$city_id' AND bg.id = '$blood_group_id'";

    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($conn);
	 
?>