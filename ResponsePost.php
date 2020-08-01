<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Response Post</title>
  </head>
  <body>
    <?php
      include("database.php");
      session_start();
      //get member Email
      $email=$_SESSION['email'];

      $sql="SELECT PostID FROM Post";
      $stid = oci_parse($conn, $sql);

      oci_execute($stid);

      //create a post id
      $index=oci_fetch_all($stid, $res);
      echo $index;

      //create a timestamp
      $Timestamp=new DateTime();
      $TimesTampFormat=$Timestamp->format('Y-m-d H:i:s');
      echo $TimesTampFormat;

      //get post body
      $response = $_POST["newresponse"];
      echo $response;

      //get Post_postID
      $post_postid = $_POST["postid"];
      echo $post_postid;

      $sql="INSERT INTO Post(PostID, PostTimeStamp, Body, Member_email, Post_postID, ParentPostID)
      VALUES ('$index', '$TimesTampFormat', '$response', '$email', '$post_postid', '$post_postid')";

      $stid = oci_parse($conn, $sql);

      oci_execute($stid);

      header("Location:LiteMainpage.php");

      oci_close($conn);
     ?>
  </body>
</html>
