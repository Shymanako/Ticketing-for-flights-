<?php
  session_start();
  //require 'dbcon.php';

?>

<html>
    <head>
        <title>Login Admin</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-messgage']))
                {
                    echo $_SESSION['no-login-messgage'];
                    unset($_SESSION['no-login-messgage']);
                }

            ?>

            <br>
            <!-- Loigin Form starts here -->

            <form action="" method="POST" class="text-center">

                Email: <br>
                <input type="text" name="email" placeholder="Enter Email"> <br><br>

                Password: <br>
                <input type="password" name="password" placeholder="Enter password"> <br><br>

                <input type="submit" name="submit" value="login" class="btn-primary">
                <br><br>

            </form>

            <!-- Login Form ends here -->


            <p class="text-center">Created By - <a href="www.homo.com">Emmanuelle R. Salazar</a></p>
            <p class="text-center">Not an admin? - <a href="../home.php">Go Back</a></p>
        </div>
        

    </body>

</html>

<?php
    // Check whether the submiot button is clicked or not
    if(isset($_POST["submit"]))
    {
        // Process for login
        // Get the data from login

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Sql to check wether the admin exists or not
        $sql = "select * from Administrator where email='$email 'and password='$password'";

        // Execute the query
        $res = mysqli_query($con, $sql);

        // Count rows  to check whether the admin exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // Admin available and login success
            $_SESSION['login'] = "<div class='success text-center'>Login Successful</div>";

            // Check whether the admin is logged in or not and logout will unset it
            $_SESSION['user'] = $email;

            // Redirect to Admin homepage
            header('location:admin.php');
        }
        else
        {
            // Admin not available and login failed
            $_SESSION['login'] = "<div class='error text-center'>Email or Password did not match</div>";
            // Redirect to Admin login
            header('location:login-admin.php');
        }


    }
?>