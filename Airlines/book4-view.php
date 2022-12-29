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
                        <h4>Payment Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        $query = "Select * from payment order by payment_id desc limit 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $payment = mysqli_fetch_array($query_run);
                        ?>

                            <input type="hidden" name="payment_id" value="<?= $payment['payment_id']; ?>">
                            <div class="mb-3">
                                <label> Payment ID </label>
                                <p class="form-control">
                                    <?= $payment['payment_id']; ?>
                                </p>
                                <label> Reservation ID </label>
                                <p class="form-control">
                                    <?= $payment['reservation_id']; ?>
                                </p>
                                <label> Payment Method </label>
                                <p class="form-control">
                                    <?= $payment['payment_method']; ?>
                                </p>
                                <label> Payment Amount </label>
                                <p class="form-control">
                                    <?= $payment['payment_amount']; ?>
                                </p>
                                <label> CVC Code </label>
                                <p class="form-control">
                                    <?= $payment['cvc']; ?>
                                </p>
                                <label> Expiry Date </label>
                                <p class="form-control">
                                    <?= $payment['expiry_date']; ?>
                                </p>
                            </div>

                            <td>
                                <a href="book3.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-info btn-sm">Confirm</a>
                                <a href="book4.php" class="btn">Cancel</a>
                            </td>

                        <?php
                        } else {
                            echo "<h4>No ID Found</h4>";
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