<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SearchFriends</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Lite</h2>
    <?php
    include("database.php");
    session_start();
    $email=$_SESSION['email'];
    echo "Yo!  " . $email;
    echo "<br>";

    $friendemail=$_POST["searchfriends"];

    $sql="SELECT email
          FROM Member
          WHERE email='$friendemail'";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $row = oci_fetch_all($stid,$res);
    if ($row == 1) {
        $confirmFriendemail=$friendemail;
        echo "We found your friend!";
        echo '<br>';
    } else {
        echo "Sorry, we couldn't find anything.";
    }
     ?>


     <div class="findfriends">
       <p><?php echo $confirmFriendemail?></p>
       <form action="SendRequest.php" method="post">
         <input type="hidden" name="friendemail" value="<?php echo $confirmFriendemail ?>">
         <p>
         <input type="submit" value="Add Friend">
         </p>
      </form>
     </div>
  </body>
</html>
