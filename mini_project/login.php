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
      
      $sql = "SELECT * FROM user WHERE email = '$email' and password = '$pass'";
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
            echo 'alert("Your Login Name or Password is invalid!")';
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   
   	<header>
		<h2><a href="main.php">Note Savvy</a></h2>
		<nav>
			<li><a href="main.php">Home</a></li>
			<li><a href="login.php">Sign In</a></li>
			<li><a href="register.php">Create Account</a></li>
			<li><a href="#">Contacts</a></li>
		</nav>
	</header>
   
    <section class="hero">
		<div class="background-image" style="background-image: url(images/note1.jpeg);"></div>
		<h2>Please sign in</h2>
		<div class="loginform">
		   <form action = "" method = "post">
				Email: <br>
				<input class="form-control" type="email" name="email" placeholder="john@gmail.com" value="" autofocus required> 
				<br>
				Password: <br>
				<input class="form-control" type="password" name="password" value="" required>
				<br>
				<br>
				<input class="btn" type="submit" name="submit" value="Log In">
			</form>
    	</div>
	</section>
    
    <footer>
		<ul>
			<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
			<li><a href="#"><i class="fa fa-snapchat-square"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
			<li><a href="#"><i class="fa fa-github-square"></i></a></li>
		</ul>
   </footer>
</body>
</html>