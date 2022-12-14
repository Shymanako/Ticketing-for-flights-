<?php
session_start();
require 'admin/dbcon.php';

    if(isset($_POST['delete'])){
        $passenger_id = mysqli_real_escape_string($con, $_POST['delete']);
        $query = "DELETE FROM passenger WHERE id='$passenger_id' ";
        $query_run = mysqli_query($con, $query);
    
        if($query_run){
            header("Location: book2.php");
            exit(0);
        }
    }
?>