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
                        <h4>Update Passenger
                            <a href="passenger.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['passenger_id'])){
                            $passenger_id = mysqli_real_escape_string($con, $_GET['passenger_id']);
                            $query = "SELECT * FROM passenger WHERE passenger_id='$passenger_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $passenger = mysqli_fetch_array($query_run);
                                ?>

                                <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">
                                    <input type="hidden" name="passenger_id" value="<?= $passenger_id;?>">

                                    <div class="mb-3">
                                        <label> Passenger First Name </label>
                                        <input type="text" name="first_name" value="<?= $passenger['first_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Last Name </label>
                                        <input type="text" name="last_name" value="<?= $passenger['last_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Date of Birth </label>
                                        <input type="date" name="date_of_birth" value="<?= $passenger['date_of_birth'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Citizenship </label>
                                        <input type="text" name="citizenship" value="<?= $passenger['citizenship'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Passenger Phone Number </label>
                                        <input type="number" name="phone_number" value="<?= $passenger['phone_number'];?>" class="form-control" maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label> Email </label>
                                        <input type="email" name="email" value="<?= $passenger['email'];?>" class="form-control">
                                    </div><div class="mb-3">
                                        <label> Password </label>
                                        <input type="password" name="password" value="<?= $passenger['password'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_passenger" class="btn btn-primary">Update Passenger</button>
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