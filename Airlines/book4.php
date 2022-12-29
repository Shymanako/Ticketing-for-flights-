<?php
session_start();
require 'admin/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section start -->

    <section class="header">
        <a href="home.php" class="logo">Project DB</a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="trips.php">trips</a>
            <a href="book.php">book a flight</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <!-- header section end -->

    <div class="heading" style="background:url(img/h2.jpg) no-repeat">
        <h1>flight booking</h1>
    </div>

    <!-- book a flight section start -->

    <section class="booking">

        <h1 class="heading-title">Flight Reservation</h1>
        <h2>Note: Please double check data before submitting.</h2>

        <script type="text/javascript">
            function validateForm() {
                var a = document.forms["Form"]["payment_id"].value;
                var b = document.forms["Form"]["reservation_id"].value;
                var c = document.forms["Form"]["payment_method"].value;
                var d = document.forms["Form"]["payment_amount"].value;
                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "") {
                    alert("Please Fill In All Required Details");
                    return false;
                }
            }
        </script>

        <form action="bookform4.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>
            <div class="flex">
                <?php

                $query = "Select * from passenger order by passenger_id desc limit 1";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $passenger) {
                    }
                }
                ?>
                <input type="hidden" name="passenger_id" value="<?= $passenger['passenger_id']; ?>">

                
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Select Flight : <span style="color:red;">*</span> </span>
                    <select name="flight_id">
                        <?php
                        // php code to display available airports from database
                        // query to select all available airports in database
                        $query = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, direction.origin_airport_code, direction.destination_airport_code from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id order by flight.schedule_id;";

                        // Executing query
                        $query_run = mysqli_query($con, $query);

                        // count rows to check whether we have airport or not
                        $count = mysqli_num_rows($query_run);

                        // if count is greater than 0 we have airport else we do not have an airport
                        if ($count > 0) {
                            // we have airport
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                // get the detail of airport
                                $flight_id = $row['flight_id'];
                                $schedule_id = $row['schedule_id'];
                                $direction_id = $row['direction_id'];
                                $origin_airport_code = $row['origin_airport_code'];
                                $destination_airport_code = $row['destination_airport_code'];

                        ?>
                                <option value="<?php echo $flight_id; ?>"><?php echo $origin_airport_code; ?> to <?php echo $destination_airport_code; ?></option>
                            <?php
                            }
                        } else {
                            // we do not have airport
                            ?>
                            <option value="0">No Flight Found</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <?php
                $query = "SELECT * FROM flight";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $flight) {
                    }
                }
                ?>
                <button type="submit" name="save_reservation" value="<?= $flight['flight_id'];?>" class="btn">Submit</a>
            </div>


        </form>
    </section>

    <!-- book a flight section end -->













    <!-- footer section start -->

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>quick access</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i>home</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i>about</a>
                <a href="trips.php"> <i class="fas fa-angle-right"></i>trips</a>
                <a href="book.php"> <i class="fas fa-angle-right"></i>book a flight</a>
                <a href="admin/admin.php"> <i class="fas fa-angle-right"></i>admin</a>
                <a href="logout.php"> <i class="fas fa-angle-right"></i>logout</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
                <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
                <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
                <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +63-906-852-7051</a>
                <a href="#"> <i class="fas fa-envelope"></i> jshbangoy@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i> general santos city, philippines - 9500</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter</a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram</a>
            </div>

        </div>

        <div class="credit"> created by <span>richard joshua bangoy</span> | all rights reserved</div>

    </section>

    <!-- footer section end -->






    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>