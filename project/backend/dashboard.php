<?php 
	require 'session.php';
	//require 'restaurants.php';
	echo "<h2>Hello!<br>" . $login_name . "</h2>";
	echo "<h3>You are logged in as " . $usertype . ". <br></h3>";

	if ($usertype=='admin') {
	 	echo '<br><a href="restaurants.php" target="_blank"><h4>All Restaurants<h4></a>';
	 	echo '<br><a href="foods.php" target="_blank"><h4>All Food Item<h4></a>';
	 	echo '<br><a href="restaurant_r.php" target="_blank"><h4>All Restaurant Reviews<h4></a>';
	 	echo '<br><a href="food_r.php" target="_blank"><h4>All Food Reviews<h4></a>';
	}
	else if($usertype=='moderator') {
		echo '<br><a href="restaurants.php" target="_blank"><h4>Restaurants You Added<h4></a>';
		echo '<br><a href="foods.php" target="_blank"><h4>All Food Item<h4></a>';
		echo '<br><a href="restaurant_r.php" target="_blank"><h4>All Restaurant Reviews<h4></a>';
	 	echo '<br><a href="food_r.php" target="_blank"><h4>All Food Reviews<h4></a>';
	}
	else {
	 	echo '<br><a href="restaurants.php" target="_blank"><h4>Restaurants You Added<h4></a>';
	 	echo '<br><a href="foods.php" target="_blank"><h4>Food Item You Added<h4></a>';
	 	echo '<br><a href="restaurant_r.php" target="_blank"><h4>Restaurant Reviews You Added<h4></a>';
	 	echo '<br><a href="food_r.php" target="_blank"><h4>Food Reviews You Added<h4></a>';
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<br>
<br>
<div>
	<li>
		<ul>
			<a href="add_restaurant.php">Add New Restaurant</a>
		</ul>
		<ul>
			<a href="add_food.php">Add New Food</a>
		</ul>
		<ul>
			<a href="r_review.php">Restaurant Review</a>
		</ul>
		<ul>
			<a href="select_r.php">Food Review</a>
		</ul>
	</li>
</div>

<div>
	
</div>

<a href="logout.php">Log Out</a>
</body>
</html>