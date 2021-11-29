<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Dr. List</title>
</head>
<style>
  body {
    background-color: #8a89b7;
  }

  h1 {
    font-size: 50px;
    text-align: center;
    padding-top: 20px;
    color: #000066;
  }

  li {
    font-size: 24px;
  }

  ul {
    font-size: 28px;
  }

  ul h3 {
    font-size: 30px;
  }

  footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333333;
    color: white;
    text-align: center;
  }

  footer a {
    color: #f5f5f5;
  }

  footer a:hover {
    color: #FFFF33;
    text-decoration: none;
  }

  footer .glyphicon {
    font-size: 15px;
    margin-bottom: 0px;
    color: #f4511e;
  }

  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }

  body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100vh;
    background-image: url(doctor1.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  div ul {
    padding-bottom: 70px;
  }

  .text-light {
    color: #ce1515 !important
  }

  .table-dark {
    background-color: #46479f;
  }
</style>

<?php
session_start();

include("connection.php");
$sp = $_GET['spac'];

?>

<body class="container-fluid">
  <h1 class="text-monocase text-capitalize text-center text-light">All The Doctor's List Of
    <?php
    echo $sp;
    ?>

  </h1>

  <ul class="text-center font-weight-bold text-monospace text-dark">
    <table border="1" class="table table-hover table-dark">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Specialist</th>

          <th scope="col">Qualification</th>

        </tr>
      </thead>

      <br />
      <?php
      $sp = $_GET['spac'];
      $query = "SELECT * FROM doctor WHERE specialist ='$sp' and permission = 'approved' OR permission='Added' ";


      $run = mysqli_query($db, $query);
      while ($row = mysqli_fetch_array($run)) {

        echo  "<h3><tr><th><a href='Admin/detail.php?id={$row['email']}'> {$row['f_name']} {$row['l_name']}</a></h3>";
        echo "<h3><th>" . $row['specialist'] . " </h3>";
        echo "<h3><th>" . $row['qualification'] . " </th></tr></h3>";
      }

      ?>
    </table>
  </ul>

  <div class="container ">
    <ul class="pager font-weight-bold text-monospace">

      <li class="previous"><a href="index.php">Previous</a></li>
    </ul>
  </div>
  <?php
  include 'footer.html'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>