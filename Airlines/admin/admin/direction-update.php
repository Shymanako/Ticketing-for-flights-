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
                        <h4>Update Direction
                            <a href="direction.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['direction_id'])){
                            $direction_id = mysqli_real_escape_string($con, $_GET['direction_id']);
                            $query = "SELECT * FROM direction WHERE direction_id='$direction_id'";
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_fetch_assoc($query_run);

                            $current_origin_airport_code = $row['origin_airport_code'];
                            $current_destination_airport_code = $row['destination_airport_code'];
                            $price = $row['price'];


                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $direction = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="direction_id" value="<?= $direction_id;?>">

                                    <div class="mb-3">
                                        <label> Origin Airport Code </label>
                                        <div>
                                        <select name="origin_airport_code">
                                            <?php
                                                // php code to display available airports from database
                                                // query to select all available airports in database
                                                $query2 = "select * from airport";

                                                // Executing query
                                                $query_run2 = mysqli_query($con, $query2);

                                                // count rows to check whether we have airport or not
                                                $count2 = mysqli_num_rows($query_run2);

                                                // if count is greater than 0 we have airport else we do not have an airport
                                                if($count2>0)
                                                {
                                                    // we have airport
                                                    while($row2=mysqli_fetch_assoc($query_run2))
                                                    {
                                                        // get the detail of airports
                                                        $airport_code = $row2['airport_code'];
                                                        $airport_name = $row2['airport_name'];

                                                        ?>
                                                        <option <?php if($current_origin_airport_code==$airport_code){echo "selected"; } ?> value="<?php echo $airport_code; ?>"><?php echo $airport_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    // we do not have airport
                                                    ?>
                                                    <option value="0">No Airport Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    </div>
                                        <div class="mb-3">
                                            <label> Destination Airport Code </label>
                                            <div>
                                                <select name="destination_airport_code">
                                                    <?php
                                                        // php code to display available airports from database
                                                        // query to select all available airports in database
                                                        $query3 = "select * from airport";

                                                        // Executing query
                                                        $query_run3 = mysqli_query($con, $query3);

                                                        // count rows to check whether we have airport or not
                                                        $count3 = mysqli_num_rows($query_run3);

                                                        // if count is greater than 0 we have airport else we do not have an airport
                                                        if($count3>0)
                                                        {
                                                            // we have airport
                                                            while($row3=mysqli_fetch_assoc($query_run3))
                                                            {
                                                                // get the detail of airports
                                                                $airport_code = $row3['airport_code'];
                                                                $airport_name = $row3['airport_name'];

                                                                ?>
                                                                <option <?php if($current_destination_airport_code==$airport_code){echo "selected"; } ?> value="<?php echo $airport_code; ?>"><?php echo $airport_name; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            // we do not have airport
                                                            ?>
                                                            <option value="0">No Airport Found</option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                    </div>

                                    <div class="mb-3">
                                        <label> Price </label>
                                        <input type="number" name="price" value="<?php echo $price; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_direction" class="btn btn-primary">Update Direction</button>
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