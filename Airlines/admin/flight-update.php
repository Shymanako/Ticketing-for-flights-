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
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['id'])){
                            $flight_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM flight WHERE fid='$flight_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $flight = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="flight_id" value="<?= $flight_id;?>">

                                    <div class="mb-3">
                                        <label> Flight Location </label>
                                        <input type="text" name="location" value="<?= $flight['location'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Flight Destination </label>
                                        <input list="destination" type="text" name="destination" value="<?= $flight['destination'];?>" class="form-control">
                                        <datalist id="destination">
                                            <option value="Manila">
                                            <option value="Tokyo">
                                            <option value="Seoul">
                                            <option value="Agra">
                                            <option value="Beijing">
                                            <option value="Hanoi">
                                            <option value="Kuala Lumpur">
                                            <option value="Rio De Janeiro">
                                            <option value="Singapore">
                                            <option value="Reykjavik">
                                            <option value="Paris">
                                            <option value="Bali">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label> Flight Airlines </label>
                                        <input list="airlines" type="text" name="airlines" value="<?= $flight['airlines'];?>" class="form-control">
                                        <datalist id="airlines">
                                            <option value="Cebu Pacific">
                                            <option value="Philippine Airlines">
                                            <option value="Air Asia">
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label> Flight Departure </label>
                                        <input type="datetime-local" name="departure" value="<?= $flight['departure'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Flight Arrival </label>
                                        <input type="datetime-local" name="arrival" value="<?= $flight['arrival'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_flight" class="btn btn-primary">Update Flight</button>
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