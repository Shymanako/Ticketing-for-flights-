<?php
session_start();
include('partials/login-check.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
    <title>Create</title>

  </head>
  <body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Direction
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["destination_airport_code"].value;
                                var b = document.forms["Form"]["price"].value;
                                if (a == null || a == "", b == null || b == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Destination Airport Code </label>
                                <input list="destination_airport_code" type="text" name="destination_airport_code" placeholder="Enter destination airport code" class="form-control">
                                <datalist id="destination_airport_code">
                                    <option value="Manila">
                                    <option value="Tokyo">
                                    <option value="Seoul">
                                    <option value="Agra">
                                    <option value="Beijing">
                                    <option value="Hanoi">
                                    <option value="Kuala Lumpur">
                                    <option value="Rio De Janeiro">
                                    <option value="Singapore">
                                    <option value="Reykjavik">
                                    <option value="Paris">
                                    <option value="Bali">
                                </datalist>
                            </div>

                            <div class="mb-3">
                                <label> Price </label>
                                <input type="number" name="price" placeholder="Enter Price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_direction" class="btn btn-primary">Save Direction</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    
  </body>
</html>