<?php
require 'admin/dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
    <title>View</title>

  </head>
  <body>


    <div class="container mt-5">

        <?php include('admin/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Schedule Details
                            <a href="book2.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                            if(isset($_GET['schedule_id'])){
                            $schedule_id = mysqli_real_escape_string($con, $_GET['schedule_id']);
                            $query = "SELECT * FROM schedule WHERE schedule_id='$schedule_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $schedule = mysqli_fetch_array($query_run);
                                ?>
                                    <div class="mb-3">
                                        <label> Direction ID </label>
                                        <p class="form-control"><?=$schedule['direction_id'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Departure Time </label>
                                        <p class="form-control"><?=$schedule['departure_time'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Arrival Time </label>
                                        <p class="form-control"><?=$schedule['arrival_time'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Airline ID </label>
                                        <p class="form-control"><?=$schedule['airline_id'];?></p>
                                    </div>
                                    <a href="book3.php" class="btn btn-info float-end">Next</a>
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