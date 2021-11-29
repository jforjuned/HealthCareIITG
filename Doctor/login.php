<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
      <link rel="stylesheet" href="../new.css">
      <title>detail</title>
</head>

<!-- <style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
img 
{ float: left;
width: 77px;
}
li{
font-size:24px;
}
h3{
font-size:24px;}
p{
text-align:center;
font-size:26px;}

body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
width:100%;
height:100vh;
background-image:url(../pic/Doctor_Time.jpg);
background-size:cover;
}
</style> -->
<style>
      .modal-content {
            margin-left: 58PX;
      }
</style>

<body class="container display-4">
      <?php
      error_reporting(0);
      session_start();
      include("connection.php");
      if (isset($_POST['submit'])) {

            $d_id = $_POST['id'];
            $d_pswd = $_POST['pswd'];
            $d_pswd = md5($d_pswd);
            $d_email = $_POST['email']; {

                  $d_query = "select* from doctor where  email='$d_email'  AND pswd='$d_pswd' AND permission='Approved' OR  email='$d_email'    AND pswd='$d_pswd' AND permission='Added'";
                  $check = mysqli_query($db, $d_query);

                  if (mysqli_num_rows($check) > 0)
                  /*if($_POST['id']=='$id' && $_POST['pswd']=='$pswd')*/ {
                        $check_drow = mysqli_fetch_assoc($check);
                        $_SESSION['email'] = $check_drow['email'];
                        //$_SESSION['id']=$check_drow['id'];
                        $_SESSION['type'] = 2;
                        echo "<script> window.location='index.php' </script> ";
                  } else {
                        $invalid_msg = "Invalid email / password / Not Approved/Added by Admin ";
                  }
            }
      }
      ?>
      <a href="../">
            <img alt="Qries" src="../home.png" width="50"" height=" 50">
      </a>
      <!-- Login -->
      <div class="white">
            <div class="w3-container w3-padding w3-black">
                  <h1 class=" first ">Doctor Login</h1>
            </div>

            <form class="modal-content " action="login.php" method="post">
                  <div class="w3-container">

                        <label for="email"><b> </b></label>
                        <p><input class="w3-input " type="text" placeholder="Enter e-mail" name="email" required></p>
                        <label for="pswd"><b></b></label>
                        <p> <input class="w3-output" type="password" placeholder="Enter Password" name="pswd" required></p>
                        <p> <button type="submit" name="submit" value="login" class="w3-button">Login</button></p>
                  </div>
                  <p class="second">
                        <a style="text-align:center" href=doctor_registration.php><strong style="color: rgb(230, 92, 121);">Register</strong></a></br>
                        <a style="text-align:center" href="../index.php"><strong style="color: rgb(230, 92, 121);">Back To Home Page</strong></a>
                  </p>

            </form>

            <?php
            if (isset($error_msg)) {
                  echo $error_msg;
            }
            if (isset($invalid_msg)) {
                  echo $invalid_msg;
            }
            ?>



</body>

</html>