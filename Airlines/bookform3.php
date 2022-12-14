<?php 

    $connection = mysqli_connect('localhost', 'root', '', 'airline_reservation');

    if(isset($_POST['send'])){
        $credit_type = $_POST['credit_type'];
        $account_number = $_POST['account_number'];

        $request = "insert into payment(credit_type, account_number) 
        values ('$credit_type', '$account_number')";

        mysqli_query($connection, $request);

        header('location:home.php');
    }else{
        echo 'Something went wrong. Please try again.';
    }

?>