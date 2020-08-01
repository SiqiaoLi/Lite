
<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
      form{
        display: table;
        padding: 30px;
        border: thin dotted #7e7e7e;
        margin: auto;
        background-color: #ffffff;
      }
      h3 {
        text-align: center;
      }
    </style>
  </head>
  <body>

    <?php
      // establish a database connection to your Oracle database.
      include("database.php");
          session_start();
          $email=$_SESSION['email'];

          $sql="SELECT ScreenName, Status, Location, Visibility FROM Member WHERE email = '$email'";
          $stid = oci_parse($conn, $sql);

          oci_execute($stid);

          while(($row=oci_fetch_object($stid))!= false){
             $screenname=$row->SCREENNAME;
             $status=$row->STATUS;
             $location=$row->LOCATION;
             $visibility=$row->VISIBILITY;
          }
          echo "Hello!  " . $email;
          echo '<a href="LiteMainpage.php" style="float:right">Main Page</a>';
          oci_close($conn);
    ?>
    <h2>Lite</h2>
    <h3>Profile Maintenance</h3>
    <form action="UpdateProfile.php" method="post">
      <div class="screenname">
        <label>Screen name</label><br>
        <input type="text" name="newScreenName" value="<?php echo $screenname ?>">
        <br><br>
        <label>Status</label><br>
        <input type="text" name="newStatus" value="<?php echo $status ?>">
        <br><br>
        <label>Location</label><br>
        <input type="text" name="newLocation" value="<?php echo $location ?>">
        <br><br>
        <label>Visibility is: </label>
        <?php echo $visibility ?> <br>
        <input type="radio" name="newVisibility" value="Public" required>Public
        <input type="radio" name="newVisibility" value="Friends" required>Friends
        <input type="radio" name="newVisibility" value="Private" required>Private
        <br><br>
        <input type="submit" value="Update">
      </div>
    </form>
  </body>
</html>
