<html>
    <head>
        <title>create a new account in database</title>
    </head>
    <body>
        <?php
            // establish a database connection to your Oracle database.
            include("database.php");

                $email = $_POST["email"];
                $fullname = $_POST["fullname"];
                $screenname = $_POST["screenname"];
                $password = $_POST["password"];
                $dob = date('d-M-y', strtotime($_POST['dob']));
                $gender = $_POST["gender"];
                $status = $_POST["status"];
                $location = $_POST["location"];
                $visibility = $_POST["visibility"];

                $sql = "INSERT INTO Member(email, FullName, ScreenName, DoB, Gender, Status, Location, Visibility, Password)
                VALUES (:email, :fullname, :screenname, :dob, :gender, :status, :location, :visibility, :password)";

                $stid = oci_parse($conn, $sql);

                // Run-time binding of PHP variables to Oracle bind variables.
                oci_bind_by_name($stid, ":email", $email);
                oci_bind_by_name($stid, ":fullname", $fullname);
                oci_bind_by_name($stid, ":screenname", $screenname);
                oci_bind_by_name($stid, ":password", $password);
                oci_bind_by_name($stid, ":dob", $dob);
                oci_bind_by_name($stid, ":gender", $gender);
                oci_bind_by_name($stid, ":status", $status);
                oci_bind_by_name($stid, ":location", $location);
                oci_bind_by_name($stid, ":visibility", $visibility);

                oci_execute($stid);

                session_start();
                $_SESSION["email"]=$email;

                header("Location:LiteMainpage.php");
            
            oci_close($conn);
        ?>
        <p>Thank you! You have successfully registered.</p>
        <a href="LiteMainpage.html">Back to main page</a>
    </body>
</html>
