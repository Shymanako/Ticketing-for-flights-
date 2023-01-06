<?php
session_start();
require 'dbcon.php';

// delete flight

if (isset($_GET['delete_flight_id']) and isset($_GET['delete_image'])) {
    // get the value and delete
    $flight_id = $_GET['delete_flight_id'];
    $image = $_GET['delete_image'];

    // remove the physical image file if available
    if ($image != "") {
        // image is available. remove it
        $path = "../img/flight/" . $image;
        //remove the image
        $remove = unlink($path);
        if ($remove == false) {
            //failed to remove remove image
            $_SESSION['message'] = "Immage not Available";
            header("Location: flight.php");
            die();
        } else {
        }
    } else {
    }

    // delete from database
    $query = "delete from flight where flight_id=$flight_id";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Flight Deleted Successfully";
        header("Location: flight.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Flight Deletion Failed";
        header("Location: flight.php");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Flight Deletion Failed";
    header("Location: flight.php");
    exit(0);
}

?>