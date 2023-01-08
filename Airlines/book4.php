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
                var e = document.forms["Form"]["cvc"].value;
                var f = document.forms["Form"]["expiry_date"].value;
                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "", f == null || f == "") {
                    alert("Please Fill In All Required Details");
                    return false;
                }
            }
        </script>

        <form action="bookform3.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>
            <div class="flex">
                <?php
                if (isset($_GET['reservation_id'])) {
                    $reservation_id = mysqli_real_escape_string($con, $_GET['reservation_id']);
                } else {
                    if (isset($_SESSION['reservation'])) {
                        $reservation_id = $_SESSION['reservation'];
                    }
                }

                $query = "Select reservation.reservation_id, reservation.flight_id, flight.flight_id, schedule.schedule_id, schedule.price, passenger.passenger_id from reservation left join passenger on reservation.passenger_id = passenger.passenger_id left join flight on reservation.flight_id = flight.flight_id left join schedule on flight.schedule_id = schedule.schedule_id where reservation_id='$reservation_id'";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $reservation) {
                    }
                }

                ?>

                <input type="hidden" name="reservation_id" value="<?= $reservation['reservation_id']; ?>">
                <input type="hidden" name="passenger_id" value="<?= $reservation['passenger_id']; ?>">

            </div>

            <div class="flex">

                <div class="inputBox">
                    <span>Payment Method : <span style="color:red;">*</span> </span>
                    <input list="payment_method" placeholder="Select Payment Method" name="payment_method">
                    <datalist id="payment_method">
                        <option value="Visa">
                        <option value="Mastercard">
                    </datalist>
                </div>

                <div class="inputBox">
                    <span>Payment Amount : <span style="color:red;">*</span> </span>
                    <input type="text" value="<?= $reservation['price']; ?>" name="payment_amount">
                </div>

                <div class="inputBox">
                    <span>CVC Code : <span style="color:red;">*</span> </span>
                    <input type="text" placeholder="Enter CVC Code" name="cvc">
                </div>

                <div class="inputBox">
                    <span>Expiry Date : <span style="color:red;">*</span> </span>
                    <input type="date" value="<?= date('F-Y') ?>" name="expiry_date">
                </div>

            </div>

            <button type="submit" name="proceed_payment" value="<?= $reservation['reservation_id']; ?>" class="btn">Submit</button>

            <td>
                <a href="delete.php?d_reservation_id=<?= $reservation['reservation_id']; ?>&d_passenger_id=<?= $reservation['passenger_id']; ?>" class="btn">Cancel</a>
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