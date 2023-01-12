<?php
session_start();
require 'admin/dbcon.php';

if(isset($_GET['flight_id']) and isset($_GET['passenger_id'])){
    $passenger_id = mysqli_real_escape_string($con, $_GET['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_GET['flight_id']);


    $query = "INSERT INTO reservation (passenger_id, flight_id) VALUES ('$passenger_id', '$flight_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        header("Location: book2-view.php");
        exit(0);

    }
    else{
        header("Location: book2.php");
        exit(0);
    }
}else{
    echo "data not available";
}

?>