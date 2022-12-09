<?php
  session_start();
  require 'dbcon.php';
?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">

    <title>Admin</title>

  </head>
  <body>

    <div class="wrapper">
      <div class="sidebar">
        <h2>DB Admin</h2>  
        <li><a href="admin.php">Home</a></li>
        <li><a href="airline.php">Airline</a></li>
        <li><a href="airport.php">Airport</a></li>
        <li><a href="booked-information.php">Booked Information</a></li>
        <li><a href="direction.php">Direction</a></li>
        <li><a href="flight.php">Flight</a></li>
        <li><a href="passenger.php">Passenger</a></li>
        <li><a href="payment.php">Payment</a></li>
        <li><a href="reservation.php">Reservation</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="../home.php"> Back to Website</a></li>
        <li><a href="logout-admin.php"> Logout</a></li>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <br>
      <?php
          if(isset($_SESSION['login']))
          {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
          }
      ?>
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Airline Details
                <a href="airline-create.php" class="btn btn-primary float-end">Add Airline</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Airline ID</th>
                        <th>Airline Name</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM airline";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $airline){

                          // echo
                          ?>
                          <tr>
                            <td><?= $airline['airline_id']; ?></td>
                            <td><?= $airline['airline_name']; ?></td>
                            <td>
                              <a href="airline-view.php?airline_id=<?= $airline['airline_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="airline-update.php?airline_id=<?= $airline['airline_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_airline" value="<?=$airline['airline_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Airport Details
                <a href="airport-create.php" class="btn btn-primary float-end">Add Airport</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Airport Code</th>
                        <th>Airport Name</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM airport";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $airport){

                          // echo
                          ?>
                          <tr>
                            <td><?= $airport['airport_code']; ?></td>
                            <td><?= $airport['airport_name']; ?></td>
                            <td>
                              <a href="airport-view.php?airport_code=<?= $airport['airport_code']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="airport-update.php?airport_code=<?= $airport['airport_code']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_airport" value="<?=$airport['airport_code']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Direction Details
                <a href="direction-create.php" class="btn btn-primary float-end">Add Direction</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Direction ID</th>
                        <th>Origin Airport Code</th>
                        <th>Destination Airport Code</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM direction";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $direction){

                          // echo
                          ?>
                          <tr>
                            <td><?= $direction['direction_id']; ?></td>
                            <td><?= $direction['origin_airport_code']; ?></td>
                            <td><?= $direction['destination_airport_code']; ?></td>
                            <td><?= $direction['price']; ?></td>
                            <td>
                              <a href="direction-view.php?direction_id=<?= $direction['direction_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="direction-update.php?direction_id=<?= $direction['direction_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_airport" value="<?=$direction['direction_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Flight Details
                <a href="flight-create.php" class="btn btn-primary float-end">Add Flight</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Flight ID</th>
                        <th>Schedule ID</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM flight";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $flight){

                          // echo
                          ?>
                          <tr>
                            <td><?= $flight['flight_id']; ?></td>
                            <td><?= $flight['schedule_id']; ?></td>
                            <td>
                              <a href="flight-view.php?flight_id=<?= $flight['flight_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="flight-update.php?flight_id=<?= $flight['flight_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_flight" value="<?=$flight['flight_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Passenger Details
                <a href="passenger-create.php" class="btn btn-primary float-end">Add Passengers</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Passenger ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Citizenship</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM passenger";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $passenger){

                          // echo
                          ?>
                          <tr>
                            <td><?= $passenger['passenger_id']; ?></td>
                            <td><?= $passenger['first_name']; ?></td>
                            <td><?= $passenger['last_name']; ?></td>
                            <td><?= $passenger['date_of_birth']; ?></td>
                            <td><?= $passenger['citizenship']; ?></td>
                            <td><?= $passenger['phone_number']; ?></td>
                            <td><?= $passenger['email']; ?></td>
                            <td><?= $passenger['password']; ?></td>
                            <td>
                              <a href="passenger-view.php?passenger_id=<?= $passenger['passenger_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="passenger-update.php?passenger_id=<?= $passenger['passenger_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_passenger" value="<?=$passenger['passenger_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Payment Details
                <a href="payment-create.php" class="btn btn-primary float-end">Add Payment</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Payment ID</th>
                        <th>Reservation ID</th>
                        <th>Payment Method</th>
                        <th>Payment Amount</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM payment";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $payment){

                          // echo
                          ?>
                          <tr>
                            <td><?= $payment['payment_id']; ?></td>
                            <td><?= $payment['reservation_id']; ?></td>
                            <td><?= $payment['payment_method']; ?></td>
                            <td><?= $payment['payment_amount']; ?></td>
                            <td>
                              <a href="payment-view.php?payment_id=<?= $payment['payment_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="payment-update.php?payment_id=<?= $payment['payment_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_payment" value="<?=$payment['payment_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Reservation Details
                <a href="reservation-create.php" class="btn btn-primary float-end">Add Reservation</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Reservation ID</th>
                        <th>Passenger ID</th>
                        <th>Flight ID</th>
                        <th>Reservation Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM reservation";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $reservation){

                          // echo
                          ?>
                          <tr>
                            <td><?= $reservation['reservation_id']; ?></td>
                            <td><?= $reservation['passenger_id']; ?></td>
                            <td><?= $reservation['flight_id']; ?></td>
                            <td><?= $reservation['reservation_status']; ?></td>
                            <td>
                              <a href="reservation-view.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="reservation-update.php?reservation_id=<?= $reservation['reservation_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_reservation" value="<?=$reservation['reservation_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Schedule Details
                <a href="schedule-create.php" class="btn btn-primary float-end">Add Schedule</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>schedule ID</th>
                        <th>Direction ID</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Airline ID</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = "SELECT * FROM schedule";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $schedule){

                          // echo
                          ?>
                          <tr>
                            <td><?= $schedule['schedule_id']; ?></td>
                            <td><?= $schedule['direction_id']; ?></td>
                            <td><?= $schedule['departure_time']; ?></td>
                            <td><?= $schedule['arrival_time']; ?></td>
                            <td><?= $schedule['airline_id']; ?></td>
                            <td>
                              <a href="schedule-view.php?schedule_id=<?= $schedule['schedule_id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="schedule-update.php?schedule_id=<?= $schedule['schedule_id']; ?>" class="btn btn-success btn-sm">Update</a>
                              <form action="code.php" method='POST' class="d-inline">
                                <button type="submit" name="delete_schedule" value="<?=$schedule['schedule_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else{
                        echo '<h5>No Record Found </h5>';
                      }
                    ?>
                  </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  </body>
</html>