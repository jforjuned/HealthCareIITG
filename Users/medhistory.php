<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>History</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<style>
    body {
        font: 400 15px/1.8 Lato, sans-serif;
        color: #777;
    }

    .container {
        padding: 80px 120px;
    }


    .nav-tabs li a {
        color: #999999;
    }

    .navbar {
        font-family: Montserrat, sans-serif;
        margin-bottom: 0;
        background-color: #17177b;
        border: 0;
        font-size: 16px !important;
        font-weight: 900;
        letter-spacing: 3px;
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

    .container-fluid {
        padding: 5px 20px;
    }

    .carousel-inner img {
        -webkit-filter: grayscale(98%);
        filter: grayscale(98%);
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

    .fa {
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        font-size: 20px;
        width: 30px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .test-dark {
        margin-bottom: -61px;
    }

    .navbar-right {
        margin-left: 685px;
    }

    .conta {
        background-image: url(../f.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 115vh;
    }
</style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <?php include("connection.php");
    error_reporting();







    if (isset($_POST["search"]))
        $name = $_POST['specialist']; {
        $query1 = "SELECT *
				                     FROM doctor
							          WHERE  f_name='$_POST[f_name]'";
        $run = mysqli_query($db, $query1);

        while ($row = mysqli_fetch_array($run)) {

            echo $row["id"];
            echo $row["f_name"];
            echo $row["l_name"];
            echo $row["specialist"];
        }
    }


    ?>

    <?php
    if (isset($error_msg)) {
        echo $error_msg;
    }
    ?>
    </form>
    <?php
    session_start();

    $email = $_SESSION['email'];
    ?>

    <?php $edit_doctor_profile_query = "select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email'";
    $edit_run_doctor_profile_query = mysqli_query($db, $edit_doctor_profile_query);
    while ($drow = mysqli_fetch_array($edit_run_doctor_profile_query)) {
    }
    ?>
    <?php
    $queryPermission = "WHERE permission='Pending' ";
    $show_number_pending_request_query = "select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id   where user.email='$email'  and  appointment.permission='Approved' ||  user.email='$email'  and  appointment.permission='Canceled' 
                
				";
    $run = mysqli_query($db, $show_number_pending_request_query);
    $count = mysqli_num_rows($run);



    ?>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid ">
            <div class="navbar-header">
                <a class="navbar-brand text-dark" href="#myPage" style="margin-bottom:-61px;"><strong>HealthCare-IITG</strong></a>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href='profile.php'>Profile</a></li>
                        <li><a href='medhistory.php'> Medical History</a></li>
                        <li><a href="../disease_prediction.php">Doctors List</a></li>




                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#Appointment">Appointments
                                <!-- <span class="caret">
               -->
                                </span></i>
                            </a>

                          


                        </li>

                    </ul>
                </div>
            </div>
        </div>

        </div>
        <textarea rows="40" cols="50" value="


">
<?php
$q = "select * from pmedical where pid = '$email'";

$run =   mysqli_query($db, $q);
while ($row = mysqli_fetch_array($run)) {

    echo $row['history'];
}

?>
</textarea>
    </nav>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>


</html>