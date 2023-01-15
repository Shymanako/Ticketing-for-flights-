<?php
require 'admin/dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ticket.css">

    <title>Passenger Data</title>

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Airline Ticket</h4>
                    </div>

                    <form id="act-container" action="about.php" method='POST' class="d-inline">
                        <div class="card-body">

                            <?php
                            if (isset($_POST['finish_booking'])) {
                                $booked_id = mysqli_real_escape_string($con, $_POST['booked_id']);
                            }

                            $query = "SELECT booked_information.booked_id, booked_information.reservation_id, 
                            booked_information.passenger_id, booked_information.flight_id, booked_information.payment_id, 
                            reservation.reservation_id, reservation.passenger_id, reservation.flight_id, passenger.passenger_id, 
                            passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, 
                            passenger.email, flight.flight_id, flight.schedule_id, schedule.schedule_id, schedule.direction_id, schedule.departure_time, 
                            schedule.arrival_time, schedule.airline_id, schedule.price, direction.direction_id, direction.origin_airport_code, 
                            direction.destination_airport_code, airline.airline_id, airline.airline_name, payment.payment_id, payment.payment_method, 
                            payment.payment_amount, payment.cvc, payment.expiry_date, schedule.departure_date FROM booked_information left join reservation on 
                            booked_information.reservation_id = reservation.reservation_id left join passenger on booked_information.passenger_id = 
                            passenger.passenger_id left join flight on booked_information.flight_id = flight.flight_id left join schedule on 
                            flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id 
                            left join airline on schedule.airline_id = airline.airline_id left join payment on booked_information.payment_id = 
                            payment.payment_id where booked_information.booked_id = '$booked_id'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $booked_info = mysqli_fetch_array($query_run);

                            ?>

                                <div class="mb-3">
                                    <label> First Name </label>
                                    <p class="form-control">
                                        <?= $booked_info['first_name']; ?>
                                    </p>
                                    <label> Last Name </label>
                                    <p class="form-control">
                                        <?= $booked_info['last_name']; ?>
                                    </p>

                                    <label> Flight ID </label>
                                    <p class="form-control">
                                        <?= $booked_info['flight_id']; ?>
                                    </p>

                                    <label> From </label>
                                    <?php
                                    $query2 = "select direction.origin_airport_code, airport.airport_name from booked_information left join flight on booked_information.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.origin_airport_code = airport.airport_code where booked_id='$booked_id'";
                                    $query_run2 = mysqli_query($con, $query2);
                                    if (mysqli_num_rows($query_run2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($query_run2)) {
                                            $origin_airport_code = $row2['origin_airport_code'];
                                            $airport_name = $row2['airport_name'];
                                    ?>
                                            <p class="form-control"><?php echo $airport_name; ?></p>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <label> To </label>
                                    <?php
                                    $query2 = "select direction.origin_airport_code, airport.airport_name from booked_information left join flight on booked_information.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.destination_airport_code = airport.airport_code where booked_id='$booked_id'";
                                    $query_run2 = mysqli_query($con, $query2);
                                    if (mysqli_num_rows($query_run2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($query_run2)) {
                                            $origin_airport_code = $row2['origin_airport_code'];
                                            $airport_name = $row2['airport_name'];
                                    ?>
                                            <p class="form-control"><?php echo $airport_name; ?></p>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <label> Departure Date </label>
                                    <p class="form-control">
                                        <?= $booked_info['departure_date']; ?>
                                    </p>

                                    <label> Boarding Time </label>
                                    <p class="form-control">
                                        <?= $booked_info['departure_time']; ?>
                                    </p>
                                </div>

                            <?php
                            } else {
                                echo "<h4>No ID Found</h4>";
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- button container -->
    <div id="btn-container">
        <button>Download Ticket</button>
        <button type="submit">Finish</button>
    </div>

    <!--card container-->
    <div id="card-container">

        <!-- logo -->
        <h1>Airline Ticket</h1>

        <!-- passenger info -->
        
        <!-- entry -->
        <div class="entries">

            <!-- name -->
            <div class="entry-container name-container">
                <h2 class="label">Name:</h2>
                <h3 class="entry">John Doe</h3>
            </div>

            <!-- from -->
            <div class="entry-container">
                <h2 class="label">From:</h2>
                <h3 class="entry">Tanghal</h3>
            </div>

            <!-- to -->
            <div class="entry-container">
                <h2 class="label">To:</h2>
                <h3 class="entry">H</h3>
            </div>

            <!-- flight id -->
            <div class="entry-container">
                <h2 class="label">Flight ID:</h2>
                <h3 class="entry">1234567890</h3>
            </div>

            <!--date -->
            <div class="entry-container">
                <h2 class="label">Date (yyyy-mm-dd):</h2>
                <h3 class="entry">karon</h3>
            </div>

            <!-- time -->
            <div class="entry-container">
                <h2 class="label">Time:</h2>
                <h3 class="entry">taud-taud</h3>
            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>