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
                        <h4>Add Direction
                            <a href="direction.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["origin_airport_code"].value;
                                var b = document.forms["Form"]["destination_airport_code"].value;
                                var c = document.forms["Form"]["price"].value;
                                if (a == null || a == "", b == null || b == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">
                            <div class="mb-3">
                                <label> Origin Airport Code </label>
                                <input type="text" name="origin_airport_code" placeholder="Enter Origin Aireport Code" class="form-control">
                            </div>
                            <div>
                                <select name="destination_airport_code">
                                    <?php
                                        // php code to display available airports from database
                                        // query to select all available airports in database
                                        $query = "select * from airport";

                                        // Executing query
                                        $query_run = mysqli_query($con, $query);

                                        // count rows to check whether we have airport or not
                                        $count = mysqli_num_rows($query_run);

                                        // if count is greater than 0 we have airport else we do not have an airport
                                        if($count>0)
                                        {
                                            // we have airport
                                            while($row=mysqli_fetch_assoc($query_run))
                                            {
                                                // get the detail of airports
                                                $airport_code = $row['airport_code'];
                                                $airport_name = $row['airport_name'];

                                                ?>
                                                <option value="<?php echo $airport_code; ?>"><?php echo $airport_name; ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            // we do not have airport
                                            ?>
                                            <option value="0">No Airport Found</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label> Price </label>
                                <input type="number" name="price" placeholder="Enter Price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_direction" class="btn btn-primary">Save Direction</button>
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