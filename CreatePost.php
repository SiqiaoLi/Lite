<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      // establish a database connection to your Oracle database.
      include("database.php");
          session_start();
          //get member Email
          $email=$_SESSION['email'];

          $sql = "SELECT MAX(POSTID) FROM POST";
          $stid = oci_parse($conn, $sql);

          oci_execute($stid);

          //create a post id
          while (oci_fetch($stid)) {
            $indexOfpost = oci_result($stid, 'MAX(POSTID)');
            $index = $indexOfpost+1;
            echo $index;
          }


          //create a timestamp
          $Timestamp=new DateTime();
          $timestampformat=$Timestamp->format('Y-m-d H:i:s');
          echo $timestampformat;

          //get post body
          $post = $_POST["newpost"];
          echo $post;

          $nullvalue=NULL;

          $sql="INSERT INTO Post(PostID, PostTimeStamp, Body, Member_email, Post_postID, ParentPostID)
                VALUES('$index','$timestampformat','$post','$email','$index','$nullvalue')";

          $stid = oci_parse($conn, $sql);


          oci_execute($stid);

          header("Location:LiteMainpage.php");


          oci_close($conn);

    ?>
  </body>
</html>
