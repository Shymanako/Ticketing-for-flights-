<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_passenger'])){
    $passenger_id = mysqli_real_escape_string($con, $_POST['delete_passenger']);

    $query = "DELETE FROM passenger WHERE id='$passenger_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Passenger Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Passenger Deletion Failed";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_passenger'])){

    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);

    $query = "UPDATE passenger SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name',
    age='$age', birthdate='$birthdate', email='$email', phone='$phone', citizenship='$citizenship' WHERE id='$passenger_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Passenger Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Passenger Update Failed";
        header("Location: passenger-update.php");
        exit(0);
    }
}


if(isset($_POST['save_passenger'])){
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);

    $query = "INSERT INTO passenger (first_name, middle_name, last_name, age, birthdate,
    email, phone, citizenship) VALUES ('$first_name', '$middle_name', '$last_name', '$age', 
    '$birthdate', '$email', '$phone', '$citizenship')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Passenger Created Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Passenger Not Created";
        header("Location: passenger-create.php");
        exit(0);
    }
}

if(isset($_POST['delete_flight'])){
    $flight_id = mysqli_real_escape_string($con, $_POST['delete_flight']);

    $query = "DELETE FROM flight WHERE fid='$flight_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Flight Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Flight Deletion Failed";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_flight'])){

    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $airlines = mysqli_real_escape_string($con, $_POST['airlines']);
    $departure = mysqli_real_escape_string($con, $_POST['departure']);
    $arrival = mysqli_real_escape_string($con, $_POST['arrival']);

    $query = "UPDATE flight SET location='$location', destination='$destination', airlines='$airlines',
    departure='$departure', arrival='$arriival' WHERE fid='$flight_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Flight Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Flight Update Failed";
        header("Location: flight-update.php");
        exit(0);
    }
}

if(isset($_POST['save_flight'])){
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $airlines = mysqli_real_escape_string($con, $_POST['airlines']);
    $departure = mysqli_real_escape_string($con, $_POST['departure']);
    $arrival = mysqli_real_escape_string($con, $_POST['arrival']);

    $query = "INSERT INTO flight (location, destination, airlines, departure, arrival) VALUES ('$location', '$destination', '$airlines', '$departure', 
    '$arrival')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Flight Created Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Flight Not Created";
        header("Location: passenger-create.php");
        exit(0);
    }
}

if(isset($_POST['delete_payment'])){
    $payment_id = mysqli_real_escape_string($con, $_POST['delete_payment']);

    $query = "DELETE FROM payment WHERE pid='$payment_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Payment Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Payment Deletion Failed";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_payment'])){

    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
    $credit_type = mysqli_real_escape_string($con, $_POST['credit_type']);
    $account_number = mysqli_real_escape_string($con, $_POST['account_number']);

    $query = "UPDATE payment SET credit_type='$credit_type', account_number='$account_number' WHERE pid='$payment_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Payment Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Flight Update Failed";
        header("Location: payment-update.php");
        exit(0);
    }
}

if(isset($_POST['save_payment'])){
    $credit_type = mysqli_real_escape_string($con, $_POST['credit_type']);
    $account_number = mysqli_real_escape_string($con, $_POST['account_number']);

    $query = "INSERT INTO payment (credit_type, account_number) VALUES ('$credit_type', '$account_number')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Payment Created Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Payment Not Created";
        header("Location: payment-create.php");
        exit(0);
    }
}

?>