<?php
    require 'session.php';

    if(isset($_GET['id']) != "") 
    {
        $delete = $_GET['id'];
        $sql = "DELETE FROM f_review WHERE f_review.reviewID = '$delete'";
        if(mysqli_query($conn, $sql))
        {
            header("Location:food_r.php");
        } 
        else 
        {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
?>