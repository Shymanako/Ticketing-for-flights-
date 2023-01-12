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
    <link rel="stylesheet" href="admin/css/styles.css">


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
    <?php
    if (isset($_POST['search_flight'])) {
        $departure_date = mysqli_real_escape_string($con, $_POST['departure_date']);
        $direction_id = mysqli_real_escape_string($con, $_POST['direction_id']);
        $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);

    }
    ?>

    <!-- header section end -->

    <div class="heading" style="background:url(img/h2.jpg) no-repeat">
        <h1>flight booking</h1>
    </div>

    <!-- book a flight section start -->

    <section class="booking">

        <h1 class="heading-title">Select flight</h1>

        <form action="bookform2.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>
            <div class="flex">
                <?php
                $query = "select flight.flight_id, direction.location, schedule.departure_date, schedule.departure_time, schedule.arrival_date, schedule.arrival_time, schedule.price from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id where departure_date like '%$departure_date%' and direction.direction_id like '%$direction_id%'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    // Foof Available
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $flight_id = $row['flight_id'];
                        $departure_date = $row['departure_date'];
                        $departure_time = $row['departure_time'];
                        $arrival_date = $row['arrival_date'];
                        $arrival_time = $row['arrival_time'];
                        $location = $row['location'];

                ?>

                <input type="hidden" name="passenger_id" value="<?php echo $passenger_id; ?>">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Departure Date</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Date</th>
                                    <th>Arrival Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $location; ?></td>
                                    <td><?php echo $departure_date; ?></td>
                                    <td><?php echo $departure_time; ?></td>
                                    <td><?php echo $arrival_date; ?></td>
                                    <td><?php echo $arrival_time; ?></td>

                                    <td>
                                        <a href="bookform2.php?flight_id=<?php echo $flight_id; ?>&passenger_id=<?php echo $passenger_id; ?>" class="btn btn-info btn-sm">Select</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                <?php

                    }
                } else {
                    // Food not available
                    echo "No available flights";
                }


                ?>
            </div>


        </form>

        <form id="act-container" action="delete.php" method='POST' class="d-inline">

            <!-- Cancel -->
            <button id="cancel-btn" type="submit" name="cancel_flight" value="<?php echo $passenger_id; ?>" class="btn" onclick="history.back()">Cancel</button>

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