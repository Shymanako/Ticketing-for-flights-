<?php
  session_start();
  require 'admin/dbcon.php';

?>

<?php
    // Destroy session
    session_destroy(); //  unsets $_SESSION['user']
    
    // Redirect to login page
    header('location:login.php');
?>