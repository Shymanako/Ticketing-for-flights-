<?php 

    $connection = mysqli_connect('localhost', 'root', '', 'airline_reservation');

    if(isset($_POST['send'])){
        $location = $_POST['location'];
        $destination = $_POST['destination'];
        $airlines = $_POST['airlines'];
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];

        $request = "insert into flight(location, destination, airlines, departure, arrival) 
        values ('$location', '$destination', '$airlines', '$departure', '$arrival')";

        mysqli_query($connection, $request);

        header('location:book3.php');
    }else{
        echo 'Something went wrong. Please try again.';
    }

?>