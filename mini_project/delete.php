<?php
    require 'session.php';

    if(isset($_GET['id']) != "") 
    {
        $delete = $_GET['id'];
        $sql = "DELETE FROM notes WHERE notes.noteID = '$delete'";
        if(mysqli_query($conn, $sql))
        {
            header("Location:view.php");
        } 
        else 
        {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
?>