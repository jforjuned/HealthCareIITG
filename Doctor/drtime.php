<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Dr. Slots</title>
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

    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
        }

        h3,
        h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;
            font-size: 20px;
            color: #111;
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
            background-color: #2d2d30;
            border: 0;
            font-size: 16px !important;
            font-weight: 900;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .navbar li a,
        .navbar .navbar-brand {
            color: #d5d5d5 !important;
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

        coration: none;
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

        .fa {
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
            font-size: 17px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }
    </style>
    <a href="../">
        <img alt="Qries" src="../home.png" width="50"" height=" 50">
    </a>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <a href="../">
        <img alt="Qries" src="../home.png" width="50"" height=" 50">
    </a>
    <?php
    include("connection.php");

    ?>
    <?php
    session_start();

    $d_email = $_SESSION['email'];
    ?>




    <nav class="navbar navbar-default navbar-fixed-top">
        <div style="background-color: green;" class="container-fluid ">
            <div class="navbar-header">

                <a class="navbar-brand text-dark" href="../"><strong>HealthCare-IITG</strong></a>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=view_doctor_profile.php>Profile</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="drtime.php">Update Schedule</span></i></a>
                        </li>

                        <li><a href=drapp.php>Appointment's Request</a></li>

                        <li><a href=logout.php>Log Out <i class="fa fa-sign-out"></i></a></li>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Background image -->

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../pic/1.jpg" alt="img1" width="1500" height="800" title="Doctor Home Page">
                <div class="w3-display-middle w3-margin-top w3-center">

                    <?php

                    $query = "SELECT * FROM drtime where did='$d_email';";


                    $run = mysqli_query($db, $query);
                    echo "<table border='1'><tr><td>DAY</td><td>From</td><td>Till</td></tr>";
                    while ($row = mysqli_fetch_array($run)) {

                        $day = $row['day'];
                        $from = $row['tfrom'];
                        $to = $row['tto'];

                        $hrf = $from / 100;
                        $hrf = (int)$hrf;
                        $hrt = $to / 100;
                        $hrt = (int)$hrt;

                        $mnf = $from % 100;
                        $mnf = (int)$mnf;

                        $mnt = $to % 100;
                        $mnt = (int)$mnt;


                        echo '<form action="changetime.php?day=' . $day . '" method="POST">';
                        echo "<tr><td>";
                        echo $day;
                        echo "</td><td><input type='number' name='hrf' min='0' max='23' required value='";
                        echo $hrf;

                        echo "'> : <select name='mnf' required>
                        <option value='" . $mnf . "' >" . $mnf . "</option>
                        <option value='00'>00</option>
                        <option value='15'>15</option>
                        <option value='30'>30</option>
    <option value='45'>45</option>
    </select>";
                        echo "</td><td><input required type='number' name='hrt' min='0' max='23' value='";

                        echo $hrt;
                        echo "'> : <select required name='mnt'>
                        <option value='" . $mnt . "' >" . $mnt . "</option>

    <option value='00'>00</option>
    <option value='15'>15</option>
    <option value='30'>30</option>
    <option value='45'>45</option>
</select> </td><td><button type='submit' name='submit' >Change Time</button></form> ";


                        echo "</td></tr>";
                    }
                    if (isset($_GET['err'])) {
                        if ($_GET['err'])
                            echo "Invalid Time";
                        else
                            echo "Updated Succesfully";
                    }

                    ?>



                </div>

            </div>
        </div>
    </div>

</body>

</html>