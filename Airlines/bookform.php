<?php
session_start();
require 'admin/dbcon.php';


if (isset($_POST['save_booking'])) {
    // Get all the details from form
    $passenger_id = $_POST['passenger_id'];


    // Save daa into booked information
    $query3 = "insert into booked_information set passenger_id='$passenger_id'";

    // Execute the query
    $query_run3 = mysqli_query($con, $query3);

    if ($query_run3) {

        $_SESSION['message'] = "Booked Flight Successfully";
        header("Location: book2-view.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Flight Booking Failed";
        header("Location: book.php");
        exit(0);
    }
}

?>