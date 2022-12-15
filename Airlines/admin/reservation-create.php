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
  
    <title>Create</title>

  </head>
  <body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Reservation
                            <a href="reservation.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["passenger_id"].value;
                                var b = document.forms["Form"]["flight_id"].value;
                                if (a == null || a == "", b == null || b == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">
                            <div class="mb-3">
                                <label> Passenger ID </label>
                                    <select name="passenger_id">
                                        <?php
                                            // php code to display available passengers from database
                                            // query to select all available passengers in database
                                            $query = "select * from passenger";

                                            // Executing query
                                            $query_run = mysqli_query($con, $query);

                                            // count rows to check whether we have passenger or not
                                            $count = mysqli_num_rows($query_run);

                                            // if count is greater than 0 we have passenger else we do not have an passenger
                                            if($count>0)
                                            {
                                                // we have passenger
                                                while($row=mysqli_fetch_assoc($query_run))
                                                {
                                                    // get the detail of passenger
                                                    $passenger_id = $row['passenger_id'];

                                                    ?>
                                                    <option value="<?php echo $passenger_id; ?>"><?php echo $passenger_id; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                // we do not have passenger
                                                ?>
                                                <option value="0">No Passenger Found</option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label> Flight ID </label>
                                    <select name="flight_id">
                                        <?php
                                            // php code to display available flights from database
                                            // query to select all available flights in database
                                            $query2 = "select * from flight";

                                            // Executing query
                                            $query_run2 = mysqli_query($con, $query2);

                                            // count rows to check whether we have flight or not
                                            $count2 = mysqli_num_rows($query_run2);

                                            // if count is greater than 0 we have flight else we do not have an flight
                                            if($count2>0)
                                            {
                                                // we have flight
                                                while($row2=mysqli_fetch_assoc($query_run2))
                                                {
                                                    // get the detail of flight
                                                    $flight_id = $row2['flight_id'];

                                                    ?>
                                                    <option value="<?php echo $flight_id; ?>"><?php echo $flight_id; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                // we do not have flight
                                                ?>
                                                <option value="0">No Flight Found</option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_reservation" class="btn btn-primary">Save Reservation</button>
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