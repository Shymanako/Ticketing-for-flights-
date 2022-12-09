<?php
  session_start();
  require 'admin/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Project DB | Sing In</title>
</head>
<body>

    <?php include('admin/message.php'); ?>

    <!-- MAIN CARD container -->
    <div id="main-card">
        <!-- header -->
        <h1>Sign In</h1>
        
        <a href="home.php" class="btn btn-danger float-end">Back</a>

        <form action="" method="POST" class="text-center">
            <!-- email input -->
            Email: <br>
                <input type="text" name="email" placeholder="Enter Email"> <br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter password"> <br><br>

            <!-- submit btn -->
            <button type="submit" name="login_user" value="passenger">Log In</button>
            <a href="about.php"></a>
            <a href="create-passenger.php">Create an Account</a>
        </form>

    
    </div>

</body>
</html>

<?php
    // Check whether the submiot button is clicked or not
    if(isset($_REQUEST["login_user"]))
    {
        // Process for login
        // Get the data from login

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Sql to check wether the admin exists or not
        $sql = "select * from passenger where email='$email' and password='$password'";

        // Execute the query
        $res = mysqli_query($con, $sql);

        // Count rows  to check whether the admin exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // Admin available and login success
            $_SESSION['message'] = "<div class='success text-center'>Login Successful</div>";

            // Check whether the admin is logged in or not and logout will unset it
            $_SESSION['user'] = $email;

            // Redirect to Admin homepage
            header('location:home.php');
        }
        else
        {
            // Admin not available and login failed
            $_SESSION['message'] = "<div class='error text-center'>Email or Password did not match</div>";
            // Redirect to Admin login
            header('location:login.php');
        }


    }
?>