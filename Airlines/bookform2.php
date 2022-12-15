<?php

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if (isset($_POST['save'])) {
    $flight_id = $_POST['flight_id'];

    $query1 = "Select * from passenger order by passenger_id desc limit 1";

    $query_run = mysqli_query($connection, $query1);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $passenger) {

        ?>
            <input type="hidden" name="passenger_id" value="<?= $passenger['passenger_id']; ?>">
        <?php

            $query2 = "insert into booked_information (flight_id, passenger_id) values ('$flight_id', '$passenger_id')";

            mysqli_query($connection, $query2);

            header('location:book3.php');
        }
    } else {
        echo 'Something went wrong. Please try again.';
    }
}

?>