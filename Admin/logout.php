<!DOCTYPE html>
<html>

<head>
	<title>LogOut Admin</title>
</head>

<body>
	<?php
	error_reporting(0);

	include("connection.php");
	session_start();
	session_destroy();
	unset($SESSION['admin_id']);

	header("Location:../");
	?>
</body>

</html>