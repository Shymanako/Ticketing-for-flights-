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
                        <h4>Flight Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        $query = "Select reservation.reservation_id, reservation.passenger_id, reservation.flight_id, direction.location, airline.airline_name, direction.origin_airport_code, direction.destination_airport_code, direction.location, schedule.departure_time, schedule.arrival_time, schedule.airline_id, schedule.price from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airline on schedule.airline_id = airline.airline_id order by reservation_id desc limit 1";
                        $query_run = mysqli_query($con, $query);


                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $flight_id = $row['flight_id'];
                                $passenger_id = $row['passenger_id'];
                                $reservation_id = $row['reservation_id'];
                                $origin_airport_code = $row['origin_airport_code'];
                                $destination_airport_code = $row['destination_airport_code'];
                                $location = $row['location'];
                                $departure_time = $row['departure_time'];
                                $arrival_time = $row['arrival_time'];
                                $price = $row['price'];

                                ?>

                                <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">

                                <div class="mb-3">
                                    <label> Flight ID </label>
                                    <p class="form-control">
                                        <?php echo $flight_id; ?>
                                    </p>
                                    <label> Location </label>
                                    <p class="form-control">
                                        <?php echo $location; ?>
                                    </p>
                                        <?php
                                            $query2 = "select direction.origin_airport_code, airport.airport_name from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.origin_airport_code = airport.airport_code where flight_id='$flight_id'";
                                            $query_run2 = mysqli_query($con, $query2);
                                            if(mysqli_num_rows($query_run2) > 0){
                                                while ($row2 = mysqli_fetch_assoc($query_run2)){
                                                    $origin_airport_code = $row2['origin_airport_code'];
                                                    $airport_name = $row2['airport_name'];

                                                    ?>
                                                    <label> Origin Airport </label>
                                                    <p class="form-control"><?php echo $airport_name; ?></p>
                                                    <?php
                                                    
                                                }
                                            }
                                            
                                        
                                        ?>
                                        <?php
                                            $query3 = "select direction.destination_airport_code, airport.airport_name from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.destination_airport_code = airport.airport_code where flight_id='$flight_id'";
                                            $query_run3 = mysqli_query($con, $query3);
                                            if(mysqli_num_rows($query_run3) > 0){
                                                while ($row3 = mysqli_fetch_assoc($query_run3)){
                                                    $airport_name = $row3['airport_name'];

                                                    ?>
                                                    <label> Destination Airport </label>
                                                    <p class="form-control"><?php echo $airport_name; ?></p>
                                                    <?php
                                                    
                                                }
                                            }
                                            
                                        
                                        ?>
                                    <label> Departure Time </label>
                                    <p class="form-control">
                                        <?php echo $departure_time; ?>
                                    </p>
                                    <label> Arrival Time </label>
                                    <p class="form-control">
                                        <?php echo $arrival_time; ?>
                                    </p>
                                    <label> Price </label>
                                    <p class="form-control">
                                        <?php echo $price; ?>
                                    </p>
                                </div>

                                <td>
                                    <a href="book3.php?reservation_id=<?php echo $reservation_id; ?>" class="btn btn-info btn-sm">Confirm</a>
                                    <a href="delete.php?reservation_id=<?php echo $reservation_id; ?>&passenger_id=<?php echo $passenger_id; ?>" class="btn">Back</a>
                                </td>

                                <?php
                            }
                        } else {
                            echo "<h4>No ID Found</h4>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>