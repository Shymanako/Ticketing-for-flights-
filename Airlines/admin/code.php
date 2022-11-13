<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_passenger'])){
    $passenger_id = mysqli_real_escape_string($con, $_POST['delete_passenger']);

    $query = "DELETE FROM passenger WHERE passenger_id='$passenger_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Passenger Deleted Successfully";
        header("Location: passenger.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Passenger Deletion Failed";
        header("Location: passenger.php");
        exit(0);
    }
}

if(isset($_POST['update_passenger'])){

    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);

    $query = "UPDATE passenger SET first_name='$first_name', last_name='$last_name',
    date_of_birth='$date_of_birth', citizenship='$citizenship', phone_number='$phone_number' WHERE passenger_id='$passenger_id'";
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
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);

    $query = "INSERT INTO passenger (first_name, last_name, date_of_birth, citizenship, phone_number) VALUES ('$first_name', '$last_name', '$date_of_birth', '$citizenship', '$phone_number')";

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

    $query = "DELETE FROM flight WHERE flight_id='$flight_id' ";
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
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);

    $query = "UPDATE flight SET schedule_id='$schedule_id' ";
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
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);

    $query = "INSERT INTO flight (schedule_id) VALUES ('$schedule_id')";

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

    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $payment_amount = mysqli_real_escape_string($con, $_POST['payment_amount']);

    $query = "UPDATE payment SET reservation_id='$reservation_id', payment_method='$payment_method', payment_amount='$payment_amount' WHERE payment_id='$payment_id'";
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
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $payment_amount = mysqli_real_escape_string($con, $_POST['payment_amount']);

    $query = "INSERT INTO payment (reservation_id, payment_method, payment_amount) VALUES ('$reservation_id', '$payment_method', '$payment_amount')";

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

if(isset($_POST['save_airlines'])){
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $airline_name = mysqli_real_escape_string($con, $_POST['airline_name']);

    $query = "INSERT INTO airlines (airline_id, airline_name) VALUES ('$airline_id', '$airline_name')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Airlines Created Successfully";
        header("Location: airlines.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Airlines Not Created";
        header("Location: airlines-create.php");
        exit(0);
    }
}

if(isset($_POST['update_airlines'])){
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $airline_name = mysqli_real_escape_string($con, $_POST['airline_name']);

    $query = "UPDATE airlines SET airline_id='$airline_id', airline_name='$airline_name' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Airlines Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Airlines Update Failed";
        header("Location: airlines-update.php");
        exit(0);
    }
}

if(isset($_POST['delete_airlines'])){
    $airline_id = mysqli_real_escape_string($con, $_POST['delete_airlines']);

    $query = "DELETE FROM airlines WHERE airline_id='$airline_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){

        $_SESSION['message'] = "Airlines Deleted Successfully";
        header("Location: airlines.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Airlines Deletion Failed";
        header("Location: airlines.php");
        exit(0);
    }
}

if(isset($_POST['save_airport'])){
    $airport_code = mysqli_real_escape_string($con, $_POST['airport_code']);
    $airport_name = mysqli_real_escape_string($con, $_POST['airport_name']);

    $query = "INSERT INTO airport (airport_code, airport_name) VALUES ('$airport_code', '$airport_name')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Airport Created Successfully";
        header("Location: airport.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Airport Not Created";
        header("Location: airport-create.php");
        exit(0);
    }
}

if(isset($_POST['update_airport'])){
    $airport_code = mysqli_real_escape_string($con, $_POST['airport_code']);
    $airport_name = mysqli_real_escape_string($con, $_POST['airport_name']);

    $query = "UPDATE airport SET airport_code='$airport_code', airport_name='$airport_name' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Airport Updated Successfully";
        header("Location: airport.php");
        exit(0);
    }
    else{

        $_SESSION['message'] = "Airport Update Failed";
        header("Location: airport-update.php");
        exit(0);
    }
}

if(isset($_POST['save_direction'])){
    $origin_airport_code = mysqli_real_escape_string($con, $_POST['origin_airport_code']);
    $destination_airport_code = mysqli_real_escape_string($con, $_POST['destination_airport_code']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $query = "INSERT INTO direction (origin_airport_code, destination_airport_code, price) VALUES ('$origin_airport_code', '$destination_airport_code', '$price')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message'] = "Direction Created Successfully";
        header("Location: direction.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Direction Not Created";
        header("Location: direction-create.php");
        exit(0);
    }
}

?>

