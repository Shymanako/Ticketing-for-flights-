<?php
require 'dbcon.php';
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

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Direction Details
                            <a href="direction.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['direction_id'])){
                            $direction_id = mysqli_real_escape_string($con, $_GET['direction_id']);
                            $query = "SELECT * FROM direction WHERE direction_id='$direction_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $direction = mysqli_fetch_array($query_run);
                                ?>
                                    <div class="mb-3">
                                        <label> Origin Airport Code </label>
                                        <p class="form-control"><?=$direction['origin_airport_code'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Destination Airport Code </label>
                                        <p class="form-control"><?=$direction['destination_airport_code'];?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Price </label>
                                        <p class="form-control"><?=$direction['price'];?></p>
                                    </div>

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