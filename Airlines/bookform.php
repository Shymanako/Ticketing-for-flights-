<?php 

    $connection = mysqli_connect('localhost', 'root', '', 'airline_reservation');

    if(isset($_POST['send'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $citizenship = $_POST['citizenship'];
        $p_number = $_POST['p_number'];
        $email = $_POST['email'];

        $request = "insert into passenger(first_name, last_name, date_of_birth, citizenship, p_number, email) values ('$first_name', 
        '$last_name', '$date_of_birth', '$citizenship', '$p_number', '$email')";

        mysqli_query($connection, $request);

        header('location:book1-view.php');
    }else{
        echo 'Something went wrong. Please try again.';
    }
