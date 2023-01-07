<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_passenger'])) {
    $passenger_id = mysqli_real_escape_string($con, $_POST['delete_passenger']);

    $query = "DELETE FROM passenger WHERE passenger_id='$passenger_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Passenger Deleted Successfully";
        header("Location: passenger.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Passenger Deletion Failed";
        header("Location: passenger.php");
        exit(0);
    }
}

if (isset($_POST['update_passenger'])) {
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
    $p_number = mysqli_real_escape_string($con, $_POST['p_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE passenger SET first_name='$first_name', last_name='$last_name',
    date_of_birth='$date_of_birth', citizenship='$citizenship', p_number='$p_number', 
    email='$email', password='$password' WHERE passenger_id='$passenger_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Passenger Updated Successfully";
        header("Location: passenger.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Passenger Update Failed";
        header("Location: passenger-update.php");
        exit(0);
    }
}


if (isset($_POST['save_passenger'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    $citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
    $p_number = mysqli_real_escape_string($con, $_POST['p_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO passenger (first_name, last_name, date_of_birth, citizenship, p_number, email, password) VALUES ('$first_name', '$last_name', '$date_of_birth', '$citizenship', '$p_number', '$email', '$password')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Passenger Created Successfully";
        header("Location: passenger.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Passenger Not Created";
        header("Location: passenger-create.php");
        exit(0);
    }
}

if (isset($_POST['update_flight'])) {
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);
    $current_image = mysqli_real_escape_string($con, $_POST['current_image']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // update new image if selected
    // check whether the image is selected or not
    if (isset($_FILES['image']['name'])) {
        // get the image details
        $image = $_FILES['image']['name'];
        //Check whether the image is available or not
        if ($image != "") {
            //Image Available

            //A. UPload the New Image

            //Auto Rename our Image
            //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
            $ext = end(explode('.', $image));

            //Rename the Image
            $image = "flight_image_" . rand(000, 999) . '.' . $ext; // e.g. Flight_image_834.jpg


            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../img/flight/" . $image;

            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);

            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect with error message
            if ($upload == false) {
                //SEt message
                $_SESSION['message'] = "Failed to Upload Image.";
                //Redirect to Add CAtegory Page
                header('location: flight.php');
                //STop the Process
                die();
            }

            //B. Remove the Current Image if available
            if ($current_image != "") {
                $remove_path = "../img/flight/" . $current_image;

                $remove = unlink($remove_path);

                //CHeck whether the image is removed or not
                //If failed to remove then display message and stop the processs
                if ($remove == false) {
                    //Failed to remove image
                    $_SESSION['message'] = "Failed to remove current Image.";
                    header('location: flight.php');
                    die(); //Stop the Process
                }
            }
        } else {
            $image = $current_image;
        }
    } else {
        $image = $current_image;
    }

    // update the database
    $query = "update flight set schedule_id = '$schedule_id', image = '$image', description = '$description' where flight_id = $flight_id";
    // excecute query
    $query_run = mysqli_query($con, $query);

    //check whether excecuted or not
    if ($query_run) {

        $_SESSION['message'] = "Flight Updated Successfully";
        header("Location: flight.php");
        exit(0);

    } else {

        $_SESSION['message'] = "Flight Failed to Update";
        header("Location: flight-update.php");
        exit(0);
    }
}

if (isset($_POST['save_flight'])) {
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // check whether the image is selected or not and set the value for image name
    if (isset($_FILES['image']['name'])) {
        // upload image
        $image = $_FILES['image']['name'];

        // upload the image only if selected
        if ($image != "") {

            // auto rename image
            // get the extension of ourt image (jpg, png, gif, etc.) e.g. "food.jpg"
            $ext = end(explode('.', $image));

            // rename the image
            $image = "Flight_Image_" . rand(000, 999) . '.' . $ext; // e.g. flight_name_69.jpg

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../img/flight/" . $image;

            // upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //check whether the image is uploaded or not
            if ($upload == false) {
                $_SESSION['message'] = "Failed to upload image";
                header("Location: flight-create.php");
                die();
            }
        }
    } else {
        //dont upload image and set the image value as blank
        $image = "";
    }

    $query = "INSERT INTO flight (schedule_id, image, description) VALUES ('$schedule_id', '$image', '$description')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Flight Created Successfully";
        header("Location: flight.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Flight Not Created";
        header("Location: flight-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_payment'])) {
    $payment_id = mysqli_real_escape_string($con, $_POST['delete_payment']);

    $query = "DELETE FROM payment WHERE pid='$payment_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Payment Deleted Successfully";
        header("Location: payment.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Payment Deletion Failed";
        header("Location: payment.php");
        exit(0);
    }
}

if (isset($_POST['update_payment'])) {
    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $payment_amount = mysqli_real_escape_string($con, $_POST['payment_amount']);
    $cvc = mysqli_real_escape_string($con, $_POST['cvc']);


    $query = "UPDATE payment SET reservation_id='$reservation_id', payment_method='$payment_method', payment_amount='$payment_amount', cvc='$cvc' WHERE payment_id='$payment_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Payment Updated Successfully";
        header("Location: payment.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Flight Update Failed";
        header("Location: payment-update.php");
        exit(0);
    }
}

if (isset($_POST['save_payment'])) {
    $reservation_id = mysqli_real_escape_string($con, $_POST['reservation_id']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $payment_amount = mysqli_real_escape_string($con, $_POST['payment_amount']);
    $cvc = mysqli_real_escape_string($con, $_POST['cvc']);

    $query = "INSERT INTO payment (reservation_id, payment_method, payment_amount, cvc) VALUES ('$reservation_id', '$payment_method', '$payment_amount'. '$cvc')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Payment Created Successfully";
        header("Location: payment.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Payment Not Created";
        header("Location: payment-create.php");
        exit(0);
    }
}

if (isset($_POST['save_airline'])) {
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $airline_name = mysqli_real_escape_string($con, $_POST['airline_name']);

    $query = "INSERT INTO airline (airline_id, airline_name) VALUES ('$airline_id', '$airline_name')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Airline Created Successfully";
        header("Location: airline.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Airline Not Created";
        header("Location: airline-create.php");
        exit(0);
    }
}

if (isset($_POST['update_airline'])) {
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $airline_name = mysqli_real_escape_string($con, $_POST['airline_name']);

    $query = "UPDATE airline SET airline_name='$airline_name' where airline_id='$airline_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Airline Updated Successfully";
        header("Location: airline.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Airline Update Failed";
        header("Location: airline-update.php");
        exit(0);
    }
}

if (isset($_POST['delete_airline'])) {
    $airline_id = mysqli_real_escape_string($con, $_POST['delete_airline']);

    $query = "DELETE FROM airline WHERE airline_id='$airline_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Airline Deleted Successfully";
        header("Location: airline.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Airline Deletion Failed";
        header("Location: airline.php");
        exit(0);
    }
}

if (isset($_POST['delete_airport'])) {
    $airport_code = mysqli_real_escape_string($con, $_POST['delete_airport']);

    $query = "DELETE FROM airport WHERE airport_code='$airport_code'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Airport Deleted Successfully";
        header("Location: airport.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Airport Deletion Failed";
        header("Location: airport.php");
        exit(0);
    }
}

if (isset($_POST['save_airport'])) {
    $airport_code = mysqli_real_escape_string($con, $_POST['airport_code']);
    $airport_name = mysqli_real_escape_string($con, $_POST['airport_name']);

    $query = "INSERT INTO airport (airport_code, airport_name) VALUES ('$airport_code', '$airport_name')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Airport Created Successfully";
        header("Location: airport.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Airport Not Created";
        header("Location: airport-create.php");
        exit(0);
    }
}

if (isset($_POST['update_airport'])) {
    $airport_code = mysqli_real_escape_string($con, $_POST['airport_code']);
    $airport_name = mysqli_real_escape_string($con, $_POST['airport_name']);

    $query = "UPDATE airport SET airport_name='$airport_name' where airport_code='$airport_code' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Airport Updated Successfully";
        header("Location: airport.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Airport Update Failed";
        header("Location: airport-update.php");
        exit(0);
    }
}

if (isset($_POST['save_direction'])) {
    $origin_airport_code = mysqli_real_escape_string($con, $_POST['origin_airport_code']);
    $destination_airport_code = mysqli_real_escape_string($con, $_POST['destination_airport_code']);
    $location = mysqli_real_escape_string($con, $_POST['location']);


    $query = "INSERT INTO direction (origin_airport_code, destination_airport_code, location) VALUES ('$origin_airport_code', '$destination_airport_code', '$location')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Direction Created Successfully";
        header("Location: direction.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Direction Not Created";
        header("Location: direction-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_direction'])) {
    $direction_id = mysqli_real_escape_string($con, $_POST['delete_direction']);

    $query = "DELETE FROM direction WHERE direction_id='$direction_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Direction Deleted Successfully";
        header("Location: direction.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Direction Deletion Failed";
        header("Location: direction.php");
        exit(0);
    }
}

if (isset($_POST['update_direction'])) {
    $direction_id = mysqli_real_escape_string($con, $_POST['direction_id']);
    $origin_airport_code = mysqli_real_escape_string($con, $_POST['origin_airport_code']);
    $destination_airport_code = mysqli_real_escape_string($con, $_POST['destination_airport_code']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    $query = "UPDATE direction SET origin_airport_code='$origin_airport_code', destination_airport_code='$destination_airport_code', location='$location' where direction_id='$direction_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Direction Updated Successfully";
        header("Location: direction.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Direction Update Failed";
        header("Location: direction-update.php");
        exit(0);
    }
}

if (isset($_POST['save_schedule'])) {
    $direction_id = mysqli_real_escape_string($con, $_POST['direction_id']);
    $departure_time = mysqli_real_escape_string($con, $_POST['departure_time']);
    $arrival_time = mysqli_real_escape_string($con, $_POST['arrival_time']);
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $query = "INSERT INTO schedule (direction_id, departure_time, arrival_time, airline_id, price) VALUES ('$direction_id', '$departure_time', '$arrival_time', '$airline_id', '$price')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Schedule Created Successfully";
        header("Location: schedule.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Schedule Not Created";
        header("Location: schedule-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_schedule'])) {
    $schedule_id = mysqli_real_escape_string($con, $_POST['delete_schedule']);

    $query = "DELETE FROM schedule WHERE schedule_id='$schedule_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Schedule Deleted Successfully";
        header("Location: schedule.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Schedule Deletion Failed";
        header("Location: schedule.php");
        exit(0);
    }
}

if (isset($_POST['update_schedule'])) {
    $schedule_id = mysqli_real_escape_string($con, $_POST['schedule_id']);
    $direction_id = mysqli_real_escape_string($con, $_POST['direction_id']);
    $departure_time = mysqli_real_escape_string($con, $_POST['departure_time']);
    $arrival_time = mysqli_real_escape_string($con, $_POST['arrival_time']);
    $airline_id = mysqli_real_escape_string($con, $_POST['airline_id']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $query = "UPDATE schedule SET direction_id='$direction_id', departure_time='$departure_time', arrival_time='$arrival_time', airline_id='$airline_id', price='$price' where schedule_id='$schedule_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Schedule Updated Successfully";
        header("Location: schedule.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Schedule Update Failed";
        header("Location: schedule-update.php");
        exit(0);
    }
}

if (isset($_POST['save_reservation'])) {
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);

    $query = "INSERT INTO reservation (passenger_id, flight_id) VALUES ('$passenger_id', '$flight_id')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        $_SESSION['message'] = "Reservation Created Successfully";
        header("Location: reservation.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Reservation Not Created";
        header("Location: reservation-create.php");
        exit(0);
    }
}

if (isset($_POST['update_reservation'])) {
    $passenger_id = mysqli_real_escape_string($con, $_POST['passenger_id']);
    $flight_id = mysqli_real_escape_string($con, $_POST['flight_id']);

    $query = "UPDATE reservation SET passenger_id='$passenger_id', flight_id='$flight_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Reservation Updated Successfully";
        header("Location: reservation.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Reservation Update Failed";
        header("Location: reservation-update.php");
        exit(0);
    }
}

if (isset($_POST['delete_reservation'])) {
    $reservation_id = mysqli_real_escape_string($con, $_POST['delete_reservation']);

    $query = "DELETE FROM reservation WHERE reservation_id='$reservation_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Reservation Deleted Successfully";
        header("Location: reservation.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Reservation Deletion Failed";
        header("Location: reservation.php");
        exit(0);
    }
}

if (isset($_POST['delete_booked_information'])) {
    $booked_id = mysqli_real_escape_string($con, $_POST['delete_booked_information']);

    $query = "DELETE FROM booked_information WHERE booked_id='$booked_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Booked Information Deleted Successfully";
        header("Location: booked-information.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Booked Information Deletion Failed";
        header("Location: booked-information.php");
        exit(0);
    }
}
