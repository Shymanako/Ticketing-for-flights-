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
                        <h4>Add Passenger
                            <a href="passenger.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["first_name"].value;
                                var b = document.forms["Form"]["last_name"].value;
                                var c = document.forms["Form"]["date_of_birth"].value;
                                var d = document.forms["Form"]["citizenship"].value;
                                var e = document.forms["Form"]["p_number"].value;
                                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Passenger First Name </label>
                                <input type="text" name="first_name" placeholder="Enter passenger first name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label> Passenger Last Name </label>
                                <input type="text" name="last_name" placeholder="Enter passenger last name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label> Passenger Date of Birth </label>
                                <input type="date" name="date_of_birth" placeholder="Enter passenger birthdate" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label> Passenger Citizenship </label>
                                <input type="text" name="citizenship" placeholder="Enter passenger citizenship" class="form-control">
                            </div>

                            <div class="mb-3">
                            <label> Passenger Phone Number </label>
                                <input type="number" name="p_number" placeholder="Enter passenger phone number" class="form-control" maxlength="11">
                            </div>

                            <div class="mb-3">
                            <label> Email </label>
                                <input type="email" name="email" placeholder="Enter passenger email" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_passenger" class="btn btn-primary">Save Passenger</button>
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