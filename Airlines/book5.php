<?php
require 'admin/dbcon.php';
require 'admin/message.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Passenger Data</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('admin/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Booking Details
                        </h4>
                    </div>

                    <form id="act-container" action="about.php" method='POST' class="d-inline">
                        <div class="card-body">

                            <?php

                            $query = "SELECT booked_information.booked_id, booked_information.reservation_id, 
                            booked_information.passenger_id, booked_information.flight_id, booked_information.payment_id, 
                            reservation.reservation_id, reservation.passenger_id, reservation.flight_id, passenger.passenger_id, 
                            passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, 
                            passenger.email, flight.flight_id, flight.schedule_id, schedule.schedule_id, schedule.direction_id, schedule.departure_time, 
                            schedule.arrival_time, schedule.airline_id, schedule.price, direction.direction_id, direction.origin_airport_code, 
                            direction.destination_airport_code, airline.airline_id, airline.airline_name, payment.payment_id, payment.payment_method, 
                            payment.payment_amount, payment.cvc, payment.expiry_date FROM booked_information left join reservation on 
                            booked_information.reservation_id = reservation.reservation_id left join passenger on booked_information.passenger_id = 
                            passenger.passenger_id left join flight on booked_information.flight_id = flight.flight_id left join schedule on 
                            flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id 
                            left join airline on schedule.airline_id = airline.airline_id left join payment on booked_information.payment_id = 
                            payment.payment_id order by booked_id desc limit 1";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $booked_info = mysqli_fetch_array($query_run);
                            
                            ?>

                                <div class="mb-3">
                                    <label> Reservation ID </label>
                                    <p class="form-control">
                                        <?= $booked_info['reservation_id']; ?>
                                    </p>

                                    <label> Passenger ID </label>
                                    <p class="form-control">
                                        <?= $booked_info['passenger_id']; ?>
                                    </p>
                                    <label> First Name </label>
                                    <p class="form-control">
                                        <?= $booked_info['first_name']; ?>
                                    </p>
                                    <label> Last Name </label>
                                    <p class="form-control">
                                        <?= $booked_info['last_name']; ?>
                                    </p>
                                    <label> Date of Birth </label>
                                    <p class="form-control">
                                        <?= $booked_info['date_of_birth']; ?>
                                    </p>
                                    <label> Citizenship </label>
                                    <p class="form-control">
                                        <?= $booked_info['citizenship']; ?>
                                    </p>
                                    <label> Phone Number </label>
                                    <p class="form-control">
                                        <?= $booked_info['p_number']; ?>
                                    </p>
                                    <label> Email </label>
                                    <p class="form-control">
                                        <?= $booked_info['email']; ?>
                                    </p>

                                    <label> Flight ID </label>
                                    <p class="form-control">
                                        <?= $booked_info['flight_id']; ?>
                                    </p>
                                    <label> Direction </label>
                                    <p class="form-control">
                                        <?= $booked_info['origin_airport_code']; ?> to <?= $booked_info['destination_airport_code']; ?>
                                    </p>
                                    <label> Departure Time </label>
                                    <p class="form-control">
                                        <?= $booked_info['departure_time']; ?>
                                    </p>
                                    <label> Arrival Time </label>
                                    <p class="form-control">
                                        <?= $booked_info['arrival_time']; ?>
                                    </p>
                                    <label> Airline </label>
                                    <p class="form-control">
                                        <?= $booked_info['airline_name']; ?>
                                    </p>
                                    <label> Price </label>
                                    <p class="form-control">
                                        <?= $booked_info['price']; ?>
                                    </p>

                                    <label> Payment ID </label>
                                    <p class="form-control">
                                        <?= $booked_info['payment_id']; ?>
                                    </p>
                                    <label> Payment Method </label>
                                    <p class="form-control">
                                        <?= $booked_info['payment_method']; ?>
                                    </p>
                                    <label> Payment Amount </label>
                                    <p class="form-control">
                                        <?= $booked_info['payment_amount']; ?>
                                    </p>
                                    <label> CVC </label>
                                    <p class="form-control">
                                        <?= $booked_info['cvc']; ?>
                                    </p>
                                    <label> Expiration Date </label>
                                    <p class="form-control">
                                        <?= $booked_info['expiry_date']; ?>
                                    </p>
                                </div>

                                <!-- confirm -->
                                <button type="submit" name="finish_booking" value="<?= $booked_info['booked_id']; ?>" class="btn btn-info btn-sm">Finish</a>
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