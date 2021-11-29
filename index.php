<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>HealthCare- IITG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <!-- <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'> -->
  <style>
    body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: greenyellow;
    }

    h3,
    h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: blue;
    }

    input[type=text] {
      width: 130px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-position: 10px 10px;
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      -webkit-transition: width 0.4s ease-in-out;
      transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
      width: 100%;
    }

    .container {
      padding: 80px 120px;
    }

    .carousel-inner img {
      -webkit-filter: grayscale(60%);
      filter: grayscale(60%);
      /* make all photos black and white */
      width: 100%;
      /* Set width to 100% */
      margin: auto;
    }

    .carousel-caption h3 {
      color: #fff !important;
    }

    @media (max-width: 600px) {
      .carousel-caption {
        display: none;
        /* Hide the carousel text when the screen is less than 600 pixels wide */
      }
    }

    .bg-1 {
      background-color: rgb(192 193 255);
      color: #3348c0;
    }

    .bg-1 h3 {
      color: #82e6f7;
      font-size: 31px;
      font-weight: bold;
      margin-top: 45px;
    }

    .bg-1 p {
      font-style: oblique;
      font-size: 20px;
    }

    .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
    }

    .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }


    .nav-tabs li a {
      color: #999999;
    }

    .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #243bb9;
      border: 0;
      font-size: 16px !important;
      font-weight: 900;
      letter-spacing: 2px;
      opacity: 0.9;
      padding-bottom: 14px;
      padding-top: 10px;

    }

    .navbar li a,
    .navbar .navbar-brand {
      color: #0bffff !important;

    }

    .navbar-nav li a:hover {
      color: #fff !important;
    }

    .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
    }

    .navbar-default .navbar-toggle {
      border-color: transparent;
    }

    .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
    }

    .dropdown-menu li a {
      color: #000 !important;
    }

    .dropdown-menu li a:hover {
      background-color: red !important;
    }

    footer {
      background-color: #655779;
      color: #f5f5f5;
      padding: 22px;
    }

    footer a {
      color: #f5f5f5;
      font-weight: bold;
      font-size: 30px;
    }

    footer a:hover {
      color: #FFFF66;
      text-decoration: none;
    }

    .form-control {
      border-radius: 0;
    }

    textarea {
      resize: none;
    }

    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #999999;
    }

    .container-fluid {
      padding: 5px 20px;
    }

    .w3-container {
      padding-top: 8px !important;
      padding-bottom: 9px !important;
      background-color: #96a3bd;
    }

    p {
      font-size: 30px;
    }
  </style>
</head>

<?php
include("connection.php");
error_reporting(0);
session_start();

if ($_SESSION['type'] == 1) {
  header("Location:Admin/");
}
if ($_SESSION['type'] == 2) {
  header("Location:Doctor/");
}
if ($_SESSION['type'] == 3) {
  header("Location:Users/");
}


?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid ">
      <div class="navbar-header">
        <a class="navbar-brand text-dark" href="#myPage"><strong>HealthCare- IITG</strong></a>
      </div>
      <a href="">
        <img alt="Qries" src="home.png" width="50"" height=" 50">
      </a>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">LogIn <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Doctor/login.php">Doctor</a></li>
              <li><a href="Users/login.php">User</a></li>
              <li><a href="Admin/login.php">Admin</a></li>
            </ul>
          </li>



          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors
              <span class="caret"></span></a>
            <ul class="dropdown-menu">

              <?php

              $query = "SELECT DISTINCT specialist FROM doctor where permission = 'Approved';";


              $run = mysqli_query($db, $query);
              while ($row = mysqli_fetch_array($run)) {

                echo  "<li> <a href='drdetail.php?spac=";
                echo $row['specialist'] . "'>";
                echo $row['specialist'];
                echo "</a></li> ";
              }

              ?>

            </ul>
          </li>


          <li> <a href="#contact" onclick="toggleFunction()">Contact Us</a></li>



     

          </li>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <div id="#" class="bg-1">
    <div class="container">
      <h3 class="text-center">Healthcare-IITG</h3>
      <p class="text-center"><em>under Dr. Ashok Singh Sairam!</em></p>
      <p class="text-center"> An end-to-end database focused portal for patient registration, Organizing information and
        fixing appointment
        with healthcare professionals.
      </p>
      <p>
        <a href="mailto:apooja@iitg.ac.in">Pooja Agrawal</a><br>
        <a href="mailto:mjuned@iitg.ac.in">Mohammad Juned</a>
      </p>
    </div>
  </div>

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:100%" id="contact">
    <h2 class="w3-wide w3-center text-center text-capitalize"><a href="https://juned.me">CONTACT US </a></h2>


    <!--Contact Us-->


  </div>
  </div>
  </div>

  <!-- Footer -->
  <footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <p class="second">Copyright <a href="https://juned.me/" data-toggle="tooltip" title="Healthcare">@Healthcare-IITG</a></p>
  </footer>
 

</body>

</html>