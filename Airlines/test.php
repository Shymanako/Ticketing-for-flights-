<?php
session_start();
require 'admin/dbcon.php';
include('login-check.php');

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
                var c = document.forms["Form"]["date_of_birth"].value;
                var d = document.forms["Form"]["citizenship"].value;
                var e = document.forms["Form"]["p_number"].value;
                var f = document.forms["Form"]["email"].value;
                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "", f == null || f == "") {
                    alert("Please Fill In All Required Details");
                    return false;
                }
            }
        </script>


        <form name="Form" action="bookform.php" autocomplete="off" onsubmit="return validateForm()" method="post" class="bookform" required>

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
                    <span>phone number : <span style="color:red;">*</span> </span>
                    <input type="text" placeholder="enter your number" name="p_number">
                </div>
                <div class="inputBox">
                    <span>email : <span style="color:red;">*</span> </span>
                    <input type="email" placeholder="enter your email" name="email">
                </div>
            </div>

            <br><br>

            <div class="flex">
                <div class="inputBox">
                    <span>Select Schedule : <span style="color:red;">*</span> </span>
                    <select name="schedule_id">
                        <?php
                        // php code to display available airports from database
                        // query to select all available airports in database
                        $query2 = "select schedule.schedule_id, schedule.departure_time, schedule.arrival_time, schedule.airline_id, airline.airline_name, schedule.direction_id, direction.origin_airport_code, direction.destination_airport_code from schedule left join airline on schedule.airline_id = airline.airline_id left join direction on schedule.direction_id = direction.direction_id order by schedule.airline_id";

                        // Executing query
                        $query_run2 = mysqli_query($con, $query2);

                        // count rows to check whether we have airport or not
                        $count2 = mysqli_num_rows($query_run2);

                        // if count is greater than 0 we have airport else we do not have an airport
                        if ($count2 > 0) {
                            // we have airport
                            while ($row = mysqli_fetch_assoc($query_run2)) {
                                // get the detail of airport
                                $schedule_id = $row['schedule_id'];
                                $direction_id = $row['direction_id'];
                                $origin_airport_code = $row['origin_airport_code'];
                                $destination_airport_code = $row['destination_airport_code'];
                                $airline_id = $row['airline_id'];
                                $airline_name = $row['airline_name'];
                                $departure_time = $row['departure_time'];
                                $arrival_time = $row['arrival_time'];

                        ?>
                                <option value="<?php echo $schedule_id; ?>"><?php echo $origin_airport_code; ?> to <?php echo $destination_airport_code; ?>, Airline: <?php echo $airline_name; ?>, Departure and Arrival Time : <?php echo $departure_time; ?> - <?php echo $arrival_time; ?> </option>
                            <?php
                            }
                        } else {
                            // we do not have airport
                            ?>
                            <option value="0">No Airport Found</option>
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

        if (isset($_POST['submit'])) {
            // Get all the details from form
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $citezenship = $_POST['citizenship'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $airlines = $_POST['airlines'];
            $departure = $_POST['departure'];
            $arrival = $_POST['arrival'];
            $credit_type = $_POST['credit_type'];

            // Save daa into booked information
            $query3 = "insert into booked_information set first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', citizenship='$citizenship',
            phone_number='$phone_number', email='$email', location='$location', airlines='$airlines', departure='$departure', arrival='$arrival', credit_type='$credit_type'";

            // Execute the query
            $query_run3 = mysqli_query($con, $query3);

            if ($query_run3) {

                $_SESSION['message'] = "Booked Flight Successfully";
                header("Location: passenger.php");
                exit(0);
            } else {

                $_SESSION['message'] = "Flight Booking Failed";
                header("Location: book.php");
                exit(0);
            }
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