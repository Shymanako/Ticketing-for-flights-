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
  
    <title>Create</title>

  </head>
  <body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Payment
                            <a href="payment.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["reservation_id"].value;
                                var b = document.forms["Form"]["payment_method"].value;
                                var c = document.forms["Form"]["payment_amount"].value;
                                if (a == null || a == "", b == null || b == "", c == null || c == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>
                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                                <div class="mb-3">
                                    <label> Reservation ID: </label>
                                        <select name="reservation_id">
                                            <?php
                                                // php code to display available reservations from database
                                                // query to select all available reservations in database
                                                $query = "select * from reservation";

                                                // Executing query
                                                $query_run = mysqli_query($con, $query);

                                                // count rows to check whether we have reservation or not
                                                $count = mysqli_num_rows($query_run);

                                                // if count is greater than 0 we have reservation else we do not have an reservation
                                                if($count>0)
                                                {
                                                    // we have reservation
                                                    while($row=mysqli_fetch_assoc($query_run))
                                                    {
                                                        // get the detail of reservation
                                                        $reservation_id = $row['reservation_id'];

                                                        ?>
                                                        <option value="<?php echo $reservation_id; ?>"><?php echo $reservation_id; ?></option>
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
                                
                                <div class="inputBox">
                                    <label> Payment Method: </label>
                                    <input list="payment_method" placeholder="enter Payment method" name="payment_method">
                                    <datalist id="payment_method">
                                        <option value="Visa">
                                        <option value="Mastercard">
                                    </datalist>
                                </div>

                                <div class="mb-3">
                                    <label> Payment Amount: </label>
                                    <input type="number" name="payment_amount" placeholder="Enter payment amount" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="save_payment" class="btn btn-primary">Save Payment</button>
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