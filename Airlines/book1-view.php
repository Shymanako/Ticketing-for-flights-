<?php
session_start();
require 'admin/dbcon.php';
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

                                $current_passenger_id = $passenger['passenger_id'];

                                // echo
                        ?>

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
                                            <h2 class="label">Age:</h2>

                                            <!-- entry -->
                                            <h4 class="entry">
                                                <?php

                                                $query = "SELECT calculateAge(date_of_birth) AS Age FROM passenger WHERE passenger_id ='$current_passenger_id' ";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                        $calculateAge = $row['Age'];
                                                        echo $calculateAge;
                                                    }
                                                }
                                                ?>

                                            </h4>

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
                                    <form id="act-container" action="delete.php" method='POST' class="d-inline">

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