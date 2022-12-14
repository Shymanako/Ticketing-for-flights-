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
                        <h4>Add Flight
                            <a href="flight.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["schedule_id"].value;
                                if (a == null || a == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                    <label> Schedule ID </label>
                                        <select name="schedule_id">
                                            <?php
                                                // php code to display available schedules from database
                                                // query to select all available schedules in database
                                                $query = "select * from schedule";

                                                // Executing query
                                                $query_run = mysqli_query($con, $query);

                                                // count rows to check whether we have schedule or not
                                                $count = mysqli_num_rows($query_run);

                                                // if count is greater than 0 we have schedule else we do not have an schedule
                                                if($count>0)
                                                {
                                                    // we have schedule
                                                    while($row=mysqli_fetch_assoc($query_run))
                                                    {
                                                        // get the detail of schedule
                                                        $schedule_id = $row['schedule_id'];

                                                        ?>
                                                        <option value="<?php echo $schedule_id; ?>"><?php echo $schedule_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    // we do not have schedule
                                                    ?>
                                                    <option value="0">No schedule Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="save_flight" class="btn btn-primary">Save Flight</button>
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