<?php  
	session_start();
	if(isset($_SESSION['email'])) {
	      header("location:dashboard.php");
	   }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Food And Restaurant Review
		</title>
		<link rel="stylesheet" style="text/css"href="style.css">
	</head>

	<body>
	<li>
		<ul>
			<a href="register.php">Sign Up</a>
		</ul>
		<ul>
			<a href="login.php">Log In</a>
		</ul>
		<ul>
			<a href="#">View Reviews and Ratings</a>
		</ul>
		<ul>
			<a href="logout.php">Log Out</a>
		</ul>
	</li>
	</body>
</html>