<?php
require 'admin/dbcon.php';
require 'admin/message.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="css/book1-view.css">

    <title>Passenger Data</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('admin/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- PROMPT double check entry -->
                        <h4 id="prompt-head">Payment Details</h4>
                    </div>

                    <!-- <form action="bookform4.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>
                        <div class="card-body">

                            <?php
                            $query = "select payment.payment_id, payment.reservation_id, payment.payment_method, payment.payment_amount, payment.cvc, payment.expiry_date, reservation.reservation_id, reservation.passenger_id, reservation.flight_id from payment left join reservation on payment.reservation_id = reservation.reservation_id order by payment_id desc limit 1";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $payment = mysqli_fetch_array($query_run);
                            ?>

                                <input type="hidden" name="payment_id" value="<?= $payment['payment_id']; ?>">
                                <input type="hidden" name="passenger_id" value="<?= $payment['passenger_id']; ?>">
                                <input type="hidden" name="reservation_id" value="<?= $payment['reservation_id']; ?>">
                                <input type="hidden" name="flight_id" value="<?= $payment['flight_id']; ?>">

                                <div class="mb-3">
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
   
                                <button type="submit" name="save_book" value="<?= $payment['payment_id']; ?>" class="btn btn-info btn-sm">Confirm</button>

                            <?php
                            } else {
                                echo "<h4>No ID Found</h4>";
                            }
                            ?>
                        </div>  
                    </form> -->

                    <!-- actions form -->

                    <form action="bookform4.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>

                        <div class="card-body">

                            <?php
                            $query2 = "select payment.payment_id, payment.reservation_id, payment.payment_method, payment.payment_amount, payment.cvc, payment.expiry_date, reservation.reservation_id, reservation.passenger_id, reservation.flight_id from payment left join reservation on payment.reservation_id = reservation.reservation_id order by payment_id desc limit 1";
                            $query_run2 = mysqli_query($con, $query2);

                            if (mysqli_num_rows($query_run2) > 0) {
                                foreach ($query_run2 as $payment) {

                                    // echo
                            ?>
                                    <input type="hidden" name="payment_id" value="<?= $payment['payment_id']; ?>">
                                    <input type="hidden" name="passenger_id" value="<?= $payment['passenger_id']; ?>">
                                    <input type="hidden" name="reservation_id" value="<?= $payment['reservation_id']; ?>">
                                    <input type="hidden" name="flight_id" value="<?= $payment['flight_id']; ?>">

                                    <!-- main card -->
                                    <div id="main-card">

                                        <!-- entry container -->
                                        <div id="entry-container">

                                            <!-- indv entries -->

                                            <!-- Reservation ID -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Reservation ID:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $payment['reservation_id']; ?></h4>

                                            </div>

                                            <!-- Payment Method -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Payment Method:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $payment['payment_method']; ?></h4>

                                            </div>

                                            <!-- Payment Amount -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Payment Amount:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $payment['payment_amount']; ?></h4>

                                            </div>

                                            <!-- CVC Code -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">CVC Code:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $payment['cvc']; ?></h4>

                                            </div>

                                            <!-- Expiry Date -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Expiry Date:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $payment['expiry_date']; ?></h4>

                                            </div>

                                        </div>


                                        <!-- confirm -->
                                        <button id="confirm-btn" type="submit" name="save_book" value="<?= $payment['payment_id']; ?>" class="btn btn-info btn-sm">Confirm</button>

                                        <!-- Cancel -->
                                        <a id="cancel-btn" href="delete.php?p_payment_id=<?= $payment['payment_id']; ?>&p_reservation_id=<?= $payment['reservation_id']; ?>" class="btn" onclick="history.back()">Cancel</a>

                                    </div>
                            <?php
                                }
                            } else {
                                echo '<h5>No Record Found </h5>';
                            }
                            ?>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>