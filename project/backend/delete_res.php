<?php
    require 'session.php';

    if(isset($_GET['id']) != "") 
    {
        $flag = 0;
        $delete = $_GET['id'];
        $sql1 = "DELETE FROM restaurant WHERE restaurant.rid = '$delete'";
        mysqli_query($conn, $sql1);
        $flag++;
        $sql2 = "DELETE FROM food WHERE food.rid = '$delete'";
        mysqli_query($conn, $sql2);
        $flag++;
        $sql3 = "DELETE FROM r_review WHERE r_review.rid = '$delete'";
        mysqli_query($conn, $sql3);
        $flag++;
        $sql4 = "DELETE FROM f_review WHERE f_review.rid = '$delete'";
        mysqli_query($conn, $sql4);
        $flag++;

        if($flag == 4)
        {
            header("Location:restaurants.php");
        } 
        else 
        {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
?>