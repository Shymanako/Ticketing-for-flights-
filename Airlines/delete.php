<?php
session_start();
require 'admin/dbcon.php';

    if(isset($_POST['delete'])){
        $passenger_id = mysqli_real_escape_string($con, $_POST['delete']);
    
        $query = "DELETE FROM passenger WHERE passenger_id='$passenger_id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run){
    
            $_SESSION['message'] = "Passenger Deleted Successfully";
            header("Location: book.php");
            exit(0);
        }
        else{
    
            $_SESSION['message'] = "Passenger Deletion Failed";
            header("Location: book1-view.php");
            exit(0);
        }
    }
?>