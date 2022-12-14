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
                            $row = mysqli_fetch_assoc($query_run);

                            $current_reservation_id = $row['reservation_id'];
                            $payment_method = $row['payment_method'];
                            $payment_amount = $row['payment_amount'];

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $payment = mysqli_fetch_array($query_run);
                                ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="payment_id" value="<?= $payment_id;?>">

                                    <div class="mb-3">
                                        <label> Reservation ID </label>
                                        <div>
                                        <select name="reservation_id">
                                            <?php
                                                // php code to display available reservations from database
                                                // query to select all available reservations in database
                                                $query2 = "select * from reservation";

                                                // Executing query
                                                $query_run2 = mysqli_query($con, $query2);

                                                // count rows to check whether we have reservation or not
                                                $count2 = mysqli_num_rows($query_run2);

                                                // if count is greater than 0 we have reservation else we do not have an reservation
                                                if($count2>0)
                                                {
                                                    // we have reservation
                                                    while($row2=mysqli_fetch_assoc($query_run2))
                                                    {
                                                        // get the detail of reservation
                                                        $reservation_id = $row2['reservation_id'];

                                                        ?>
                                                        <option <?php if($current_reservation_id==$reservation_id){echo "selected"; } ?> value="<?php echo $reservation_id; ?>"><?php echo $reservation_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    // we do not have reservation
                                                    ?>
                                                    <option value="0">No Reservation Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label> Payment Method: </label>
                                        <input list="payment_method" value="<?php echo $payment_method; ?>" name="payment_method">
                                        <datalist id="payment_method">
                                            <option value="Visa">
                                            <option value="Mastercard">
                                        </datalist>
                                    </div>

                                    <div class="mb-3">
                                        <label>Payment Amount: </label>
                                        <input type="number" value="<?php echo $payment_amount; ?>" name="payment_amount">
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