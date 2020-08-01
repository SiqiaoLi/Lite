<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AcceptRequest</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Lite</h2>
    <?php
      include("database.php");
      session_start();
      $email=$_SESSION['email'];
      echo $email;
      $requesteremail=$_POST['requesteremail'];

      $startdate=date('d-M-y');

      $sql="INSERT INTO FriendWith(Member_One_email, Member_Two_email, startdate)
            VALUES(:email, :friendemail, :startdate)";

      $stid = oci_parse($conn, $sql);

      oci_bind_by_name($stid, ":email", $email);
      oci_bind_by_name($stid, ":friendemail", $requesteremail);
      oci_bind_by_name($stid, ":startdate", $startdate);
      oci_execute($stid);

      $requeststatus='added';
      $sql="UPDATE FriendshipRequest
            SET requeststatus=:requeststatus
            WHERE Member_Recepient_email='$email'";

      $stid = oci_parse($conn, $sql);
      oci_bind_by_name($stid, ":requeststatus", $requeststatus);
      oci_execute($stid);
      echo "<br>";
      echo "Cool! You have accepted your friend's request!";
     ?>
     <p>
       <a href="LiteMainpage.php">Back to main page</a>
     </p>
  </body>
</html>
