<?php
session_start();
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
                        <h4 id="prompt-head">Double Check Your Entries </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        $query = "Select * from passenger order by passenger_id desc limit 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $passenger) {

                                // echo
                        ?>
                                <!-- <tr>
                                    <input type="hidden" name="passenger_id" value="<?= $passenger['passenger_id']; ?>">
                                    <td><?= $passenger['first_name']; ?></td>
                                    <td><?= $passenger['last_name']; ?></td>
                                    <td><?= $passenger['date_of_birth']; ?></td>
                                    <td><?= $passenger['citizenship']; ?></td>
                                    <td><?= $passenger['p_number']; ?></td>
                                    <td><?= $passenger['email']; ?></td>

                                    <td>
                                        <a href="book2.php?passenger_id=<?= $passenger['passenger_id']; ?>" class="btn">Confirm</a>
                                        <form action="delete.php" method='POST' class="d-inline">
                                            <button type="submit" name="delete_passenger" value="<?= $passenger['passenger_id']; ?>" class="btn">Cancel</button>
                                        </form>
                                    </td>
                                </tr> -->

                                <!-- main card -->
                                <div id="main-card">

                                    <!-- entry container -->
                                    <div id="entry-container">

                                        <!-- indv entries -->

                                            <!-- fname -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">First Name:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['first_name']; ?></h4>

                                            </div>

                                            <!-- lname -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Last Name:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['last_name']; ?></h4>

                                            </div>
                                            
                                            <!-- date of birth -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Date of Birth (yyyy-mm-dd):</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['date_of_birth']; ?></h4>

                                            </div>
                                            
                                            <!-- citizenship -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Citizenship:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['citizenship']; ?></h4>

                                            </div>
                                            
                                            <!-- phone -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Phone Number:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['p_number']; ?></h4>

                                            </div>
                                            
                                            <!-- email -->
                                            <div class="indv-container">

                                                <!-- label -->
                                                <h2 class="label">Email:</h2>

                                                <!-- entry -->
                                                <h4 class="entry"><?= $passenger['email']; ?></h4>

                                            </div>

                                    </div>

                                    <!-- actions form -->
                                    <form id="act-container"  action="delete.php" method='POST' class="d-inline">

                                        <!-- confirm -->
                                        <a id="confirm-btn" href="book2.php?passenger_id=<?= $passenger['passenger_id']; ?>">Confirm</a>

                                        <!-- Cancel -->
                                        <button id="cancel-btn" type="submit" name="delete_passenger" value="<?= $passenger['passenger_id']; ?>" class="btn" onclick="history.back()">Cancel</button>

                                    </form>

                                </div>
                        <?php
                            }
                        } else {
                            echo '<h5>No Record Found </h5>';
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