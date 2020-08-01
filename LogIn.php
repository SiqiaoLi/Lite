<html>
  <head>
    <title>Log In</title>
  </head>
  <body>
      <?php
        // establish a database connection to your Oracle database.
        include("database.php");
            session_start();
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            $sql = "SELECT email, password FROM Member WHERE email = '$email' AND password = '$password'";

            $stid = oci_parse($conn, $sql);

            oci_execute($stid);

            $row = oci_fetch_all($stid,$res);
            if ($row == 1) {
                $_SESSION['email']=$email;
                $_SESSION['time_login']=time();
                header("location:LiteMainpage.php");
            } else {
                echo "Email or password is invalid";
            }

        oci_close($conn);
       ?>
  </body>
</html>
