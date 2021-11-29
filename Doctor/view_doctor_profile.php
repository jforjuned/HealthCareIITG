<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Profile</title>
</head>

<style>
  h1 {
    font-size: 50px;
    text-align: center;
    padding-top: 30px;
    color: #000066;
  }

  img {
    float: left;
    width: 77px;
  }

  li {
    font-size: 24px;
  }

  h3 {
    font-size: 24px;
    letter-spacing: 4px;
  }

  body {
    margin: 0;
    padding: 0;
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
    width: 100%;
    height: 100vh;
    background-image: url(../doctor2.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .w3-black {
    background-color: #6691a2 !important;
  }

  .text-warning {
    color: #bd4646;
  }
</style>

<body class="container display-4">
  <a href="../">
    <img alt="Qries" src="../home.png" width="50"" height=" 50">
  </a>
  <!-- Grid -->
  <div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col 18 s12">
      <!-- Blog entry -->
      <div class="w3-card-4 w3-margin w3-black">
        <div class="w3-container">
          <h1 class=" text-center font-weight-bold text-warning">Personal Profile</h1>
          <hr color="#373333" />
          <h3>
            <form method="POST" action="view_doctor_profile.php">
              <?php
              session_start();
              include("connection.php");
              error_reporting(0);
              $d_email = $_SESSION['email'];

              $edit_doctor_profile_query = "select * from doctor where email='$d_email'";

              $edit_run_doctor_profile_query = mysqli_query($db, $edit_doctor_profile_query);

              while ($row = mysqli_fetch_array($edit_run_doctor_profile_query)) {
              ?>
                <table>
                  <tr>
                    <td>
                    <?php

                    echo "";
                    echo " Name : </td><td>";
                    echo $row['f_name'] . "  " . $row['l_name'] . "  ";
                    echo "</td></tr><tr><td>";

                    echo "Email Address :  </td><td>";
                    echo $row['email'];
                    echo "</td> </tr><tr><td> ";
                    echo
                    "Contact Number : </td><td> <input type='text' name='contact' style='color:black' value='";
                    echo $row['contact'] . "'>";
                    echo "</td></tr><tr><td> ";
                   
                    echo
                    "Spacialism :  </td><td><input type='text' name='spac' style='color:black' value='";
                    echo $row['specialist'] . "'>";
                    echo "</td> </tr><tr><td> ";
                    echo
                    "Qualification :  </td><td><input type='text' name='qualification' style='color:black' value='";
                    echo $row['qualification'] . "'>";
                    echo "</td></tr><br /> ";
                  }
                    ?>
          </h3>
          </table>
          <div class="container ">
            <ul class="pager font-weight-bold text-monospace">
              <li class="previous "><button type="submit" name="submit">Update Details</button></li>

              <?php

              if (isset($_POST['submit'])) {
                $email = $_SESSION['email'];
                $num = $_POST['contact'];
                $spac = $_POST['spac'];
                $qual = $_POST['qualification'];

                $q2 = "UPDATE `doctor` SET
                 `contact` = '$num',
                 `specialist` = '$spac',
                 `qualification` = '$qual'
                  WHERE `doctor`.`email` = '$email';";

                if (mysqli_query($db, $q2)) {
                  echo "<h1 style='color:green'>Record Updated successfully</h1>";
                } else {
                  echo "<h1 style='color:red'>Error Updating record: " . mysqli_error($db) . "</h1>";
                }
              }

              ?>

            </ul>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



</body>

</html>