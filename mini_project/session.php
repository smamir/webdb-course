<?php
   require 'db_connection.php';
   session_start();
   
   $user_check = $_SESSION['email'];
   
   $ses_sql = mysqli_query($conn,"select * from user where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql);
   
   
   $login_name = $row['name'];
   $login_email = $row['email'];

    //echo $login_pass;


   if(!isset($_SESSION['email'])) {
      header("location:login.php");
   }
?>