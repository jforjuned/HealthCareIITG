<?php

session_start();


include("connection.php");

$did = $_GET['did'];
$uid = $_GET['uid'];
$day = $_GET['day'];
$from = $_GET['tfrom'];
echo $did;
echo $uid;
echo $day;
echo $from;
$d = "Update slot set pid='$uid' where did='$did' and day = '$day' tfrom='$from' status != 'Booked' ";
echo $d;
$d = "UPDATE `slot` SET `pid` = '$uid',`status`='Booked' WHERE `slot`.`did` = '$did' AND `slot`.`day` = '$day' AND `slot`.`tfrom` = $from;";
echo $d;
if(mysqli_query($db, $d)){
    
    header("Location:slot.php?uid=$uid&did=$did&day=$day");
    echo '<script>alert("Slot Booked SuccessFully")</script>';
             
exit();
}
else{

    echo '<script>alert("Error In Booking")</script>';
}



?>