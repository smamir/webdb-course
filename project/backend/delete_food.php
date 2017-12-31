<?php
    require 'session.php';

    if(isset($_GET['id']) != "") 
    {
        $flag = 0;
        $delete = $_GET['id'];
        $sql = "DELETE FROM food WHERE food.fid = '$delete'";
        mysqli_query($conn, $sql);
        $flag++;
        $sql1 = "DELETE FROM f_review WHERE f_review.fid = '$delete'";
        mysqli_query($conn, $sql1);
        $flag++;

        if($flag == 2)
        {
            header("Location:foods.php");
        } 
        else 
        {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
?>