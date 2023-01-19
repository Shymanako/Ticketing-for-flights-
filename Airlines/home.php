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
    <title>Home</title>

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

    <!-- home starts -->
    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background:url(img/home1.jpg) no-repeat">
                    <div class="content">
                        <span>book, pay, fly</span>
                        <h3>soar above the horizon</h3>
                        <a href="trips.php" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(img/home2.jpg) no-repeat">
                    <div class="content">
                        <span>book, pay, fly</span>
                        <h3>travel across countries</h3>
                        <a href="trips.php" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(img/home3.jpg) no-repeat">
                    <div class="content">
                        <span>book, pay, fly</span>
                        <h3>reach your destination</h3>
                        <a href="trips.php" class="btn">discover more</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>
    <!-- home ends -->

    <!-- services section start -->

    <section class="features">

        <h1 class="heading-title">our utilities</h1>

        <div class="box-container">

            <div class="box">
                <img src="img/ticket1.png" alt="">
                <h3>Bookings</h3>
            </div>

            <div class="box">
                <img src="img/world1.png" alt="">
                <h3>Flights</h3>
            </div>

            <div class="box">
                <img src="img/pilot.png" alt="">
                <h3>Professionals</h3>
            </div>

            <div class="box">
                <img src="img/shield.png" alt="">
                <h3>Safety</h3>
            </div>

        </div>

    </section>

    <!-- features section end -->

    <!-- home about start -->

    <section class="home-about">

        <div class="image">
            <img src="img/GensantoDavao.jpg" alt="">
        </div>

        <div class="content">
            <h3>about us</h3>
            <p>DB Airlines is a Web Application that is created with an airline reservation database.
                This is a project on CCC151 in which we are tasked to create a system that will
                Create, Read, Update, and Delete data on the database created.
            </p>
            <a href="about.php" class="btn">read more</a>
        </div>

    </section>

    <!-- home about end -->

    <section class="home-trips">

        <h1 class="heading-title"> Available Flights </h1>

        <div class="box-container">

            <?php
            $query = "SELECT flight.flight_id, flight.image, direction.location from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id group by direction.location order by direction.location limit 3";
            $query_run = mysqli_query($con, $query);
            $count = mysqli_num_rows($query_run);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $flight_id = $row['flight_id'];
                    $location = $row['location'];
                    $image = $row['image'];

            ?>

                    <div class="box flight-card">

                        <div class="image-menu">
                            <?php
                            if ($image == "") {
                                //Image not Available
                                echo "Image not found.";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo 'http://localhost/Ticketing-for-flights-/Airlines/'; ?>img/flight/<?php echo $image; ?>" width="320px" height="205px">
                            <?php
                            }

                            ?>

                        </div>

                        <div class="flight-home-desc">
                            <td><?php echo $location; ?></td>
                        </div>


                        <td>
                            <a href="book.php" class="btn center">book here!</a>
                        </td>

                    </div>

            <?php
                }
            } else {
                echo '<h5>No Record Found </h5>';
            }

            ?>


        </div>

        <div class="load-more"> <a href="trips.php" class="btn">see more</a> </div>

    </section>


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

        <div class="credit"> created by <span>Incognito</span> | all rights reserved</div>

    </section>

    <!-- footer section end -->






    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>