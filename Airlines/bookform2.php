<?php
session_start();
require 'admin/dbcon.php';

if(isset($_POST['save_reservation'])){
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);

    $query = "INSERT INTO reservation (passenger_id, flight_id) VALUES ('$passenger_id', '$flight_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Reservation Created Successfully";
        $query2 = "select * from reservation order by reservation_id desc limit 1";
        $query_run2 = mysqli_query($con, $query2);
        if (mysqli_num_rows($query_run2) > 0) {
            $reservation = mysqli_fetch_array($query_run2);
            $reservation_id = $reservation['reservation_id'];
            
            $_SESSION['get_reservation'] = $reservation_id;
            header("Location: book2-view.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message'] = "Reservation Not Created";
        header("Location: book2.php");
        exit(0);
    }
}else{
    echo "data not available";
}

?>