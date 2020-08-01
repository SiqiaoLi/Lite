<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign up</title>
        <style>
          h3{
            text-align: center;
          }
        </style>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="homestyle.css">
    </head>
    <body>
      <h2>Lite</h2>
        <div class="sign up">
            <h3>Create a new account</h3>
            <form action="CreateAccount.php" method="post">
              <div class="tableRow">
                <p>Email:</p>
                <p><input type="text" name="email" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Full name:</p>
                <p><input type="text" name="fullname" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Screen name:</p>
                <p><input type="text" name="screenname" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Password:</p>
                <p><input type="text" name="password" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Date of birth:</p>
                <input type="date" name="dob" value="" required>
              </div>
              <div class="tableRow">
                <p>Gender:</p>
                <p>
                  <input type="radio" name="gender" value="Female">Female
                  <input type="radio" name="gender" value="Male">Male
                  <input type="radio" name="gender" value="Custom">Custom
                </p>
              </div>
              <div class="tableRow">
                <p>Status:</p>
                <p><input type="text" name="status" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Location:</p>
                <p><input type="text" name="location" value="" required></p>
              </div>
              <div class="tableRow">
                <p>Visibility:</p>
                <p>
                  <input type="radio" name="visibility" value="Public" required>Public
                  <input type="radio" name="visibility" value="Friends" required>Friends
                  <input type="radio" name="visibility" value="Private" required>Private
                </p>
              </div>
              <div class="tableRow">
                <p><input type="submit" value="Sign Up"></p>
                <p><a href="LiteHomepage.html">Log in to Existing Account</a></p>
              </div>
            </form>
        </div>
    </body>

</html>
