<?php
session_start();
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
                        <h4>Add Flight
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["location"].value;
                                var b = document.forms["Form"]["destination"].value;
                                var c = document.forms["Form"]["airlines"].value;
                                var d = document.forms["Form"]["departure"].value;
                                var e = document.forms["Form"]["arrival"].value;
                                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Flight Location </label>
                                <input type="text" name="location" placeholder="Enter location" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Flight Destination </label>
                                <input list="destination" type="text" name="destination" placeholder="Enter destination" class="form-control">
                                <datalist id="destination">
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
                                <label> Flight Airlines </label>
                                <input list="airlines" type="text" name="airlines" placeholder="Enter chosen airlines" class="form-control">
                                <datalist id="airlines">
                                    <option value="Cebu Pacific">
                                    <option value="Philippine Airlines">
                                    <option value="Air Asia">
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label> Flight Departure </label>
                                <input type="datetime-local" name="departure" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Flight Arrival </label>
                                <input type="datetime-local" name="arrival" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_flight" class="btn btn-primary">Save Flight</button>
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