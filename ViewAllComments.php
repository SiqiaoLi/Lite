<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ViewAllComments</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Lite</h2>
    <?php
      include("database.php");
      session_start();
      $email=$_SESSION['email'];

      $parentpostid=$_POST['postcommentid'];

      $sql="SELECT POSTID, POSTTIMESTAMP, BODY, MEMBER_EMAIL, POST_POSTID
            FROM POST
            WHERE PARENTPOSTID = '$parentpostid'";

      $stid = oci_parse($conn, $sql);
      oci_execute($stid);

      while($rows=oci_fetch_assoc($stid)){
        $postid=$rows['POSTID'];
        $post_postid=$rows['POST_POSTID'];
        echo $rows['MEMBER_EMAIL'];
        echo "<br>";
        $body=$rows['BODY']->load(); echo $body;
        echo "<br>";
        echo $rows['POSTTIMESTAMP'];
        echo "<br>";
        echo "<br>";

        echo 'Response';
        echo '<br>';
        echo '<form action="ResponseComment.php" method="post">
                <textarea name="newcomment" rows="2" cols="30" required></textarea>
                <input type="hidden" name="parentpostid" value="'.$parentpostid.'">
                <input type="hidden" name="postid" value="'.$postid.'">
                <p>
                <input type="submit" value="Comment">
                </p>
              </form>';

        echo '<form action="Like.php" method="post">
                <input type="hidden" name="postpostid" value="'.$postid.'">
                <p>
                <input type="submit" value="Like">
                </p>
              </form>';
        echo '<br>';
      }

      //header("Location:ViewAllComments.php");
      oci_close($conn);
    ?>
  </body>
</html>
