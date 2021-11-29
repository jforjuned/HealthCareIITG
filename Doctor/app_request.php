<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Details</title>
</head>

<body>
<?php 
 if(isset($_GET['app_id'])){
 include("connection.php");
 $id=mysqli_query($db,$_GET['app_id']);
 	$q1="select * from user inner join appointment on user.id=appointment.pid inner join schedule on schedule.s_id-appointment.sid  WHERE app_id='$_GET[app_id]'" ;
	   $q2=mysqli_query($db,$q1);
	      $row = mysqli_fetch_array($q2);

				?>
                  
                             <h3>ID :    <?php  echo  $row['id'] . "<br />";?></br></h3> 
                             <h3> Name :  <?php  echo   $row['f_name']; echo  $row['l_name']. "<br />";?></br></h3>
                             <h3>Email Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                         
                          
                         
					
						<?php 
					
				   } 
		   ?>
           
      
</body>
</html>
