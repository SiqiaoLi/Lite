<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Account</title>
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

            $sql="DELETE FROM Likes WHERE Member_email='$email'";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $sql="DELETE FROM FriendshipRequest
                  WHERE Member_Requester_email='$email' OR
                  Member_Recepient_email='$email'";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $sql="DELETE FROM FriendWith
                  WHERE Member_One_email='$email' OR
                  Member_Two_email='$email'";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $sql="DELETE FROM Post
                  WHERE Member_email='$email'";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            $sql="DELETE FROM Member
                  WHERE email='$email'";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            echo "Deleted!";

      oci_close($conn);
      ?>
      <a href="LiteHomepage.html">Back to Lite Home page</a>
  </body>
</html>
