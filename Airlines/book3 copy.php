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

        <h1 class="heading-title">Reservation Details</h1>
        <h2>Note: Please double check data before submitting.</h2>
        <form name="Form" action="book4.php" autocomplete="off" onsubmit="return validateForm()" method="post" class="bookform" required>
            <?php

            if (isset($_GET['reservation_id'])) {
                $reservation_id = mysqli_real_escape_string($con, $_GET['reservation_id']);
            } else {
                if (isset($_SESSION['reservation'])) {
                    $reservation_id = $_SESSION['reservation'];
                }
            }

            $query = "Select reservation.passenger_id, reservation.flight_id, passenger.passenger_id, passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, passenger.email from reservation left join passenger on reservation.passenger_id = passenger.passenger_id where reservation.reservation_id = '$reservation_id'";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $reservation = mysqli_fetch_array($query_run);
            } else {
                echo "<h4>No ID Found</h4>";
            }

            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>first name : </span>
                    <input type="text" name="first_name" value="<?= $reservation['first_name']; ?>">
                </div>
                <div class="inputBox">
                    <span>last name : </span>
                    <input type="text" name="last_name" value="<?= $reservation['last_name']; ?>">
                </div>
                <div class="inputBox">
                    <span>date of birth : </span>
                    <input type="date" name="date_of_birth" value="<?= $reservation['date_of_birth']; ?>">
                </div>
                <div class="inputBox">
                    <span>citizenship : </span>
                    <input type="text" name="citizenship" value="<?= $reservation['citizenship']; ?>">
                </div>
                <div class="inputBox">
                    <span>phone number : </span>
                    <input type="text" name="p_number" value="<?= $reservation['p_number']; ?>">
                </div>
                <div class="inputBox">
                    <span>email : </span>
                    <input type="email" name="email" value="<?= $reservation['email']; ?>">
                </div>
            </div>

            <br><br>

            <?php

            if (isset($_GET['reservation_id'])) {
                $reservation_id2 = mysqli_real_escape_string($con, $_GET['reservation_id']);
            } else {
                if (isset($_SESSION['reservation'])) {
                    $reservation_id2 = $_SESSION['reservation'];
                }
            }

            $query2 = "Select reservation.passenger_id, reservation.flight_id, flight.flight_id, flight.schedule_id, schedule.schedule_id, direction.direction_id, airline.airline_id, airline.airline_name, direction.origin_airport_code, direction.destination_airport_code, direction.location, schedule.direction_id, schedule.departure_date, schedule.departure_time, schedule.arrival_date, schedule.arrival_time, schedule.airline_id, schedule.price from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airline on schedule.airline_id = airline.airline_id where reservation.reservation_id = '$reservation_id2'";
            $query_run2 = mysqli_query($con, $query2);

            if (mysqli_num_rows($query_run2) > 0) {
                $reservation2 = mysqli_fetch_array($query_run2);
            } else {
                echo "<h4>No ID Found</h4>";
            }

            ?>

            <div class="flex">
                <div class="inputBox">
                    <span>Location : </span>
                    <input type="text" name="location" value="<?= $reservation2['location']; ?>">
                </div>
                <div class="inputBox">
                    <span>Origin Airport : </span>
                    <?php
                    $query3 = "select direction.origin_airport_code, airport.airport_name from reservation left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.origin_airport_code = airport.airport_code where reservation_id='$reservation_id'";
                    $query_run3 = mysqli_query($con, $query3);
                    if (mysqli_num_rows($query_run3) > 0) {
                        while ($row3 = mysqli_fetch_assoc($query_run3)) {
                            $origin_airport_code = $row3['origin_airport_code'];
                            $airport_name = $row3['airport_name'];
                    ?>
                            <input type="text" name="origin_airport_code" value="<?php echo $airport_name; ?>">
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="inputBox">
                    <span>Destination Airport : </span>
                    <?php
                    $query3 = "select reservation.reservation_id, passenger.passenger_id, direction.origin_airport_code, airport.airport_name from reservation left join passenger on reservation.passenger_id = passenger.passenger_id left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.destination_airport_code = airport.airport_code where reservation_id='$reservation_id'";
                    $query_run3 = mysqli_query($con, $query3);
                    if (mysqli_num_rows($query_run3) > 0) {
                        while ($row3 = mysqli_fetch_assoc($query_run3)) {
                            $origin_airport_code = $row3['origin_airport_code'];
                            $passenger_id = $row3['passenger_id'];
                            $airport_name = $row3['airport_name'];
                            $reservation_id = $row3['reservation_id'];

                    ?>
                            <input type="text" name="destination_airport_code" value="<?php echo $airport_name; ?>">
                            <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="inputBox">
                    <span>Departure Date : </span>
                    <input type="text" name="departure_date" value="<?= $reservation2['departure_date']; ?>">
                </div>
                <div class="inputBox">
                    <span>Departure Time : </span>
                    <input type="text" name="departure_time" value="<?= $reservation2['departure_time']; ?>">
                </div>
                <div class="inputBox">
                    <span>Arrival Date : </span>
                    <input type="text" name="arrival_date" value="<?= $reservation2['arrival_date']; ?>">
                </div>
                <div class="inputBox">
                    <span>Arrival Time : </span>
                    <input type="text" name="arrival_time" value="<?= $reservation2['arrival_time']; ?>">
                </div>
                <div class="inputBox">
                    <span>Airline : </span>
                    <input type="text" name="airline_name" value="<?= $reservation2['airline_name']; ?>">
                </div>
                <div class="inputBox">
                    <span>Price : </span>
                    <input type="text" name="price" value="<?= $reservation2['price']; ?>">
                </div>
            </div>
            <a href="book4.php?reservation_id=<?php echo $reservation_id; ?>" class="btn">continue</a>
            <td>
                <a href="delete.php?d_reservation_id=<?php echo $reservation_id; ?>&d_passenger_id=<?php echo $passenger_id; ?>" class="btn">Cancel</a>
            </td>

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