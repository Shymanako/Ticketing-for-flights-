<?php
session_start();
require 'dbcon.php';
include('partials/login-check.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
    <title>Update</title>

  </head>
  <body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Reservation
                            <a href="reservation.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['reservation_id'])){
                            $reservation_id = mysqli_real_escape_string($con, $_GET['reservation_id']);
                            $query = "SELECT * FROM reservation WHERE reservation_id='$reservation_id'";
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($query_run);

                            $current_passenger_id = $row['passenger_id'];
                            $current_flight_id = $row['flight_id'];
                            $reservation_status = $row['reservation_status'];

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $schedule = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="reservation_id" value="<?= $reservation_id;?>">

                                    <div class="mb-3">
                                        <label> Passenger ID </label>
                                        <div>
                                        <select name="passenger_id">
                                            <?php
                                                // php code to display available passengers from database
                                                // query to select all available passengers in database
                                                $query2 = "select * from passenger";

                                                // Executing query
                                                $query_run2 = mysqli_query($con, $query2);

                                                // count rows to check whether we have passenger or not
                                                $count2 = mysqli_num_rows($query_run2);

                                                // if count is greater than 0 we have passenger else we do not have an passenger
                                                if($count2>0)
                                                {
                                                    // we have passenger
                                                    while($row2=mysqli_fetch_assoc($query_run2))
                                                    {
                                                        // get the detail of passenger
                                                        $passenger_id = $row2['passenger_id'];

                                                        ?>
                                                        <option <?php if($current_passenger_id==$passenger_id){echo "selected"; } ?> value="<?php echo $passenger_id; ?>"><?php echo $passenger_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    // we do not have passenger
                                                    ?>
                                                    <option value="0">No Passenger Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label> Flight ID </label>
                                            <select name="flight_id">
                                                <?php
                                                    // php code to display available flights from database
                                                    // query to select all available flights in database
                                                    $query3 = "select * from flight";

                                                    // Executing query
                                                    $query_run3 = mysqli_query($con, $query3);

                                                    // count rows to check whether we have flight or not
                                                    $count3 = mysqli_num_rows($query_run3);

                                                    // if count is greater than 0 we have flight else we do not have an flight
                                                    if($count3>0)
                                                    {
                                                        // we have flight
                                                        while($row3=mysqli_fetch_assoc($query_run3))
                                                        {
                                                            // get the detail of flight
                                                            $flight_id = $row3['flight_id'];

                                                            ?>
                                                            <option <?php if($current_flight_id==$flight_id){echo "selected"; } ?> value="<?php echo $flight_id; ?>"><?php echo $flight_id; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        // we do not have flight
                                                        ?>
                                                        <option value="0">No Flight Found</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Reservation Status :</label>
                                        <input type="number" value="<?php echo $reservation_status; ?>" name="reservation_status">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_reservation" class="btn btn-primary">Update Reservation</button>
                                    </div>

                                </form>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No ID Found</h4>";
                            }
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