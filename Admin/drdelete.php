<!DOCTYPE html>
<html>

<head>

  <title>Delete Doctor</title>
</head>


<body>
  <style>
    body {
      background-color: yellow;
    }
  </style>
  <a href="../">
    <img alt="Qries" src="../home.png" width="50"" height=" 50">
  </a>
  <h1>Doctors
  </h1>
  <form method="POST">
    <table border="1" cellPadding="13" align="center">
      <thead>
        <tr>
          <th>
            <h2>Name</h2>
          </th>
          <th>
            <h2>Specialism</h2>
          </th>
          <th>
            <h2><input type="submit" value="Delete" name="submit"></h2>
          </th>
        </tr>
      </thead>

      <?php
      session_start();
      if ($_SESSION['type'] != 1) {
        header("Location:../");
      }
      include("connection.php");
      if (isset($_REQUEST["submit"])) {
        $check = $_REQUEST["check"];
        $save = implode(",", $check);
        $d_id = $_GET['id'];
        $query = "DELETE 
                   FROM doctor where email in ($save) ";
        $run = mysqli_query($db, $query);
      }

      $sp = $_GET['spac'];
      $query = "SELECT * FROM doctor WHERE specialist ='$sp' and permission = 'approved' OR permission='Added' ";


      $run = mysqli_query($db, $query);
      while ($row = mysqli_fetch_array($run)) {
        $email2 = $row['email'];
        echo  "<h3><tr><th><a href='detail.php?id={$row['email']}'> {$row['f_name']} {$row['l_name']}</a></h3>";
        echo "<h3><th>" . $row['specialist'] . " </h3>";
        echo "<th><a href='deletedr.php?did=$email2&spac=$sp'>Delete";

        echo  "</a></th>";
        echo "</tr>";
      }

      ?>

    </table>

  </form>


  <div>
    <ul>
    </ul>
  </div>


</body>

</html>