<html>
  <head>
    <title>Lite Main Page</title>
    <style>
      h2 {
        color: #6699ff;
      }
      *{
        box-sizing: border-box;
      }
      .column{
        float: left;
        padding: 10px;
        width: 33.333%;
      }

      .row:after{
        content: "";
        display: table;
        clear:both;
      }
      div.Email{
        font-size: x-small;
      }
      </style>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      include("database.php");
      session_start();
      $email=$_SESSION['email'];
      echo "Hello!  " . $email;
      echo '<a href="LiteHomepage.html" style="float:right">Log in page</a>';
      oci_close($conn);

     ?>
      <h2>Lite</h2>

      <div class="row">
        <div class="column">
          <h3>Profile</h3>
          <a href="Profile.php">Profile Maintenance</a>
          <br><br>
          <a href="DeleteConfirm.html">Delete Account</a>

        </div>
        <div class="column">

          <h3>Create Post</h3>
          <form action="CreatePost.php" method="post">
           <textarea name="newpost" rows="7" cols="30" required></textarea>
           <p>
             <input type="submit" value="Post">
           </p>
          </form>

          <h3>New Posts</h3>
          <table>
            <?php
              include("database.php");

              $email=$_SESSION['email'];
              //echo "Hello!  " . $email;
              echo "<br>";

              $sql="SELECT POSTID, POSTTIMESTAMP, BODY, MEMBER_EMAIL, POST_POSTID
                    FROM POST
                    WHERE PARENTPOSTID IS NULL AND (MEMBER_EMAIL='$email' or MEMBER_EMAIL IN (
                    SELECT MEMBER_TWO_EMAIL
                    FROM FRIENDWITH
                    WHERE MEMBER_ONE_EMAIL='$email'
                    UNION
                    SELECT MEMBER_ONE_EMAIL
                    FROM FRIENDWITH
                    WHERE MEMBER_TWO_EMAIL='$email'))
                    order by POSTTIMESTAMP DESC";

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
                echo '<form action="ResponsePost.php" method="post">
                        <textarea name="newresponse" rows="2" cols="30" required></textarea>
                        <input type="hidden" name="postid" value="'.$postid.'">
                        <p>
                        <input type="submit" value="Comment">
                        </p>
                      </form>';

                echo '<form action="ViewAllComments.php" method="post">
                        <input type="hidden" name="postcommentid" value="'.$postid.'">
                        <p>
                        <input type="submit" value="View All Comments">
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
             ?>

          </table>

        </div>
        <div class="column">
          <h3>Requests</h3>
          <div class="request">
            <?php
            include("database.php");
            $email=$_SESSION['email'];

            $sql="SELECT Member_Requester_email, REQUESTSTATUS
                  FROM FriendshipRequest
                  WHERE Member_Recepient_email='$email'";

            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            while($rows=oci_fetch_assoc($stid)){
              $requeststatus=$rows['REQUESTSTATUS'];
              if($requeststatus=='wait') {
                $Requester_email=$rows['MEMBER_REQUESTER_EMAIL'];
                echo $Requester_email;
                echo "<br>";

                echo '<br>';
                echo '<form action="AcceptRequest.php" method="post">
                        <input type="hidden" name="requesteremail" value="'.$Requester_email.'">
                        <input type="submit" value="Accept">

                      </form>';
              }
            }

             ?>
             <br>
          </div>
          <div class="search">
            <form action="SearchFriends.php" method="post">
              <h3>Search Friends<h3>
              <input type="text" name="searchfriends" placeholder="Enter Email" required><br><br>
              <input type="submit" value="Search">
            </form>
          </div>
        </div>
      </div>
  </body>
</html>
