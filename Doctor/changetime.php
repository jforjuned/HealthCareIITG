<?php
session_start();

include 'connection.php';
$day = $_GET['day'];
$hrf = $_POST['hrf'];
$hrt = $_POST['hrt'];
$mnf = $_POST['mnf'];
$mnt = $_POST['mnt'];

$totalf = $hrf * 100 + $mnf;
$totalt = $hrt * 100 + $mnt;

if($totalf > $totalt){
    header("Location:drtime.php?err=1");
    exit();
}

$email = $_SESSION['email'];
$q= "update drtime set tfrom = '$totalf', tto = '$totalt' where day='$day' and did = '$email';";
echo $q;
if (mysqli_query($db, $q)) {
    $q = "delete from slot where day='$day' and did='$email';";
    echo $q;
    mysqli_query($db, $q);

    $q = "insert into slot(did,day,tfrom,tto,status) values ";
    $s= "";
    while($totalf != $totalt){

    
    $s .= "('".$email. "','" . $day . "',".$totalf. "," . ($totalf+14) . ",'notBooked')";
    
    $totalf += 15;
    
    if($totalf % 100 == 60){
        $totalf+= 40;
    }
    if($totalf != $totalt){
$s .= ",";
    }


}
$q .= $s ;
echo $q;
    mysqli_query($db, $q);
    header("Location:drtime.php?err=0");
}
?>