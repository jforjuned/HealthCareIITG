<?php
include 'connection.php';
$email = $_GET['did'];
$sp = $_GET['spac'];

$q = "delete from doctor where email = '$email' ";
mysqli_query($db,$q);

header("location:drdelete.php?spac=$sp")

?>