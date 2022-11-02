<?php 

    $connection = mysqli_connect('localhost', 'root', '', 'book_db');

    if(isset($_POST['send'])){
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $citizenship = $_POST['citizenship'];

        $request = "insert into passenger(first_name, middle_name, last_name, age,
        birthdate, email, phone, citizenship) values ('$first_name', '$middle_name', 
        '$last_name', '$age', '$birthdate', '$email', '$phone', '$citizenship')";

        mysqli_query($connection, $request);

        header('location:book2.php');
    }else{
        echo 'Something went wrong. Please try again.';
    }

?>