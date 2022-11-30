<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

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

<div class="heading" style="background:url(img/h2.jpg) no-repeat">
    <h1>flight booking</h1>
</div>

<!-- book a flight section start -->

<section class="booking">

    <h1 class="heading-title">payment</h1>
    <h2>Note: Please double check data before submitting.</h2>

    <script type="text/javascript">
        function validateForm() {
            var a = document.forms["Form"]["credit_type"].value;
            var b = document.forms["Form"]["account_number"].value;
            if (a == null || a == "", b == null || b == ""){
            alert("Please Fill In All Required Details");
            return false;
            }
            if (a == "Visa" || a == "Mastercard"){
            alert("Data Submitted Successfully!")
            return true;
            }
            else{
            alert("Credit Card Not Available! Please Select Again.")
            return false;
            }
        }
    </script>

    <form action="bookform3.php" name="Form" onsubmit="return validateForm()" autocomplete="off" method="post" class="bookform" required>

        <div class="flex">
            <div class="inputBox">
                <span>credit card : <span style="color:red;">*</span> </span>
                <input list="credit_type" placeholder="enter credit card/s" name="credit_type">
                <datalist id="credit_type">
                    <option value="Visa">
                    <option value="Mastercard">
                </datalist>
            </div>
            <div class="inputBox">
                <span>account number : <span style="color:red;">*</span> </span>
                <input type="text" placeholder="enter account number" name="account_number" maxlength="12">
            </div>
        </div>

        <input type="submit" value="submit and finish" name="send" class="btn">

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