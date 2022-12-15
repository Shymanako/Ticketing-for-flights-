<?php
session_start();
require 'admin/dbcon.php';

    if(isset($_POST['delete_passenger'])){
        $passenger_id = mysqli_real_escape_string($con, $_POST['delete_passenger']);
    
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

    if(isset($_POST['delete_reservation'])){
        $reservation_id = mysqli_real_escape_string($con, $_POST['delete_reservation']);
    
        $query = "DELETE FROM reservation WHERE reservation_id='$reservation_id'";
        $query_run = mysqli_query($con, $query);                                                                                        
        
        if($query_run){
    
            $_SESSION['message'] = "Reservation Deleted Successfully";
            header("Location: book2.php");
            exit(0);
        }
        else{
    
            $_SESSION['message'] = "Reservation Deletion Failed";
            header("Location: book2-view.php");
            exit(0);
        }
    }
?>