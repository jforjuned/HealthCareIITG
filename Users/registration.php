<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>User</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Users</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<style>
	<style>.jumbotron {
		background-color: #f4511e;
		color: #666666;
		padding: 100px 25px;
	}

	.container-fluid {
		padding: 60px 50px;
	}

	.bg-success {
		background-color: #ccccc;
		color: black;
		padding: 100px 25px;

	}

	.col-50 {
		-ms-flex: 50%;
		/* IE10 */
		flex: 50%;
		padding: 0 16px;
	}

	.bg-grey {
		background-color: #EEEEEE;

	}

	.icon-container {
		margin-bottom: 20px;
		padding: 7px 0;
		font-size: 24px;
	}
</style>

<?php
include("connection.php");

if (isset($_POST["submit"])) {

	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$contact = ($_POST['contact']);
	$DOB = $_POST['DOB'];
	$gender = $_POST['gender'];
	$pswd = $_POST['pswd'];
	$pswd = md5($pswd); {
		$d_query = "INSERT INTO user(f_name,l_name,email,contact,DOB,gender,pswd)     
	                            VALUES('$f_name','$l_name','$email','$contact','$DOB','$gender','$pswd')";
		if (mysqli_query($db, $d_query)) {
			$q = "Insert into pmedical(pid,history) values('$email','Account Created')";
			if (mysqli_query($db, $q)) {
				echo "<h1 style='color:green'>Record Inserted successfully</h1>";
			} else {
				echo "<h1 style='color:red'>Error Inserting record: " . mysqli_error($db) . "</h1>";
			}
		} else {
			echo "<h1 style='color:red'>Error Inserting record: " . mysqli_error($db) . "</h1>";
		}
	}
}

?>


<a href="../">
	<img alt="Qries" src="../home.png" width="50"" height=" 50">
</a>
<div class="container-fluid text-center bg-grey col-50">
	<form action="registration.php" method="POST" class="form-inline">
		<div class="container">
			<h1>Registration As A User</h1>
			<p>Fill UP this form to create New account.</p>
			<hr>

			<input type="text" placeholder="Enter First Name" name="f_name" required><br>
			<input type="text" placeholder="Enter Last Name" name="l_name" required><br>


			<input type="text" style="font-size:16px" placeholder="Enter Email Address" name="email" required><br>
			<br>
			<input type="number" style="font-size:16px" placeholder="Enter Your Contact Number" name="contact" required><br>
			<label for="DOB" style="font-size:16px"><b>DOB: *</b></label><br><input type="date" name="DOB" required><br>

			<input type="radio" name="gender" required style="font-size:16px" value="male"><b style="font-size:16px">Male</b>
			<br><input type="radio" name="gender" required value="female"><b style="font-size:16px">Female</b><br>
			<input type="password" placeholder="Create New password" name="pswd" required>
			<p style="font-size:16px"> Password </p>
			<input type="submit" class="btn btn-danger text-uppercase focus" name="submit" value="register">
		</div>
		<p> <strong> Already Registered? <a href="login.php">Login</a></strong></p>
		<h2><a href="../index.php">Back</a></h2>
		</p>
</div>

<?php
if (isset($error_msg)) {
	echo $error_msg;
}
if (isset($success_msg)) {
	echo $success_msg;
}

?>

</form>
</div>


</body>

</html>