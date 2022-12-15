<?php
require 'admin/dbcon.php';
require 'admin/message.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Passenger Data</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('admin/message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Schedule Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        $query = "Select * from passenger order by passenger_id desc limit 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $passenger) {

                                // echo
                        ?>
                                <tr>
                                    <input type="hidden" name="passenger_id" value="<?= $passenger['passenger_id']; ?>">
                                    <td><?= $passenger['first_name']; ?></td>
                                    <td><?= $passenger['last_name']; ?></td>
                                    <td><?= $passenger['date_of_birth']; ?></td>
                                    <td><?= $passenger['citizenship']; ?></td>
                                    <td><?= $passenger['p_number']; ?></td>
                                    <td><?= $passenger['email']; ?></td>

                                    <td>
                                        <a href="book2.php?passenger_id=<?= $passenger['passenger_id']; ?>" class="btn">Confirm</a>
                                        <form action="delete.php" method='POST' class="d-inline">
                                            <button type="submit" name="delete" value="<?= $passenger['passenger_id']; ?>" class="btn">Cancel</a>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<h5>No Record Found </h5>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>