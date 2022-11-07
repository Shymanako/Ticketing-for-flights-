<?php
  session_start();
  require 'dbcon.php';

?>

<?php
    // Destroy session
    session_destroy(); //  unsets $_SESSION['user']
    
    // Redirect to login page
    header('location:login-admin.php');
?>