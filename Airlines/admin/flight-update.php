<?php
session_start();
require 'dbcon.php';
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
                        <h4>Update Flight
                            <a href="flight.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['flight_id'])) {
                            $flight_id = mysqli_real_escape_string($con, $_GET['flight_id']);
                            $query = "SELECT * FROM flight WHERE flight_id='$flight_id'";
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($query_run);

                            $current_schedule_id = $row['schedule_id'];
                            $current_image = $row['image'];

                            if (mysqli_num_rows($query_run) > 0) {
                                $flight = mysqli_fetch_array($query_run);
                        ?>

                                <form action="code.php" autocomplete="off" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="flight_id" value="<?= $flight_id; ?>">

                                    <div class="mb-3">
                                        <label> Schedule ID </label>
                                        <select name="schedule_id">
                                            <?php
                                            // php code to display available schedules from database
                                            // query to select all available schedules in database
                                            $query2 = "select * from schedule";

                                            // Executing query
                                            $query_run2 = mysqli_query($con, $query2);

                                            // count rows to check whether we have schedule or not
                                            $count2 = mysqli_num_rows($query_run2);

                                            // if count is greater than 0 we have schedule else we do not have an schedule
                                            if ($count2 > 0) {
                                                // we have schedule
                                                while ($row2 = mysqli_fetch_assoc($query_run2)) {
                                                    // get the detail of schedule
                                                    $schedule_id = $row2['schedule_id'];

                                            ?>
                                                    <option <?php if ($current_schedule_id == $schedule_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $schedule_id; ?>"><?php echo $schedule_id; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // we do not have schedule
                                                ?>
                                                <option value="0">No schedule Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label> Current Image </label>
                                        <td>
                                            <?php
                                            if ($current_image != "") {
                                                // Display the image
                                            ?>
                                                <img src="<?php echo 'http://localhost/Ticketing-for-flights-/Airlines/'; ?>img/flight/<?php echo $current_image; ?>" width="150px">
                                            <?php
                                            } else {
                                                // display message
                                                echo "Image not added";
                                            }
                                            ?>
                                        </td>
                                    </div>

                                    <div class="mb-3">
                                        <label> New Image </label>
                                        <td>
                                            <input type="file" name="image">
                                        </td>
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                        <input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
                                        <button type="submit" name="update_flight" class="btn btn-primary">Update Flight</button>
                                    </div>

                                </form>

                        <?php
                            } else {
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