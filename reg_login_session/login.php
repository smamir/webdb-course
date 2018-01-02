<?php
   require 'db_connection.php';
   session_start();
   
   $admin_email = "admin@mail.com";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']); 
      
      $sql = "SELECT userID FROM user WHERE email = '$email' and password = '$pass'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
		
      if($count == 1) {
          
          if($email === $admin_email) {
              $_SESSION['login_email'] = $admin_email;
              header("location: admin_panel.php");
              
          } 
          else {
              $_SESSION['login_email'] = $email;
              header("location: welcome.php");
          }
          
      }
     else {
         //$error = "Your Login Name or Password is invalid";
            echo '<script language="javascript">';
            echo 'alert("Your Login Name or Password is invalid!")';
            echo '</script>';
      } 
       
   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
    <div class="newform">
        <h2>User Login Form</h2>
        <form action = "" method = "post">
            Email: <br>
            <input type="email" name="email" placeholder="john@gmail.com" value="" autofocus required> 
            <br>
            Password: <br>
            <input type="password" name="password" value="" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Log In">
        </form>
    </div>
    
    <div class="newform">
        <h2>Admin Login Form</h2>
        <form action = "" method = "post">
            Email: <br>
            <input type="email" name="email" value="admin@mail.com" readonly>
            <br>
            Password: <br>
            <input type="password" name="password" value="" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Log In">
        </form>
    </div>
</body>
</html>