<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Note Keeper</title>
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
			<?php 
				if(isset($_SESSION['email'])) {  ?>
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="logout.php">Log out</a></li>
					<li><a href="#">Contacts</a></li>
					
			<?php } 
				
				else { ?>
					<li><a href="login.php">Sign In</a></li>
					<li><a href="register.php">Create Account</a></li>
					<li><a href="#">Contacts</a></li>
					
		<?php		}  ?>
			
		</nav>
	</header>
   
    <section class="hero">
		<div class="background-image" style="background-image: url(images/note.jpg);"></div>
		<h1>Your personal note keeper</h1>
		<a href="register.php" class="btn">Join us here ...</a>
	</section>
   
    <section class="features">
		<h3 class="title">Features and services</h3>
		<p>The simplest way to keep notes!</p>
		<hr>

		<ul class="grid">
			<li>
				<i class="fa fa-universal-access"></i>
				<h4>Use Everywhere</h4>
				<p>Your notes stay updated across all your devices.</p>
			</li>
			<li>
				<i class="fa fa-cubes"></i>
				<h4>Stay Organized</h4>
				<p>Find notes quickly with simple tags.</p>
			</li>
			<li>
				<i class="fa fa-rocket"></i>
				<h4>Free</h4>
				<p>It’s all completely free.</p>
			</li>
		</div>
	</section>
   
    <section class="contact">
		<h3 class="title">Join our newsletter</h3>	
		<hr>

		<form>
			<input type="email" placeholder="Email">
			<a href="#" class="btn">Subscribe now</a>
		</form>
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
    
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>