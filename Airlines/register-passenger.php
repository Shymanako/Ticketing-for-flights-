<?php 
session_start();
require 'admin/dbcon.php';

    $connection = mysqli_connect('localhost', 'root', '', 'book_db');

    if(isset($_POST['save_passenger'])){
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
        $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
        $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
        $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
    
        $query = "INSERT INTO passenger (first_name, last_name, date_of_birth, citizenship, phone_number, email, password) VALUES ('$first_name', '$last_name', '$date_of_birth', '$citizenship', '$phone_number', '$email', '$password')";
    
        $query_run = mysqli_query($con, $query);
        if($query_run){
    
            $_SESSION['message'] = "Passenger Created Successfully";
            header("Location: about.php");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Passenger Not Created";
            header("Location: create-passenger.php");
            exit(0);
        }
    }


?>

