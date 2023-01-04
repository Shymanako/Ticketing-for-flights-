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
    <title>Trips</title>

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

    <div class="heading" style="background:url(img/h3.jpg) no-repeat">
        <h1>trips</h1>
    </div>

    <!-- trips section start -->

    <section class="trips">

        <h1 class="heading-title">popular destinations</h1>

        <div class="box-container">

            <div class="content">
                <?php
                $query = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, direction.origin_airport_code, direction.destination_airport_code, airport.airport_name from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.origin_airport_code = airport.airport_code limit 3";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $flight_id = $row['flight_id'];
                        $origin_airport_code = $row['origin_airport_code'];
                        $destination_airport_code = $row['destination_airport_code'];
                        $airport_name = $row['airport_name'];
                        foreach ($query_run as $direction) {
                        }
                    }
                } else {
                    echo '<h5>No Record Found </h5>';
                }

                $query2 = "SELECT flight.flight_id, schedule.schedule_id, schedule.direction_id, direction.origin_airport_code, direction.destination_airport_code, airport.airport_name from flight left join schedule on flight.schedule_id = schedule.schedule_id left join direction on schedule.direction_id = direction.direction_id left join airport on direction.destination_airport_code = airport.airport_code limit 3";
                $query_run2 = mysqli_query($con, $query2);

                if (mysqli_num_rows($query_run2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($query_run2)) {
                        $flight_id = $row2['flight_id'];
                        $origin_airport_code = $row2['origin_airport_code'];
                        $destination_airport_code = $row2['destination_airport_code'];
                        $airport_name = $row2['airport_name'];
                        foreach ($query_run2 as $direction2) {
                ?>

                            <div class="box">
                                <a href="" value="origin_airport_code"><?= $direction['airport_name']; ?></a> to
                                <a href="" value="destination_airport_code"><?= $direction2['airport_name']; ?></a>
                                <td>
                                    <a href="book.php" class="btn">book here!</a>
                                </td>

                            </div>

                <?php
                        }
                    }
                } else {
                    echo '<h5>No Record Found </h5>';
                }


                ?>

            </div>

            <div class="box">
                <div class="image">
                    <img src="img/tokyo-japan.jpg" alt="">
                </div>
                <div class="content">
                    <h3>tokyo, japan</h3>
                    <p>the capital and largest city of Japan. its metropolitan area is the most populous in the world!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/seoul-korea.jpg" alt="">
                </div>
                <div class="content">
                    <h3>seoul, korea</h3>
                    <p>the capital and largest metropolis of south korea. it is considered to be a global city and rated as an Alpha City!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/agra-india.jpg" alt="">
                </div>
                <div class="content">
                    <h3>agra, india</h3>
                    <p>the fourth-most populous city in Uttar Pradesh and twenty-third most populous city in India!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/beijing-china.jpg" alt="">
                </div>
                <div class="content">
                    <h3>beijing, china</h3>
                    <p>the capital of the People's Republic of China. it is the world's most populous capital city, with over 21 million residents!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/hanoi-vietnam.jpg" alt="">
                </div>
                <div class="content">
                    <h3>hanoi, vietnam</h3>
                    <p>Located within the Red River Delta, Hanoi is the cultural and political centre and second largest city of vietnam!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/kualalumpur-malaysia.jpg" alt="">
                </div>
                <div class="content">
                    <h3>kuala lumpur, malaysia</h3>
                    <p>one of the fastest growing metropolitan regions in Southeast Asia, both in population and economic development!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/riodejaneiro-brazil.jpg" alt="">
                </div>
                <div class="content">
                    <h3>rio de janeiro, brazil</h3>
                    <p>the second-most populous city in Brazil and the sixth-most populous in the Americas!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/singapore.jpg" alt="">
                </div>
                <div class="content">
                    <h3>singapore</h3>
                    <p>a sovereign island country and city-state in maritime Southeast Asia. the third highest population density in the world!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/iceland.jpg" alt="">
                </div>
                <div class="content">
                    <h3>reykjavik, iceland</h3>
                    <p>the centre of Iceland's cultural, economic, and governmental activity, and is a popular tourist destination!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/paris-france.jpg" alt="">
                </div>
                <div class="content">
                    <h3>paris, france</h3>
                    <p> one of the world's major centres of finance, diplomacy, commerce, fashion, gastronomy, science, and arts!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="img/bali-indonesia.jpg" alt="">
                </div>
                <div class="content">
                    <h3>bali, indonesia</h3>
                    <p>a province of Indonesia and the westernmost of the Lesser Sunda Islands. renowned for its highly developed arts!</p>
                    <a href="book.php" class="btn">book now!</a>
                </div>
            </div>

        </div>

        <div class="load-more"><span class="btn">load more</span></div>

    </section>

    <!-- trips section end -->













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