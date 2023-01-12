<?php
require 'admin/dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/book1-view.css">

    <title>Passenger Data</title>

    <style>
        body {
            min-height: 1200px;
            overflow-x: hidden;
            width: 100%;
        }

        #cancel-btn {
            display: none;
        }
    </style>

</head>

<body>


    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- PROMPT double check entry -->
                        <h4 id="prompt-head">Reservation Details </h4>
                    </div>

                    <form name="Form" action="book4.php" autocomplete="off" onsubmit="return validateForm()" method="post" class="d-inline" required>
                        <!--<div class="card-body">

                            <?php
                            if (isset($_GET['reservation_id'])) {
                                $reservation_id = mysqli_real_escape_string($con, $_GET['reservation_id']);
                            } else {
                                if (isset($_SESSION['reservation'])) {
                                    $reservation_id = $_SESSION['reservation'];
                                }
                            }

                            $query = "Select reservation.passenger_id, reservation.flight_id, passenger.passenger_id, passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, passenger.email from reservation left join passenger on reservation.passenger_id = passenger.passenger_id where reservation.reservation_id = '$reservation_id'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $reservation = mysqli_fetch_array($query_run);

                            ?>
                                <div class="mb-3">
                                    <label> First name </label>
                                    <p class="form-control">
                                        <?= $reservation['first_name']; ?>
                                    </p>

                                    <label> Last Name </label>
                                    <p class="form-control">
                                        <?= $reservation['last_name']; ?>
                                    </p>
                                    <label> Date of birth </label>
                                    <p class="form-control">
                                        <?= $reservation['date_of_birth']; ?>
                                    </p>
                                    <label> Citizenship </label>
                                    <p class="form-control">
                                        <?= $reservation['citizenship']; ?>
                                    </p>
                                    <label> Phone Number </label>
                                    <p class="form-control">
                                        <?= $reservation['p_number']; ?>
                                    </p>
                                    <label> Email </label>
                                    <p class="form-control">
                                        <?= $reservation['email']; ?>
                                    </p>
                                </div>

                                <?php

                                if (isset($_GET['reservation_id'])) {
                                    $reservation_id2 = mysqli_real_escape_string($con, $_GET['reservation_id']);
                                } else {
                                    if (isset($_SESSION['reservation'])) {
                                        $reservation_id2 = $_SESSION['reservation'];
                                    }
                                }

                                $query2 = "Select reservation.passenger_id, reservation.flight_id, flight.flight_id, flight.schedule_id, schedule.schedule_id, direction.direction_id, airline.airline_id, airline.airline_name, direction.origin_airport_code, direction.destination_airport_code, direction.location, schedule.direction_id, schedule.departure_date, schedule.departure_time, schedule.arrival_date, schedule.arrival_time, schedule.airline_id, schedule.price from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airline on schedule.airline_id = airline.airline_id where reservation.reservation_id = '$reservation_id2'";
                                $query_run2 = mysqli_query($con, $query2);

                                if (mysqli_num_rows($query_run2) > 0) {
                                    $reservation2 = mysqli_fetch_array($query_run2);
                                } else {
                                    echo "<h4>No ID Found</h4>";
                                }

                                ?>

                                <div class="mb-3">
                                    <label> Location </label>
                                    <p class="form-control">
                                        <?= $reservation2['location']; ?>
                                    </p>
                                    <label> Origin Airport </label>
                                    <p class="form-control">
                                        <?php
                                        $query3 = "select direction.origin_airport_code, airport.airport_name from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.origin_airport_code = airport.airport_code where reservation_id='$reservation_id'";
                                        $query_run3 = mysqli_query($con, $query3);
                                        if (mysqli_num_rows($query_run3) > 0) {
                                            while ($row3 = mysqli_fetch_assoc($query_run3)) {
                                                $origin_airport_code = $row3['origin_airport_code'];
                                                $airport_name1 = $row3['airport_name'];
                                                echo $airport_name1;
                                            }
                                        }
                                        ?>
                                    </p>
                                    <label> Destination Airport </label>
                                    <p class="form-control">
                                        <?php
                                        $query4 = "select reservation.reservation_id, passenger.passenger_id, direction.origin_airport_code, airport.airport_name from reservation left join passenger on reservation.passenger_id = passenger.passenger_id left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.destination_airport_code = airport.airport_code where reservation_id='$reservation_id'";
                                        $query_run4 = mysqli_query($con, $query4);
                                        if (mysqli_num_rows($query_run4) > 0) {
                                            while ($row4 = mysqli_fetch_assoc($query_run4)) {
                                                $origin_airport_code = $row4['origin_airport_code'];
                                                $passenger_id = $row4['passenger_id'];
                                                $airport_name2 = $row4['airport_name'];
                                                $reservation_id = $row4['reservation_id'];
                                                echo $airport_name2;
                                        ?>
                                                <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
                                        <?php
                                            }
                                        }
                                        ?>
                                    </p>
                                    <label> Departure Date </label>
                                    <p class="form-control">
                                        <?= $reservation2['departure_date']; ?>
                                    </p>
                                    <label> Departure Time </label>
                                    <p class="form-control">
                                        <?= $reservation2['departure_time']; ?>
                                    </p>
                                    <label> Arrival Date </label>
                                    <p class="form-control">
                                        <?= $reservation2['arrival_date']; ?>
                                    </p>
                                    <label> Arrival Time </label>
                                    <p class="form-control">
                                        <?= $reservation2['arrival_time']; ?>
                                    </p>
                                    <label> Airline </label>
                                    <p class="form-control">
                                        <?= $reservation2['airline_name']; ?>
                                    </p>
                                    <label> Price </label>
                                    <p class="form-control">
                                        <?= $reservation2['price']; ?>
                                    </p>
                                </div>

                                <a href="book4.php?reservation_id=<?php echo $reservation_id; ?>" class="btn">continue</a>
                                <td>
                                    <a href="delete.php?d_reservation_id=<?php echo $reservation_id; ?>&d_passenger_id=<?php echo $passenger_id; ?>" class="btn">Cancel</a>
                                </td>

                            <?php
                            } else {
                                echo "<h4>No ID Found</h4>";
                            }
                            ?>
                        </div> -->

                        <div class="card-body">
                            <?php
                            $query = "Select reservation.passenger_id, reservation.flight_id, passenger.passenger_id, passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, passenger.email from reservation left join passenger on reservation.passenger_id = passenger.passenger_id where reservation.reservation_id = '$reservation_id'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $reservation = mysqli_fetch_array($query_run);

                            ?>
                                <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
                                <input type="hidden" name="passenger_id" value="<?php echo $passenger_id; ?>">


                                <!-- main card -->
                                <div id="main-card">

                                    <!-- entry container -->
                                    <div id="entry-container">

                                        <!-- indv entries -->

                                        <!-- First Name -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">First Name:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['first_name']; ?></h4>

                                        </div>

                                        <!-- Last Name -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Last Name:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['last_name']; ?></h4>

                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Date of Birth:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['date_of_birth']; ?></h4>

                                        </div>

                                        <!-- Citizenship -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Citizenship:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['citizenship']; ?></h4>

                                        </div>

                                        <!-- Phone Number -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Phone Number:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['p_number']; ?></h4>

                                        </div>

                                        <!-- Email -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Email:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation['email']; ?></h4>

                                        </div>

                                        <!-- Location -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Location:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['location']; ?></h4>

                                        </div>

                                        <!-- Origin Airport -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Origin Airport:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?php echo $airport_name1; ?></h4>

                                        </div>

                                        <!-- Destination Airport -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Destination Airport:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?php echo $airport_name2; ?></h4>

                                        </div>

                                        <!-- Departure Date -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Departure Date:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['departure_date']; ?></h4>

                                        </div>

                                        <!-- Departure Time -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Departure Time:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['departure_time']; ?></h4>

                                        </div>

                                        <!-- Arrival Date -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Arrival Date:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['arrival_date']; ?></h4>

                                        </div>

                                        <!-- Arrival Time -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Arrival Time:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['arrival_time']; ?></h4>

                                        </div>

                                        <!-- Airline -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Airline:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['airline_name']; ?></h4>

                                        </div>

                                        <!-- Price -->
                                        <div class="indv-container">

                                            <!-- label -->
                                            <h2 class="label">Price:</h2>

                                            <!-- entry -->
                                            <h4 class="entry"><?= $reservation2['price']; ?></h4>

                                        </div>

                                    </div>

                                    <div id="act-container">
                                        <a id="confirm-btn" href="book4.php?reservation_id=<?php echo $reservation_id; ?>" class="btn btn-info btn-sm">continue</a>
                                        <td>
                                            <a href="delete.php?d_reservation_id=<?php echo $reservation_id; ?>&d_passenger_id=<?php echo $passenger_id; ?>" class="btn" onclick="history.back()">Cancel</a>
                                        </td>

                                    </div>

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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>