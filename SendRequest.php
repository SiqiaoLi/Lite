<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>send request</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Lite</h2>

    <?php
      include("database.php");
      session_start();
      $email=$_SESSION['email'];
      echo $email;
      $friendemail=$_POST["friendemail"];

      $requestdate=date('d-M-y');
      $requeststatus='wait';

      $sql="INSERT INTO FriendshipRequest(Member_Requester_email, Member_Recepient_email, requestdate, requeststatus)
            VALUES(:email, :friendemail, :requestdate, :requeststatus)";

      $stid = oci_parse($conn, $sql);

      oci_bind_by_name($stid, ":email", $email);
      oci_bind_by_name($stid, ":friendemail", $friendemail);
      oci_bind_by_name($stid, ":requestdate", $requestdate);
      oci_bind_by_name($stid, ":requeststatus", $requeststatus);

      oci_execute($stid);
      echo "<br>";
      echo "Cool! we have sent request to your friend!";
     ?>
     <p>
       <a href="LiteMainpage.php">Back to Mainpage</a>
     </p>
  </body>
</html>
