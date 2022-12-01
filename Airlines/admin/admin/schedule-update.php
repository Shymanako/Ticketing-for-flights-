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
                        <h4>Update Schedule
                            <a href="schedule.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['schedule_id'])){
                            $schedule_id = mysqli_real_escape_string($con, $_GET['schedule_id']);
                            $query = "SELECT * FROM schedule WHERE schedule_id='$schedule_id'";
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($query_run);

                            $current_direction_id = $row['direction_id'];
                            $departure_time = $row['departure_time'];
                            $arrival_time = $row['arrival_time'];
                            $current_airline_id = $row['airline_id'];


                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $schedule = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="schedule_id" value="<?= $schedule_id;?>">

                                    <div class="mb-3">
                                        <label> Direction ID </label>
                                        <div>
                                        <select name="direction_id">
                                            <?php
                                                // php code to display available directions from database
                                                // query to select all available directions in database
                                                $query2 = "select * from direction";

                                                // Executing query
                                                $query_run2 = mysqli_query($con, $query2);

                                                // count rows to check whether we have direction or not
                                                $count2 = mysqli_num_rows($query_run2);

                                                // if count is greater than 0 we have direction else we do not have an direction
                                                if($count2>0)
                                                {
                                                    // we have direction
                                                    while($row2=mysqli_fetch_assoc($query_run2))
                                                    {
                                                        // get the detail of direction
                                                        $direction_id = $row2['direction_id'];

                                                        ?>
                                                        <option <?php if($current_direction_id==$direction_id){echo "selected"; } ?> value="<?php echo $direction_id; ?>"><?php echo $direction_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    // we do not have direction
                                                    ?>
                                                    <option value="0">No Direction Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Departure :</label>
                                        <input type="datetime-local" value="<?php echo $departure_time; ?>" name="departure_time">
                                    </div>
                                    <div class="mb-3">
                                        <label>Arrival :</label>
                                        <input type="datetime-local" value="<?php echo $arrival_time; ?>" name="arrival_time">
                                    </div>

                                    <div class="mb-3">
                                        <label> Airline ID </label>
                                            <select name="airline_id">
                                                <?php
                                                    // php code to display available directions from database
                                                    // query to select all available directions in database
                                                    $query3 = "select * from airline";

                                                    // Executing query
                                                    $query_run3 = mysqli_query($con, $query3);

                                                    // count rows to check whether we have direction or not
                                                    $count3 = mysqli_num_rows($query_run3);

                                                    // if count is greater than 0 we have direction else we do not have an direction
                                                    if($count3>0)
                                                    {
                                                        // we have direction
                                                        while($row3=mysqli_fetch_assoc($query_run3))
                                                        {
                                                            // get the detail of direction
                                                            $airline_id = $row3['airline_id'];
                                                            $airline_name = $row3['airline_name'];

                                                            ?>
                                                            <option <?php if($current_airline_id==$airline_id){echo "selected"; } ?> value="<?php echo $airline_id; ?>"><?php echo $airline_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        // we do not have direction
                                                        ?>
                                                        <option value="0">No Airline Found</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_schedule" class="btn btn-primary">Update Schedule</button>
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