<?php
session_start();
require 'admin/dbcon.php';

if(isset($_POST['save_to_booked_info'])){
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);

    $query = "INSERT INTO booked_information (reservation_id, passenger_id, flight_id) VALUES ('$reservation_id', '$passenger_id', '$flight_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Reservation Created Successfully";
        header("Location: book3.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Reservation Not Created";
        header("Location: book2-view.php");
        exit(0);
    }
}

?>