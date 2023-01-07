<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>View</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Flight Details
                            <a href="flight.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['flight_id'])) {
                            $flight_id = mysqli_real_escape_string($con, $_GET['flight_id']);
                            $query = "SELECT * FROM flight WHERE flight_id='$flight_id'";
                            $query_run = mysqli_query($con, $query);
                            $count = mysqli_num_rows($query_run);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    $flight_id = $row['flight_id'];
                                    $schedule_id = $row['schedule_id'];
                                    $image = $row['image'];
                                    $description = $row['description'];

                                ?>

                                    <div class="mb-3">
                                        <label> Flight ID </label>
                                        <p class="form-control"><?php echo $flight_id; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Schedule ID </label>
                                        <p class="form-control"><?php echo $schedule_id; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Image </label>
                                        <p class="form-control">
                                            <?php
                                            // check whether image is available or not
                                            if ($image) {
                                                // display image
                                            ?>
                                                <img src="<?php echo 'http://localhost/Ticketing-for-flights-/Airlines/'; ?>img/flight/<?php echo $image; ?>" width="100px">
                                            <?php
                                            } else {
                                                // Display message
                                                echo "Image not added";
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Description </label>
                                        <p class="form-control"><?php echo $description; ?></p>
                                    </div>

                                <?php
                                }
                            } else {
                                echo '<h5>No Record Found </h5>';
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