<?php
    require 'session.php';
 
// Attempt select query execution
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View note</title>
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
			<li><a href="view.php">View All Notes</a></li>
			<li><a href="logout.php">Log out</a></li>
			<li><a href="#">Contacts</a></li>
		</nav>
	</header>
	
	<section class="hero">
		<div class="background-image" style="background-image: url(images/note5.jpg);"></div>
		
		<?php
	   		//echo "<h2>Hello!<br>" . $login_name . "</h2>";
			
			$id=$_GET['id'];
			$sql = "SELECT notes.noteTitle, notes.description, notes.day, notes.month, notes.year, notes.tags FROM notes WHERE notes.noteID = '$id'";

			if($result = mysqli_query($conn, $sql)) {

				if(mysqli_num_rows($result) > 0) {

					$row = mysqli_fetch_array($result); ?>
					
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Note Owner: <?php echo $login_name; ?></h2>
							<h3><?php echo $row['noteTitle']; ?></h3>
						</div>
						
						<div class="panel-body" style="color:black">
						
							<?php echo $row['description']; ?>
							
						</div>
						
					</div>
					
	<?php			mysqli_free_result($result);
				}

				else{
					echo "No records matching your query were found.";
				}
			} 
			else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}

			// Close connection
			mysqli_close($conn);
	    ?>
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
