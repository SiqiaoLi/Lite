<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Lite</h2>
    <?php
        // establish a database connection to your Oracle database.
        include("database.php");

            session_start();
            $email=$_SESSION['email'];
            echo $email;
            echo "<br>";
            $screenname = $_POST["newScreenName"];
            $status = $_POST["newStatus"];
            $location = $_POST["newLocation"];
            $visibility = $_POST["newVisibility"];

            $sql="UPDATE Member
                  SET ScreenName='$screenname',
                  Status='$status',
                  Location='$location',
                  Visibility='$visibility'
                  WHERE Email='$email'";

            $stid = oci_parse($conn, $sql);

            oci_execute($stid);

            echo "Updated!";
      oci_close($conn);
      ?>
      <a href="LiteMainpage.php">Back to Mainpage</a>
  </body>
</html>
