<?php
require 'admin/dbcon.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>View</title>

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


                        <div>
                            <form action="book2.php" method="post">
                                <?php
                                if (isset($_POST['input'])) {

                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $date_of_birth = $_POST['date_of_birth'];
                                    $citizenship = $_POST['citizenship'];
                                    $p_number = $_POST['p_number'];
                                    $email = $_POST['email'];

                                    echo "You entered: " . $first_name . "<br>";
                                    echo "You entered: " . $last_name . "<br>";
                                    echo "You entered: " . $date_of_birth . "<br>";
                                    echo "You entered: " . $citizenship . "<br>";
                                    echo "You entered: " . $p_number . "<br>";
                                    echo "You entered: " . $email . "<br>";
                                }
                                ?>

                                <input type="submit" name="send" class="btn">
                                <form action="code.php" method='POST' class="d-inline">
                                    <button type="submit" name="delete_passenger" value="<?= $passenger['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </form>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>