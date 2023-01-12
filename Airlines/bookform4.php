<?php
session_start();
require 'admin/dbcon.php';

if(isset($_POST['save_book'])){
    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);

    $query = "INSERT INTO booked_information (payment_id, reservation_id, passenger_id, flight_id) VALUES ('$payment_id', '$reservation_id', '$passenger_id', '$flight_id')";

    $query_run = mysqli_query($con, $query);
    
    if($query_run){

        header("Location: book5.php");
        exit(0);
    }
    else{
        header("Location: book4-view.php");
        exit(0);
    }
}

?>