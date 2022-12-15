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
                        if (isset($_GET['flight_id'])) {

                            $flight_id = mysqli_real_escape_string($con, $_GET['flight_id']);
                            $query = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, direction.origin_airport_code, direction.destination_airport_code from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id where flight_id = '$flight_id';";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $flight = mysqli_fetch_array($query_run);
                                ?>

                                <input type="hidden" name="flight_id" value="<?=$flight['flight_id'];?>">
                                    <div class="mb-3">
                                        <label> Flight Destination   </label>
                                        <p class="form-control">
                                            <?=$flight['origin_airport_code'];?> 
                                        </p>
                                        <p>To</p>
                                        <p class="form-control">
                                            <?=$flight['destination_airport_code'];?> 
                                        </p>
                                    </div>

                                    <td>
                                        <form action="bookform2.php" method='POST' class="d-inline">
                                            <button type="submit" name="save" value="<?= $flight['flight_id']; ?>" class="btn">Confirm</a>
                                        </form>
                                        <a href="book2.php" class="btn">Cancel</a>
                                    </td>

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