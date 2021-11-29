<!DOCTYPE>
<html>

<head>
  <link rel="stylesheet" href="../new.css">
  <title>Admin Login</title>
</head>


<body class="container display-4">
  <?php
  error_reporting(0);
  session_start();
  include("connection.php");

  if (isset($_POST['submit'])) {

    $admin_email = $_POST['email'];
    $admin_pswd = $_POST['admin_pswd']; {

      $admin_query = "select* from admin where email='$admin_email' AND admin_pswd='$admin_pswd'";
      $check = mysqli_query($db, $admin_query);

      if (mysqli_num_rows($check) > 0) {
        $check_row = mysqli_fetch_assoc($check);
        $_SESSION['email'] = $check_row['email'];
        $_SESSION['type'] = 1;
        echo "<script> window.location='../Admin' </script> ";
      } else {
        $invalid_msg = "Invalid Credentials ";
      }
    }
  }
  ?>
  <a href="../">
    <img alt="Qries" src="../home.png" width="50"" height=" 50">
  </a>

  <!-- Login -->
  <div class="white">
    <div class="w3-container w3-padding w3-black">
      <h1 class=" first ">Admin Login</h1>
    </div>

    <form class="modal-content" action="login.php" style="width :120%" method="post">
      <div class="w3-container ">

        <label for="email"><b></b></label>
        <input type="email" class="w3-input" placeholder="Enter Email" name="email" required>

        <label for="pswd"><b></b></label>
        <input type="password" class="w3-output" placeholder="Enter Password" name="admin_pswd" required>


        <button type="submit" name="submit" value="login" class="w3-button">Login</button>
      </div>
      <h2 class="second">

        <?php
        if (isset($invalid_msg)) {
          echo "<h1 style='color:red'>";
          echo $invalid_msg;
          echo "</h1>";
        }
        ?>
        <a href="../index.php"><strong style="color: rgb(230, 92, 121);">HomePage</strong></a>
      </h2>

    </form>
  </div>



</body>

</html>