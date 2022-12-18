<?php
session_start();
require 'admin/dbcon.php';
?>

<?php
if (isset($_POST['use_reservation'])) {
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $query2 = "Select reservation.passenger_id, passenger.passenger_id, passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, passenger.email from reservation left join passenger on reservation.passenger_id = passenger.passenger_id where reservation.reservation_id = $reservation_id";
    $query_run2 = mysqli_query($con, $query2);

    if (mysqli_num_rows($query_run2) > 0)
        foreach ($query_run2 as $reservation) {
        }
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

        <h1 class="heading-title">Booking Details</h1>

        <form name="Form" action="bookform.php" autocomplete="off" onsubmit="return validateForm()" method="post" class="bookform" required>
            <?php

            if (isset($_GET['reservation_id'])) {
                $reservation_id = mysqli_real_escape_string($con, $_GET['reservation_id']);
                $query = "Select reservation.passenger_id, reservation.flight_id, passenger.passenger_id, passenger.first_name, passenger.last_name, passenger.date_of_birth, passenger.citizenship, passenger.p_number, passenger.email from reservation left join passenger on reservation.passenger_id = passenger.passenger_id where reservation.reservation_id = '$reservation_id'";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $reservation = mysqli_fetch_array($query_run);
                } else {
                    echo "<h4>No ID Found</h4>";
                }
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

            <div class="flex">
                <div class="inputBox">
                    <span>flight : </span>
                    <input type="text" name="reservation_id" value="<?= $reservation['flight_id']; ?>">
                </div>

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