<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Admin -HC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
  <link href='style.css' rel='stylesheet'>
  <style>
    body {
      background-color: yellow;
    }
  </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php
  session_start();
  if ($_SESSION['type'] != 1) {
    header("Location:../");
  }
  include("connection.php");

  ?>
  <?php
  $queryPermission = "WHERE permission='Pending' ";
  $show_number_pending_request_query = "SELECT * 
                  FROM doctor $queryPermission 
				   order by date='$d_date' asc
				";
  $run = mysqli_query($db, $show_number_pending_request_query);
  $count = mysqli_num_rows($run);



  ?>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid ">
      <div class="navbar-header">

        <a class="navbar-brand text-dark" href=""><strong>HealthCare-IITG</strong></a>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">


            <li><a href='users.php'>Users List</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors
                <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <?php

                $query = "SELECT DISTINCT specialist FROM doctor WHERE permission = 'approved' OR permission='Added';";


                $run = mysqli_query($db, $query);
                while ($row = mysqli_fetch_array($run)) {

                  echo  "<li> <a href='drdelete.php?spac=";
                  echo $row['specialist'] . "'>";
                  echo $row['specialist'];
                  echo "</a></li> ";
                }

                ?>

              </ul>

            <li><a href=doc_reg_request.php>Pending Request </a></li>
            <li><a href=logout.php>Logout</a></li>

            <li class=" active">

            </li>

        </div>
      </div>
    </div>
  </nav>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../pic/Doctor_Time.jpg" alt="img1" width="1500" height="800" title="Admin Home Page">
        <div class="w3-display-middle w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white">
            <ol class="w3-padding w3-black w3-opacity-min"><b>Admin Home Page </b></ol>
          </h1>
        </div>
      </div>
    </div>
  </div>


</body>

</html>