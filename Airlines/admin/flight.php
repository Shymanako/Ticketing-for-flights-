<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM flight";
                $query_run = mysqli_query($con, $query);
                $count = mysqli_num_rows($query_run);

                if ($count > 0) {
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    $flight_id = $row['flight_id'];
                    $schedule_id = $row['schedule_id'];
                    $image = $row['image'];
                ?>
                    <tr>
                      <td><?php echo $flight_id; ?></td>
                      <td><?php echo $schedule_id; ?></td>
                      <td>
                        <?php
                        // check whether image is available or not
                        if ($image=="") {
                          // display image
                          echo "Image not added";
                        } else {
                          // Display message
                          ?>
                          <img src="<?php echo 'http://localhost/Ticketing-for-flights-/Airlines/'; ?>img/flight/<?php echo $image; ?>" width="100px">
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                        <a href="flight-view.php?flight_id=<?php echo $flight_id; ?>" class="btn btn-info btn-sm">View</a>
                        <a href="flight-update.php?flight_id=<?php echo $flight_id; ?>" class="btn btn-success btn-sm">Update</a>
                        <a href="flight-delete.php?delete_flight_id=<?php echo $flight_id; ?>&delete_image=<?php echo $image;?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                <?php
                  }
                } else {
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