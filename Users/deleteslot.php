<?php
include 'connection.php';
$day = $_GET['day'];
$did = $_GET['did'];
$from = $_GET['tfrom'];

$q = "UPDATE slot SET pid = NULL , status = 'notBooked' where day='$day' and tfrom='$from' and did='$did'";
$run=mysqli_query($db,$q);

header("Location:myapp.php");


?>
