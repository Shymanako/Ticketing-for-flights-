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
                        <h4>Update Payment
                            <a href="payment.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_GET['payment_id'])){
                            $payment_id = mysqli_real_escape_string($con, $_GET['payment_id']);
                            $query = "SELECT * FROM payment WHERE payment_id='$payment_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $payment = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="payment_id" value="<?= $payment_id;?>">

                                    <div class="mb-3">
                                        <label> Reservation ID </label>
                                        <input list="credit_type" type="text" name="reservation_id" value="<?= $payment['reservation_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Payment Method </label>
                                        <input type="text" name="payment_method" value="<?= $payment['payment_method'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Payment Amount </label>
                                        <input type="text" name="payment_amount" value="<?= $payment['payment_amount'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_payment" class="btn btn-primary">Update Payment</button>
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