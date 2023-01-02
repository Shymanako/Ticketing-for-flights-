<?php
session_start();
require 'admin/dbcon.php';

if(isset($_POST['proceed_payment'])){
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $payment_amount = mysqli_real_escape_string($con, $_POST['payment_amount']);
    $cvc = mysqli_real_escape_string($con, $_POST['cvc']);
    $expiry_date = mysqli_real_escape_string($con, $_POST['expiry_date']);

    $query = "INSERT INTO payment (reservation_id, payment_method, payment_amount, cvc, expiry_date) VALUES ('$reservation_id', '$payment_method', '$payment_amount', '$cvc', '$expiry_date')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Reservation Created Successfully";
        header("Location: book4-view.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Reservation Not Created";
        header("Location: book2-view.php");
        exit(0);
    }
}

?>