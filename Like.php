<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Like</title>
  </head>
  <body>
    <h2>Lite</h2>
    <?php
      include("database.php");
      session_start();
      $email=$_SESSION['email'];
      echo $email;
      $post_postid=$_POST['postpostid'];
      echo $post_postid;

      $sql="INSERT INTO Likes(Member_email, Post_postID)
            VALUES('$email','$post_postid')";

      $stid = oci_parse($conn, $sql);

      oci_execute($stid);

      header("Location:LiteMainpage.php");

      oci_close($conn);
    ?>
  </body>
</html>
