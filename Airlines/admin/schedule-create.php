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
                        <h4>Add Schedule
                            <a href="schedule.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["direction_id"].value;
                                var b = document.forms["Form"]["departure_time"].value;
                                var c = document.forms["Form"]["arrival_time"].value;
                                var d = document.forms["Form"]["airline_id"].value;
                                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">
                            <div class="mb-3">
                                <label> Direction ID </label>
                                    <select name="direction_id">
                                        <?php
                                            // php code to display available directions from database
                                            // query to select all available directions in database
                                            $query = "select * from direction";

                                            // Executing query
                                            $query_run = mysqli_query($con, $query);

                                            // count rows to check whether we have direction or not
                                            $count = mysqli_num_rows($query_run);

                                            // if count is greater than 0 we have direction else we do not have an direction
                                            if($count>0)
                                            {
                                                // we have direction
                                                while($row=mysqli_fetch_assoc($query_run))
                                                {
                                                    // get the detail of direction
                                                    $direction_id = $row['direction_id'];

                                                    ?>
                                                    <option value="<?php echo $direction_id; ?>"><?php echo $direction_id; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                // we do not have direction
                                                ?>
                                                <option value="0">No Schedule Found</option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <label>Departure :</label>
                                <input type="datetime-local" name="departure_time">
                            </div>
                            <div class="mb-3">
                                <label>Arrival :</label>
                                <input type="datetime-local" name="arrival_time">
                            </div>

                            <div class="mb-3">
                                <label> Airline ID </label>
                                    <select name="airline_id">
                                        <?php
                                            // php code to display available directions from database
                                            // query to select all available directions in database
                                            $query = "select * from airline";

                                            // Executing query
                                            $query_run = mysqli_query($con, $query);

                                            // count rows to check whether we have direction or not
                                            $count = mysqli_num_rows($query_run);

                                            // if count is greater than 0 we have direction else we do not have an direction
                                            if($count>0)
                                            {
                                                // we have direction
                                                while($row=mysqli_fetch_assoc($query_run))
                                                {
                                                    // get the detail of direction
                                                    $airline_id = $row['airline_id'];
                                                    $airline_name = $row['airline_name'];

                                                    ?>
                                                    <option value="<?php echo $airline_id; ?>"><?php echo $airline_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                // we do not have direction
                                                ?>
                                                <option value="0">No Airline Found</option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_schedule" class="btn btn-primary">Save Schedule</button>
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