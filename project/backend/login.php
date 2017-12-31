<?php
   require 'db_connection.php';
   session_start();
    if(isset($_SESSION['email'])) {
      header("location:dashboard.php");
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']); 
      $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
      
      $sql = "SELECT * FROM user WHERE email = '$email' and password = '$pass' and usertype = '$usertype' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      

      if($count == 1) {
          
            //echo "Hello! " . $row['name']; 
            //if($email === $admin_email) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['usertype'] = $row['usertype'];
            header("location: dashboard.php");
              
          //} 
          //else {
            //  $_SESSION['login_email'] = $email;
              //header("location: welcome.php");
          //}
          
      }
     else {
         //$error = "Your Login Name or Password is invalid";
            echo '<script language="javascript">';
            echo 'alert("Your Login Name or Password or User Type is invalid!")';
            echo '</script>';
            //header("location: main.php");
      } 
       
   }
mysqli_close($conn);

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
        <h2>Please sign in</h2>
        <form action = "" method = "post">
            Email: <br>
            <input type="email" name="email" placeholder="john@gmail.com" value="" autofocus required> 
            <br>
            Password: <br>
            <input type="password" name="password" value="" required>
            <br>
            User Type: <br>
            <select name="usertype">
                <option value="user">User</option>
                <option value="moderator">Moderator</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" value="Log In">
        </form>
    </div>
</body>
</html>