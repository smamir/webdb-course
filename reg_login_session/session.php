<?php
   require 'db_connection.php';
   session_start();
   
   $user_check = $_SESSION['login_email'];
   
   $ses_sql = mysqli_query($conn,"select username from user where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $login_id = $row['email'];


   if(!isset($_SESSION['login_email'])) {
      header("location:login.php");
   }
?>
