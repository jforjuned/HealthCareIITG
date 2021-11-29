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
	<title>Appointment</title>
</head>

<style>
	h1 {
		font-size: 50px;
		text-align: center;
		padding-top: 30px;
		color: #000066;
	}



	h3 {
		letter-spacing: 4px;
	}

	body {
		margin: 0;
		padding: 0;
		color: #777;
		width: 100%;
		height: 100vh;
		background-image: url(../doctor1.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		background-attachment: fixed;
	}

	.text-light {
		color: #ce1515 !important
	}

	.table-dark {
		background-color: #46479f;
	}
</style>

<body>
	<a href="../">
		<img alt="Qries" src="../home.png" width="50"" height=" 50">
	</a>

	<body class="container display-4">
		<h1 class="text-white shadow-lg">View Patients Request</h1>
		<form class="text-center text-capitalize font-weight-bold" action="user_appointment_request.php" method="POST">
			<table border="1" cellPadding="13" align="center" class="table table-hover table-dark">

				<thead>
					<tr>
						<th>
							<h3>Email</h3>
						</th>
						<th>
							<h3>Time</h3>
						</th>
						<th>
							<h3>Day</h3>
						</th>
						<th>
							<h3>Medical History</h3>
						</th>
						<th>
							<h3><input class="alert-success" type="submit" value="Complete" name="submit"></h3>
						</th>
						<th>
							<h3><input class="alert-danger" type="submit" value="Delete" name="submit1"></h3>
						</th>

					</tr>
				</thead>

				<?php
				session_start();
				include("connection.php");

				$d_email = $_SESSION['email'];
				$q = "Select * from slot where did='$d_email' and status = 'Booked' ";
				$run = mysqli_query($db, $q);
				while ($row = mysqli_fetch_array($run)) {
					$did = $row['did'];
					$pid = $row['pid'];
					$from = $row['tfrom'];
					$day = $row['day'];

					echo "<tr><td>";
					echo $row['pid'];
					echo "</td><td>";
					echo $row['tfrom'];
					echo " - ";
					echo $row['tto'];
					echo "</td><td>";
					echo $row['day'];
					echo "</td><td>";
					echo "<a href='pmed.php?pid=$pid'>Medical Record</a>";
					echo "</td><td>";
					echo "<a href='drapp.php?pid=$pid&tfrom=$from&day=$day&del=0'>Complete</a>";
					echo "</td><td>";
					echo "<a href='drapp.php?pid=$pid&tfrom=$from&day=$day&del=1'>Delete</a>";
					echo "</td></tr>";
				}




				?>
				</p>
				<hr>


				<?php
				if (isset($_GET['del'])) {
					$pid = $_GET['pid'];
					$from = $_GET['tfrom'];
					$day = $_GET['day'];
					$q = "UPDATE slot set pid = NULL , status = 'notBooked' where pid='$pid' and tfrom = $from and day = '$day';";

					if (mysqli_query($db, $q)) {

						header("Location:drapp.php");
					}

					if (!$_GET['del']) {
						header("Location:pmed.php?pid=$pid");
					}
				}



				?>
				<div class="container ">
					<ul class="pager font-weight-bold text-monospace">

					</ul>
				</div>


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


	</body>

</html>