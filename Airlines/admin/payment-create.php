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
                        <h4>Add Payment
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["credit_type"].value;
                                var b = document.forms["Form"]["account_number"].value;
                                if (a == null || a == "", b == null || b == ""){
                                alert("Please Fill In All Required Details");
                                return false;
                                }
                            }
                        </script>
                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label>Credit Type </label>
                                <input list="credit_type" type="text" name="credit_type" placeholder="Enter credit card" class="form-control">
                                <datalist id="credit_type">
                                    <option value="Visa">
                                    <option value="Mastercard">
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label> Account Number </label>
                                <input type="text" name="account_number" placeholder="Enter account number" class="form-control" maxlength="12">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_payment" class="btn btn-primary">Save Payment</button>
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