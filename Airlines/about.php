<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

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

<div class="heading" style="background:url(img/h1.jpg) no-repeat">
    <h1>about us</h1>
</div>

<!-- about section start -->

<section class="about">


    <div class="image">
        <img src="img/aboutus.jpg" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>DB Airlines is a Web Application that is created with an airline reservation database.
            This is a project on CCC151 in which we are tasked to create a system that will
            Create, Read, Update, and Delete data on the database created.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-map"></i>
                    <span>popular destinations</span>
                </div>
                <div class="icons">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>affordable prices</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 customer support</span>
                </div>
            </div>
    </div>


</section>

<!-- about section end -->

<!-- review section start -->

<section class="reviews">

    <h1 class="heading-title"> User Reviews </h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p> best website in accomodating flight bookings! will book again</p>
                <h3>James Reid</h3>
                <span>Passenger</span>
                <img src="img/jreid.jpg" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p> the main feature of this website is that the creator of this website is very handsome. </p>
                <h3>Catriona gray</h3>
                <span>Passenger</span>
                <img src="img/catrionagray.jpg" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                </div>
                <p> good website but no free meals and the airplane crashed. will not book again </p>
                <h3>ed caluag</h3>
                <span>Passenger</span>
                <img src="img/edcaluag.jpg" alt="">
            </div>

        </div>

    </div>


</section>

<!-- review section end -->










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