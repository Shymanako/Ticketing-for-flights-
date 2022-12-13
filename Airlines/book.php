<?php
session_start();
require 'admin/dbcon.php';
include('login-check.php');

if (isset($_SESSION['user'])) {
    $email = mysqli_real_escape_string($con, $_SESSION['user']);
}
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

        <h1 class="heading-title">booking details</h1>
        <h2>Note: Please double check data before submitting.</h2>

        <script type="text/javascript">
            function validateForm() {
                var a = document.forms["Form"]["first_name"].value;
                var b = document.forms["Form"]["last_name"].value;
                var c = document.forms["Form"]["birth_of_date"].value;
                var d = document.forms["Form"]["citizenship"].value;
                var e = document.forms["Form"]["phone_number"].value;
                var f = document.forms["Form"]["email"].value;
                var h = document.forms["Form"]["location"].value;
                var i = document.forms["Form"]["destination"].value;
                var j = document.forms["Form"]["airlines"].value;
                var k = document.forms["Form"]["departure"].value;
                var l = document.forms["Form"]["arrival"].value;
                var m = document.forms["Form"]["credit_type"].value;

                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "", f == null || f == "",
                    g == null || g == "", h == null || h == "", i == null || i == "", j == null || k == "", l == null || l == "", m == null || m == "",
                    n == null || n == "") {
                    alert("Please Fill In All Required Details");
                    return false;
                }
            }
        </script>


        <form name="Form" action="book2-view.php" autocomplete="off" onsubmit="return validateForm()" method="post" class="bookform" required>

            <div class="flex">
                <div class="inputBox">
                    <span>first name : <span style="color:red;">*</span> </span>
                    <input type="text" placeholder="enter your first name" name="first_name">
                </div>
                <div class="inputBox">
                    <span>last name : <span style="color:red;">*</span> </span>
                    <input type="text" placeholder="enter your last name" name="last_name">
                </div>
                <div class="inputBox">
                    <span>date of birth : <span style="color:red;">*</span> </span>
                    <input type="date" name="date_of_birth">
                </div>
                <div class="inputBox">
                    <span>citizenship : <span style="color:red;">*</span> </span>
                    <input type="text" placeholder="enter your nationality" name="citizenship">
                </div>
                <div class="inputBox">
                    <span>email : <span style="color:red;">*</span> </span>
                    <input type="email" placeholder="enter your email" name="email">
                </div>
                <div class="inputBox">
                    <span>phone number : <span style="color:red;">*</span> </span>
                    <input type="number" placeholder="enter your number" name="phone_number">
                </div>

            </div>

            <br><br>

            <div class="flex">
                <div class="inputBox">
                    <span>Select Flight : <span style="color:red;">*</span> </span>
                    <select name="schedule_id">
                        <?php
                        // php code to display available airports from database
                        // query to select all available airports in database
                        $query2 = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, 
                        direction.origin_airport_code, direction.destination_airport_code, schedule.departure_time, 
                        schedule.arrival_time from flight left join schedule on flight.schedule_id = 
                        schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id 
                        order by flight.schedule_id;";

                        // Executing query
                        $query_run2 = mysqli_query($con, $query2);

                        // count rows to check whether we have airport or not
                        $count2 = mysqli_num_rows($query_run2);

                        // if count is greater than 0 we have airport else we do not have an airport
                        if ($count2 > 0) {
                            // we have airport
                            while ($row = mysqli_fetch_assoc($query_run2)) {
                                // get the detail of airport
                                $flight_id = $row['flight_id'];
                                $schedule_id = $row['schedule_id'];
                                $direction_id = $row['direction_id'];
                                $origin_airport_code = $row['origin_airport_code'];
                                $destination_airport_code = $row['destination_airport_code'];
                                $departure_time = $row['departure_time'];
                                $arrival_time = $row['arrival_time'];

                            ?>
                                <option value="<?php echo $flight; ?>"><?php echo $origin_airport_code; ?> to <?php echo $destination_airport_code; ?> </option>
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

            <br><br>

            <div class="flex">
                <div class="inputBox">
                    <span>Select Departure and Arrival Time : <span style="color:red;">*</span> </span>
                    <select name="schedule_id">
                        <?php
                        // php code to display available airports from database
                        // query to select all available airports in database
                        $query2 = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, 
                        schedule.departure_time, schedule.arrival_time from flight left join schedule on 
                        flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = 
                        direction.direction_id order by flight.schedule_id;";

                        // Executing query
                        $query_run2 = mysqli_query($con, $query2);

                        // count rows to check whether we have airport or not
                        $count2 = mysqli_num_rows($query_run2);

                        // if count is greater than 0 we have airport else we do not have an airport
                        if ($count2 > 0) {
                            // we have airport
                            while ($row = mysqli_fetch_assoc($query_run2)) {
                                // get the detail of airport
                                $flight_id = $row['flight_id'];
                                $departure_time = $row['departure_time'];
                                $arrival_time = $row['arrival_time'];

                            ?>
                                <option value="<?php echo $flight; ?>"><?php echo $departure_time; ?> to <?php echo $arrival_time; ?> </option>
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

            <br><br>

            <div class="flex">
                <div class="inputBox">
                    <span>Payment Method : <span style="color:red;">*</span> </span>
                    <input list="credit_type" placeholder="enter credit card/s" name="credit_type">
                    <datalist id="credit_type">
                        <option value="Visa">
                        <option value="Mastercard">
                    </datalist>
                </div>
            </div>

            <input type="submit" name="save_booking" class="btn">

        </form>

        <?php

        if (isset($_POST['save_booking'])) {
            // Get all the details from form
            $passenger_id = $_POST['passenger_id'];


            // Save daa into booked information
            $query3 = "insert into booked_information (passenger_id) values ($passenger_id)";

            // Execute the query
            $query_run3 = mysqli_query($con, $query3);

            if ($query_run3) {

                $_SESSION['message'] = "Booked Flight Successfully";
                header("Location: book2-view.php");
                exit(0);
            } else {

                $_SESSION['message'] = "Flight Booking Failed";
                header("Location: book.php");
                exit(0);
            }
        }

        if (isset($_POST['save_booking'])) {
        }

        ?>

    </section>

    <!-- book a flight section end -->









    <!-- footer section start -->

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>quick access</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i>home</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i>about</a>
                <a href="trips.php"> <a href="logout.php"> <i class="fas fa-angle-right"></i>logout</a><i class="fas fa-angle-right"></i>trips</a>
                <a href="book.php"> <i class="fas fa-angle-right"></i>book a flight</a>
                <a href="admin/admin.php"> <i class="fas fa-angle-right"></i>admin</a>

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